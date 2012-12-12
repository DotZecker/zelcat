<?php

class Ruta {

    public $method;
    public $uri;
    public $accio;

    public function __construct($metode, $uri, $accio = array())
    {
        $this->metode[] = $metode;
        $this->uri[]    = $uri;
        $this->accio[]  = $accio;
    }

    protected function registrar($metode, $ruta, $accio)
    {
        return new static($view, $dades);

    }

    public static function qualsevol($ruta, $accio)
    {

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