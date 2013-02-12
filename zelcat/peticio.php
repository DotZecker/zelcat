<?php

class Peticio {

    public $peticio;
    public $controlador;
    public $accio;
    public $parametres;

    /**
     * Instanciem la petició
     */
    public function __construct()
    {
        // Obtenim la petició actual
        $this->peticio = implode('/', array_filter(explode('/', $_SERVER['REQUEST_URI'])));

        $this->parametres = array();

        // La separem per obtenir el controaldor i la acció
        // El array_filter() es possa per si hi han '/' de més no ens apareixin
        // posicions inexistentes al array
        $peticio_actual = array_filter(explode('/', $this->peticio));

        // Mirem la acció, que es el últim valor de la petició i l'eliminem de tal
        // A no ser que el count sigui tan sols de 1 ja que si ho es és el nom del
        // controaldor per defecte
        if (count($peticio_actual) > 1)
        {
            $accio = end($peticio_actual);
            unset($peticio_actual[count($peticio_actual)]);
        } else {
            $accio = 'index';
        }

        $controlador = array_values($peticio_actual);

        // @todo: Comrpovar que en la $peticio_actual no hi ha cap caracter extrany
        $this->controlador = $controlador;

        // Mirem si ens han passat paràmetres
        // Està possat amb GET, pasar-ho a comprovar amb sub-controaldors
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

        return $this
    }

}
