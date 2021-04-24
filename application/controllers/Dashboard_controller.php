<?php


class Dashboard_controller extends CI_Controller
{
	function index() {
		$userData = $this->session->userdata();
		$this->parser->parse('dashboard', [
			'userDate' => json_encode($userData, true),
			'navList' => $this->Navigator->getNavList(),
		]);
	}
}
