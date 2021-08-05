<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tambah_sm extends CI_Controller {

	public function index()
	{
		// check_not_login();
		$this->load->view('sekertaris/surat_masuk');
	}
}
