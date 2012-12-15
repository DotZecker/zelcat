<?php

/*
|--------------------------------------------------------------------------
| Afegim les clases del nucli
|--------------------------------------------------------------------------
|
| Es carregan les clases que es fan servir per a cada petició i configuració
|
*/

require directori('sys').'configuracio.php';
require directori('sys').'ajudants.php';
require directori('sys').'autocarregador.php';

require directori('sys').'peticio.php';
require directori('sys').'ruta.php';
require directori('sys').'vista.php';
require directori('sys').'basededades.php';
require directori('sys').'model.php';
require directori('sys').'controlador.php';

require directori('sys').'resposta.php';

/*
|--------------------------------------------------------------------------
| Afegim alias
|--------------------------------------------------------------------------
|
| Per accedir més rapidament a algunes clases
|
*/
class_alias('BaseDeDades', 'BD');
class_alias('Configuracio', 'Config');