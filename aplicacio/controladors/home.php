<?php

class Home_Controller extends Controller {
	
	public $template = 'template';
	
	
	public function action_index()
	{
		return View::make($this->template)
			->with('title', 'Hello!')
			->with('content', View::forge('home/index'));
	}
	
}