<?php

class Redirigir {

    public static function a($on)
    {
        return header('Location: ' . $on);
    }

    public static function a_ruta($alias)
    {

        return ($ruta = Ruta::existeix_alias($alias))
               ? static::a(URI::url_base() . $ruta)
               : false;
    }
}