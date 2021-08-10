<?php

class M_kasie extends CI_Model{
    
    public function all($id)
    {
                
		$sql =<<<SQL
			SELECT s.*, ss.sifat_surat FROM
				surat_masuk s RIGHT JOIN sifat_surat ss
					ON s.id_ss = ss.id_ss
				INNER JOIN disposisi d
					ON s.id_sm = d.id_sm
				WHERE d.id_pegawai = (
					SELECT id_pegawai FROM pegawai 
						WHERE id_user = $id
				)
				AND s.status = 'Prosess';

		SQL;
        

		return $this->db->query($sql);       
    }

    public function tambah($post)
    {
        
        $this->db->insert('disposisi', $post);
        // tambahkan ke disposisi untuk merujuk kembali ke user tententu.

        $this->db->where('id_sm', $post['id_sm']);
        $this->db->update('surat_masuk', [
            'status' => 'selesai'
        ]);
        // rubah status surat ke 'selesai'
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
 
}
