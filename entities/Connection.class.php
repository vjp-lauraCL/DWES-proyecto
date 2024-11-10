<?php
require_once 'app/config.php';
require_once 'utils/const.php';
class Connection{

   public static function make(){
   try{
      $config = app::get('config')['database'];
    $connection = new PDO($config['conection']. ';dbname='.$config['name'],
    $config['username'],
    $config['password'],
    $config['options']);

   }catch(PDOException $PDOException){
      // die($PDOException->getMessage());
       throw new AppException("No se ha podido crear conexion con la BD");
   }
   return $connection;
   }
}

?>