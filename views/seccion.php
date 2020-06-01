  <?php      
  
  session_start();
            require_once('../clases/Login.php');

                $login = new Login;
                $usuario = $_SESSION['$id'];
                $login->validarLogin($usuario);
           
                if(isset($_SESSION["sector"])){
                    
                    unset($_SESSION["sector"]);
                }
               
            ?>
          
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seccion de grados</title>
    <link rel="stylesheet" href="../../assets/css/seccion.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/icons/font-awesome-4.7.0/css/font-awesome.min.css">
  
</head>
<body>
 <header>
     <h1>EMPLEO IES JOAN COROMINES</h1>
     <nav>
            <a href="mostrarPerfil.php" class="menu"><i class="fa fa-home" aria-hidden="true"></i>Mi Cuenta</a>
            <a href="mensajeria.html" class="menu"> <i class="fa fa-envelope" aria-hidden="true"></i>Contacto</a>
            <a href="../usoClases/logout.php" class="menu"><i class="fa fa-sign-out" aria-hidden="true"></i>Cerrar Sesión</a>
           
     </nav>
 </header>

 <h2>ESCOGE TU GRADO </h2>

    <main>    
        <div ><a href="ofertadisponible.php?sector=Desarrollo de Aplicaciones Web"><img src="../../assets/img/Desarrollo-de-aplicaciones-web.png" alt="DAW" ></a></div>
        <div><a href="ofertadisponible.php?sector=Desarrollo de Aplicaciones Multiplataforma"><img src="../../assets/img/dam-tsmultiplataforma-ig-formacion.jpg" id="img2" alt="DAM"></a></div>
        <div class="imagen-bottom"> <a href="ofertadisponible.php?sector=Administración y Finanzas"><img src="../../assets/img/Grado_Superior_Administracion_Finanzas_Online-1024x536.jpg" alt="Administracion y Finanzas" ></a></div>
        <div class="imagen-bottom"><a href="ofertadisponible.php?sector=Técnico Superior en Sonido"><img src="../../assets/img/T.S.Sonido-Audiovisuales-Espectaculos-848x449.jpg" id="img4" alt="Tecnico en Sonido"></a></div>
    </main>
    
    <footer>
        <div id="terminos">
            <h4> Fernando Meléndez Prieto 2018 - 2020</h4>
            <ul>
                <li> <a href="mensajeria.html">Contacto</a></li>
                <li> <a href="#">Terminos y condiciones</a></li>
                
            </ul>
        </div>
    </footer>
</body>
</html>