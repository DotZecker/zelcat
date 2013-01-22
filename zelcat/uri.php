<?php

class URI {

    public static function url_base()
    {
        // @todo: https
        return 'http://' . $_SERVER['HTTP_HOST'] . '/';
    }

}