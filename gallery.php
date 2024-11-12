<?php
require_once 'utils/utils.php';
require_once 'entities/File.class.php';
require_once 'entities/ImagenGaleria.class.php';
require_once 'exceptions/FileExceptions.class.php';
require_once 'exceptions/QueryExceptions.class.php';
require_once 'entities/Connection.class.php';
require_once 'entities/QueryBuilder.class.php';
require_once 'entities/App.class.php';
require_once 'exceptions/AppExceptions.class.php';
require_once 'entities/repository/ImagenGaleriaRepositorio.class.php';
require_once 'entities/repository/CategoriaRepositorio.class.php';
require_once 'entities/Categoria.class.php';

$errores = [];
$descripcion = '';
$mensaje = '';
$imagenes = []; // Inicializar la variable $imagenes

try {
    $config = require_once 'app/config.php';
   
    App::bind('config',$config);

    $imagenRepositorio = new ImagenGaleriaRepositorio();
    $categoriaRepositorio = new CategoriaRepositorio();


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $descripcion = trim(htmlspecialchars($_POST['descripcion']));
        $categoria = trim(htmlspecialchars($_POST['categoria']));
        $tiposAceptados = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png'];
        $imagen = new File('imagen', $tiposAceptados);
        $imagen->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);

        $imagenGaleria = new ImagenGaleria($imagen->getFileName(), $descripcion, $categoria);
        $response = $imagenRepositorio->save($imagenGaleria);

        if ($response === false) {
            $errores[] = 'No se ha podido guardar la imagen en la base de datos.';
        } else {
            $descripcion = '';
            $mensaje = 'Imagen guardada';
        }
    }

    $imagenes = $imagenRepositorio->findAll();
} catch (FileException $exception) {
    $errores[] = $exception->getMessage();
} catch (QueryException $exception) {
    $errores[] = $exception->getMessage();
} catch (PDOException $exception) {
    $errores[] = $exception->getMessage();
} catch (AppException $exception) {
    $errores[] = $exception->getMessage();
}catch(Exception $exception){
    $errores[] = $exception->getMessage();
}
 finally {
    if (isset($imagenRepositorio)) {
        $imagenes = $imagenRepositorio->findAll();
        $categorias = $categoriaRepositorio->findAll();
    }
}

require 'views/galeria.view.php';
?>