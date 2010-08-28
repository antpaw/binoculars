<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Page extends Controller_Application {
	
	public function action_index()
	{
		$this->template->content = 'hello, world!';
	}
	
	public function action_manage()
	{
		$this->template->content = new View('page/manage');
	}

}