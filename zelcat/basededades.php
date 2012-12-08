<?php

class BaseDeDades {

	public $configuracio;

	public function __construct()
	{
		$this->configuracio = Configuracio::de('basededades');

		//pd($this->configuracio);
	}


}