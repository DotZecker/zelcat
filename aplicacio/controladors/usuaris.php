<?php

class Controlador_Usuaris extends Controlador {

	public $plantilla = 'plantilla';

	public function accio_entrar()
	{
		return Vista::fer($this->plantilla)
			->amb('titol', 'Login d\'usuari')
			->amb('contingut', Vista::carrega('usuaris/entra'));
	}

	public function accio_registre()
	{
		return Vista::fer($this->plantilla)
		->amb('titol', 'Registre d\'usuaris')
		->amb('contingut', Vista::carrega('usuaris/registre'));
	}
}