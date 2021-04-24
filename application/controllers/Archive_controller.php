<?php

class Archive_controller extends CI_Controller
{
	function index()
	{
		$this->parser->parse('archive', [
			'navList' => $this->Navigator->getNavList(),
		]);
	}

}
