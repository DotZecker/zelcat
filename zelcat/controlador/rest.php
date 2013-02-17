<?php

abstract class Controlador_Rest extends Controlador
{
    public $rest = true;

    public protected function resposta($resposta) {
        $resposta = json_encode($resposta);

        echo $resposta;
        exit;

    }

}
