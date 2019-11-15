<?php
  $carpetaImagenes = "galeria"; // Nombre de la carpeta que contiene las imagenes
 ?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
  <?php if(isset($_GET["imagen"])):
    if(unlink($carpetaImagenes."/".$_GET["imagen"])): ?>
      Eliminado correctamente
      <br />
      <a href="index.php">Volver</a>
    <?php else: ?>
      Error al eliminar
      <br />
      <a href="index.php">Volver</a>
    <?php endif;
  else: ?>
      No se especificó ninguna imagen
      <br />
      <a href="index.php">Volver</a>
  <?php  endif; ?>
  </body>
</html>
