<?php
    
    session_start(); 
  
    require("../clases/Oferta.php");
    
    $oferta = new Oferta;
  
    $id_oferta= $_POST['id_oferta'];
    $id_usuario = $_POST['id_user'];

    
    
    $validar = $oferta->insertarOferta($id_oferta,$id_usuario);



    if($validar){

      $_SESSION['validar'] = 'Ya estás inscrito a está oferta';
     
      header("Location: ../views/oferta.php?id=$id_oferta");
      exit();
    }
   
      else{

      
      $_SESSION['added'] ="Inscripción realizada con exito";
      header("Location: ../views/oferta.php?id=$id_oferta");
      exit();
    }

      


    ?>