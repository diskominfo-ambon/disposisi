<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kasie extends CI_Controller {

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
		$idUser = $this->session->userdata('id_user');
		$data ['row'] = $this->m_kasie->all($idUser);
	
		$this->load->view('kasie/home', $data);
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
		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
		
		if ($this->form_validation->run() == FALSE) {
				$userId = $this->session->userdata('id_user');
				$sekertaris = $this->m_sekertaris->all($userId);
				$pegawai 	= $this->m_pegawai->findAllBidangByUserId($userId);

		
				return $this->load->view('kasie/disposisi', compact('sekertaris', 'pegawai','userId'));
		}else{
			$post = $_POST;
			$this->m_kasie->tambah($post);

			if ($this->db->affected_rows() > 0) {
				echo "<script>alert('Data Berhasil diposisi kembali');</script>";
			}
			echo "<script>window.location='".site_url('kasie')."';</script>";
		}
	}

	public function update ()
	{
		$this->load->view('kabid/edit');
	}

}
