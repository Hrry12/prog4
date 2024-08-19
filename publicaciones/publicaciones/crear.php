<?php
include 'funciones.php';

csrf();
if (isset($_POST['submit']) && !hash_equals($_SESSION['csrf'], $_POST['csrf'])) {
  die();
}

if (isset($_POST['submit'])) {
  $resultado = [
    'error' => false,
    'mensaje' => 'La publicación ha sido agregada con éxito'
  ];

  $config = include 'config.php';

  try {
    $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
    $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

    // Procesar la imagen
    $imagen_url = '';
    if (!empty($_FILES['imagen']['name'])) {
        $target_dir = "uploads/imagenes/";
        $target_file = $target_dir . basename($_FILES["imagen"]["name"]);
        move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file);
        $imagen_url = $target_file;
    }

    // Procesar el video
    $video_url = '';
    if (!empty($_FILES['video']['name'])) {
        $target_dir = "uploads/videos/";
        $target_file = $target_dir . basename($_FILES["video"]["name"]);
        move_uploaded_file($_FILES["video"]["tmp_name"], $target_file);
        $video_url = $target_file;
    }

    $publicacion = [
      "usuario_id"   => $_POST['usuario_id'],  // ID del usuario autenticado
      "titulo" => $_POST['titulo'],
      "contenido"    => $_POST['contenido'],
      "imagen_url"   => $imagen_url,
      "video_url"    => $video_url,
      "fecha_creacion" => date('Y-m-d H:i:s')
    ];

    $consultaSQL = "INSERT INTO publicaciones (usuario_id, titulo, contenido, imagen_url, video_url, fecha_creacion)";
    $consultaSQL .= "values (:" . implode(", :", array_keys($publicacion)) . ")";

    $sentencia = $conexion->prepare($consultaSQL);
    $sentencia->execute($publicacion);

  } catch(PDOException $error) {
    $resultado['error'] = true;
    $resultado['mensaje'] = $error->getMessage();
  }
}
?>

<?php include 'templates/header.php'; ?>

<?php
if (isset($resultado)) {
  ?>
  <div class="container mt-3">
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-<?= $resultado['error'] ? 'danger' : 'success' ?>" role="alert">
          <?= $resultado['mensaje'] ?>
        </div>
      </div>
    </div>
  </div>
  <?php
}
?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="mt-4">Agregar Publicación</h2>
      <hr>
      <form method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="titulo">Título</label>
          <input type="text" name="titulo" id="titulo" class="form-control">
        </div>
        <div class="form-group">
          <label for="contenido">Contenido</label>
          <textarea name="contenido" id="contenido" class="form-control"></textarea>
        </div>
        <div class="form-group">
          <label for="imagen">Subir Imagen</label>
          <input type="file" name="imagen" id="imagen" class="form-control" accept="image/*">
        </div>
        <div class="form-group">
          <label for="video">Subir Video</label>
          <input type="file" name="video" id="video" class="form-control" accept="video/*">
        </div>
        <div class="form-group">
          <input name="csrf" type="hidden" value="<?php echo escapar($_SESSION['csrf']); ?>">
          <input type="submit" name="submit" class="btn btn-primary" value="Enviar">
          <a class="btn btn-primary" href="index.php">Regresar al inicio</a>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include 'templates/footer.php'; ?>
