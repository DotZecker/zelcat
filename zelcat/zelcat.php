<?php

/*
|--------------------------------------------------------------------------
| Ficheros inclu�dos
|--------------------------------------------------------------------------
|
| Los archivos que necesitaremos, como la configuraci�n o los helpers
| Si a�adimos por ejemplo un autoloader ir�i aqu�.
|
 */
require directori('sys').'configuracio.php';
require directori('sys').'ajudants.php';


/*
|--------------------------------------------------------------------------
| Reportamos todos los errores
|--------------------------------------------------------------------------
|
| Poniendo esto, usemos la veris�n que usemos el PHP nos mostrar� todos
| los errores.
| TODO: Si estamos en producci�n que se quite.
|
*/

error_reporting(-1);

/*
|--------------------------------------------------------------------------
| Cargamos las vistas modelos y controaldores
|--------------------------------------------------------------------------
|
| TODO: Nos har�a falta poner que s�lo nos cargara el controlador
| seg�n la url que nos pasaran.
| Hacerlo en formato http://url.dev/controlador/accion
|
*/

require directori('sys').'peticio.php';
require directori('sys').'vista.php';
require directori('sys').'basededades.php';
require directori('sys').'model.php';
require directori('sys').'controlador.php';
require directori('sys').'bens.php';

$peticio = new Peticio();

// TODO: Quitar y arreglar esta cutrada
$controlador = $peticio->controlador[0];
$accio       = $peticio->accio;

// TODO: A�adir otras variables de la url (para pasarlas como par�metro a las acciones)
require directori('app').'controladors/'.$controlador.'.php';

$name_controller = 'Controlador_' . ucfirst($controlador);

$controller = new $name_controller;

$action = 'accio_'.$accio;
$vista = $controller->$action();
extract($vista->dades);
include($vista->directori);