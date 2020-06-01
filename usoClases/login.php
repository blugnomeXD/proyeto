<?php

require_once('../clases/Login.php');

      $usuario = (filter_var($_POST['nia'], FILTER_SANITIZE_NUMBER_INT));   
       
      $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
      
    

      $login = new Login;

       $validar =  $login->login($usuario,$password);
         
     
  
      if(isset($_SESSION['$nia'])  && isset($_SESSION['$tipo_usuario']) &&  isset($_SESSION['$id'])){

        header("Location:../../views/seccion.php");
        exit();
      } 
   
      if(!$validar){
        
        session_start();
        $_SESSION['msg'] = "Tu nia o contraseña es incorrecto";
        header("Location:../../index.php");
       }
     
    
?>