<?php

class M_bidang extends CI_Model{
    
    public function all()
    {
        $query = $this->db->get('bidang');

        return $query->result();
    }
    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('bidang');
        if ($id != null) {
            $this->db->where('id_bidang', $id);
        }
        $query = $this->db->get();
        return $query;
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