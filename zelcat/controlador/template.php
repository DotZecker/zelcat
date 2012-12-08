<?php


abstract class Controller_Template extends Controller
{


	public $template = 'template';



	public function before()
	{
		
		$this->template = View::make($this->template);

		return parent::before();
	}

}
