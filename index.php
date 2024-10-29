<?php
    require 'utils/utils.php';
    require 'entity/imagenGaleria.class.php';

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




    require 'views/index.view.php';
?>