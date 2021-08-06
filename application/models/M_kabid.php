<?php

class M_kabid extends CI_Model{
    
    public function all($id)
    {
        
        $rawQuery = <<<SQL
        SELECT sm.*, u.nama, ss.sifat_surat FROM surat_masuk sm 
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

	public function getByOder($id, $order)
	{
		$sql =<<<SQL
			SELECT DISTINCT s.*, ss.sifat_surat FROM
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

		if (strlen($order) === 0) {
			$sql .=<<<SQL
				WHERE s.status IS NULL;
			SQL;
		}

		if ($order == 'proses') {
			$sql .=<<<SQL
				WHERE s.status = 'Proses';
			SQL;
		}

		if ($order == 'finish') {
			$sql .=<<<SQL
				WHERE s.status = 'finish';
			SQL;
		}
		
		return $this->db->query($sql)->result();
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

    public function tambah($post) {
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
                    'id_pegawai' => $id
                ]
            );
        }

        $this->db->insert_batch('disposisi', $body);
    }
 
}
