<?php
class Connection{

   public static function make(Array $config){
   try{
    $connection = new PDO($config['conection']. ';dbname='.$config['name'],
    $config['username'],
    $config['password'],
    $config['options']);

   }catch(PDOException $PDOException){
        die($PDOException->getMessage());
   }
   return $connection;
   }
}

?>