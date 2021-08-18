<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		//check_already_login();
		$this->load->view('admin/login');
	}

	public function home()
	{
		return $this->load->view('admin/home');
	}

	public function proses()
	{

		$post = $this->input->post($_POST, TRUE);
	
		if (isset($_POST['login'])) {
			$this->load->model('m_login');
			$query = $this->m_login->login($_POST);
	
			if ($query->num_rows() > 0) {
				$row = $query->row();
				$params = array(
					'id_user' => $row->id_user,
					'level' => $row->level
				);
				$this->session->set_userdata($params);

				switch ($row->level) {
					case 1:
						return redirect('home');
					case 2:
						return redirect('sekertaris');
					case 3:
						return redirect('kadis');
					case 4:
						return redirect('sekdis');
					case 5:
						return redirect('kabid');
					case 6:
						return redirect('kasie');
					case 7:
						return redirect('staff');
					
					default:
						return redirect('eksekutor');
				}

				
				
			}
			else{
				return redirect('login');
			}
		}
	}

	public function logout()
	{
		$params = array('user_id','level');
		$this->session->set_userdata($params);
		redirect('login');
	}
}
