<?php

class M_kasie extends CI_Model
{

	public function all($id)
	{

		$sql = <<<SQL
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


	public function getByOrder($order = '')
	{
		$id = $this->session->userdata('id_user');

		$sql = <<<SQL
			SELECT DISTINCT s.*, d.id_disposisi, d.instruksi, ss.sifat_surat FROM
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
			$sql .= <<<SQL
				AND s.status = 'Proses'
			SQL;
		} else {
			$sql .= <<<SQL
				AND s.status = 'finish'
			SQL;
		}

		$sql .= <<<SQL
			ORDER BY d.created_at DESC;
		SQL;

		$rows = $this->db->query($sql)->result();
		$result = [];

		foreach ($rows as $row) {
			if (isset($result[$row->nomor_sm])) continue;

			$result[$row->nomor_sm] = $row;
		}

		return $result;
	}

	/**
	 * menlakukan disposisi surat.
	 *
	 * @param [type] $post data surat
	 * @return void
	 */
	public function update($post)
	{

		$userId = $this->session->userdata('id_user');

		$sql = <<<SQL
			SELECT id_pegawai FROM pegawai
				WHERE id_bidang = (
					SELECT id_bidang FROM pegawai
						WHERE id_user = $userId
				);
		SQL;

		$pegawai = $this->db
			->query($sql)
			->result();


		$body = [];

		foreach ($pegawai as $p) {
			$body[] = [
				'instruksi' => $post['instruksi'],
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


	public function laporan($post, $id)
	{

		// rubah status aja tanpa disposisi history.
		// $this->db
		// 	->where('id_disposisi', $id)
		// 	->set('instruksi', $post['instruksi'])
		// 	->update('disposisi');
		$userId = $this->session->userdata('id_user');

		$sql = <<<SQL
			SELECT id_pegawai FROM pegawai
				WHERE id_user = $userId LIMIT 1
		SQL;

		$pegawai = $this->db->query($sql)->result();

		// untuk bkin history disposisi.
		$this->db->insert('disposisi', [
			'instruksi' => $post['instruksi'],
			'id_pegawai' => $pegawai[0]->id_pegawai,
			'id_sm' => $post['id_sm']
		]);
		// end.


		// rubah status.

		$this->db
			->where('id_sm', $post['id_sm'])
			->set('status', $post['status'])
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
