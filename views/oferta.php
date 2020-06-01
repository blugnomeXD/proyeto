    <?php
    session_start();
    require("../clases/Oferta.php");

        $oferta = new Oferta;
        $id = $_GET['id'];
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Oferta de empleo</title>
    <link rel="stylesheet" href="../../assets/css/oferta-completa.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/icons/font-awesome-4.7.0/css/font-awesome.min.css">
</head>

<body>
    <header>
        <nav>
            <ul class="menu">
                <li class="logo"><a href="#">EMPLEO IES JOAN COROMINES</a></li>
                <li class="item"><a href="ofertadisponible.php"><i class="fa fa-undo" aria-hidden="true"></i>Inicio</a>
                </li>
                <li class="item"><a href="mostrarperfil.php"><i class="fa fa-user" aria-hidden="true"></i>Mi Cuenta</a>
                </li>
                <li class="item"><a href="../usoClases/logout.php"><i class="fa fa-sign-out"
                            aria-hidden="true"></i>Cerrar Sesion</a>
                </li>
                <li class="toggle"><a href="#"><i class="fa fa-bars"></i></a></li>
            </ul>
        </nav>
    </header>
 <?php   $ofertaElegida = $oferta->ofertaCompleta($id);
          $id_user = $_SESSION['$id'];
          $_SESSION['sector'] = $ofertaElegida[5];?> 
 

    <main id="container-offer">
        <section class="container-description">
            <div class="description-top">
                <div class="img-oferta">
                    <img src="../../assets/img/167383.png" alt="">
                </div>
                <div class="titulo-oferta">
                    <h1><?php echo $ofertaElegida[1];?></h1> 
                    <p class="fecha-oferta"><?php echo $ofertaElegida[2];?></p>      
            </div>
            </div>
            <div class="description-bottom">
                <h2>Descripción de la oferta</h2>
                   <p >  <?php echo $ofertaElegida[7];?> </p>
            </div>
        </section>
        <section class="container-datos">
            <div class="datos-titulo">
                <h2 id="texto-titulo">Datos de la oferta</h2>
            </div>
            <div class="lista-datos">
                <ul>
                    <li class="text-li">Empresa:</li>
                    <li class="font-li"><?php echo $ofertaElegida[3];?></li>
                </ul>
            </div>
            <div class="lista-datos">
                <ul>
                    <li class="text-li" >Email:</li>
                    <li class="font-li"><?php echo $ofertaElegida[4];?></li>
                </ul>
            </div>
            <div class="lista-datos">
                <ul>
                    <li class="text-li">Sector:</li>
                    <li class="font-li" ><?php echo $ofertaElegida[5];?></li>
                </ul>
            </div>
            <div class="lista-datos">
                <ul>
                    <li class="text-li">Localidad:</li>
                    <li class="font-li"><?php echo $ofertaElegida[6];?></li>
                </ul>
            </div>
            
            <div class="form-inscribirse">
            <form action="../actionOferta/insertarOferta.php" method="POST">
            <input type="hidden" name="id_user" value= <?php echo $id_user ?>>
            <input type="hidden" name="id_oferta" value = <?php  echo $ofertaElegida[0];?>>
                <input type="submit" value="INSCRIBIRSE" class="submit-inscribirse">
            </form>
            </div>

               <?php  
         if(!empty($_SESSION['validar'])){

            print $_SESSION['validar'];
            unset($_SESSION['validar']); 
         }
        else if(!empty($_SESSION['added'])){

                print $_SESSION['added'];
                unset($_SESSION['added']); 
         }
   ?>
        </section>

        <footer class="container-footer">
            <h4 id="footer-text"> IES Joan Coromines 2010 - 2020</h4>
             <a href="mensajeria.html">Contacto</a>
                <a href="#">Terminos y condiciones</a>
                    
        </footer>

    </main>
</body>

</html>