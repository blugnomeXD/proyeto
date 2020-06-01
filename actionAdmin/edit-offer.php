<?php

session_start();
require("../clases/Administrador.php");

    $administrador = new Administrador;

            $id =filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
            $titulo = filter_var($_GET['titulo'], FILTER_SANITIZE_STRING);   
            $empresa = filter_var($_GET['empresa'], FILTER_SANITIZE_STRING);
            $email = filter_var( $_GET['email'], FILTER_SANITIZE_EMAIL); 
            $sector = filter_var($_GET['sector'], FILTER_SANITIZE_STRING);
            $localidad = filter_var( $_GET['localidad'], FILTER_SANITIZE_STRING);
            $estado = filter_var($_GET['estado'], FILTER_SANITIZE_STRING);
            $descripcion = filter_var($_GET['descripcion'], FILTER_SANITIZE_STRING);
            

            $subject = "La oferta  '$titulo'   ha sido modificada";

            $body =  "
       <html> 
           <body> 
             <h2>$titulo  - Ha sido Modificada</h2> 
                    <p> Si deseas visitar  sus nuevas modificaciones, lo puedes hacer atraves de este link

                    <a href='http://localhost/proyecto/app/views/oferta.php?id=$id/'> Pulse aqui.<a/>
                   
           </body> 
       </html>";
   
       

    $_SESSION["editado"]="editado";

    $administrador = new Administrador;

    $administrador->editarOferta($id, $titulo ,$empresa,$email,$sector,$localidad,$descripcion,$estado,$subject,$body);

    header("Location: ../views/gestor-ofertas.php");
    exit();
           
    ?>