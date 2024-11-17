<?php
    require_once 'entities/QueryBuilder.class.php';
/**
 * Creamos la clase categoriaRepositorio 
 */
    class CategoriaRepositorio extends QueryBuilder{
        public function __construct(string $table ='categorias', string $classEntity ='Categoria')
        {
          parent::__construct($table, $classEntity); 
        }
    }

?>