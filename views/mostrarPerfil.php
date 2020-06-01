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
        
        $datosPerfil = $perfil->mostrarPerfil($usuario);
    ?>
    
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de usuario</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../../assets/css/panel_control.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/icons/font-awesome-4.7.0/css/font-awesome.min.css">
</head>

<body>

    <nav>
        <ul class="menu">
            <li class="logo"><a href="mostrarPerfil.php">EMPLEO IES JOAN COROMINES</a>
           <p class="session_name"> <span>Usuario:</span> <?php echo $_SESSION['$nombre']; ?></p> 
            </li>
            
            <li class="item"><a href="seccion.php"><i class="fa fa-undo" aria-hidden="true"></i>Inicio</a></li>
            <li class="item"><a href="mostrarPerfil.php"><i class="fa fa-user" aria-hidden="true"></i>Mi Información</a>
            </li>
            <li class="item"><a href="#" id='btn-abrir-popup'><i class="fa fa-user-times" aria-hidden="true"></i>Darse de baja</a></li>
            <li class="item"><a href="ofertadisponible.php"><i class="fa fa-thumbs-up" aria-hidden="true"></i>Ofertas disponibles</a></li>
            <li class="item"><a href="historial-usuario.php"><i class='fa fa-book'></i>Historial</a> </li>
            <li class="item"><a href="../usoClases/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Cerrar Sesión</a>
            </li>
            <li class="toggle"><a href="#"><i class="fa fa-bars"></i></a></li>
        </ul>
    </nav>

    <div class="overlay" id='overlay'>
        <div class="popup" id='popup'>
            <a href="" id='btn-cerrar-popup' class='btn-cerrar-popup'><i class='fa fa-times'></i></a>
            <h3>Escribe los datos para confirmar la baja</h3>
            <form action="../usoClases/eliminarCuenta.php" method="POST">
                <div class="contenedor-inputs">
                    <label for="nia-popup" class='popup-label'>Nia</label>
                    <input type="text" name="nia" id="nia-popup">
                    <label for="password-popup" class='popup-label'>Contraseña</label>
                    <input type="password" name="password" id="password-popup">
                </div>
                <input type="submit" class='btn-submit' value='Darse de baja'>
            </form>
        </div>
    </div>
   

    <h2 class="info-text">Mi&nbsp;Informacion</h2>
    
               <?php  $_SESSION['sector'] = $datosPerfil[8]; ?>

    <div class="container">
    <form action='../usoClases/updateUser.php' method='POST'>
    
      <div class="form-group">
        <input type="hidden" class="form-control" id="id"  name="id" value="<?php echo $datosPerfil[0]; ?>" >
      </div>
      <div class="form-group">
        <label  for="nia">Nia:</label>
        <input type="text" class="form-control" id="nia"  name="nia" value="<?php echo $datosPerfil[1] ?>" required >
      </div>
      <div class="form-group">
        <label  for="password">Contraseña:</label>
        <input type="password" class="form-control" id="password"  name="password" value="<?php echo $datosPerfil[2];?>" required  >
      </div>
      <div class="form-group">
        <label  for="nombre">Nombre:</label>
        <input type="text" class="form-control" id="nombre"  name="nombre" value="<?php echo $datosPerfil[3]; ?>" required >
      </div>

      <div class="form-group">
        <label  for="apellidos">Apellidos:</label>
        <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $datosPerfil[4];?>" required>
      </div>

      <div class="form-group">
        <label  for="email">Email:</label>
        <input type="email" class="form-control" id="email"  name="email" value="<?php echo $datosPerfil[5]; ?>" required >
      </div>

      <div class="form-group">
        <label  for="telefono">Telefono:</label>
        <input type="number" class="form-control" id="telefono"  name="telefono" value="<?php echo $datosPerfil[6];?>" required>
      </div>

      <div class="form-group">
        <label  for="especialidad">Especialida de estudio:</label>
        <select name="estudios"  id = "especialidad" class='form-control'>
           <option   selected  value="<?php echo   $datosPerfil[8];?>">Escoge una opción </option>
                    <option  value="Desarrollo de Aplicaciones Web">Desarrollo de Aplicaciones Web</option>
                    <option value="Desarrollo de Aplicaciones Multiplataforma">Desarrollo de Aplicaciones Multiplataforma</option>
                    <option value="Administración y Finanzas">Administración y Finanzas</option>
                    <option value="Técnico Superior en Sonido">Técnico Superior en Sonido</option>
        </select>
      </div>

      <div class="form-group">
        <label  for="bolsa">Bolsa de empleo:</label>
        <select name="bolsa" id="bolsa" class='form-control'>
        <option  selected  value="<?php echo   $datosPerfil[9];?>" >Escoge una opción </option>
             <option value="activado">Activado</option>
             <option value="desactivado">Desactivado</option>
        </select>
      </div>
      
      <button type="submit" class="btn btn-success">Editar</button>
    </form>
  </div>    
    <?php include("../actionAlert/alertUser.php")?>
   

    <footer class="container-footer">
            <h4 id="footer-text"> IES Joan Coromines 2010 - 2020</h4>
             <a href="mensajeria.html">Contacto</a>
                <a href="#">Terminos y condiciones</a>
                     
  </footer>

        <script src="../../assets/js/jquery.min.js"></script>
        <script src="../../assets/css/bootstrap/js/bootstrap.js"></script>
        <script src="../../assets/js/menu.js"></script>
        <script src="../../assets/js/popup.js"></script>

    </body>
</html>