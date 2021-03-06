<?php

/**
 * Print and Die
 * Et fa un print_r formatejat
 *
 * @param  array|object
 * @return void
 */
function pd($array)
{
    echo "<code>";
        echo "<pre>";
            print_r($array);
        echo "</pre>";
    echo "</code>";

    die();
}


/**
 * Dump and Die
 * Et fa un var_dump formatejat
 *
 * @param  array|object
 * @return void
 */
function dd($array)
{
    echo "<code>";
        echo "<pre>";
            var_dump($array);
        echo "</pre>";
    echo "</code>";

    die();
}


/**
 * Afegeix cometes a un text
 * @param  String  $on
 * @return String  Text amb cometes
 */
function afegirCometes($on)
{
    return '"' . $on .'"';
}


/**
 * Et separa per espais i et retorna el primer valor
 * @param  Mix    $separador Per quina cosa et fa el explode()
 * @param  String $on        On t'ho fa
 * @return String
 */
function primerValor($separador, $on)
{
    return explode(' ', $on)[0];
}


/**
 * Retorna texts traduits
 * @param  String $text Text a traduir
 * @return String       Text traduit
 */
function __($text)
{
    return $text;
}


function conteMajuscula($text)
{
    return preg_match('/[A-Z]+/', $text);
}

function dieJSON($array)
{
    header('content-type: application/json; charset=utf-8');
    die(json_encode($array));
}

function senseAccents($cadena)
{
    $originals  = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
    $modificats = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr';

    $cadena = utf8_decode($cadena);
    $cadena = strtr($cadena, utf8_decode($originals), $modificats);

    return utf8_encode($cadena);
}

function arrayUniqueValues($array)
{
    return array_values(array_unique($array));
}

function getTypeaheadTokens($string)
{
    $tokens = array_merge(explode(' ', $string), explode(' ', senseAccents($string)));
    $tokens = arrayUniqueValues($tokens);

    return $tokens;
}