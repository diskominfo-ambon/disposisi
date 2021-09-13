<?php

class M_kabid extends CI_Model
{

    public function all($id)
    {

        $rawQuery = <<<SQL
        SELECT sm.*, d.id_disposisi, u.nama, ss.sifat_surat FROM surat_masuk sm 
            INNER JOIN sifat_surat ss ON sm.id_ss = ss.id_ss
            INNER JOIN disposisi d ON sm.id_sm = d.id_sm 
            INNER JOIN pegawai p ON d.id_pegawai = p.id_pegawai
            INNER JOIN user u ON p.id_user = u.id_user
            WHERE u.id_user = $id  AND
            p.id_sie > 0;
        SQL;

        $query = $this->db->query($rawQuery);

        return $query->result();
    }

    public function getByOrder($id, $order)
    {
        $sql = <<<SQL
			SELECT DISTINCT s.*, d.id_disposisi, d.instruksi, d.read_at, ss.sifat_surat FROM
				surat_masuk s LEFT JOIN disposisi d
					ON s.id_sm = d.id_sm
				INNER JOIN sifat_surat ss 
					ON s.id_ss = ss.id_ss
				INNER JOIN pegawai p
					ON d.id_pegawai = (
						SELECT id_pegawai FROM pegawai
							WHERE id_user = $id
					)


		SQL;



        if (empty($order)) {
            $sql .= <<<SQL
				WHERE s.status = 'Proses'
			SQL;
        }

        if ($order == 'finish') {
            $sql .= <<<SQL
				WHERE s.status = 'finish'
			SQL;
        }

        $sql .=<<<SQL
            ORDER BY id_disposisi DESC;
        SQL;



        $rows = json_encode($this->db->query($sql)->result(), true);
       
        $result = [];
    
        foreach (json_decode($rows, true) as $row) {
           $key = $row['nomor_sm'];

            if (isset($result[$key])) continue;

            $result[$key] = array_merge($row, ['disposisi' => is_null($row['read_at'])]);
        }

        return $result;


    }


    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('surat_masuk');
        if ($id != null) {
            $this->db->where('surat_masuk', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function tambah($post, $id_disposisi)
    {
        $body = [];

        // cek waktu kadarluasa surat.
        $surat = $this->db
            ->select('tanggal_expire')
            ->where('id_sm', $post['id_sm'])
            ->get('surat_masuk')
            ->result()[0];

        date_default_timezone_set('Asia/Jayapura');


        if (time() > strtotime($surat->tanggal_expire)) {
            return false;
        }

        foreach ($post['id_pegawai'] as $id) {
            $body[] = array_merge(
                $post,
                [
                    'id_pegawai' => $id,
                ]
            );
        }
   
        $this->db->insert_batch('disposisi', $body);

        $date = date('Y-m-d H:i:s');
   
        // update disposisi read_at.   
          $this->db
                ->set('read_at', $date)
                ->where('id_disposisi', $id_disposisi)
                ->update('disposisi');
       
    }


    public function laporan($post, $id)
    {

        $userId = $this->session->userdata('id_user');

        $sql = <<<SQL
			SELECT id_pegawai FROM pegawai
				WHERE id_user = $userId LIMIT 1
		SQL;

        $pegawai = $this->db->query($sql)->result();


    

        // untuk bkin history disposisi.
        $this->db->insert('disposisi', [
            'instruksi' => $post['instruksi'],
            'id_pegawai' => $pegawai[0]->id_pegawai,
            'id_sm' => $post['id_sm']
        ]);
        // end.


        // rubah status.

        $this->db
            ->where('id_sm', $post['id_sm'])
            ->set('status', $post['status'])
            ->update('surat_masuk');


        $date = date('Y-m-d H:i:s');
        // update disposisi read_at.
        $this->db->where('id_disposisi', $post['id_disposisi'])
            ->set('read_at', $date)
            ->update('disposisi');
    }
}
