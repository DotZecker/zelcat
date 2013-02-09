<?php

/**********************************************
 * Afegim les clases al nucli                 *
 **********************************************/
session_start();
require directori('sys').'configuracio.php';
require directori('sys').'ajudants.php';
require directori('sys').'autocarregador.php';

require directori('sys').'sessio.php';
require directori('sys').'peticio.php';
require directori('sys').'ruta.php';
require directori('sys').'vista.php';
require directori('sys').'basededades.php';
require directori('sys').'model.php';
require directori('sys').'controlador.php';

require directori('sys').'resposta.php';
require directori('sys').'uri.php';
require directori('sys').'redirigir.php';

require directori('app').'rutes.php';


/**********************************************
 * Afegim els alias                           *
 **********************************************/
class_alias('BaseDeDades', 'BD');
class_alias('Configuracio', 'Config');