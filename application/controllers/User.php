<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		// check_not_login();
		$this->load->model('m_login');
		$this->load->library('form_validation');
	}

	public function index()
	{
		
		$data ['row'] = $this->m_login->get();
		$this->load->view('admin/user', $data);
	}

	public function tambah ()
	{

		$this->form_validation->set_rules('fullname', 'Nama', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[user.username]');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('level', 'Level', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
		$this->form_validation->set_rules('paskonf', 'Konfirmasi Password', 'required|matches[password]', array ('matches' => '%s tidak sesuai dengan password'));
		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
		$this->form_validation->set_message('is_unique', '{field} ini sudah dipakai, ganti yang lain');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE) {
				
				$this->load->view('admin/tambah_user');
		}else{
			$post = $this->input->post(null, TRUE);
			$this->m_login->tambah($post);
			if ($this->db->affected_rows() > 0) {
				echo "<script>alert('Data Berhasil Disimpan');</script>";
			}
			echo "<script>window.location='".site_url('user')."';</script>";
		}
		}

	public function update($id)
    {

		$this->form_validation->set_rules('fullname', 'Nama', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('level', 'Level', 'required');
		$this->form_validation->set_rules('password', 'Password', 'min_length[5]');

		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
		$this->form_validation->set_message('is_unique', '{field} ini sudah dipakai, ganti yang lain');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if (!$this->form_validation->run()) {
			$query = $this->m_login->get($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();

				$this->load->view('admin/edit_user', $data);
			} else{
				echo "<script>alert('Data tidak ditemukan');";	
				echo "window.location='".site_url('user')."';</script>";
			}
			
		}else{
			$post = $_POST;
			$this->m_login->update($post);
			if ($this->db->affected_rows() > 0) {
				echo "<script>alert('Data Berhasil Dirubah');</script>";
			}
			echo "<script>window.location='".site_url('user')."';</script>";
		}
		}

		

	public function delete($id){
        $this->m_login->delete($id); //Memanggil fungsi deleteData pada M_Index sembari membawa parameter $noinduk.

        if ($this->db->affected_rows() > 0) {
				echo "<script>alert('Data Berhasil Dihapus');</script>";
			}
			echo "<script>window.location='".site_url('user')."';</script>";
    }
}
