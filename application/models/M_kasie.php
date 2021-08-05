<?php

class M_kasie extends CI_Model{
    
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