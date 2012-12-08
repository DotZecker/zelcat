<?php

// --------------------------------------------------------------
// Directori base del projecte.
// --------------------------------------------------------------
$directoris['app']    = 'aplicacio';

// --------------------------------------------------------------
// Directori on es està el nucli del framework
// --------------------------------------------------------------
$directoris['sys']    = 'zelcat';

// --------------------------------------------------------------
// Directori de la carpeta pública
// --------------------------------------------------------------
$directoris['public'] = 'public';


// *-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-
// ¡¡¡NO MODIFICAR A PARTIR D'AQUÍ!!!
// *-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-

// --------------------------------------------------------------
// Ens possem al directori actual
// --------------------------------------------------------------
chdir(__DIR__);

// --------------------------------------------------------------
// Definim el separador de directoris
// --------------------------------------------------------------
defined('DS') or define('DS', DIRECTORY_SEPARATOR);

// --------------------------------------------------------------
// Definim el directorio base (que es on estem actualment)
// --------------------------------------------------------------
$GLOBALS['zelcat_directoris']['base'] = __DIR__.DS;

// --------------------------------------------------------------
// Afegim els directoris
// --------------------------------------------------------------
foreach ($directoris as $nom => $directori) {
    if ( ! isset($GLOBALS['zelcat_directoris'][$nom])) {
        $GLOBALS['zelcat_directoris'][$nom] = realpath($directori).DS;
    }
}

/**
 * Un helper que te devuelve el directori que le pasemos
 *
 * @param  string  $directori
 * @return string
 */
function directori($directori)
{
    return $GLOBALS['zelcat_directoris'][$directori];
}

/**
 * Un setter del directori
 *
 * @param  string  $directori
 * @param  string  $value
 * @return void
 */
function assignar_directori($directori, $valor)
{
    $GLOBALS['zelcat_directoris'][$directori] = $valor;
}