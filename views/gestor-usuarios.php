<?php
session_start();
require_once('../clases/Login.php');
require_once('../clases/Administrador.php');

  $administrador  = new Administrador;
  $login = new Login;   
      
     
       $usuario = $_SESSION['$id'];
       $login->validarLogin($usuario);
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <title>Gestor de Usuarios</title>
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
        <a class="navbar-brand" href="gestor-usuarios.php">Gestor de Usuarios</a>
        <p class="session_name"> <span>Usuario:</span> <?php echo $_SESSION['$nombre']; ?></p> 
      </div>
      <ul class="nav navbar-nav">
      <li><a href="seccion.php">Inicio</a></li>
      <li><a href="panel-admin.php">Añadir Oferta</a></li>
        <li ><a href="gestor-ofertas.php">Gestor de Ofertas</a></li>
        <li class="active"><a href="gestor-usuarios.php">Gestor de Usuarios</a></li>
        <li  ><a href="gestor-historial.php">Historial Inscripciones</a></li>
        <li><a href="../usoClases/logout.php">Cerrar Sesión</a></li>
      </ul>
    </div>
  </nav>
  <?php  
            $listarUsuarios = $administrador->listarUsuarios();      
?>
  <main class="container p-4">
  <h2>LISTA DE USUARIOS DISPONIBLES</h2> 
     <?php include("../actionAlert/adminAlert.php")?>
        
    <div class="table-responsive">
      <table class="table table-bordered table-striped ">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nia</th>
            <th>Password</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Email</th>
            <th>Teléfono </th>
            <th>Tipo de usuario</th>
            <th>Especialidad de estudio</th>
            <th>Bolsa de oferta</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if(is_array($listarUsuarios)){ 
              foreach($listarUsuarios as $listarUsuarios){ ?>
          <tr>
            <td><?php  echo $listarUsuarios['id'];?></td>
            <td><?php  echo $listarUsuarios['nia'];?></td>
            <td><?php  echo $listarUsuarios['password'];?></td>
            <td><?php  echo $listarUsuarios['nombre'];?></td>
            <td><?php  echo $listarUsuarios['apellidos'];?></td>
            <td><?php  echo $listarUsuarios['email'];?></td>
            <td><?php  echo $listarUsuarios['telefono'];?></td>
            <td><?php  echo $listarUsuarios['tipo_usuario'];?></td>
            <td><?php  echo $listarUsuarios['especialidad_estudio'];?></td>
            <td><?php  echo $listarUsuarios['bolsa_ofertas'];?></td>
            
            <td>
              <a href="edit-user.php?id=<?php echo $listarUsuarios['id'];?>" class="btn-sm btn btn-info">
                <i class="fa fa-edit"></i>
              </a>
              <a href="../actionAdmin/delete-user.php?id=<?php echo $listarUsuarios['id'];?>" class=" btn-sm btn btn-danger">
                <i class="fa fa-trash"></i>
              </a>
            </td>
          </tr>
          <?php }}; ?>
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