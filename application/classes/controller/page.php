<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Page extends Controller_Application {
	
	public function action_index()
	{
		$this->template->content = 'hello, world!';
	}
	
	public function action_manage($id = NULL)
	{
		$page = ORM::factory('page', $id);
		
		$form = $_FILES + $_POST;
		
		$settings = $page->settings;
		
		if ($form)
		{
			// Layout Image
			$layout = file_get_contents($form['layout']['tmp_name']);
			
			// Init setup
			$upload_path = 'media/tmp_uploads';
			$upload = pathinfo(upload::save($form['layout'], NULL, $upload_path));
			$upload_path = $upload_path.'/'.$upload['basename'];
			$image = Image::factory($upload_path);
			
			if (is_array($form['page']['settings']))
			{
				$settings = $page->settings = $form['page']['settings'];
			}
			
			// Background Image
			$bg_path = $page->add_name_suffix('_bg', $upload);
			
			$bg_x = 0;
			if ($settings['bg_width'] !== 'left')
			{
				$bg_x = $image->width - $settings['bg_width'];
			}
			
			$image
				->crop($settings['bg_width'], $image->height, $bg_x, 0)
				->save($bg_path);
			
			// Save page
			$page
				->values(array(
					'layout'		=> $layout,
					'background'	=> file_get_contents($bg_path),
				))
				->save();
			
			// Clean up
			unlink($bg_path);
			unlink($upload_path);
		}
		
		$this->template->content = new View('page/manage', array(
			'page'		=> $page,
			'settings'	=> $settings,
		));
	}
	
	public function action_show($id)
	{
		$page = ORM::factory('page', $id);
		
		$this->template = new View('page/show', array(
			'page'		=> ORM::factory('page', $id),
			'settings'	=> $page->settings,
		));
	}
}