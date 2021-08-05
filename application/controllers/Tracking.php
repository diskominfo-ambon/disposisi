<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tracking extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		// check_not_login();
		$this->load->model('m_tracking');


		$this->load->library('form_validation');
	}

	public function index()
	{
		
		$data ['row'] = $this->m_tracking->get();

		$this->load->view('kadis/tracking', $data);
	}


	public function ajax_tracking($idSm) {
		$histories = $this->m_tracking->findAllSmById($idSm);

		$response = [
			'success' => false,
			'data' => []
		];

		if (count($histories) > 0) {
			$response['data'] = $histories;
			$response['success'] = true;
		}

		echo json_encode($response);
	}
}
