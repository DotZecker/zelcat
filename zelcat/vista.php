<?php

class View {

	public $dades;
	public $directori;

	public function __construct($view, $dades = array())
	{
		$this->dades = $dades;
		$this->directori = directori('app').'vistes/' . $view . '.php';
	}

	public static function make($view, $dades = null)
	{
		return new static($view, $dades);
	}

	public function with($key, $value = null)
	{
		if (is_array($key)) {
			$this->dades = array_merge($this->dades, $key);
		} else {
			$this->dades[$key] = $value;
		}

		return $this;
	}

	public static function forge($directori)
	{
		return file_get_contents(directori('app').'vistes/' . $directori . '.php');
	}
}



