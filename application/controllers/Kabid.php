<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kabid extends CI_Controller {

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
		$data ['row'] = $this->m_kabid->all($idUser);
	
		$this->load->view('kabid/home', $data);
	}

	public function show($id) {
		$surat_masuk = $this->m_sekertaris->get($id)->result();

		header('content-type: application/json');
		echo json_encode($surat_masuk);
	}

	public function tambah()
	{

		$this->form_validation->set_rules('instruksi', 'Instruksi', 'required');
		$this->form_validation->set_rules('id_sm', 'Kode surat masuk', 'required');
		$this->form_validation->set_rules('id_pegawai', 'Pegawai', 'required');
		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
		$this->form_validation->set_message('is_unique', '{field} ini sudah dipakai, ganti yang lain');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
		$idUser = $this->session->userdata('id_user');
		
		if ($this->form_validation->run() == FALSE) {
				$sekertaris = $this->m_sekertaris->all($idUser);	
				$pegawai 	= $this->m_pegawai->gets($idUser);
				$userId = $this->session->userdata('id_user');

				$this->load->view('kabid/disposisi', compact('sekertaris', 'pegawai', 'userId'));
		}else{
			$post = $_POST;
			$this->m_kabid->tambah($post);
			if ($this->db->affected_rows() > 0) {
				echo "<script>alert('Data Berhasil Disimpan');</script>";
			}
			echo "<script>window.location='".site_url('kabid')."';</script>";
		}
		}

		public function update ()
		{
			$this->load->view('kabid/edit');
		}

}
