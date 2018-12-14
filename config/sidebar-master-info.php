<?php

return [

    /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | Most templating systems load templates from disk. Here you may specify
    | an array of paths that should be checked for your views. Of course
    | the usual Laravel view path has already been registered for you.
    |
    */

		'menu' => [[
			'icon' => 'fa fa-th-large',
			'title' => 'Administrator',
			'url' => 'javascript:;',
			'caret' => true,
			'sub_menu' => [[
				'url' => '/admin/settings',
				'title' => 'Stamoplysninger'
			],[
				'url' => '/admin/users',
				'title' => 'Brugere'
			]]
		],[
			'icon' => 'fa fa-th-large',
			'title' => 'Virksomher',
			'url' => 'javascript:;',
			'caret' => true,
			'sub_menu' => [[
				'url' => '/admin/client',
				'title' => 'Klienter'
			],[
				'url' => 'javascript:;',
				'title' => 'Ejendomme'
			]]
		]
		
	]
];
