<?php

class Login_controller extends CI_Controller
{
	private $accounts = [
		[
			'username' => 'admin',
			'password' => 'admin',
			'role' => 'admin',
		],
		[
			'username' => 'editor',
			'password' => 'editor',
			'role' => 'editor',
		],
		[
			'username' => 'auditor',
			'password' => 'auditor',
			'role' => 'auditor'
		]
	];

	function index() {
		$this->load->view('login');
	}

	function execute_login() {
		$body = $this->input->post();
		$accountList = $this->accounts;
		$result = __::where($accountList, [
			'username' => __::get($body, 'username', ''),
			'password' => __::get($body, 'password', ''),
		]);

		if (__::isEmpty($result)) {
			show_error('Permission Denied', '403', 'Login Fail');
		} else {
			$object = $result[0];
			$doc = [
				'username' => __::get($object, 'username', ''),
				'role' => __::get($object, 'role', ''),
				'loggedIn' => true,
			];
			$this->session->set_userdata($doc);
			redirect('dashboard');
		}
	}
}
