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
    <h4>¿Realmente desea eliminar la imagen?</h4>
    <div>
      <img src="<?= $carpetaImagenes."/".$_GET["imagen"] ?>" width="500" />
    </div>
    <div>
      <span style="margin-right: 20px">
        <a href="index.php">Volver</a>
      </span>
      <span>
        <a href="eliminar.php?imagen=<?= $_GET["imagen"] ?>">Eliminar</a>
      </span>
    </div>
  </body>
</html>
