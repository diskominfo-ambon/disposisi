<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		// check_not_login();
		$this->load->model('m_pegawai');
		$this->load->model('m_bidang');
		$this->load->model('m_login');
		$this->load->model('m_sie');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->model('m_login');
		$id_user = $this->session->userdata('id_user');
		$user_data = $this->m_login->get($id_user)->row();
		$data ['row'] = $this->m_pegawai->get();
		$this->load->view('admin/pegawai', array_merge($data, ['user' => $user_data]));
	}

	public function tambah ()
	{

		$this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'required');
		$this->form_validation->set_rules('nip', 'nip', 'required|min_length[5]');
		$this->form_validation->set_rules('id_user', 'id_user', 'required');
		
		if(isset($_POST['id_sie']) && empty($_POST['id_bidang'])) {
			$this->form_validation->set_rules('id_bidang', 'Bidang', 'required');
		}

		
		// $this->form_validation->set_rules('id_sie', 'id_sie');
		$this->form_validation->set_message('required', '%s masih kosong silahkan isi');
		$this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
		$this->form_validation->set_message('is_unique', '{field} ini sudah dipakai, ganti yang lain');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE) {
				$bidang = $this->m_bidang->all();
				$sie = $this->m_sie->all();
				$users = $this->m_login->findAllUserNotEmployee();

				$this->load->view('admin/tambah_pegawai', compact('bidang', 'users', 'sie'));
		}else{
			die('berhasil diinput');
			$post = $this->input->post(null, TRUE);
			$this->m_pegawai->tambah($post);
			if ($this->db->affected_rows() > 0) {
				echo "<script>alert('Data Berhasil Disimpan');</script>";
			}
			echo "<script>window.location='".site_url('pegawai')."';</script>";
		}
		}

	public function update($id)
    {

		$this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'required');
		$this->form_validation->set_rules('nip', 'nip', 'required|min_length[5]');
		$this->form_validation->set_rules('id_user', 'id_user', 'required');
		$this->form_validation->set_rules('id_bidang', 'id_bidang', 'required');
		$this->form_validation->set_rules('id_sie', 'id_sie', 'required');
		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
		$this->form_validation->set_message('is_unique', '{field} ini sudah dipakai, ganti yang lain');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if (!$this->form_validation->run()) {
			$query = $this->m_pegawai->get($id);
			if ($query->num_rows() > 0) {
				$row = $query->row();

				$bidang = $this->m_bidang->all();
				$sie = $this->m_sie->all();
				$users = $this->m_login->all();

				$this->load->view('admin/edit_pegawai', compact('row', 'bidang', 'sie', 'users'));
			} else{
				echo "<script>alert('Data tidak ditemukan');";	
				echo "window.location='".site_url('pegawai')."';</script>";
			}
			
		}else{
			$post = $_POST;
			$this->m_pegawai->update($post, $id);
			if ($this->db->affected_rows() > 0) {
				echo "<script>alert('Data Berhasil Dirubah');</script>";
			}
			echo "<script>window.location='".site_url('pegawai')."';</script>";
		}
		}

		

	public function delete($id){
        $this->m_pegawai->delete($id); //Memanggil fungsi deleteData pada M_Index sembari membawa parameter $noinduk.

        if ($this->db->affected_rows() > 0) {
				echo "<script>alert('Data Berhasil Dihapus');</script>";
			}
			echo "<script>window.location='".site_url('pegawai')."';</script>";
    }
}
