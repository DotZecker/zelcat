<?php
/**
 * Zelcat - El primer framework en Català
 *
 * @package  zelcat
 * @version  0.0.0.1
 * @author   Rafael Antonio <dotzecker@gmail.com>
 * @link     @dotzecker
 */

// --------------------------------------------------------------
// Li passem les rutes dels directoris
// --------------------------------------------------------------
require '../directoris.php';

// --------------------------------------------------------------
// Afegim el nucli del nostre sistema!
// --------------------------------------------------------------
require directori('sys').'zelcat.php';
