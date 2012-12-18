<?php

abstract class Controlador_Plantilla extends Controlador
{
	public $plantilla = 'plantilla';

	public function abans()
	{

		$this->plantilla = Vista::fer($this->plantilla);

		return parent::abans();
	}

}
