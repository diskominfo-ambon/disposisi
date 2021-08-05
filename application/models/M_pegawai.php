<?php
class M_pegawai extends CI_Model{

    public function all()
    {
        $query = $this->db->get('pegawai');

        return $query->result();
    }

    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('pegawai');
        if ($id != null) {
            $this->db->where('id_pegawai', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    function findAllBidangByUserId($id) {
        $query = <<<SQL
            SELECT id_pegawai, nama_jabatan FROM pegawai
                WHERE id_bidang = (
                    SELECT id_bidang FROM pegawai 
                        WHERE id_user = $id
                )
                AND id_user != $id AND id_sie = 0;
        SQL;

        return $this->db->query($query)->result();
    }

    public function gets($id) {
        
        $query = <<<SQL

            SELECT * FROM pegawai 
                WHERE id_bidang = (
                    SELECT id_bidang FROM pegawai WHERE id_user = $id
                )
                AND id_user != $id
        SQL;

        return $this->db->query($query)->result();
    } 

    public function tambah($post)
    {
        $params['nama_jabatan'] = $post['nama_jabatan'];
        $params['nip']          = $post['nip'];
        $params['id_user']      = $post['id_user'];
        $params['id_bidang']    = $post['id_bidang'] ?: NULL;
        $params['id_sie']       = $post['id_sie'] ?: NULL;
        $this->db->insert('pegawai', $params); 

    }

      public function delete($id){
        $this->db->where('id_pegawai',$id); // persamaan kolom noinduk dengan variabel noinduk yang didapat dari controller
        $this->db->delete('pegawai');  //Menghapus baris pada tb siswa dengan kondisi seperti di atas.
    }

     public function update($post, $id)
    {
        
        $params['nama_jabatan'] = $post['nama_jabatan'];
        $params['nip'] = $post['nip'];
        $params['id_user'] = $post['id_user'];
        $params['id_bidang'] = $post['id_bidang'];
        $params['id_sie'] = $post['id_sie'];
        $this->db->where('id_pegawai', $id);
        $this->db->update('pegawai', $params); 

    }
 
}