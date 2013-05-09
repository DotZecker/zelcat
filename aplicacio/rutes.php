<?php

/****************************************************
 *                      RUTES                       *
 ****************************************************/

// Ruta al registre d'usuaris
Ruta::qualsevol('/', array('com' => 'index', 'usa' => 'estatic@index'));

Ruta::qualsevol('cerca', array('com' => 'cerca', 'usa' => 'cercador@index'));

Ruta::qualsevol('graus/{id}', array('com' => 'cerca', 'usa' => 'grau@detall'));


/****************************************************
 *                       AJAX                       *
 ****************************************************/
Ruta::get('ajax/graus/tots', function()
{
    $return = array();
    foreach (Grau::llistar() as $grau) {
        $grau['value'] = $grau['nom'];
        $return[] = $grau;
    }

    dieJSON($return);
});

Ruta::get('ajax/llocs/comunitatsautonomes/totes', function()
{
    $return = array();

    foreach (ComunitatAutonoma::llistar() as $comunitatAutonoma) {
        $comunitatAutonoma['value'] = $comunitatAutonoma['nom'];
        $return[] = $comunitatAutonoma;
    }

    dieJSON($return);
});

Ruta::get('ajax/llocs/universitats/totes', function()
{
    $return = array();

    foreach (Universitat::llistar() as $universitat) {
        $universitat['value'] = $universitat['nom'];
        $return[] = $universitat;
    }

    dieJSON($return);
});