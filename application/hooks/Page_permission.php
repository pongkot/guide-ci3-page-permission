<?php

class Page_permission
{
	private array $blockList = [
		'dashboard',
		'report',
		'archive'
	];

	private array $roleProfile = [
		'admin' => [
			'allowList' => [
				'dashboard',
				'report',
				'archive'
			]
		],
		'editor' => [
			'allowList' => [
				'dashboard',
				'report'
			]
		],
		'auditor' => [
			'allowList' => [
				'dashboard',
				'archive'
			]
		]
	];

	function index()
	{
		// load the instance
		$CI =& get_instance();

		$userData = $CI->session->userData();
		$currentController = $CI->uri->segment(1);
		$loggedIn = __::get($userData, 'loggedIn');
		$blockList = $this->blockList;

		for ($i = 0; $i < __::size($blockList); $i++) {
			if ($blockList[$i] === $currentController) {
				if (!$loggedIn) {
					show_error(
						'Permission Denied',
						403,
						'Authentication'
					);
				} else {
					$activeRole = $userData['role'];
					$allowListByRole = $this->roleProfile[$activeRole]['allowList'];
					$allowListCount = 0;

					foreach ($allowListByRole as $doc) {
						if (__::isEqual($currentController, $doc)) {
							$allowListCount += 1;
						}
					}

					if ($allowListCount < 1) {
						show_error(
							'Permission Denied',
							403,
							'Authentication'
						);
					}
				}
			}
		}
	}
}
