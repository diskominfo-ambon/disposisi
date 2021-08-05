<?php
class M_login extends CI_Model{


    public function all()
    {
        $query = $this->db->get('user');

        return $query->result();
    }
    public function login ($post)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username',$post['username']);
        $this->db->where('password',md5($post['password']));
        $query = $this->db->get();
        return $query;
    }

    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('user');
        if ($id != null) {
            $this->db->where('id_user', $id);
        }
        $query = $this->db->get('');
        return $query;
    }


    public function findAllUserNotEmployee()
    {
        $query = <<<SQL
            SELECT u.id_user, u.nama FROM `user` u
                WHERE id_user NOT IN (
                    SELECT id_user FROM pegawai
                )
                AND level NOT IN (1,2);
        SQL;

        return $this->db->query($query)->result();
    }

    public function tambah($post)
    {
        $params['nama'] = $post['fullname'];
        $params['gender'] = $post['gender'];
        $params['email'] = $post['email'];
        $params['username'] = $post['username'];
        $params['password'] = md5($post['password']);
        $params['level'] = $post['level'];
        $this->db->insert('user', $params); 

    }

      public function delete($id){
        $this->db->where('id_user',$id); // persamaan kolom noinduk dengan variabel noinduk yang didapat dari controller
        $this->db->delete('user');  //Menghapus baris pada tb siswa dengan kondisi seperti di atas.
    }

     public function update($post)
    {
        
        $params['nama'] = $post['fullname'];
        $params['gender'] = $post['gender'];
        $params['email'] = $post['email'];
        $params['username'] = $post['username'];
        if(!empty($post['password'])){
        $params['password'] = md5($post['password']);
    }
        $params['level'] = $post['level'];
        $this->db->where('id_user', $post['id_user']);
        $this->db->update('user', $params); 

    }
 
}