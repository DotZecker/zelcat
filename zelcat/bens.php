<?php

class Bens {

	public static function css($name)
	{
		return '<link rel="stylesheet" href="assets/css/' . $name . '.css">';
	}

	public static function js($name)
	{
		return '<script type="text/javascript" src="assets/js/' . $name . '.js"></script>';
	}
}