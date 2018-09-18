<?php

/**
* 
*/
class C_public extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_inventori');
		date_default_timezone_set('Asia/Makassar');
	}

	function index() {
		$this->load->view('login');
	}

	function login_proses() {
		$level = $this->input->post('level');
		$user = $this->input->post('username');
		$pass = MD5($this->input->post('password'));
		if($level == 1) {
			$cek = count($this->M_inventori->cek_login_admin($user, $pass));
			if($cek > 0) {
				$session_data = array(
					'username' => $user,
					'status'=> 'logined',
					'level' => 'admin'
				);
				$this->session->set_userdata($session_data);
				redirect(base_url('index.php/C_login'));
			} else {
				echo 'password salah';
			}
		} else {
			$cek = count($this->M_inventori->cek_login_user($user, $pass));
			if($cek > 0) {
				$session_data = array(
					'username' => $user,
					'status'=> 'logined',
					'level' => 'user'
				);
				$this->session->set_userdata($session_data);
				redirect(base_url('index.php/C_login'));
			} else {
				echo 'password salah';
			}
		}
	}

	function logout() {
		$this->session->sess_destroy();
		redirect(base_url());
	}
}