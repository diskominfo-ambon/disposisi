<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bidang extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		// check_not_login();
		$this->load->model('m_bidang');
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
		$data ['row'] = $this->m_bidang->all('prosess');
		$this->load->view('admin/bidang', array_merge($data, ['user' => $user_data]));
	}


	public function tambah ()
	{

		$this->form_validation->set_rules('nama_bidang', 'nama_bidang', 'required');
		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
		$this->form_validation->set_message('is_unique', '{field} ini sudah dipakai, ganti yang lain');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE) {
				$this->load->view('admin/tambah_bidang');
		}else{
			$post = $this->input->post(null, TRUE);
			$this->m_bidang->tambah($post);
			if ($this->db->affected_rows() > 0) {
				echo "<script>alert('Data Berhasil Disimpan');</script>";
			}
			echo "<script>window.location='".site_url('bidang')."';</script>";
		}
		}

	public function update($id)
    {

		$this->form_validation->set_rules('nama_bidang', 'nama bidang', 'required');
		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
		$this->form_validation->set_message('is_unique', '{field} ini sudah dipakai, ganti yang lain');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if (!$this->form_validation->run()) {
			$query = $this->m_bidang->get($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();

				$this->load->view('admin/edit_bidang', $data);
			} else{
				echo "<script>alert('Data tidak ditemukan');";	
				echo "window.location='".site_url('bidang')."';</script>";
			}
			
		}else{
			$post = $_POST;
			$this->m_bidang->update($post, $id);
			if ($this->db->affected_rows() > 0) {
				echo "<script>alert('Data Berhasil Dirubah');</script>";
			}
			echo "<script>window.location='".site_url('bidang')."';</script>";
		}
		}

		

	public function delete($id){
        $this->m_bidang->delete($id); //Memanggil fungsi deleteData pada M_Index sembari membawa parameter $noinduk.

        if ($this->db->affected_rows() > 0) {
				echo "<script>alert('Data Berhasil Dihapus');</script>";
			}
			echo "<script>window.location='".site_url('bidang')."';</script>";
    }
}
