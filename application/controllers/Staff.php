<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once __DIR__.'/Auth.php';

class Staff extends CI_Controller {

	use Auth;

	function __construct()
	{
		parent::__construct();
		// check_not_login();
		$this->load->model('m_staff');
		$this->load->model('m_sekertaris');
		$this->load->model('m_pegawai');
		$this->load->library('form_validation');
	}


	public function index()
	{
		$idUser = $this->session->userdata('id_user');
		$data['row'] = $this->m_staff->all($idUser);
		$user = $this->currentUser();

		var_dump($user);
	
		$this->load->view('staff/home', array_merge($data, ['user' => $user]));
	}

	public function show($id) {
		$surat_masuk = $this->m_sekertaris->get($id)->result();

		header('content-type: application/json');
		echo json_encode($surat_masuk);
	}

	public function tambah()
	{

		$this->form_validation->set_rules('laporan', 'laporan', 'required');
		$this->form_validation->set_rules('id_sm', 'Kode surat masuk', 'required');		
		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
		$this->form_validation->set_message('is_unique', '{field} ini sudah dipakai, ganti yang lain');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
		$idUser = $this->session->userdata('id_user');
		
		if ($this->form_validation->run() == FALSE) {
				$sekertaris = $this->m_sekertaris->all($idUser);
				$pegawai 	= $this->m_pegawai->all();
				

				$this->load->view('staff/laporan', compact('sekertaris', 'pegawai'));
		}else{
			$post = $_POST;
			$this->m_staff->update($post);
			if ($this->db->affected_rows() > 0) {
				echo "<script>alert('Data Berhasil Disimpan');</script>";
			}
			echo "<script>window.location='".site_url('staff')."';</script>";
		}
		}

		public function update ()
		{
			$this->load->view('staff/edit');
		}

}
