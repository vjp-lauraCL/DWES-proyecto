<?php
      require_once 'utils/utils.php';
      require_once 'entities/File.class.php';
      require_once 'entities/ImagenGaleria.class.php';
      require_once 'exceptions/FileExceptions.class.php'; // Corregido
      require_once 'exceptions/QueryExceptions.class.php';
      require_once 'entities/Connection.class.php';
      require_once 'entities/QueryBuilder.class.php';
      require_once 'entities/App.class.php';
      require_once 'exceptions/AppExceptions.class.php';
      require_once 'entities/repository/ImagenGaleriaRepositorio.class.php';


      $errores = [];
      $descripcion = '';
      $mensaje = '';
      try {
          $config=require_once'app/config.php';
      
          App::bind('config',$config);
      
          
          $imagenRepositorio= new ImagenGaleriaRepositorio();
      
          if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      
      
      
              $descripcion = trim(htmlspecialchars($_POST['descripcion']));
              $tiposAceptados = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png'];
              //tipologia MIME 'tipodearchivo/extension'
              $imagen = new File('imagen', $tiposAceptados);
              //el parametro fileName es 'imagen' porque asi lo indicamos en
              //en el formulario (type='file' name='imagen')
              $imagen->saveUploadFile(imagenGaleria::RUTA_IMAGENES_GALLERY);
              //si llega hasta aqui, no hay errores y se ha subido la imagen
              $imagen->copyFile(imagenGaleria::RUTA_IMAGENES_GALLERY, imagenGaleria::RUTA_IMAGENES_PORTFOLIO);
      
      
      
              // $sql = "INSERT INTO imagenes (nombre,descripcion) VALUES (:nombre,:descripcion)";
              // $pdoStatement = $connection->prepare($sql);
              // $parametersStatementArray = ['nombre' => $imagen->getFileName(), ':descripcion' => $descripcion];
              // //Lanzamos la sentecia y vemos si se ha ejecutado correctamente
              // $response = $pdoStatement->execute($parametersStatementArray);
      
      
              $imagenGaleria= new imagenGaleria($imagen->getFileName(),$descripcion);
              $imagenRepositorio->save($imagenGaleria);
      
      
              if ($response === false) {
                  $errores[] = 'No se ha podido guardar la imagen en la base de datos.';
              } else {
                  $descripcion = '';
                  $mensaje = 'Imagen guardada';
              }
          }
          $imagenRepositorio = new QueryBuilder('imagenes','imagenGaleria');
          $imagenes = $imagenRepositorio->findAll();
      } catch (FileException $exception) {
          $errores[] = $exception->getMessage();
          //guardo en un array los errores
      }catch (QueryException $exception) {
          $errores[] = $exception->getMessage();
      }catch(AppException $exception){
          $errores[] = $exception->getMessage();
      
      }catch(PDOException $exception){
          $errores[] = $exception->getMessage();
      
      }
      finally {
        if (isset($imagenRepositorio)) {
            $imagenes = $imagenRepositorio->findAll();
        }
      }
      

require 'views/galeria.view.php';

?>