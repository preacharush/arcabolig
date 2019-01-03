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
		],[
			'icon' => 'fa fa-align-left',
			'title' => 'Ejendom',
			'url' => 'javascript:;',
			'caret' => true,
			'sub_menu' => [[
				'url' => '/property/overview',
				'title' => 'Oversigt'
			],[
				'url' => '/property/lease',
				'title' => 'Lejemål'
			],[
				'url' => '/property/resident',
				'title' => 'Beboer'
			]]

		],[
			'icon' => 'fa fa-align-left',
			'title' => 'Opkrævninger',
			'url' => 'javascript:;',
			'caret' => true,
			'sub_menu' => [[
				'url' => 'javascript:;',
				'title' => 'Oversigt'
			],[
				'url' => 'javascript:;',
				'title' => 'Reguleringer'
			],[
				'url' => 'javascript:;',
				'title' => 'Rapporter'
			]]

		],[
			'icon' => 'fa fa-align-left',
			'title' => 'Drift',
			'url' => 'javascript:;',
			'caret' => true,
			'sub_menu' => [[
				'url' => 'javascript:;',
				'title' => 'Oversigt'
			],[
				'url' => 'javascript:;',
				'title' => 'Indflytninger'
			],[
				'url' => 'javascript:;',
				'title' => 'Udflytninger'
			]]

		]
	]



];
