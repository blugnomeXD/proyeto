<?php
session_start();
require_once('../clases/Login.php');
require_once('../clases/Administrador.php');

  $administrador  = new Administrador;
  $login = new Login;   
    
       $usuario = $_SESSION['$id'];
       $login->validarLogin($usuario);
        
      if($_SESSION['$tipo_usuario'] == "usuario"){
           header("location:seccion.php");
          exit();
        }       

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <title>Gestor del historial</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../assets/icons/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../assets/css/bootstrap/css/bootstrap.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../assets/css/gestor-ofertas.css">

</head>

<body>

  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="gestor-ofertas.php">Gestor de Ofertas</a>
        <p class="session_name"> <span>Usuario:</span> <?php echo $_SESSION['$nombre']; ?></p> 
      </div>
      <ul class="nav navbar-nav">
      <li><a href="seccion.php">Inicio</a></li>
      <li><a href="panel-admin.php">Añadir Oferta</a></li>
        <li ><a href="gestor-ofertas.php">Gestor de Ofertas</a></li>
        <li><a href="gestor-usuarios.php">Gestor de Usuarios</a></li>
        <li  class="active"><a href="gestor-historial.php">Historial Inscripciones</a></li>
        <li><a href="../usoClases/logout.php">Cerrar Sesión</a></li>
      </ul>
    </div>
  </nav>
  <?php  
            
?>
  <main class="container p-4">
  
       <h2>HISTORIAL INSCRIPCIONES</h2> 
    
       <?php  $historialInscripcion = $administrador->historialInscripcion();  ?> 
    <div class="table-responsive">
      <table class="table table-bordered table-striped ">
        <thead>
          <tr>
            <th>Id Usuario</th>
            <th>Id Oferta</th>
            <th>Titulo</th>
            <th>Empresa</th>
            <th>Email de la  Empresa</th>
            <th>Sector</th>
            <th>Localidad </th>
            <th>Fecha de la Inscripcion</th>
          </tr>
        </thead>
        <tbody>
        
    <?php  
        if(is_array($historialInscripcion))
        foreach($historialInscripcion as $historialInscripcion){
                ?> 
          <tr>
                <td><?php echo $historialInscripcion ['id_usuario']; ?></td>
                <td><?php echo $historialInscripcion ['id_oferta']; ?></td>
                <td><?php  echo $historialInscripcion ['titulo'];?></td>
                <td><?php  echo $historialInscripcion ['empresa'];?></td>
                <td><?php  echo $historialInscripcion ['email_empresa'];?></td>
                <td><?php  echo $historialInscripcion ['sector'];?></td>
                <td><?php echo $historialInscripcion ['localidad']; ?></td>
                <td><?php echo $historialInscripcion ['fecha_inscripcion']; ?></td>
            <td>
            <a href="oferta.php?id=<?php echo $historialInscripcion ['id_oferta']; ?>" class="btn-sm btn btn-info">
                 <i class="fa fa-search"></i>
               </a>
            </td>
          
        <?php  } ?>
        
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
  <script src="../../assets/js/dotdotdot.js"></script>

</body>

</html>