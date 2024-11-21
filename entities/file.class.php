<?php
     require_once 'exceptions/FileExceptions.class.php';
     require_once 'utils/const.php';


     class File{
        private $file;
        private $fileName;
    
    
    
        /**
         * File constructor
         * @param string $fileName
         * @param array $arrayTypes
         * @throws FileException
         */
        public function __construct(string $fileName, array $arrType){
            // con $fileName obtendremos el fichero mediante el array $_FILES que con
            //todos los ficheros que se suben al servidor mediante un formulario.
            $this->file=$_FILES[$fileName];
            $this->fileName='';
    
            //Comprobamos que es array contiene el fichero
            if(!isset($this->file)){
                //Mostrar un error
                throw new FileException(getErrorString(UPLOAD_ERR_NO_FILE));
            }
           if(in_array($this->file['type'],$arrType)===false){
            throw new FileException(getErrorString(UPLOAD_ERR_EXTENSION));
            //Error,tipo no soportado
            
           }
            
        }
        public function getFileName(){
            return $this->fileName;
        }
       /**
         * Guarda el archivo en la ruta indicada
         */
        public function saveUploadFile(string $rutaDestino) {
            // Verifica que el archivo haya sido subido mediante una solicitud POST
            if (!is_uploaded_file($this->file['tmp_name'])) {
                throw new FileException('El archivo no se ha subido mediante el formulario');
            }
        
           /**
            * Pathinfo es una función que devuelve información acerca de la ruta de un fichero
            * PATHINFO_FILENAME devuelve el nombre del fichero sin la extensión
            * PATHINFO_EXTENSION devuelve la extensión del fichero
            */
            $nombreArchivo = pathinfo($this->file['name'], PATHINFO_FILENAME);// Este sirve para extraer el nombre
            $extension = pathinfo($this->file['name'], PATHINFO_EXTENSION);// Este sirve para extraer la extension
            
         /**
          * Inicializamos el contador en 1, ya que si el archivo existe  
            * le añadiremos un número antes de la extensión
          */
            $contador = 1; 
            $ruta = $rutaDestino . $this->file['name'];//Ruta 
        
            /**
             * Si el archivo existe, le añadiremos un numero antes de la extensión y después del nombre.
             */
            while (file_exists($ruta)) {
                $this->fileName = $nombreArchivo . "_$contador." . $extension;
                $ruta = $rutaDestino . $this->fileName;
                $contador++;
            }
           /**
            * Si el archivo no está duplicado, lo guardaremos con el nombre original
            */
            if ($contador === 1) {
                $this->fileName = $this->file['name'];
            }
        
           /**
            * Moveremos el archivo a la ruta de destino
            * move_uploaded_file mueve un archivo subido a una nueva ubicación
            *en caso de no poder mover el archivo, mostrará un error.
            */
            if (!move_uploaded_file($this->file['tmp_name'], $ruta)) {
                throw new FileException(getErrorString(ERROR_MV_UP_FILE));
            }
        }
        
       /**
        * Creamos una función para copiar el archivo. 
        *Comprobaremos que el archivo de origen existe, también comprobaremos que el archivo de destino existe. En caso de no existir, lanzaremos un error.
        */
        public function copyFile (string $rutaOrigen,string $rutaDestino){
            $origen = $rutaOrigen.$this->fileName;
            $destino = $rutaDestino.$this->fileName;
            // Verifica si el archivo de origen existe
            if(is_file($origen)==false){
                throw new FileException("No existe el fichero $origen que intentas copiar");
    
            }
            // Verifica si el archivo de destino ya existe
            if(is_file($destino)==true){
                throw new FileException("El fichero $destino ya existe y no se puede sobreescribir");
    
            }
            // Copia el archivo de origen al destino
            if(copy($origen,$destino)==false){
                throw new FileException("No se ha podido copiar el fichero $origen a $destino");
            }
        }
        
    }
    
    
    ?>