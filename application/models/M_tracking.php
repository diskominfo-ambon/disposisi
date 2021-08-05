<?php

class M_tracking extends CI_Model{
    
    public function all()
    {
        $query = $this->db->get('bidang');

        return $query->result();
    }
    public function get($id = null)
    {
        $query = <<<SQL

            SELECT DISTINCT sm.* FROM surat_masuk sm
                INNER JOIN disposisi d ON sm.id_sm = d.id_sm;
        SQL;
        
        return $this->db->query($query);
       
    }

    public function tambah($post) {
        $this->db->insert('disposisi', $post);
    }

    public function findAllSmById($idSm) {
        $query = <<<SQL
            SELECT d.instruksi, d.created_at as `tanggal`, p.nama_jabatan, u.nama
                FROM disposisi d
                    INNER JOIN pegawai p ON d.id_pegawai = p.id_pegawai
                    INNER JOIN `user` u ON p.id_user = u.id_user
                WHERE id_sm = $idSm;
        SQL;

        return $this->db->query($query)->result();
    }
 
}