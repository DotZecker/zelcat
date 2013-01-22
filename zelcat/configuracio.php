<?php

class Configuracio {

    /**
     * Funció que et retorna la configuració pasada per paràmetre
     * @param  string $que Quina configucarió es vol retornar
     * @return [type]      [description]
     */
	public static function de($que, $clau = null)
	{
        $configuracio = require directori('app') . 'config' . DS . $que . '.php';

        return (is_null($clau))
               ? $configuracio
               : $configuracio[$clau];
	}
}