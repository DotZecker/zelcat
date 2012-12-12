<?php

class Usuari {

    public static function get($id = null)
    {
        $sql = "SELECT * FROM users";
        if ( ! is_null($id)) $sql .= " WHERE id = {$id}";

        return BD::cru($sql);
    }
}