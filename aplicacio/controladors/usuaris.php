<?php

class Controlador_Usuaris extends Controlador_Plantilla {

	public $plantilla = 'plantilla';

	public function accio_index()
	{
		return $this->plantilla
			->amb('titol', 'Llistat d\'usuaris')
			->amb('contingut', Vista::fer('usuaris/llistar')->amb('usuaris', Usuari::get()));
	}

	public function accio_entrar()
	{
		return $this->plantilla
			->amb('titol', 'Login d\'usuari')
			->amb('contingut', Vista::fer('usuaris/entra')->amb('username', 'Rafael'));
	}

	public function accio_registre()
	{
		return Vista::fer($this->plantilla)
		->amb('titol', 'Registre d\'usuaris')
		->amb('contingut', Vista::carrega('usuaris/registre'));
	}
}