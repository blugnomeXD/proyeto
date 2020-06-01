<?php

        require_once('../clases/Usuario.php');
        require_once('../clases/Login.php');
        $usuario = new Usuario;
        $logout = new Login;

        $nia = $_POST['nia'];
        $password = $_POST['password'];

         $usuario->bajaUsuario($nia,$password);
 
        $logout->logout();  

        
        header('Location: ../views/baja-usuario.html');
        exit();
            
            

    