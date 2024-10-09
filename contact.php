<?php
    if($_SERVER['REQUEST_METHOD'] ==='POST'){
        $nombre = $_POST['nombre'] ?? ' ';
        $apellido = $_POST['apellido'] ?? ' ';
        $email = $_POST['email'] ?? ' ';
        $subject = $_POST['subject'] ?? ' ';
        $message = $_POST['message'] ?? ' ';
        $errores = [];

    if(empty($email) ||filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errores[] = 'Por favor ingresa un correo valido';
    }
    if(empty($subject)){
        $errores[] = "Por favor ingrese un asunto válido";
    }
    if(empty($message)){
        $errores[] = "Por favor ingrese un mensaje";
    }
    /**Si no hay errores validamos el formulario con éxito */
    if(empty($errores)){
        $enviar = true;

        /**Limpiamos el formulario */
        $nombre = $apellido = $email = $subject = $message = '';
    }
}
    require 'views/contact.view.php';
?>