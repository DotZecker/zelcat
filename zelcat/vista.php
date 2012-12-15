<?php

class Vista {

	public $dades;
	public $directori;
	public $renderitzat;

	public function __construct($view, $dades = array())
	{
		$this->dades     = $dades;
		$this->directori = directori('app').'vistes/' . $view . '.php';

		$dades_a_extraure = array();
		foreach ($this->dades as $nom_varaible => $contingut) {
			if ( ! $this->comprovar_si_fill_es_una_vista($contingut)) {
				//echo " no es instancia <br>";
				$dades_a_extraure[$nom_varaible] = $contingut;
			} else {
				$dades_a_extraure[$nom_varaible] = $contingut->renderitzat;
			}
		}

		ob_start();
            extract($dades_a_extraure);
            require $this->directori;
            $vista = ob_get_contents();
        ob_end_clean();

        $this->renderitzat = $vista;

	}

	public static function fer($view, $dades = array())
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

		$dades_a_extraure = array();
		foreach ($this->dades as $nom_varaible => $contingut) {
			if ( ! $this->comprovar_si_fill_es_una_vista($contingut)) {
				//echo " no es instancia <br>";
				$dades_a_extraure[$nom_varaible] = $contingut;
			} else {
				$dades_a_extraure[$nom_varaible] = $contingut->renderitzat;
			}
		}

		ob_start();
            extract($dades_a_extraure);
            require $this->directori;
            $vista = ob_get_contents();
        ob_end_clean();

        $this->renderitzat = $vista;

		return $this;
	}

	public static function carrega($directori)
	{
		return file_get_contents(directori('app').'vistes/' . $directori . '.php');
	}

	protected function comprovar_si_fill_es_una_vista($continguts)
	{
		$return = false;
		if ($continguts instanceof Vista) return true;

		if (is_array($continguts) or is_object($continguts)) {
			foreach ($continguts as $nom_varaible => $contingut) {
				if ($contingut instanceof Vista) return true;

				if (is_array($contingut) or is_object($contingut)) $return = $this->comprovar_si_fill_es_una_vista($contingut);

			}
		}

		return $return;
	}
}