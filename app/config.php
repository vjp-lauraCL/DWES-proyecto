<?php
/**
 * Configuración de la base de datos
 * Esta base de datos la hemos creado en myphpadmin
 */
return [
    "database" =>[
        "name" => "proyecto", 
        "username" => "user", 
        "password" => "user",
        "connection" => "mysql:host=localhost", 
        "options" => [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_PERSISTENT => true        
        ]
    ]
]

?>