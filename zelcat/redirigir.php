<?php

class Redirigir {

    /**
     * Ens redirigeix a la url que passem
     * @param  String $on La ruta on es redirigirà
     * @return header
     */
    public static function a($on)
    {
        return header('Location: ' . $on);
    }

    /**
     * Ens redirigeix a la ruta (alias) que li passem
     * @param  String $alias Nom de la ruta on volem anar
     * @return header
     */
    public static function a_ruta($alias)
    {
        return ($ruta = Ruta::existeix_alias($alias))
               ? static::a(URI::url_base() . $ruta)
               : false;
    }

    /**
     * Ens redirigeix a la pàgina anterior
     * @return header
     */
    public static function enrere()
    {
        return Redirigir::a($_SERVER['HTTP_REFERER']);
    }
}
