<?php
require_once 'utils/bootstrap.php';

$router = new Router();

require 'utils/nuevos/routes.php';

try{
    require Router::load('utils/routes.php')->direct(Request::uri(), Request::method());
}catch(Exception $e){
    die($e->getMessage());
}

?>