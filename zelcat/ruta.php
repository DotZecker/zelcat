<?php

class Ruta {

    public $rutes;

    public function __construct($metode, $uri, $variables)
    {
        $controlador_accio = explode('@', $variables['usa']);
        $controlador = $controlador_accio[0];
        $accio       = $controlador_accio[1];

        $metodes = (is_array($metode)) ? $metode : array($metode);

        foreach ($metodes as $metode) {
            $this->rutes[$metode][$uri] = array(
                'alias'       => $variables['com'],
                'controlador' => $controlador,
                'accio'       => $accio,
            );

            // Temporalment deixem la manera "cutre"
            // Pròximament passant per referencia
            $GLOBALS['ruta'][$metode][$uri] = array(
                'alias'       => $variables['com'],
                'controlador' => $controlador,
                'accio'       => $accio,
            );
        }
    }

    protected function registrar($metode, $ruta, $variables)
    {
        return new static($metode, $uri, $variables);

    }

    public static function qualsevol($uri, $variables)
    {
        return new static(array('get', 'post'), $uri, $variables);
    }

    public static function existeix($ruta, $metode)
    {
        // @TODO: Trure aquesta CUTRADA! I fer-ho passant per referenicia el valor
        return isset($GLOBALS['ruta'][$metode][$ruta])
               ? $GLOBALS['ruta'][$metode][$ruta]
               : false;
    }

    public static function extraure()
    {

    }

    public static function get($uri, $variables)
    {
        return new static('get', $uri, $variables);
    }

    public static function post($uri, $variables)
    {
        return new static('post', $uri, $variables);

    }

}