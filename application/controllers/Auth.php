<?php

trait Auth {
	private function currentUser()
	{	
		$this->load->model('m_login');

		$userId = $this->session->userdata('id_user');
		$user = $this->m_login
			->get($userId)
			->result()[0] ?? null;
		
		return $user;
	}
}
