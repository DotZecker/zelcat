<?php

class Resposta {

    protected $vista;

    /**
     * Instanciem la resposta
     * @param String $ruta
     */
    public function __construct($ruta)
    {
        if ($ruta == '') $ruta = '/';

        // Mirem si està registrada la ruta
        // Si hi ha post serà per post, ja que prima
        $metode = ($_POST) ? 'post' : 'get';

        if ($controlador_accio_parametres = Ruta::existeix($ruta, $metode))
        {
            $controlador = $controlador_accio_parametres['controlador'];
            $accio       = $controlador_accio_parametres['accio'];
            $parametres  = $controlador_accio_parametres['parametres'];

        } else {
            header("HTTP/1.0 404 Not Found");
            die('404');
        }

        $directori_controlador = directori('app').'controladors/'.$controlador.'.php';

        if (file_exists($directori_controlador)) {
            require $directori_controlador;
        } elseif (is_callable($accio)) {
            $accio();
            die('S\'ha executat una funció com a paràmetre');
        } else {
            header("HTTP/1.0 404 Not Found");
            die('404 - CONTROLADOR INEXISTENT');
        }

        $name_controller = 'Controlador_' . ucfirst($controlador);
        $controller = new $name_controller;
        $controller->abans();
        $action = 'accio_'.$accio;

        if (method_exists($controller, $action)) {
            $this->vista = $controller->$action();
        } else {
            header("HTTP/1.0 404 Not Found");
            die('404');
        }

    }

    public static function fer($ruta = '/')
    {
        return new static($ruta);
    }

    public function enviar()
    {
        // Extraiem totes les dades, i si hi ha subvistes les carreguem també
        //$vista = $this->preparar($this->vista);

        echo $this->vista->renderitzat;
    }
}