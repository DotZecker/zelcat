<?php

class Ruta {

    public $rutes;

    public function __construct($metode, $uri, $variables)
    {

        $controlador_accio = explode('@', $variables['usa']);
        $controlador = $controlador_accio[0];
        $accio       = $controlador_accio[1];

        $this->rutes[$metode][$uri] = array(
            'alias'       => $variables['com'],
            'controlador' => $controlador,
            'accio'       => $accio,
        );
    }

    protected function registrar($metode, $ruta, $variables)
    {
        return new static($metode, $uri, $variables);

    }

    public static function qualsevol($uri, $variables)
    {
        new static('get', $uri, $variables);
        new static('post', $uri, $variables);
    }

    /*
    public static function get($ruta, $accio)
    {

    }

    public static function post($ruta, $accio)
    {

    }
    */
}