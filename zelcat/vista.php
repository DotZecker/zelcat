<?php

class Vista {

	public $dades;
	public $directori;

	public function __construct($view, $dades = array())
	{
		$this->dades     = $dades;
		$this->directori = directori('app').'vistes/' . $view . '.php';
	}

	public static function fer($view, $dades = null)
	{
		return new static($view, $dades);
	}

	public function amb($key, $value = null)
	{
		if (is_array($key)) {
			$this->dades = array_merge($this->dades, $key);
		} else {
			$this->dades[$key] = $value;
		}

		return $this;
	}

	public static function carrega($directori)
	{
		return file_get_contents(directori('app').'vistes/' . $directori . '.php');
	}
}



