<?php

class Logout_controller extends CI_Controller
{
	function index()
	{
		$userData = $this->session->userData();

		$indexList = __::map($userData, function ($value, $key) {
			return $key;
		});

		foreach ($indexList as $indexKey) {
			$this->session->unset_userData($indexKey);
		}

		$this->load->view('logout');
	}
}
