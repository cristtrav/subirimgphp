<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $carpetaImagenes = "galeria"; // Nombre de la carpeta que contiene las imagenes
    if(is_readable($carpetaImagenes)): // Comprobar si el servidor Apache tiene permisos para leer la carpeta
      $archivos = scandir($carpetaImagenes); // Obtener la lista de archivos existentes en la carpeta
      $archivos = array_slice($archivos, 2); // Remover los 2 primeros items que son comodines
      if(count($archivos) == 0): ?>
        <div>Ninguna imágen en la galería.</div>
      <?php endif;
      for ($i = 0; $i < count($archivos); $i++): // Recorrer la lista de archivos ?>
      <a href="<?= $carpetaImagenes ?>/<?= $archivos[$i] ?>">
        <img width="300" src="<?= $carpetaImagenes //Carpeta de imagenes ?>/<?= $archivos[$i] //nombre del archivo ?>">
      </a>

      <?php endfor;
    else: ?>
      El servidor no tiene permisos para leer la carpeta: <span style="font-weight: boldl"><?= $carpetaImagenes ?></span>
    <?php endif; ?>
    <form method="post" action="procesoarchivo.php" enctype="multipart/form-data">
      <input name="archivo" type="file" />
      <input type="submit" value="Subir" />
    </form>
  </body>
</html>
