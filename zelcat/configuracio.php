<?php

class Configuracio {

    /**
     * Funció que et retorna la configuració pasada per paràmetre
     * @param  string $que Quina configucarió es vol retornar
     * @return [type]      [description]
     */
	public static function de($que)
	{
		return file_get_contents(directori('app').'config/'.$que.'.php');
	}
}