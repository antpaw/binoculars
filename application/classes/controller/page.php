<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Page extends Controller {

	public function action_index()
	{
		$this->request->response = 'hello, world!';
	}

	public function action_wtf()
	{
		$this->request->response = 'hello, sadn!';
	}

}