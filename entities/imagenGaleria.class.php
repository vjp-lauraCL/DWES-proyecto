<?php
    require_once 'entities/database/iEntity.class.php';

    class ImagenGaleria implements IEntity {

        const RUTA_IMAGENES_PORTFOLIO = 'images/index/portfolio/';
        const RUTA_IMAGENES_GALLERY  = 'images/index/gallery/';

        // ATRIBUTOS
        private $nombre;
        private $descripcion;
        private $numVisualizaciones;
        private $numLikes;
        private $numDownloads;
        private $categoria;

        private $id;

        // CONSTRUCTOR PARAMETRIZADO
        public function __construct(string $nombre = '', string $descripcion = '', $categoria = 0,int $numVisualizaciones = 0, int $numLikes = 0, int $numDownloads = 0) {
            $this->nombre = $nombre;
            $this->descripcion = $descripcion;
            $this->numVisualizaciones = $numVisualizaciones;
            $this->numLikes = $numLikes;
            $this->numDownloads = $numDownloads;
            $this->categoria = $categoria;
        }

        // GETTERS Y SETTERS
        public function getNombre(): string
        {
            return $this->nombre;
        }

        public function setNombre(string $nombre): void
        {
            $this->nombre = $nombre;
        }

        public function getDescripcion(): string
        {
            return $this->descripcion;
        }

        public function setDescripcion(string $descripcion): void
        {
            $this->descripcion = $descripcion;
        }

        public function getNumVisualizaciones(): int
        {
            return $this->numVisualizaciones;
        }

        public function setNumVisualizaciones(int $numVisualizaciones): void
        {
            $this->numVisualizaciones = $numVisualizaciones;
        }

        public function getNumLikes(): int
        {
            return $this->numLikes;
        }

        public function setNumLikes(int $numLikes): void
        {
            $this->numLikes = $numLikes;
        }

        public function getNumDownloads(): int
        {
            return $this->numDownloads;
        }

        public function setNumDownloads(int $numDownloads): void
        {
            $this->numDownloads = $numDownloads;
        }
        public function getCategoria(): string
        {
            return $this->categoria;
        }
        public function setCategoria( $categoria)
        {
            $this->categoria = $categoria;

            return $this;
        }

        /**
         * Creamos una función para obtener el portfolio
         */
        public function getUrlPortfolio() : string {
            return self::RUTA_IMAGENES_PORTFOLIO.$this->getNombre();
        }

        // FUNCIÓN OBTENER URL GALLERY
        public function getUrlGallery() : string {
            return self::RUTA_IMAGENES_GALLERY.$this->getNombre();
        }

        public function getId()
        {
            return $this->id;
        }
        
        public function toArray() : array{
            return[
                'id' => $this->getId(),
                'nombre' => $this->getNombre(), 
                'descripcion' => $this->getDescripcion(),
                'numVisualizaciones' => $this->getNumVisualizaciones(),
                'numLikes' => $this->getNumLikes(),
                'numDownloads' => $this->getNumDownloads(), 
                'categoria' => $this->getCategoria()
            ];
        }
    }
?>