<?php

session_start();
require("../clases/Administrador.php");
 
$administrador = new Administrador;

        $titulo = filter_var($_POST['titulo'], FILTER_SANITIZE_STRING);
        $empresa = filter_var($_POST['empresa'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
        $sector = filter_var(  $_POST['sector'], FILTER_SANITIZE_STRING);
        $localidad = filter_var($_POST['localidad'] , FILTER_SANITIZE_STRING);
        $descripcion = filter_var($_POST['descripcion'], FILTER_SANITIZE_STRING);
   
       $body =  "
       <html> 
           <body> 
             <h2>Nueva oferta de empleo añadida</h2> 
                     <p><strong>Titulo:</strong> $titulo</p>
                     <p><strong>Empresa:</strong> $empresa</p>
                     <p><strong>Email:</strong> $email</p>
                     <p><strong>Localidad:</strong> $localidad </p>  
                     <p><strong>Sector:</strong> $sector</p>  
           </body> 
       </html>";
      

        if(empty($titulo) || empty($empresa) || empty($email) || empty($sector) || empty($localidad) || empty($descripcion)){
        
        $_SESSION['error'] = 'error';
        header("Location: ../views/panel-admin.php");
        exit();
        }
           else{

                $carpeta = "../actionAdmin/files/";
                opendir($carpeta);
                $destino = $carpeta.$_FILES['imagen']['name'];
                copy($_FILES['imagen']['tmp_name'],$destino);    
                $nombreImg = $_FILES['imagen']['name'];
  

        $administrador->agregarOferta($titulo,$empresa,$email,$sector,$localidad,$descripcion,$nombreImg,$destino);
        
        $administrador->getEmail($titulo,$body,$empresa);

        $_SESSION['insertado'] = 'insertado';
          header("Location: ../views/panel-admin.php");
                  exit();
        }
       

           
        
?>
