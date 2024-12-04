<?php
//En los apuntes esta esta parte en la página 33.
class Request{
    public static function uri (){
        return trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    }
    public static function method(){
        return $_SERVER['REQUEST_METHOD'];
    }
}


?>