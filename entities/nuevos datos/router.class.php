<?php
class Router{
    private $routes;

    public function __construct(){
        $this->routes= [
            'GET' => [], 
            'POST' => []
        ];
    }
    public static function load(string $file): Router{
        $router = new static;
        require $file;
        return $router;
        
    }

    // public function define(array $tablasRutas):void{
    //     $this->routes = $tablasRutas;
    // }

    public function get (array $uri, string $controller):void{
        $this->routes['GET'][$uri] = $controller;
    }

    public function direct(string $uri, string $method): string{
        if(array_key_exists($uri, $this->routes[$method])){
            return $this->routes[$uri][$method];//busca la posicion uri
        }else{
            throw new NotFoundException ('No se ha encontrado la ruta');
        }
    }

    public function redirect(string $path){
        header ('location: /'.$path);
    }
}

?>