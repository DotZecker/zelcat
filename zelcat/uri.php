<?php

class URI {

    public static function url_base()
    {
        return 'http://' . $_SERVER['HTTP_HOST'] . '/';
    }

}