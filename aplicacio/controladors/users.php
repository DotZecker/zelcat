<?php

class Users_Controller extends Controller {
	
	public $template = 'template';
	
	public function action_login()
	{
		return View::make($this->template)
			->with('title', 'Login de usuario')
			->with('content', View::forge('users/login'));
	}
	
	public function action_register()
	{
		return View::make($this->template)
		->with('title', 'Registro de usuario')
		->with('content', View::forge('users/register'));
	}
}