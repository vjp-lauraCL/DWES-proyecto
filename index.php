<?php
    require_once 'utils/utils.php';
    require_once 'entities/imagenGaleria.class.php';
    require_once 'entities/Partner.class.php';

    /**
     * Creamos un array de objetos de la clase ImagenGaleria
     * El objeto será recorrido con un for y llenamos el objeto con la descripción de la imagen, el número de visualizaciones, los likes, 
     * el número de descargas. 
     * Rellenamos el array aleatoriamente con rand(). 
     */

    $imagen=[];
    for($i=1; $i<=12; $i++){
        $imagen[]= new imagenGaleria($i. '.jpg', 'descripcion imagen ' . $i. rand(1, 2000), rand(1, 2000), rand(1, 2000));
    }

        // ASOCIADOS
        for ($i = 1; $i <= 4; $i++) {
            $nombre = $i . '.jpg';
            $logo = 'log' . $i . '.jpg';
            $descripcion = 'descripción ' . $i;
    
            // CREO EL OBJETO (Partner))
            $asociados[] = new  Partner($nombre, $logo, $descripcion);
        }




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