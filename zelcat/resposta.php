<?php

class Resposta {

    protected $vista;

    public function __construct()
    {
        $peticio = new Peticio();

        // TODO: Quitar y arreglar esta cutrada
        $controlador = $peticio->controlador[0];
        $accio       = $peticio->accio;

        // TODO: Añadir otras variables de la url (para pasarlas como parámetro a las acciones)
        require directori('app').'controladors/'.$controlador.'.php';

        $name_controller = 'Controlador_' . ucfirst($controlador);
        $controller = new $name_controller;
        $controller->abans();
        $action = 'accio_'.$accio;
        $this->vista = $controller->$action();
    }

    public static function fer()
    {
        return new static();
    }

    protected function preparar($que)
    {
        /*$contingut_final = array();
        foreach ($que as $nom_variable => $contingut)
        {
            if ($contingut instanceof Vista)
            {
                $contingut_final[$nom_variable] = $this->preparar($contingut);
            } else {
                if ($que instanceof Vista and $nom_variable == 'directori')
                {
                    pd($que);
                    ob_start() ;

                        extract($que->dades);
                        require $contingut;
                        $contingut_final[$nom_variable] = ob_get_contents();
                    ob_end_clean();

                } else {
                    $contingut_final[$nom_variable] = $contingut;
                }
            }

        }

        return $contingut_final;*/
    }

    public function enviar()
    {
        // Extraiem totes les dades, i si hi ha subvistes les carreguem també
        //$vista = $this->preparar($this->vista);

        echo $this->vista->renderitzat;
    }
}