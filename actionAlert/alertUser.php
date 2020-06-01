 
 <?php
      if (isset($_SESSION["editado"]))
  {?>
        <div class="alert alert-success alert-dismissible">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Exito!</strong> Tu informacion se ha actualizado correctamente
    </div>
  <?php
    unset($_SESSION["editado"]); }
?>


<?php
      if (isset($_SESSION["error"]))
  {?>
        <div class="alert alert-danger alert-dismissible">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Error!</strong> Debes completar todos los campos, verificalo.
    </div>
  <?php
    unset($_SESSION["error"]); }
  ?>  