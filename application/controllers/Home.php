<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		// check_not_login();
		$this->load->model('m_login');
		$this->load->library('form_validation');
	}

	public function index()
	{
		// check_not_login();
		$this->load->model('m_login');
		$id_user = $this->session->userdata('id_user');
		$user_data = $this->m_login->get($id_user)->row();
		$this->load->view('admin/home', ['user' => $user_data]);
	}
}
