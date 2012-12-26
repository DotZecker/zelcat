<?php

// Ruta al registre d'usuaris
Ruta::qualsevol('/', array('com' => 'index', 'usa' => 'inici@index'));
Ruta::qualsevol('inici/index', array('com' => 'index', 'usa' => 'inici@index'));

Ruta::post('inici/buscar', array('com' => 'buscar', 'usa' => 'inici@buscar'));
Ruta::get('inici/buscar', function(){
    return Redirigir::a_ruta('buscar');
});
