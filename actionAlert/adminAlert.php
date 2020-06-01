<?php
      if (isset($_SESSION["insertado"]))
  {?>
        <div class="alert alert-success alert-dismissible">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Exito!</strong> La oferta fue creada
    </div>
  <?php
    unset($_SESSION["insertado"]); }
?>


<?php
      if (isset($_SESSION["error"]))
  {?>
        <div class="alert alert-danger alert-dismissible">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Error!</strong> Debes completar todos los campos.
    </div>
  <?php
    unset($_SESSION["error"]); }
  ?>  



<?php
      if (isset($_SESSION["eliminado"]))
  {?>
        <div class="alert alert-danger alert-dismissible">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Exito!</strong> Se ha sido eliminada correctamente
    </div>
  <?php
    unset($_SESSION["eliminado"]); }
  ?> 



 <?php
      if (isset($_SESSION["editado"]))
  {?>
        <div class="alert alert-info alert-dismissible">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Exito!</strong> La informacion se ha actualizado correctamente
    </div>
  <?php
    unset($_SESSION["editado"]); }
    ?> 