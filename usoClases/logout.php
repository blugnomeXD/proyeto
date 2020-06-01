<?php

require_once('Login.php'); 

    session_start();
    $usuario= $_SESSION['$nia'];

        $login = new Login;
       
        $login->logout();
        header('Location:../../app/index.php'); 
        exit();

?>