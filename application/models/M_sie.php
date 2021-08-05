<?php

class M_sie extends CI_Model{


    public function all()
    {
        $query = $this->db->get('sie');

        return $query->result();
    }

    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('sie');
        if ($id != null) {
            $this->db->where('id_sie', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function tambah($post)
    {
        $params['nama_sie'] = $post['nama_sie'];
        $this->db->insert('sie', $params); 

    }

      public function delete($id){
        $this->db->where('id_sie',$id); // persamaan kolom noinduk dengan variabel noinduk yang didapat dari controller
        $this->db->delete('sie');  //Menghapus baris pada tb siswa dengan kondisi seperti di atas.
    }

     public function update($post, $id)
    {
        
        $params['nama_sie'] = $post['nama_sie'];
        $this->db->where('id_sie', $id);
        $this->db->update('sie', $params); 

    }
 
}