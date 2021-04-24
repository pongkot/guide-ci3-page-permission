<?php


class Navigator_model extends CI_Model
{
	private array $list = [
		[
			'label' => 'Dashboard',
			'url' => 'dashboard'
		],
		[
			'label' => 'Reports',
			'url' => 'report'
		],
		[
			'label' => 'Archives',
			'url' => 'archive'
		]
	];

	function getNavList(): array {
		return $this->list;
	}
}
