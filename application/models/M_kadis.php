<?php

class M_kadis extends CI_Model{
    
    public function all()
    {
        $query = $this->db->get('bidang');

        return $query->result();
    }

	public function getByOder($order)
	{
		$idUser = $this->session->userdata('id_user');

		$sql =<<<SQL
			SELECT s.* FROM
				surat_masuk s INNER JOIN disposisi d
				ON s.id_sm = d.id_sm								
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
		
		return $this->db->query($sql);
						
	}

    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('surat_masuk');
        $this->db->where('status !=','selesai');
        if ($id != null) {
            $this->db->where('id_ss', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function tambah($post) {
        $body = [];

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


    /**
     * 
     * metode untuk mengambil semua laporan yg disposisi kembali
     * ke kadis.
     * 
     * int $id id pegawai
     */
    public function laporan($id) {
        $query = <<<SQL
            SELECT sm.*, ss.sifat_surat FROM disposisi d
                INNER JOIN surat_masuk sm
                    ON d.id_sm = sm.id_sm
                INNER JOIN sifat_surat ss
                    ON sm.id_ss = ss.id_ss

            WHERE d.id_pegawai = $id
        SQL;

        return $this->db->query($query)->result();
    }
 
}
