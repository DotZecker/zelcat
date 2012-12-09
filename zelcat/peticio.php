<?php

class Peticio {

    public $peticio;
    public $controlador;
    public $accio;
    public $parametres;

    public function __construct()
    {
        // Obtenim la petició actual
        $this->peticio    = $_SERVER['REQUEST_URI'];

        $this->parametres = array();

        // La separem per obtenir el controaldor i la acció
        // El array_filter() es possa per si hi han '/' de més no ens apareixin
        // posicions inexistentes al array
        $peticio_actual = array_filter(explode('/', $this->peticio));

        /**
         * TODO: - Si nos pasan sólo el controaldor poner que nos vaya a la acción establecida
         *       por defecto
         *
         *       - Si no nos pasan nada ir al controlador i acción por defecto
         */

        // Mirem la acció, que es el últim valor de la petició i l'eliminem de tal
        $accio = end($peticio_actual);
        unset($peticio_actual[count($peticio_actual)]);

        $peticio_actual = array_values($peticio_actual);

        // TODO: Comrpovar que en la $peticio_actual no hi ha cap caracter extrany
        $this->controlador = $peticio_actual;

        // Mirem si ens han passat paràmetres
        if (strstr($accio, '?')) {
            $accio_parametres = explode('?', $accio);
            $this->accio = $accio_parametres[0];

            $parametres = array_filter(explode('&', $accio_parametres[1]));

            foreach ($parametres as $parametre) {
                $variable_valor = explode('=', $parametre);
                $this->parametres[$variable_valor[0]] = $variable_valor[1];
            }
        } else {
            $this->accio = $accio;
        }

        return $this;
    }

}