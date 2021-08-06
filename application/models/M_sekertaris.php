<?php

class M_sekertaris extends CI_Model{
    
    public function all($idUser = null)
    {

        $query = $this->db->get('surat_masuk');

        if ($idUser) {
            $rawQuery = <<<SQL
            SELECT sm.id_sm, sm.judul_surat, sm.nomor_berkas FROM surat_masuk sm 
                INNER JOIN disposisi d ON sm.id_sm = d.id_sm
                INNER JOIN pegawai p ON d.id_pegawai = p.id_pegawai
                INNER JOIN user u ON p.id_user = u.id_user
            WHERE u.id_user = $idUser;
            SQL;

            $query = $this->db->query($rawQuery);   
        }

        return $query->result();
    }
    
    public function get($id)
    {
       
        $this->db->select('*');
        $this->db->from('surat_masuk');
        if ($id != null) {
            $this->db->where('id_sm', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function tambah($post)
    {
        $params = [
            'nomor_berkas'          => $post['nomor_berkas'],
            'tanggal_masuk'         => date('Y-m-d', strtotime($post['tanggal_masuk'])),
            'nomor_sm'              => $post['nomor_sm'],
            'perihal'               => $post['perihal'],
            'asal_sm'               => $post['asal_sm'],
            // 'tanggal_expire'        => $post['tanggal_expire'],
            'lampiran'              => $post['lampiran'],
            'status'                => $post['status'],
            'judul_surat'           => $post['judul_surat'],
            'id_ss'                 => $post['id_ss'],
            'gambar'                => $post['imagee']['file_name']

        ];
        $this->db->insert('surat_masuk', $params); 

    }

      public function delete($id){
        $this->db->where('id_sm',$id); // persamaan kolom noinduk dengan variabel noinduk yang didapat dari controller
        $this->db->delete('surat_masuk');  //Menghapus baris pada tb siswa dengan kondisi seperti di atas.
    }

     public function update($post, $id)
    {
        
        $params['nomor_berkas'] = $post['nomor berkas'];
        $this->db->where('id_sm', $id);
        $this->db->update('surat_masuk', $params); 

    }
 
}
