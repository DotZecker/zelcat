<?php

class Ruta {

    public $rutes;

    /**
     * Instanciem la ruta
     * @param [type] $metode    [description]
     * @param [type] $uri       [description]
     * @param [type] $variables [description]
     */
    public function __construct($metode, $uri, $variables)
    {
        $controlador = '';
        $accio       = '';
        $alias       = '';

        // Si $variables es una funció o el seu paràmetre
        if (is_callable($variables)) {
            $accio = $variables;
        } elseif (isset($variables[0]) and is_callable($variables[0])) {
            $accio = $variables[0];
            $alias = (isset($variables['com'])) ? $variables['com'] : '';
        } else {
            $controlador_accio = explode('@', $variables['usa']);
            $controlador = $controlador_accio[0];
            $accio       = $controlador_accio[1];
            $alias       = (isset($variables['com'])) ? $variables['com'] : '';
        }


        $metodes = (is_array($metode)) ? $metode : array($metode);

        foreach ($metodes as $metode) {
            $this->rutes[$metode][$uri] = array(
                'alias'       => $alias,
                'controlador' => $controlador,
                'accio'       => $accio,
            );

            // Temporalment deixem la manera "cutre"
            // Pròximament passant per referencia
            $GLOBALS['ruta'][$metode][$uri] = array(
                'alias'       => $alias,
                'controlador' => $controlador,
                'accio'       => $accio,
            );
        }
    }

    protected function registrar($metode, $ruta, $variables)
    {
        new static($metode, $uri, $variables);
    }

    public static function existeix($ruta, $metode)
    {

        $ruta = explode('?', $ruta);
        $ruta = $ruta[0];

        // Si la ruta existeix la retornem
        if (isset($GLOBALS['ruta'][$metode][$ruta])) return $GLOBALS['ruta'][$metode][$ruta];

        // Si la ruta no existeix pot ser perquè ens han passat paràmetres, així que ho comprovem
        foreach ($GLOBALS['ruta'][$metode] as $rutaACoincidir => $valorsRuta) {
            if (static::coincideixFormatambVariables($ruta, $rutaACoincidir) != false) {

                $rutaARetornar = array('parametres' => static::coincideixFormatambVariables($ruta, $rutaACoincidir));
                return array_merge($rutaARetornar, $valorsRuta);
            }
        }

        return false;

    }


    public static function coincideixFormatambVariables($posibleCoincidencia, $ruta)
    {
        $variablesDeLaRuta = array();
        // Separem la ruta per '/'
        $posibleCoincidencia = array_filter(explode('/', $posibleCoincidencia));

        // Analitzem les rutes per veure si coincideix el format
        $ruta = array_filter(explode('/', $ruta));
        $coincideix = true;

        // Si tenen el mateix nombre de paràmetres es candidat a tenir el mateix format
        if (count($posibleCoincidencia) == count($ruta)) {
            for ($i = 0; $i < count($posibleCoincidencia); $i++) {

                if ($ruta[$i] != $posibleCoincidencia[$i]) {

                    // Mirem si la posible coincidencia té un format de variable
                    if ((strpos($ruta[$i], '{') !== false) and (strpos($ruta[$i], '}') !== false)) {
                        $variablesDeLaRuta[] = $posibleCoincidencia[$i];
                    } else {

                        // Els formats no coincideixen y no es una variable
                        return false;
                    }

                }

            }

        } else {
            return false;
        }


        return $variablesDeLaRuta;

    }

    public static function get($uri, $variables)
    {
        new static('get', $uri, $variables);
    }

    public static function post($uri, $variables)
    {
        new static('post', $uri, $variables);
    }

    public static function qualsevol($uri, $variables)
    {
        new static(array('get', 'post'), $uri, $variables);
    }

    /**
     * Métode que et diu si existeix un alias o si no existeix
     * @param  String $alias   El alias a comprovar si existeix
     * @return Boolean/String  Si existeix et retorna la ruta, si no, false.
     */
    public static function existeix_alias($alias)
    {
        foreach ($GLOBALS['ruta'] as $metodes) {
            foreach ($metodes as $nom_ruta => $dades) {
                if ($dades['alias'] == $alias) return $nom_ruta;
            }
        }

        return false;

    }

}