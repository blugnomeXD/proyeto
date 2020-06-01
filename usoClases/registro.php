<?php

session_start();

require_once('../clases/Usuario.php');
require_once('../clases/Email.php');

    $nia= $_POST['nia'];
    $password = $_POST['password'];
    $nombre= $_POST['nombre'];
    $apellidos= $_POST['apellidos'];
    $email= $_POST['email'];
    $telefono= $_POST['telefono'];
    $especialidad= $_POST['estudios'];

    

    if(!empty($nia || $password || $nombre  || $apellidos  || $email || $telefono )){

         $usuario = new Usuario();
       $registro =  $usuario->registro($nia,$password,$nombre,$apellidos,$email,$telefono,$especialidad);
  
  } 
    else{
      $_SESSION['registro_datos'] = 'Tienes que rellenar todos los campos del formulario';
      header('Location: ../index.php');
      exit();
  }
     if($registro ){
       $sendEmail = new Email;
      $titulo = ' Bienvenido a Empleo Ies Joan Coromines';
      $cuerpo = 'Los datos para el acceso a su cuenta son los siguiente Nia: ' . $nia . 'Y la Contraseña: ' .  $password;

       $sendEmail->envioEmail($email,$titulo,$cuerpo);
            $_SESSION['registro_valido'] = 'La cuenta se ha creado exitosamente';
            header('Location: ../index.php');
            exit();
    }
      else{
        $_SESSION['registro_existente'] = 'Ya tienes una cuenta creada relacionada con este NIA';
        header('Location: ../index.php');
        exit();
    }
    
     
?>