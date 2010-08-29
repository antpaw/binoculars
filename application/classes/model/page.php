<?php defined('SYSPATH') or die('No direct script access.');

class Model_Page extends ORM {
	
	protected $_sorting = array('created_at' => 'desc');
	
	protected $_filters = array(
	//	'slug' => array('utf8::strtolower' => array()),
	);
	
	protected $_rules = array(
	/*
		'title' => array(
			'not_empty'  => NULL,
			'min_length' => array(2),
			'max_length' => array(255),
		),
		'slug' => array(
			'not_empty'  => NULL,
			'min_length' => array(2),
			'max_length' => array(255),
			'regex'      => array('/^[a-z0-9\-_.]++$/iD'),
		),
		'content' => array(
			'not_empty'  => NULL,
		),
	*/
	);
	
	public function __get($key)
	{
		if (strpos($key, '_base64') !== FALSE)
		{
			return base64_encode(
				parent::__get(str_replace('_base64', NULL, $key)
			));
		}
		
		return parent::__get($key);
	}
	
	public function add_name_suffix($suffix, $upload)
	{
		return $upload['dirname'].'/'.$upload['filename'].$suffix.'.'.$upload['extension'];
	}
}