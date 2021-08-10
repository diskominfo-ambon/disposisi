<?php

class M_bidang extends CI_Model{
    
    public function all()
    {
        $query = $this->db->get('bidang');

        return $query->result();
    }
    public function get($order = 'proses')
    {

		$idUser = $this->session->userdata('id_user');

		$sql =<<<SQL
			SELECT DISTINCT s.* FROM
				surat_masuk s LEFT JOIN disposisi d
				ON s.id_sm = d.id_sm
				AND d.id_pegawai = (
					SELECT id_pegawai FROM pegawai
						WHERE id_user = $idUser
				)					
		SQL;

		if ($order == 'proses') {
			$sql .=<<<SQL
				AND s.status = 'Proses';
			SQL;
		}

		if ($order == 'finish') {
			$sql .=<<<SQL
				AND s.status = 'finish';
			SQL;
		}

		return $this->db->query($sql);
    }

    public function tambah($post)
    {
        $params['nama_bidang'] = $post['nama_bidang'];
        $this->db->insert('bidang', $params); 

    }

      public function delete($id){
        $this->db->where('id_bidang',$id); // persamaan kolom noinduk dengan variabel noinduk yang didapat dari controller
        $this->db->delete('bidang');  //Menghapus baris pada tb siswa dengan kondisi seperti di atas.
    }

     public function update($post, $id)
    {
        
        $params['nama_bidang'] = $post['nama_bidang'];
        $this->db->where('id_bidang', $id);
        $this->db->update('bidang', $params); 

    }
 
}
