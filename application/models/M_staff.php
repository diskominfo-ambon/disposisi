<?php

class M_staff extends CI_Model{
    
    public function all($id)
    {
        
        $rawQuery = <<<SQL
        SELECT sm.*, u.nama, ss.sifat_surat FROM surat_masuk sm 
            INNER JOIN sifat_surat ss ON sm.id_ss = ss.id_ss
            INNER JOIN disposisi d ON sm.id_sm = d.id_sm 
            INNER JOIN pegawai p ON d.id_pegawai = p.id_pegawai
            INNER JOIN user u ON p.id_user = u.id_user
            WHERE u.id_user = $id;
        SQL;

        $query = $this->db->query($rawQuery);

        return $query->result();
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

	public function update($post)
	{

		$userId = $this->session->userdata('id_user');
		
		$sql =<<<SQL
			SELECT id_pegawai FROM pegawai
				WHERE id_bidang = (
					SELECT id_bidang FROM pegawai
						WHERE id_user = $userId
				);
		SQL;
		$pegawai = $this->db
			->query($sql)
			->result();

		$body = [];

		foreach ($pegawai as $p) {
			$body[] = [
				'instruksi' => $post['laporan'],
				'id_sm' => $post['id_sm'],
				'id_pegawai' => $p->id_pegawai
			];
		}

		// set laporan kembali ke tiap-tiap atasannya.
		$this->db->insert_batch('disposisi', $body);
	
		// rubah status surat ke finish.	
		$this->db
			->where('id_sm', $post['id_sm'])
			->set('status', 'finish')
			->update('surat_masuk');
	}
 
}
