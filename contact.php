<?php
    if($_SERVER['REQUEST_METHOD'] ==='POST'){
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $errores = [];

        if(!empty($nombre)){
            $errores[] = 'Por favor ingresa tu nombre';
    }
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errores[] = 'Por favor ingresa un correo valido';
    }
}
    require 'views/contact.view.php';
?>