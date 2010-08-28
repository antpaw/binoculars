<?php defined('SYSPATH') or die('No direct script access.');

return array(
	'default' => array(
	    'type'       => 'mysql',
	    'connection' => array(
	        'hostname'   => 'localhost',
	        'username'   => 'root',
	        'password'   => FALSE,
	        'persistent' => FALSE,
	        'database'   => 'binoculars',
	    ),
	    'table_prefix' => '',
	    'charset'      => 'utf8',
	    'caching'      => FALSE,
	    'profiling'    => TRUE,
	),
);