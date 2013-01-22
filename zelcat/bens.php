<?php

class Bens {

	public static function css($name)
	{
		$directori_bens = DS . Configuracio::de('aplicacio', 'directori_bens');

		return '<link rel="stylesheet" href="' . $directori_bens . DS . 'css' . DS . $name . '.css">';
	}

	public static function less($name)
	{
		$directori_bens = DS . Configuracio::de('aplicacio', 'directori_bens');

		return '<link rel="stylesheet/less" type="text/css" href="' . $directori_bens . DS . 'less' . DS . $name . '.less">';
	}

	public static function js($name)
	{
		$directori_bens = DS . Configuracio::de('aplicacio', 'directori_bens');

		return '<script type="text/javascript" src="' . $directori_bens . DS . 'scripts' . DS . $name . '.js"></script>';
	}
}