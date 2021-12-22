<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AppController extends CI_Controller {
	public function __construct() {
		parent::__construct();

		// melakukan pengecekan jika tidak memiliki session
		// maka akan dilempar ke halaman login atau ke route /login
		if(!$this->session->has_userdata('SESS-APP-ID')) {
			redirect('login');
		}
	}

	public function index() {
		$this->load->view('app/index');
	}
}