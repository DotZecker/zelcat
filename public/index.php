<?php
/**
 * Zelcat - El primer framework en Català
 *
 * @package  zelcat
 * @version  0.0.0.1
 * @author   Rafa Gómez Casas
 * @link     http://rafa.im
 */

// --------------------------------------------------------------
// Li passem les rutes dels directoris
// --------------------------------------------------------------
define('DS', DIRECTORY_SEPARATOR) or die('Fail!');
require '..' . DS . 'directoris.php';

// --------------------------------------------------------------
// Afegim el nucli del nostre sistema!
// --------------------------------------------------------------
require directori('sys').'zelcat.php';
