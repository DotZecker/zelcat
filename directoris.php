<?php

// --------------------------------------------------------------
// Directori base del projecte.
// --------------------------------------------------------------
$directoris['app']    = 'aplicacio';

// --------------------------------------------------------------
// Directori on és el nucli del framework
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
// Ens posem al directori actual
// --------------------------------------------------------------
chdir(__DIR__);

// --------------------------------------------------------------
// Definim el separador de directoris
// --------------------------------------------------------------
defined('DS') or define('DS', DIRECTORY_SEPARATOR);

// --------------------------------------------------------------
// Definim el directori base (que es on som actualment)
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
 * Un ajudant que et retorna el directori que li passis
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
