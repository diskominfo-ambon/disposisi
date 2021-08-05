<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function index()
	{
		// check_not_login();
		$this->load->model('m_kadis');
		$id = $this->session->userdata('level');

		$laporan = $this->m_kadis->laporan($id);
		
		$this->load->view('kadis/laporan', compact('laporan'));
	}
}
