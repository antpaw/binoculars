<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Page extends Controller_Application {
	
	public function action_index()
	{
		$this->template->content = 'hello, world!';
	}
	
	public function action_manage()
	{
		$page = ORM::factory('page', 1);
		
		$form = array_merge($_FILES + $_POST);
		
		if ($form)
		{
			// Layout Image
			$layout = file_get_contents($form['layout']['tmp_name']);
			
			// Init setup
			$upload_path = 'media/tmp_uploads';
			$upload = pathinfo(upload::save($form['layout'], NULL, $upload_path));
			$upload_path = $upload_path.'/'.$upload['basename'];
			$image = Image::factory($upload_path);
			
			// Background Image
			$bg_path = $page->add_name_suffix('_bg', $upload);
			
			$image
				->crop(40, $image->height, 0, 0)
				->save($bg_path);
			
			$page
				->values(array(
					'layout'		=> $layout,
					'background'	=> file_get_contents($bg_path),
				))
				->save();
			
			unlink($bg_path);
			unlink($upload_path);
		}
		
		$this->template->content = new View('page/manage', array(
			'page' => $page,
		));
	}
}