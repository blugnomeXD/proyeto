<?php
session_start();
    require_once("../clases/Usuario.php");

        $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
        $nia = filter_var($_POST['nia'], FILTER_SANITIZE_NUMBER_INT);
        $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
        $apellidos = filter_var($_POST['apellidos'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_NUMBER_INT);
        $estudios = filter_var($_POST['estudios'], FILTER_SANITIZE_STRING);
        $estado_bolsa = filter_var($_POST['bolsa'], FILTER_SANITIZE_STRING);


        if( empty($nia) || empty($password) || empty($nombre) || empty($apellidos) || empty($telefono) || empty($estudios) || empty($estado_bolsa)){
            $_SESSION["error"]="error";
           header("Location:../views/mostrarPerfil.php");
           exit();
       
        }
        else{

            $telefono = (int)$telefono;
   
            $usuario = new Usuario;
    
            $usuario->Actualizar($id,$nia,$password,$nombre,$apellidos,$email,$telefono,$estudios,$estado_bolsa);
            $_SESSION["editado"]="editado";
            header("Location:../views/mostrarPerfil.php");
             exit();
        }

        
      

        

?>