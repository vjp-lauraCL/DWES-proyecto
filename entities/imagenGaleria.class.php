<?php
 class ImagenGaleria implements IEntity{
    const RUTA_IMAGENES_PORTFOLIO = 'images/index/portfolio/';
    const RUTA_IMAGENES_GALLERY = 'images/index/gallery/';

    private $nombre;
    private $descripcion;
    private $numeroVisualizaciones;
    private $numeroLikes;
    private $numeroDownloads;

    private $id;

    public function __construct(string $nombre ='',string $descripcion ='', int $numeroVisualizaciones=0, int $numeroLikes=0,int $numeroDownloads = 0){
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->numeroVisualizaciones = $numeroVisualizaciones;
        $this->numeroLikes = $numeroLikes;
        $this->numeroDownloads = $numeroDownloads;
        
    }
    public function getNombre():string{
        return $this->nombre;
    }
    public function getDescripcion():string{
        return $this->descripcion;
    }
    public function getNumeroVisualizaciones():int{
        return $this->numeroVisualizaciones;
    }
    public function getNumeroLikes():int{
        return $this->numeroLikes;
    }
    public function getNumeroDownloads():int{
        return $this->numeroDownloads;
    }
    public function setNombre(string $nombre){
        $this->nombre = $nombre;
    }
    public function setDescripcion(string $descripcion){
        $this->descripcion = $descripcion;
    }
    public function setNumeroVisualizaciones(int $numeroVisualizaciones){
        $this->numeroVisualizaciones = $numeroVisualizaciones;
    }
    public function setNumeroLikes(int $numeroLikes){
        $this->numeroLikes = $numeroLikes;
    }
    public function setNumeroDownloads(int $numeroDownloads){
        $this->numeroDownloads = $numeroDownloads;
    }
     
    /**
     * Función para obtener el portfolio de imagenes
     */
    public function getUrlPortfolio():string{
        return self::RUTA_IMAGENES_PORTFOLIO . $this->nombre;
    }
    /**
     * Función para obtener la galeria de imagenes
     */
    public function getUrlGallery():string{
        return self::RUTA_IMAGENES_GALLERY . $this->nombre;
    }
    public function getId(): int
    {
        return $this->id;
    }
    
    public function toArray() : array{
        return[
            'id' => $this->getId(),
            'nombre' => $this->getNombre(), 
            'descripcion' => $this->getDescripcion(),
            'numVisualizaciones' => $this->getNumeroVisualizaciones(),
            'numLikes' => $this->getNumeroLikes(),
            'numDownloads' => $this->getNumeroDownloads()
        ];
    }


 }

?>