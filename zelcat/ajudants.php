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

function __($text){
    return $text;
}