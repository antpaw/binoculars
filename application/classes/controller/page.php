<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Page extends Controller_Application {
	
	public function action_index()
	{
		$this->template->content = 'hello, world!';
	}
	
	public function action_manage()
	{
		$page = ORM::factory("page", 1);
		
		$form = array_merge($_FILES + $_POST);
		
		if ($form)
		{
			// Layout Image
			$layout = file_get_contents($form['layout']['tmp_name']);
			
			// Background Image
			$upload = upload::save($form['layout'], NULL, 'media/tmp_uploads');
			
			Image::factory($upload)->crop(20, 40, 100, 100)->save($upload);
			$background = file_get_contents($upload);
			
			$page
				->values(array(
					'layout'		=> $layout,
					'background'	=> $background,
				))
				->save();
		}
		
		$this->template->content = new View('page/manage', array(
			'page' => $page,
		));
	}
}