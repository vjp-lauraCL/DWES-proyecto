<?php
require_once __DIR__.'/../exceptions/FileExceptions.class.php';

class File{
    private $file;
    private $fileName;

    public function __construct(string $fileName, array $arrTypes){
       $this->file = $_FILES[$fileName];
        $this->fileName = '';
    

    /**
     * Comprobamos que el array contenga un archivo
     */
    if(empty($this->file['name'])){
        throw new FileException('No se ha encontrado el archivo');
    }
    /**
     * Comprobamos que el archivo no tenga errores
     */
    if($this->file['error']!== UPLOAD_ERR_OK){
        throw new FileException('Error al subir el archivo');
    }

    /**
     * Comprobamos que el archivo sea del tipo correcto
     */
    if(!in_array($this->file['type'], $arrTypes)==false){
        throw new FileException('Tipo de archivo no permitido');
    }
    }

    public function getFileName(){
        return $this->fileName;
    }

    public function saveUploadFile(string $ruta){
        if(is_uploaded_file($this['tmp_name'])===false){
            throw new FileException('El archivo no se ha subido mediante un formulario');
        }

        /**
         * Cargamos el nombre del fichero
         */
        $this->fileName = $this->file['name'];
        $rutaCompleta = $ruta . $this->fileName;

        $contador = 0;

        /**
         * Comprobamos que la ruta no corresponda con ningun fichero
         */
        if(is_file($rutaCompleta)==true){
            $contador++;
           
            /**
             * Si la ruta corresponde con un fichero, añadimos la fecha y la hora
             */
            $corte = strrpos($this->fileName, '.');
            $this->fileName = $corte[0] . "(" . $contador . ")" . substr($this->fileName, $corte);

            /**
             * Actualizamos la ruta con el nuevo nombre
             */
            $rutaCompleta = $ruta . $this->fileName;

        }
        if(move_uploaded_file($this->file['tmp_name'], $rutaCompleta)==false){
            throw new FileException('Error al mover el archivo');
        }
    }

        public function copyFile(string $rutaOrigen, string $rutaDestino){
            $rutaOrigenCompleta = $rutaOrigen . $this->fileName;
            $rutaDestinoCompleta = $rutaDestino . $this->fileName;

            if(copy($rutaOrigenCompleta, $rutaDestinoCompleta)==false){
                throw new FileException('Error al copiar el archivo');
            }
    }


}


?>