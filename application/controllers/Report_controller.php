<?php

class Report_controller extends CI_Controller
{
	function index()
	{
		$this->parser->parse('report', [
			'navList' => $this->Navigator->getNavList(),
		]);
	}
}
