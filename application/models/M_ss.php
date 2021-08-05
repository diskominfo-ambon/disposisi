<?php

class M_ss extends CI_Model{
    
    public function all()
    {
        $query = $this->db->get('sifat_surat');

        return $query->result();
    }
    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('sifat_surat');
        if ($id != null) {
            $this->db->where('id_ss', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function tambah($post)
    {
        $params['sifat_surat'] = $post['sifat_surat'];
        $this->db->insert('sifat_surat', $params); 

    }

      public function delete($id){
        $this->db->where('id_ss',$id); // persamaan kolom noinduk dengan variabel noinduk yang didapat dari controller
        $this->db->delete('sifat_surat');  //Menghapus baris pada tb siswa dengan kondisi seperti di atas.
    }

     public function update($post, $id)
    {
        
        $params['sifat_surat'] = $post['sifat_surat'];
        $this->db->where('id_ss', $id);
        $this->db->update('sifat_surat', $params); 

    }
 
}