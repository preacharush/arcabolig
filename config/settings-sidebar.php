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
		'title' => 'XXXXXXXXXXX',
		'url' => 'javascript:;',
		'caret' => true,
		'sub_menu' => [[
			'url' => '/dashboard/v1',
			'title' => 'XXXXXXXXX v1'
		],[
			'url' => '/dashboard/v2',
			'title' => 'Dashboard v2'
		]]

		
	]]
];
