<?php
include 'funciones.php';

csrf();
if (isset($_POST['submit']) && !hash_equals($_SESSION['csrf'], $_POST['csrf'])) {
  die();
}

$config = include 'config.php';

$resultado = [
  'error' => false,
  'mensaje' => ''
];

if (!isset($_GET['id'])) {
  $resultado['error'] = true;
  $resultado['mensaje'] = 'La publicación no existe';
}

if (isset($_POST['submit'])) {
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
      "id"           => $_GET['id'],
      "titulo"       => $_POST['titulo'],
      "contenido"    => $_POST['contenido'],
      "imagen_url"   => $imagen_url,
      "video_url"    => $video_url
    ];
    
    $consultaSQL = "UPDATE publicaciones SET
        titulo = :titulo,
        contenido = :contenido,
        imagen_url = :imagen_url,
        video_url = :video_url,
        fecha_creacion = NOW()
        WHERE id = :id";
    $consulta = $conexion->prepare($consultaSQL);
    $consulta->execute($publicacion);

  } catch(PDOException $error) {
    $resultado['error'] = true;
    $resultado['mensaje'] = $error->getMessage();
  }
}

try {
  $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
  $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);
    
  $id = $_GET['id'];
  $consultaSQL = "SELECT * FROM publicaciones WHERE id =" . $id;

  $sentencia = $conexion->prepare($consultaSQL);
  $sentencia->execute();

  $publicacion = $sentencia->fetch(PDO::FETCH_ASSOC);

  if (!$publicacion) {
    $resultado['error'] = true;
    $resultado['mensaje'] = 'No se ha encontrado la publicación';
  }

} catch(PDOException $error) {
  $resultado['error'] = true;
  $resultado['mensaje'] = $error->getMessage();
}
?>

<?php require "templates/header.php"; ?>

<?php
if ($resultado['error']) {
  ?>
  <div class="container mt-2">
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-danger" role="alert">
          <?= $resultado['mensaje'] ?>
        </div>
      </div>
    </div>
  </div>
  <?php
}
?>

<?php
if (isset($_POST['submit']) && !$resultado['error']) {
  ?>
  <div class="container mt-2">
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-success" role="alert">
          La publicación ha sido actualizada correctamente
        </div>
      </div>
    </div>
  </div>
  <?php
}
?>

<?php
if (isset($publicacion) && $publicacion) {
  ?>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 class="mt-4">Editando la Publicación</h2>
        <hr>
        <form method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" name="titulo" id="titulo" value="<?= escapar($publicacion['titulo']) ?>" class="form-control">
          </div>
          <div class="form-group">
            <label for="contenido">Contenido</label>
            <textarea name="contenido" id="contenido" class="form-control"><?= escapar($publicacion['contenido']) ?></textarea>
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
            <input type="submit" name="submit" class="btn btn-primary" value="Actualizar">
            <a class="btn btn-primary" href="index.php">Regresar al inicio</a>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php
}
?>

<?php require "templates/footer.php"; ?>
