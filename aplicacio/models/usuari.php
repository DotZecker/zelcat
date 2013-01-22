<?php

class Usuari {

    /**
     * Métode per aconseguir els usuaris
     * @param  in/string $identifier [Pot ser el id del usuari o el seu email]
     * @return array     El contingut del usuari
     */
    public static function get($identifier = null)
    {
        $sql = "SELECT * FROM usuaris";
        if (! is_null($identifier)) {
            $sql .= (is_numeric($identifier)) ? " WHERE id = {$identifier}" : " WHERE email = \"{$identifier}\"";
        }

        return BD::cru($sql);
    }

    public static function delete($identifier)
    {
        $sql = "UPDATE usuaris set is_actiu = 0 WHERE ";
        $sql .= (is_numeric($identifier)) ? " id = {$identifier}" : " email = \"{$identifier}\"";

        return BD::cru($sql);
    }

    public static function edit()
    {

    }
}