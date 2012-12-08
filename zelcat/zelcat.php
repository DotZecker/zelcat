<?php

/*
|--------------------------------------------------------------------------
| Ficheros incluídos
|--------------------------------------------------------------------------
|
| Los archivos que necesitaremos, como la configuración o los helpers
| Si añadimos por ejemplo un autoloader irái aquí.
|
 */
require directori('sys').'configuracio.php';
require directori('sys').'ajudants.php';


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

/*
|--------------------------------------------------------------------------
| Cargamos las vistas modelos y controaldores
|--------------------------------------------------------------------------
|
| TODO: Nos haría falta poner que sólo nos cargara el controlador
| según la url que nos pasaran.
| Hacerlo en formato http://url.dev/controlador/accion
|
*/

require directori('sys').'vista.php';
require directori('sys').'basededades.php';
require directori('sys').'model.php';
require directori('sys').'controlador.php';
require directori('sys').'bens.php';

//$conexion = new BaseDeDades;
//pd($conexion);

// TODO: Quitar y arreglar esta cutrada
$controlador = $_GET['controller'];
$accio       = $_GET['action'];

// TODO: Añadir otras variables de la url (para pasarlas como parámetro a las acciones)
require directori('app').'controladors/'.$controlador.'.php';

$name_controller = ucfirst($controlador).'_Controller';

$controller = new $name_controller;

$action = 'action_'.$accio;
$vista = $controller->$action();
extract($vista->dades);
include($vista->directori);