<?php

session_start();

require("../clases/Administrador.php");

    $administrador = new Administrador;

    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    $nia = filter_var($_GET['nia'], FILTER_SANITIZE_NUMBER_INT);
    $password = filter_var($_GET['password'], FILTER_SANITIZE_STRING);
    $nombre = filter_var($_GET['nombre'], FILTER_SANITIZE_STRING);
    $apellidos = filter_var($_GET['apellidos'], FILTER_SANITIZE_STRING);
    $email = filter_var( $_GET['email'], FILTER_SANITIZE_EMAIL); 
    $telefono = filter_var($_GET['telefono'], FILTER_SANITIZE_NUMBER_INT);
    $tipo_usuario = filter_var($_GET['tipo'], FILTER_SANITIZE_STRING);
    $especialidad = filter_var($_GET['especialidad'], FILTER_SANITIZE_STRING);
    $bolsa =filter_var($_GET['bolsa'], FILTER_SANITIZE_STRING);
   


    

    $administrador = new Administrador;
             $administrador->editarUsuario($id,$nia,$password,$nombre,$apellidos , $email, $telefono,$tipo_usuario,$especialidad,$bolsa);

             $_SESSION["editado"]="editado";

             header("Location: ../views/gestor-usuarios.php");
             exit();
    ?>
