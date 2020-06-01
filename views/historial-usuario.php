<?php    

session_start();
   require_once('../clases/Login.php');
   require_once('../clases/Usuario.php');
  
       $login = new Login;
       $perfil = new Usuario();
       
       $usuario = $_SESSION['$id'];
       $login->validarLogin($usuario);

       if($_SESSION['$tipo_usuario'] == 'Administrador'){
           header("Location:panel-admin.php");
           exit();
       }
             
        $historialUsuario = $perfil->listarHistorial( $usuario);
  ?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Ofertas</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../../assets/css/historial.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/icons/font-awesome-4.7.0/css/font-awesome.min.css">
    
</head>

<body>
    <header>
        <nav>
            <ul class="menu">
                <li class="logo"><a href="seccion.php">EMPLEO IES JOAN COROMINES</a>
                <p class="session_name"> <span>Usuario:</span> <?php echo $_SESSION['$nombre']; ?></p> 
              </li>
                <li class="item"><a href="seccion.php"><i class="fa fa-undo" aria-hidden="true"></i>Inicio</a></li>
                <li class="item"><a href="mostrarPerfil.php"><i class="fa fa-user" aria-hidden="true"></i>Mi Información</a>
                </li>
                <li class="item"><a href="#" id='btn-abrir-popup'><i class="fa fa-user-times" aria-hidden="true"></i>Darse
                        de baja</a></li>
                <li class="item"><a href="ofertadisponible.php"><i class="fa fa-thumbs-up" aria-hidden="true"></i>Ofertas disponibles</a></li>
                <li class="item"><a href="historial-usuario.php"><i class='fa fa-book'></i>Historial</a> </li>
                <li class="item"><a href="../usoClases/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Cerrar
                        Sesión</a>
                </li>
                <li class="toggle"><a href="#"><i class="fa fa-bars"></i></a></li>
            </ul>
        </nav>
    </header>
    <main class="container p-4">
  
        <h2 class="h2">HISTORIAL DE  TUS OFERTAS</h2>  

     <div class="table-responsive">
       <table class="table table-bordered table-striped ">
     <?php  if (is_array($historialUsuario)){ ?>
         <thead>
           <tr>
             <th>Id</th>
             <th>Título</th>
             <th>Empresa</th>
             <th>Email</th>
             <th>Sector</th>
             <th>Localidad</th>
             <th>Fecha Inscripcion</th>
             <th>Estado</th>
             <th>Acciones</th>
           </tr>
         </thead>
         <tbody>
         <?php 
         
            foreach($historialUsuario as $historialUsuario){ ?> 
           <tr>
             <td><?php echo $historialUsuario['id_oferta'] ?></td>
             <td><?php echo $historialUsuario['titulo'] ?></td>
             <td><?php echo $historialUsuario['empresa'] ?></td>
             <td><?php echo $historialUsuario['email_empresa'] ?></td>
             <td><?php echo $historialUsuario['sector'] ?></td>
             <td><?php echo $historialUsuario['localidad'] ?></td>
             <td><?php echo $historialUsuario['fecha_inscripcion'] ?></td>
             <td><?php echo $historialUsuario['estado_oferta'] ?></td>

             <td>
               <a href="oferta.php?id=<?php echo $historialUsuario['id_oferta']?>" class="btn-sm btn btn-info">
                 <i class="fa fa-search"></i>
               </a>
             </td>
           </tr>
           <?php }}else{ ?>
            <h4>Aún no te has inscrito a ninguna de nuestras ofertas !</h4>
            
           <?php } ?>
         </tbody>
       </table>
     </div>
     
   </main>

   <footer class="container-footer">
            <h4 id="footer-text"> IES Joan Coromines 2010 - 2020</h4>
             <a href="mensajeria.html">Contacto</a>
                <a href="#">Terminos y condiciones</a>
                         
  </footer>

    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/css/bootstrap/js/bootstrap.js"></script>
    <script src="../../assets/js/menu.js"></script>
</body>
</html>