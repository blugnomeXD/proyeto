

<!DOCTYPE html>
<html lang="es">

<head>
  <title>Editar Usuario</title>
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
        <a class="navbar-brand" href="gestor-usuarios.php">Editar Usuario</a>
      </div>
      <ul class="nav navbar-nav">
      <li><a href="seccion.php">Inicio</a></li>
      <li><a href="panel-admin.php">Añadir Oferta</a></li>
        <li><a href="gestor-ofertas.php">Gestor de Ofertas</a></li>
        <li class="active"><a href="gestor-usuarios.php">Gestor de Usuarios</a></li>
        <li><a href="../usoClases/logout.php">Cerrar Sesión</a></li>
      </ul>
    </div>
  </nav>
  <?php  

            $id = $_GET['id'];
            $listarUsuario = $administrador->mostrarPerfil($id);      
?>

<div class="container">
<h3>EDITAR USUARIO</h3> 
    <form class="" action="../actionAdmin/edit-user.php" method="GET">
    
      <div class="form-group">
        <input type="hidden" class="form-control" id="id"  name="id" value="<?php echo $listarUsuario[0]; ?>">
      </div>
      <div class="form-group">
        <label class="" for="nia">Nia:</label>
        <input type="text" class="form-control" id="nia"  name="nia" value="<?php echo $listarUsuario[1]; ?>">
      </div>
      <div class="form-group">
        <label class="" for="password">Contraseña:</label>
        <input type="text" class="form-control" id="password"  name="password" value="<?php echo $listarUsuario[2]; ?>">
      </div>
      <div class="form-group">
        <label class="" for="nombre">Nombre:</label>
        <input type="text" class="form-control" id="nombre"  name="nombre" value="<?php echo $listarUsuario[3]; ?>">
      </div>

      <div class="form-group">
        <label class="" for="apellidos">Apellidos:</label>
        <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $listarUsuario[4]; ?>">
      </div>

      <div class="form-group">
        <label class="" for="email">Email:</label>
        <input type="email" class="form-control" id="email"  name="email" value="<?php echo $listarUsuario[5]; ?>">
      </div>

      <div class="form-group">
        <label class="" for="telefono">Telefono:</label>
        <input type="number" class="form-control" id="telefono"  name="telefono" value="<?php echo $listarUsuario[6];  ?>">
      </div>

      <div class="form-group">
        <label class="" for="tipo">Tipo Usuario:</label>
        <input type="text" class="form-control" id="tipo"  name="tipo" value="<?php echo $listarUsuario[7]; ?>">
      </div>

      <div class="form-group">
        <label class="" for="especialidad">Especialida de estudio:</label>
        
        <input type="text" class="form-control  " id="especialidad"  name="especialidad" value="<?php echo $listarUsuario[8]; ?>" disabled>
        <select name="especialidad" class='form-control'>
                    <option  value="<?php echo $listarUsuario[8]; ?>" >CAMBIAR CURSO</option>
                    <option  value="Desarrollo de Aplicaciones Web">Desarrollo de Aplicaciones Web</option>
                    <option value="Desarrollo de Aplicaciones Multiplataforma">Desarrollo de Aplicaciones Multiplataforma</option>
                    <option value="Administración y Finanzas">Administración y Finanzas</option>
                    <option value="Técnico Superior en Sonido">Técnico Superior en Sonido</option>
        </select>
      </div>

      <div class="form-group">
        <label class="" for="bolsa">Bolsa de ofertas</label>
        <input type="text" class="form-control" id="bolsa"  name="bolsa" value=" <?php echo $listarUsuario[9];?>">
      </div>
      
      <button type="submit" class="btn btn-success">Editar</button>
    </form>
  </div>
  

  <script src="../../assets/js/jquery.min.js"></script>
  <script src="../../assets/css/bootstrap/js/bootstrap.js"></script>
 

</body>

</html>