<?php
    require 'entities/File.class.php';
    require 'entities/imagenGaleria.class.php';
    require 'entities/conection.class.php';

    $errores = [];
    $descripcion = '';
    $mensaje = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            $descripcion = trim(htmlspecialchars($_POST['descripcion']));
            $tiposAceptados = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png'];
            $imagen = new File('imagen', $tiposAceptados);

            // El parametro (filename) es 'imagen' por que así se lo indicamos en el
            // formulario (type = "file" name = "imagen")
            $imagen ->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);
            $imagen->copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY, ImagenGaleria::RUTA_IMAGENES_PORTFOLIO);
            //Si llega hasta aqui se que no hay errores y se ha subido la imágen.
            //preparamos la sentencia SQL a ejecutar
            $connection = Connection::make();
            $sql = "ISERT INTO imagenes (nombre, descripcion) VALUES (:nombre, :descripcion)";
            $psoStatment = $connection->prepare($sql);
            $arrayParametrosStatment = [':nombre'=> $imagen->getFileName(), 'descripcion'=>$descripcion];
            //lanzamos la sentencia y vemos si se ha ejecutado correctamente.
            $respuesta =$pdoStatment->execute($arrayParametrosStatment);
            if($respuesta === false){
                $errores[] = "No se ha podido guardar la imagen en la base de datos";
            }else{
                $descripcion='';
                $mensaje = 'Imagen guardada'; 
               }
               $querySql = "Select * from iamges";
            $queryStatment = $connection-> query($querySql);
            while($fila = $queryStatment->fetch()){
                echo "ID: " .$file['id'];
                echo "Nombre: ". $fila['nombre'];
                echo "Descripcion: ". $fila['descripcion'];
            }

            $mensaje = 'Datos enviados';
        }
        catch (FileException $exception) {
            // Guardo en un array los errores
            $errores[] = $exception->getMessage();
        }
    }


require 'views/galeria.view.php';

?>