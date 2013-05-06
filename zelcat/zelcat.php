<?php

/*
|--------------------------------------------------------------------------
| Carreguem el Framework
|--------------------------------------------------------------------------
|
| Amb aquest fitxer carregar el framework podrà ser ussat per el
| desenvolupador.
|
 */

require directori('sys') . 'nucli.php';

/*
|--------------------------------------------------------------------------
| Reportem tots els errors
|--------------------------------------------------------------------------
|
| @todo: Si està en producció no es mostren
|
*/

error_reporting(-1);

$peticio  = new Peticio;
$resposta = Resposta::fer($peticio->peticio);

$resposta->enviar();

function __autoload($nomClase) {


    if (strstr($nomClase, 'Controlador')) {

        $nomControlador    = str_replace('controlador', '', strtolower($nomClase));

        $fitxerControlador = directori('app') . 'controladors' . DS .  $nomControlador . '.php';
        if (file_exists($fitxerControlador)) require $fitxerControlador; // @todo: else


    } else {

        // Ruta del model a incloure
        $fitxerModel = directori('app') . 'models' . DS . $nomClase . '.php';

        if (file_exists($fitxerModel)) {
            require $fitxerModel;
        } else {
            // És un fitxer del nucli
            $fitxerZelcat = directori('sys') . DS . $nomClase . '.php';
            if (file_exists($fitxerZelcat)) require $fitxerZelcat;
        }


    }


}