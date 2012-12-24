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

require directori('sys').'nucli.php';

/*
|--------------------------------------------------------------------------
| Reportamos todos los errores
|--------------------------------------------------------------------------
|
| Poniendo esto, usemos la verisón que usemos el PHP nos mostrará todos
| los errores.
| TODO: Si estamos en producción que se quite.
|
*/

error_reporting(-1);
$peticio = new Peticio;
$resposta = Resposta::fer($peticio->peticio);

$resposta->enviar();

function __autoload($nom_clase) {

    $fitxer_model = directori('app') . 'models' . '/' . $nom_clase . '.php';

    if ( ! strstr($nom_clase, '_'))
    {
        if (file_exists($fitxer_model))
        {
            require $fitxer_model;
        } else {
            $fitxer_zelcat = directori('sys') . '/' .$nom_clase . '.php';
            if (file_exists($fitxer_zelcat)) require $fitxer_zelcat;
        }
    } else {

        $clase = directori('sys');

        $clase .= strtolower(str_replace('_', DS, $nom_clase)) . '.php';
        if (file_exists($clase)) require $clase;

    }


}