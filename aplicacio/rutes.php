<?php

// Ruta al registre d'usuaris
Ruta::qualsevol('/', array('com' => 'index', 'usa' => 'estatic@index'));

Ruta::qualsevol('cerca', array('com' => 'cerca', 'usa' => 'carrera@index'));

Ruta::qualsevol('grau/{id}/{exga}', array('com' => 'cerca', 'usa' => 'grau@index'));


//Ruta::qualsevol('carrera/{carrera_id}/univeristat/{univeristat_id}', array('com' => 'cerca', 'usa' => 'cercador@index'));