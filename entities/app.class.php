<?php
require_once 'exceptions/AppExceptions.class.php';
require_once 'utils/const.php';

class App {
    private static $container = [];

    public static function bind($clave, $valor) {
        self::$container[$clave] = $valor;
    }

    public static function get(string $key) {
        if (!array_key_exists($key, self::$container)) {
            throw new AppException("No se ha encontrado la clave en el contenedor");
        }
        return self::$container[$key];
    }

    public static function getConnection() {
        if (!array_key_exists('connection', self::$container)) {
            self::$container['connection'] = Connection::make();
        }
        return self::$container['connection'];
    }
}
?>