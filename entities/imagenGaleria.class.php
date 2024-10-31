<?php
class imagenGaleria{
    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var int
     */
    private $numVisualizaciones;

    /**
     * @var int 
     */
    private $numLikes;
    /**
     * @var int
     */
    private $numDownloads;

    public function __construct(string $nombre, string $descripcion, int $numVisualizaciones=0, int $numLikes=0, int $numDownloads=0){
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->numVisualizaciones = $numVisualizaciones;
        $this->numLikes = $numLikes;
        $this->numDownloads = $numDownloads;
    }
    /**
     * @return string 
     */
    public function getNombre(): string{
        return $this->nombre;
    }
    /**
     * @return string $nombre
     */
    public function setNombre(string $nombre): void{
        $this->nombre = $nombre;
    }
    /**
     * @return string 
     */
    public function getDescripcion(): string{
        return $this->descripcion;
    }
    /**
     * @return string $descripcion
     */
    public function setDescripcion(string $descripcion): void{
        $this->descripcion = $descripcion;
    }
    /**
     * @return int 
     */
    public function getNumVisualizaciones(): int{
        return $this->numVisualizaciones;
    }
    /**
     * @return int $numVisualizaciones
     */
    public function setNumVisualizaciones(int $numVisualizaciones): void{
        $this->numVisualizaciones = $numVisualizaciones;
    }
    /**
     * @return int 
     */
    public function getNumLikes(): int{
        return $this->numLikes;
    }
    /**
     * @return int $numLikes
     */
    public function setNumLikes(int $numLikes): void{
        $this->numLikes = $numLikes;
    }
    /**
     * @return int 
     */
    public function getNumDownloads(): int{
        return $this->numDownloads;
    }
    /**
     * @return int $numDownloads
     */
    public function setNumDownloads(int $numDownloads): void{
        $this->numDownloads = $numDownloads;
    }
    const RUTA_IMAGENES_PORTFOLIO= '/images/index/portfolio/';
    const RUTA_IMAGENES_GALERIA= '/images/index/gallery/';

    public function getUrlPortfolio(): string{
        return self:: RUTA_IMAGENES_PORTFOLIO . $this->getNombre();
    }
    public function getUrlGallery(): string{
        return self:: RUTA_IMAGENES_GALERIA . $this->getNombre();
    }
}

?>