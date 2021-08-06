<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once __DIR__.'/Auth.php';

class Kadis extends CI_Controller {


	use Auth;

	function __construct()
	{
		parent::__construct();
		// check_not_login();
		$this->load->model('m_kadis');
		$this->load->model('m_sekertaris');
		$this->load->model('m_pegawai');


		$this->load->library('form_validation');
	}

	public function index()
	{
	
		$order = $_GET['order'] ?? '';
		$user = $this->currentUser();

		if (strlen($order) > 0 && !in_array($order, ['proses', 'finish'])) {
			$order = '';
		}

		$data ['row'] = $this->m_kadis->getByOder($order);

		
		$this->load->view('kadis/home', array_merge($data, ['user' => $user, 'order' => $order]));
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
		$this->form_validation->set_rules('tanggal_expire', 'Batas waktu', 'required');
		$this->form_validation->set_rules('id_pegawai[]', 'Pegawai', 'required');
		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
		$this->form_validation->set_message('is_unique', '{field} ini sudah dipakai, ganti yang lain');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE) {
				$sekertaris = $this->m_sekertaris->all();
				$pegawai 	= $this->m_pegawai->all();
				$userId = $this->session->userdata('id_user');
				
				$this->load->view('kadis/disposisi', compact('sekertaris', 'pegawai', 'userId'));
		}else{
			$post = $_POST;
			
			$this->m_kadis->tambah($post);
			if ($this->db->affected_rows() > 0) {
				echo "<script>alert('Data Berhasil Disimpan');</script>";
			}
			echo "<script>window.location='".site_url('kadis')."';</script>";
		}
		}

}
