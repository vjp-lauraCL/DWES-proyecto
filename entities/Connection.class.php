<?php
require_once 'app/config.php';
require_once 'utils/const.php';
class Connection{
   public static function make(){
       
       try{
           $config=App::get('config')['database'];
           $connection= new PDO(
               $config['connection'].';dbname='.$config['name'],
               $config['username'],
               $config['password'],
               $config['options']
               );
       }catch(PDOException $error){
           //die($error->getMessage());
           throw new AppException(getErrorString(ERROR_CON_DB));
       }
       return $connection; 
   }
   
}
?>