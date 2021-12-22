<?php

class AppController extends CI_Controller {
	public function __construct() {
		parent::__construct();

		if(!$this->session->has_userdata('SESS-APP-ID')) {
			redirect('login');
		}
	}

	public function index() {
		$this->load->view('app/index');
	}
}