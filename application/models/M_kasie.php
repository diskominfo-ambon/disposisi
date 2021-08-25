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
				AND s.status = 'Proses';

		SQL;


		return $this->db->query($sql);
    }


	public function getByOrder($order) {
		$id = $this->session->userdata('id_user');

		$sql =<<<SQL
			SELECT DISTINCT s.*, ss.sifat_surat FROM
				surat_masuk s RIGHT JOIN sifat_surat ss
					ON s.id_ss = ss.id_ss
				INNER JOIN disposisi d
					ON s.id_sm = d.id_sm
				WHERE d.id_pegawai = (
					SELECT id_pegawai FROM pegawai
						WHERE id_user = $id
				)

		SQL;

		if (empty($order)) {
			$sql .=<<<SQL
				AND s.status = 'Proses';
			SQL;
		} else {
			$sql .=<<<SQL
				AND s.status = 'finish';
			SQL;
		}

		return $this->db->query($sql);
	}

    public function tambah($post)
    {
        $this->db->insert('disposisi', $post);
        // tambahkan ke disposisi untuk merujuk kembali ke user tententu.

        // $this->db->where('id_sm', $post['id_sm']);
        // $this->db->update('surat_masuk', [
        //     'status' => 'finish'
        // ]);
        // rubah status surat ke 'selesai'
    }


	public function update($post)
	{

		$userId = $this->session->userdata('id_user');

		$sql =<<<SQL
			SELECT id_pegawai FROM pegawai
				WHERE id_bidang = (
					SELECT id_bidang FROM pegawai
						WHERE id_user = $userId
				);
		SQL;

		$pegawai = $this->db
			->query($sql)
			->result();

		var_dump($pegawai);
		die();

		$body = [];

		foreach ($pegawai as $p) {
			$body[] = [
				'instruksi' => $post['laporan'],
				'id_sm' => $post['id_sm'],
				'id_pegawai' => $p->id_pegawai
			];
		}

		// set laporan kembali ke tiap-tiap atasannya.
		$this->db->insert_batch('disposisi', $body);

		// rubah status surat ke finish.
		$this->db
			->where('id_sm', $post['id_sm'])
			->set('status', 'finish')
			->update('surat_masuk');
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
