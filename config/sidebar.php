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
			'title' => 'Dashboard',
			'url' => 'javascript:;',
			'caret' => true,
			'sub_menu' => [[
				'url' => '/dashboard/v1',
				'title' => 'Dashboard v1'
			],[
				'url' => '/dashboard/v2',
				'title' => 'Dashboard v2'
			]]
		],[
			'icon' => 'fa fa-align-left',
			'title' => 'Ejendom',
			'url' => 'javascript:;',
			'caret' => true,
			'sub_menu' => [[
				'url' => '/overview',
				'title' => 'Oversigt'
			],[
				'url' => 'javascript:;',
				'title' => 'Lejemål'
			],[
				'url' => 'javascript:;',
				'title' => 'Beboer'
			]]

		],[
			'icon' => 'fa fa-align-left',
			'title' => 'Menu Level',
			'url' => 'javascript:;',
			'caret' => true,
			'sub_menu' => [[
				'url' => 'javascript:;',
				'title' => 'Menu 1.1',
				'sub_menu' => [[
					'url' => 'javascript:;',
					'title' => 'Menu 2.1',
					'sub_menu' => [[
						'url' => 'javascript:;',
						'title' => 'Menu 3.1',
					],[
						'url' => 'javascript:;',
						'title' => 'Menu 3.2'
					]]
				],[
					'url' => 'javascript:;',
					'title' => 'Menu 2.2'
				],[
					'url' => 'javascript:;',
					'title' => 'Menu 2.3'
				]]
			],[
				'url' => 'javascript:;',
				'title' => 'Menu 1.2'
			],[
				'url' => 'javascript:;',
				'title' => 'Menu 1.3'
			]]



		]
	]



];
