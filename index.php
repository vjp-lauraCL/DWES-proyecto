<?php
    require_once 'utils/utils.php';
    require_once 'entities/imagenGaleria.class.php';
    require_once 'entities/partner.class.php';

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
        $asociados = [];
        for ($i = 1; $i <= 4; $i++) {
            $nombre = $i . '.jpg';
            $logo = 'log' . $i . '.jpg';
            $descripcion = 'descripción ' . $i;
        
            // CREO EL OBJETO (Partner)
            $asociados[] = new Partner($nombre, $logo, $descripcion);
        }
        
        // Definir la variable $arrayPartners
        $arrayPartners = $asociados;

        /**
         * Creamos una función para obtener los tres asociados
         */
        function obtenerTresPartners($arrayPartners) {
            return array_slice($arrayPartners, 0, 3);
        }




    require 'views/index.view.php';

?>