<?php

  session_start();
  require_once('../clases/Administrador.php');
  $administrador  = new Administrador;


?>

<!DOCTYPE html>
<html lang="es">

<head>
  <title>Editar Oferta</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../assets/icons/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../assets/css/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../../assets/css/gestor-ofertas.css">

</head>

<body>

  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="gestor-ofertas.php">Editar Usuario</a>
      </div>
      <ul class="nav navbar-nav">
      <li><a href="seccion.php">Inicio</a></li>
      <li><a href="panel-admin.php">Añadir Oferta</a></li>
        <li class="active"><a href="gestor-ofertas.php">Gestor de Ofertas</a></li>
        <li ><a href="gestor-usuarios.php">Gestor de Usuarios</a></li>
        <li><a href="../usoClases/logout.php">Cerrar Sesión</a></li>
      </ul>
    </div>
  </nav>
  <?php  

            $id = $_GET['id'];
            $listarOferta = $administrador->listarOferta($id);      
?>

<div class="container">

<h3>EDITAR OFERTA</h3> 

    <form class="" action="../actionAdmin/edit-offer.php" method="GET">

    
      <div class="form-group">
        <input type="hidden" class="form-control" id="id"  name="id" value="<?php  echo $listarOferta[0];?>">
      </div>
      <div class="form-group">
        <label class="" for="titulo">Titulo:</label>
        <input type="text" class="form-control" id="titulo"  name="titulo" value="<?php  echo $listarOferta[1];?>">
      </div>
      <div class="form-group">
        <label class="" for="empresa">Empresa:</label>
        <input type="text" class="form-control" id="empresa"  name="empresa" value="<?php  echo $listarOferta[3];?>">
      </div>
      <div class="form-group">
        <label class="" for="email">Email de la empresa:</label>
        <input type="text" class="form-control" id="email"  name="email" value="<?php  echo $listarOferta[4];?>">
      </div>

      <div class="form-group">
        <label class="" for="sector">Sector:</label>
        <input type="text" class="form-control" id="sector" name="sector" value="<?php  echo $listarOferta[5];?>" disabled>
        <select name="sector" class='form-control'>
        <option  value="<?php echo $listarOferta[5]; ?>" >CAMBIAR SECTOR</option>
                   <option value="Desarrollo de Aplicaciones Web">Desarrollo de Aplicaciones Web</option>
                    <option value="Desarrollo de Aplicaciones Multiplataforma">Desarrollo de Aplicaciones Multiplataforma</option>
                    <option value="Administración y Finanzas">Administración y Finanzas</option>
                    <option value="Técnico Superior en Sonido">Técnico Superior en Sonido</option>
                </select>
      </div>

      <div class="form-group">
        <label class="" for="localidad">Localidad:</label>
        <input type="text" class="form-control" id="localidad"  name="localidad" value="<?php  echo $listarOferta[6];?>">
      </div>

      <div class="form-group">
        <label class="" for="estado">Estado de la oferta:</label>
        <input type="text" class="form-control" id="estado"  name="estado" value="<?php  echo $listarOferta[8];?>">
      </div>

        <div class="form-group">
        <label class="" for="descripcion" style="display:block">Descripcion de la oferta:</label>
    <textarea class="text-descripcion" name="descripcion" id="descripcion" cols="80" rows="10"><?php  echo $listarOferta[7];?></textarea>      
      </div>

      <button type="submit" class="btn btn-success">Editar</button>
    </form>
  </div>
  

  <script src="../../assets/js/jquery.min.js"></script>
  <script src="../../assets/css/bootstrap/js/bootstrap.js"></script>
  <script src="../../assets/js/dotdotdot.js"></script>

</body>


</html>