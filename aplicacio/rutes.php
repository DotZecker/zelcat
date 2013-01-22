<?php

// Ruta al registre d'usuaris
Ruta::qualsevol('/', array('com' => 'index', 'usa' => 'inici@index'));
Ruta::qualsevol('inici/index', array('com' => 'index', 'usa' => 'inici@index'));

Ruta::get('inici/buscar', array('com' => 'buscar', 'usa' => 'inici@buscar'));
Ruta::post('inici/buscar', function(){
    return Redirigir::a('/');
});
