<?php
    require_once 'utils/utils.php';
    require 'views/index.view.php';


    /**
     * Creamos un array de objetos de la clase ImagenGaleria. 
     * El objeto será recorrido y llenaremos el objeto con la descripcion, la imagen, el numero de vusializaciones, el numero de likes
     * y el numero de descargas. 
     * Rellenamos el array aleatoriamente. 
     */

     $imagen = [];
     for($i=1;$i<=12;$i++){
        $imagen[]= new ImagenGaleria($i.'.jpg','Descripcion de la imagen '.$i,rand(1,1000),rand(1,1000),rand(1,1000));
     }
     
?>