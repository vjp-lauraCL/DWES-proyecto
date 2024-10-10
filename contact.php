<?php
$nombre = $apellido = $email = $subject = $message = '';
$errores = [];
$exito = false;

    if($_SERVER['REQUEST_METHOD'] ==='POST'){
        list($nombre, $apellido, $email, $subject, $message) = [
            $_POST['nombre'] ?? ' ',
            $_POST['apellido'] ?? ' ',
            $_POST['email'] ?? ' ',
            $_POST['subject'] ?? ' ',
            $_POST['message'] ?? ' '
        ];
      

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
    