<?php

class Configuracio {

    /**
     * Funció que et retorna la configuració pasada per paràmetre
     * @param  string $que Quina configucarió es vol retornar
     * @return [type]      [description]
     */
	public static function de($que)
	{
        // TODO: Comprovar si el fitxer existeix
        return require directori('app').'config\\'.$que.'.php';

	}
}