<?php
require_once 'exceptions/AppExceptions.class.php';
require_once 'utils/const.php';
class App{
    private static $container=[];

    public static function bind($clave, $valor){
        self::$container [$clave]=$valor;
    }

    public static function get(string $key){
        if(!array_key_exists($key, self::$container)){
            throw new AppException("No se ha encontrado la clave con el contenedor");
        }
        return static :: $container[$key];
    }
    
}
?>