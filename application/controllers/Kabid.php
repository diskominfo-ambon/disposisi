<?php
defined('BASEPATH') or exit('No direct script access allowed');


require_once __DIR__ . '/Auth.php';

class Kabid extends CI_Controller
{

	use Auth;

	function __construct()
	{
		parent::__construct();
		// check_not_login();
		$this->load->model('m_kabid');
		$this->load->model('m_sekertaris');
		$this->load->model('m_pegawai');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$idUser = $this->session->userdata('id_user');
		$order = $_GET['order'] ?? '';

		$data['row'] = $this->m_kabid->getByOrder($idUser, $order);
		$user = $this->currentUser();


		$this->load->view('kabid/home', array_merge($data, compact('order', 'user')));
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

			return redirect('/kabid');
		}

		if ($this->form_validation->run() == FALSE) {
			$userId = $this->session->userdata('id_user');
			$user = $this->currentUser();
			$sekertaris = $this->m_kabid->getByOrder($userId, 'Prosess');

			return $this->load->view('kabid/laporan', compact('sekertaris', 'userId', 'user', 'id'));
		} else {
			$post = array_merge($_POST, ['id_sm' => $id_sm]);
			$this->m_kabid->laporan($post, $id);

			if ($this->db->affected_rows() > 0) {
				echo "<script>alert('Data Berhasil merubah status');</script>";
			}
			echo "<script>window.location='" . site_url('kabid') . "';</script>";
		}
	}

	public function tambah($id)
	{

		$this->form_validation->set_rules('instruksi', 'Instruksi', 'required');
		$this->form_validation->set_rules('id_sm', 'Kode surat masuk', 'required');
		$this->form_validation->set_rules('id_pegawai[]', 'Pegawai', 'required');
		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
		$this->form_validation->set_message('is_unique', '{field} ini sudah dipakai, ganti yang lain');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
		$idUser = $this->session->userdata('id_user');

		if ($this->form_validation->run() == FALSE) {
			$sekertaris = $this->m_sekertaris->all($idUser);
			$pegawai 	= $this->m_pegawai->gets($idUser);
			$userId = $this->session->userdata('id_user');
			$user = $this->currentUser();

			$this->load->view('kabid/disposisi', compact('sekertaris', 'pegawai', 'userId', 'user', 'id'));
		} else {
			$post = $_POST;
			
			if ($this->m_kabid->tambah($post, $id) === false) {
				echo "<script>alert('Waktu untuk disposisi sudah berakhir!');</script>";
				echo "<script>window.location='" . site_url('kabid') . "';</script>";
			}
			if ($this->db->affected_rows() > 0) {
				echo "<script>alert('Data Berhasil Disimpan');</script>";
			}
			echo "<script>window.location='" . site_url('kabid') . "';</script>";
		}
	}

	public function update()
	{
		$this->load->view('kabid/edit');
	}
}
