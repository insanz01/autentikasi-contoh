<?php

class AuthModel extends CI_Model {

	public function login($data) {
		$user = $this->db->get_where('users', ['username' => $data['username']])->row_array();
	
		if(password_verify($data['password'], $user['password'])) {
			$this->session->set_userdata('SESS-APP-ID', $user['id']);

			return TRUE;
		}

		return FALSE;
	}

}