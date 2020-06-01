<?php    

session_start();
    require_once('../clases/Login.php');
 
      $login = new Login;
        
        $usuario = $_SESSION['$id'];
       $login->validarLogin($usuario);
        
      if($_SESSION['$tipo_usuario'] != 'Administrador'){
           header("location:mostrarPerfil.php");
          exit();
        }       
    ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <title>AÑADIR OFERTA</title>
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
        <a class="navbar-brand" href="panel-admin.php">Añadir Oferta</a>
        <p class="session_name"> <span>Usuario:</span> <?php echo $_SESSION['$nombre']; ?></p> 
      </div>
      <ul class="nav navbar-nav">
         <li><a href="seccion.php">Inicio</a></li>
        <li class="active"><a href="panel-admin.php">Añadir Oferta</a></li>
        <li><a href="gestor-ofertas.php">Gestor de Ofertas</a></li>
        <li ><a href="gestor-usuarios.php">Gestor de Usuarios</a></li>
        <li  ><a href="gestor-historial.php">Historial Inscripciones</a></li>
        <li><a href="../usoClases/logout.php">Cerrar Sesión</a></li>
      </ul>
    </div>
  </nav>

  <div class="container">

  <h2>INSERTAR UNA OFERTA</h2> 
    <form  action="../actionAdmin/insert-offer.php" method="POST" enctype="multipart/form-data">

      <div class="form-group">
        <input type="hidden" class="form-control" id="id"  name="id" value="">
      </div>
      <div class="form-group">
        <label  for="titulo">Titulo:</label>
        <input type="text" class="form-control" id="titulo"  name="titulo" value="">
      </div>
      <div class="form-group">
        <label for="empresa">Empresa:</label>
        <input type="text" class="form-control" id="empresa"  name="empresa" value="">
      </div>
      <div class="form-group">
        <label  for="email">Email de la empresa:</label>
        <input type="text" class="form-control" id="email"  name="email" value="">
      </div>

      <div class="form-group">
        <label for="sector">Sector:</label>
        <select name="sector" id="sector" class='form-control'>
                    <option value="Desarrollo de Aplicaciones Web">Desarrollo de Aplicaciones Web</option>
                    <option value="Desarrollo de Aplicaciones Multiplataforma">Desarrollo de Aplicaciones Multiplataforma</option>
                    <option value="Administración y Finanzas">Administración y Finanzas</option>
                    <option value="Técnico Superior en Sonido">Técnico Superior en Sonido</option>
                </select>
      </div>

      <div class="form-group">
        <label  for="localidad">Localidad:</label>
        <input type="text" class="form-control" id="localidad"  name="localidad" value="">
      </div>

        <div class="form-group">
        <label  for="descripcion" style="display:block">Estado de la oferta:</label>
    <textarea  name="descripcion" id="descripcion" cols="80" rows="10"></textarea>      
      </div>

      <input type="file" id="imagen"  name="imagen"  required><br>

      <button type="submit" class="btn btn-success">Añadir oferta</button>
    </form>
    </div>
    
    <?php include("../actionAlert/adminAlert.php")?>
    
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


