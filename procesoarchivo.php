<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    //Se comprueba si en el array $_FILES se recibio el archivo
    if(isset($_FILES["archivo"]) && $_FILES["archivo"]["error"] == UPLOAD_ERR_OK ):
      $fileTmpPath = $_FILES['archivo']['tmp_name']; // Extraer la carpeta temporal donde esta el archivo
      $fileName = $_FILES['archivo']['name']; // Extraer el nombre del archivo
      $fileSize = $_FILES['archivo']['size']; // Extraer el tamaño del archivo por si se desea limitar
      $fileType = $_FILES['archivo']['type']; // Extraer la extension (tipo) de archivo.

      $fileNameCmps = explode(".", $fileName); // Separar el nombre del archivo de su extension
      $fileExtension = strtolower(end($fileNameCmps)); // Extraer la extension del archivo

      $carpetaDestino = "galeria"; // La carpeta donde se guardaran las imagenes subidas

      $allowedfileExtensions = array('jpg', 'gif', 'png'); // Extensiones (tipos) de archivos permitidos
      if(in_array($fileExtension, $allowedfileExtensions)): // Comprobar si la extension del archivo se encuentra entre los permitidos
        if(is_writable($carpetaDestino)): // Comprobar si el servidor Apache puede escribir en la carpeta de destino
          $archivos = scandir($carpetaDestino); // Traer la lista de archivos dentro de la carpeta de destino
          $nombreArchivoDestino = "img".(count($archivos)-1); // Generar un nombre para el archivo a guardar contando los archivos existentes
          $archivoOrigen = $fileTmpPath."/".$fileName; // Generar la ruta completa del archivo temporal a ser movido
          $arachivoDestino = $carpetaDestino."/".$nombreArchivoDestino.".".$fileExtension; // Generar la ruta relativa a la en donde sera guardado el archivo
          /* Si se desea mantener el nombre original del archivo utilizar a continuacion:
            if(move_uploaded_file( $fileTmpPath, $fileName)): ?>
          */
          if(move_uploaded_file( $fileTmpPath, $arachivoDestino)): //Mover el archivo y comprobar si la accion se realizo correctamente ?>

            <div>Guardado Correctamente</div>
            <a href="index.php">Volver</a>
          <?php else: ?>
            <div>Error al guardar</div>
            <a href="index.php">Volver</a>
          <?php endif;
        else: ?>
          <div>El servidor no tiene permisos para escribir en la carpeta: <?= $carpetaDestino ?></div>
          <a href="index.php">Volver</a>
        <?php endif;
      else: ?>
        <div>tipo de archivo no permitido: <?= $fileType ?></div>
        <a href="index.php">Volver</a>
      <?php endif;
    else: ?>
      <div>Error al subir archivo: <?= $_FILES["archivo"]["error"] ?></div>
      <a href="index.php">Volver</a>
    <?php endif; ?>
  </body>
</html>
