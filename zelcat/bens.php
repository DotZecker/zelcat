<?php

class Bens {

	public static function css($name)
	{
        $directori_bens = '/' . Configuracio::de('aplicacio', 'directori_bens');
		return '<link rel="stylesheet" href="' . $directori_bens . '/css/' . $name . '.css">';
	}

	public static function js($name)
	{
        $directori_bens = '/' . Configuracio::de('aplicacio', 'directori_bens');
		return '<script type="text/javascript" src="' . $directori_bens . '/js/' . $name . '.js"></script>';
	}
}