<?php
    class Partner {

        // ATRIBUTOS
        private $nombre;
        private $logo;
        private $descripcion;
        const RUTA_IMAGENES_GALLERY  = 'images/index/';

        // CONSTRUCTOR PARAMETRIZADO
        public function __construct(string $nombre, string $logo, string $descripcion) {
            $this->nombre = $nombre;
            $this->logo = $logo;
            $this->descripcion = $descripcion;
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

        public function getLogo(): string
        {
            return self::RUTA_IMAGENES_GALLERY.$this->logo;
        }

        public function setLogo(string $logo): void
        {
            $this->logo = $logo;
        }

        public function getDescripcion(): string
        {
            return $this->descripcion;
        }

        public function setDescripcion(string $descripcion): void
        {
            $this->descripcion = $descripcion;
        }
    }
?>