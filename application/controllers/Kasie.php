<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once __DIR__ . '/Auth.php';

class kasie extends CI_Controller
{

	use Auth;

	function __construct()
	{
		parent::__construct();
		// check_not_login();
		$this->load->model('m_kasie');
		$this->load->model('m_sekertaris');
		$this->load->model('m_pegawai');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$order = '';
		if (isset($_GET['order']) && !empty($_GET['order']) && $_GET['order'] === 'finish') {
			$order = 'finish';
		}

		$data['row'] = $this->m_kasie->getByOrder($order);
		$user = $this->currentUser();

		$this->load->view('kasie/home', array_merge($data, ['user' => $user, 'order' => $order]));
	}

	public function show($id)
	{
		$surat_masuk = $this->m_sekertaris->get($id)->result();

		header('content-type: application/json');
		echo json_encode($surat_masuk);
	}

	// dispoisi ubah status dan intruksi.
	public function laporan($id)
	{
		$this->form_validation->set_rules('instruksi', 'Laporan', 'required');
		$this->form_validation->set_rules('status', 'Laporan', 'required');
		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		$id_sm = (int) $_GET['id_sm'] ?? 0;

		if (!isset($id_sm) || !$id_sm) {

			return redirect('/kasie');
		}

		if ($this->form_validation->run() == FALSE) {
			$userId = $this->session->userdata('id_user');
			$user = $this->currentUser();
			$sekertaris = $this->m_kasie->getByOrder('Prosess');

			return $this->load->view('kasie/laporan', compact('sekertaris', 'userId', 'user', 'id'));
		} else {
			$post = array_merge($_POST, ['id_sm' => $id_sm]);
			$this->m_kasie->laporan($post, $id);

			if ($this->db->affected_rows() > 0) {
				echo "<script>alert('Data Berhasil merubah status');</script>";
			}
			echo "<script>window.location='" . site_url('kasie') . "';</script>";
		}
	}


	public function tambah()
	{

		$this->form_validation->set_rules('instruksi', 'Laporan', 'required');
		$this->form_validation->set_rules('id_sm', 'Kode surat masuk', 'required');
		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');


		if ($this->form_validation->run() == FALSE) {
			$userId = $this->session->userdata('id_user');
			$user = $this->currentUser();
			$sekertaris = $this->m_kasie->getByOrder();

			return $this->load->view('kasie/disposisi', compact('sekertaris', 'userId', 'user'));
		} else {
			$post = $_POST;
			$this->m_kasie->update($post);

			if ($this->db->affected_rows() > 0) {
				echo "<script>alert('Data Berhasil diposisi kembali');</script>";
			}
			echo "<script>window.location='" . site_url('kasie') . "';</script>";
		}
	}
}
