<?php

class Sessio
{
    public static function obtenir($que)
    {
        $que = explode('.', $que);

        $sessio_temporal = $_SESSION;
        foreach ($que as $clau) {
            $sessio_temporal = (isset($sessio_temporal[$clau])) ? $sessio_temporal[$clau] : false;
        }

        return $sessio_temporal;
    }

    public static function assignar($que, $valor)
    {
        $que = explode('.', $que);

        $sessio_temporal = &$_SESSION;
        foreach ($que as $clau) {
            $sessio_temporal = &$sessio_temporal[$clau];
        }

        $sessio_temporal = $valor;

        return true;
    }

    // @todo: Que no et crei tot el array
    public static function destruir($que)
    {
        $que = explode('.', $que);

        $sessio_temporal = &$_SESSION;
        foreach ($que as $clau) {
            $sessio_temporal = &$sessio_temporal[$clau];
        }

        $sessio_temporal = false;

    }

    public static function flash()
    {

    }

}
