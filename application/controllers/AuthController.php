<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {
	public function __construct() {
		parent::__construct();

		$this->load->model('AuthModel', 'm_auth');
	}

	public function login() {
		// bagian ini untuk mengecek apakah session sudah di-set atau belum
		// jika sudah maka akan dilempar ke route /app
		if($this->session->has_userdata('SESS-APP-ID')) {
			redirect('app');
		}

		$this->load->view('auth/login');
	}

	public function doLogin() {
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() === FALSE) {
			redirect('login');
		}

		$data = $this->input->post();

		if($this->m_auth->login($data)) {
			redirect('app');
		}

		redirect('login');
	}

	public function logout() {
		$this->session->unset_userdata('SESS-APP-ID');

		redirect('login');
	}
}