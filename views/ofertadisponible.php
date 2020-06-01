<?php     

session_start();
    require_once('../clases/Login.php');
    require_once('../clases/Oferta.php');
    
   
    
            $login = new Login;
            $oferta  = new Oferta;

                $usuario = $_SESSION['$id'];
                $login->validarLogin($usuario);

    
         if(isset($_SESSION['sector'])){
                    $sector=  $_SESSION['sector'];
                    unset($_SESSION["sector"]); 
             }else{
                 $sector = $_GET['sector'];
                }
       
    ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ofertas disponibles</title>
    <link rel="stylesheet" href="../../assets/css/oferta.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/icons/font-awesome-4.7.0/css/font-awesome.min.css">   
</head>

<body>
<header> 
    <nav>
        <ul class="menu">
            <li class="logo"><a href="#">EMPLEO IES JOAN COROMINES</a>
            <p class="session_name"> <span>Usuario:</span> <?php echo $_SESSION['$nombre']; ?></p> 
            </li>
            
            <li class="item"><a href="seccion.php"><i class="fa fa-undo" aria-hidden="true"></i>Inicio</a></li>
            <li class="item"><a href="mostrarperfil.php"><i class="fa fa-user" aria-hidden="true"></i>Mi Cuenta</a>
            </li>
            <li class="item"><a href="../usoClases/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Cerrar
                    Sesión</a>
            </li>
            <li class="toggle"><a href="#"><i class="fa fa-bars"></i></a></li>
        </ul>
    </nav>
</header> 
    

    <div id="contenedor-ofertas">

       
        <main id="listado-oferta">

    <?php  
            $listadoOfertas = $oferta->listarOfertasSector($sector);      
    ?>
    
        <?php 
        if(is_array($listadoOfertas)){ 
             foreach($listadoOfertas as $listadoOfertas){ ?>
        <div class="oferta-empleo">
            <img class="logo-oferta" src=<?php echo $listadoOfertas["ruta"]; ?> >

            <div class="datos-oferta">
                <h2 class="titulo-oferta"><a href="oferta.php?id=<?php echo $listadoOfertas['id_oferta'];?>"><?php  echo $listadoOfertas['titulo'];?></a></h2>
                <p id='parrafo-padding'> <strong>Empresa: </strong><?php  echo $listadoOfertas['empresa'];?></p>
                <p class="p-localidad" ><strong>Localidad: </strong><?php  echo $listadoOfertas['localidad'];?></p>  <p class="p-localidad"><strong>Fecha: 
                </strong><?php  echo $listadoOfertas['fecha_publicacion'];?> </p>   
                  
            <div class="descripcion">
               <p class="text-descripcion"><?php  echo $listadoOfertas['descripcion_oferta'];?></p>
            </div>
  
             </div>                
          </div>       
        <?php }}else{?>
                
            <p>No hay ofertas disponibles actualmente para este grado</p>
        <?php };?>
    </main>
    </div>

    <footer class="container-footer">
            <h4 id="footer-text"> IES Joan Coromines 2010 - 2020</h4>
             <a href="mensajeria.html">Contacto</a>
                <a href="#">Terminos y condiciones</a>
        </footer>               


  
    
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/menu.js"></script>
    <script src="../../assets/js/dotdotdot.js"></script> 
    
   
    <script>
    $('.descripcion').dotdotdot();
  </script>

</body>

</html>