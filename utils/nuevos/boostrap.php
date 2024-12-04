<?php

$config = require_once __DIR__ . '/config.php';
App::bind('config', $config);

$router = Router::load('app/routes.php');
App::bind('router', $router);

?>