<?php
include 'funciones.php';

csrf();
if (isset($_POST['submit']) && !hash_equals($_SESSION['csrf'], $_POST['csrf'])) {
  die();
}

$error = false;
$config = include 'config.php';

try {
  $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
  $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

  if (isset($_POST['buscar'])) {
    $consultaSQL = "SELECT * FROM publicaciones WHERE titulo LIKE :buscar OR contenido LIKE :buscar";
    $buscar = "%" . $_POST['buscar'] . "%";
    $sentencia = $conexion->prepare($consultaSQL);
    $sentencia->bindParam(':buscar', $buscar, PDO::PARAM_STR);
  } else {
    $consultaSQL = "SELECT * FROM publicaciones";
    $sentencia = $conexion->prepare($consultaSQL);
  }

  $sentencia->execute();
  $publicaciones = $sentencia->fetchAll();

} catch(PDOException $error) {
  $error = $error->getMessage();
}

$titulo = isset($_POST['buscar']) ? 'Resultados de la búsqueda' : 'Lista de Publicaciones';
?>

<?php include "templates/header.php"; ?>

<?php
if ($error) {
  ?>
  <div class="container mt-2">
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-danger" role="alert">
          <?= $error ?>
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
      <h2 class="mt-3"><?= $titulo ?></h2>
      <form method="post" class="form-inline">
        <div class="form-group mr-3">
          <input type="text" id="buscar" name="buscar" placeholder="Buscar en publicaciones" class="form-control">
        </div>
        <input name="csrf" type="hidden" value="<?php echo escapar($_SESSION['csrf']); ?>">
        <button type="submit" name="submit" class="btn btn-primary">Buscar</button>
      </form>
      <a href="crear.php" class="btn btn-primary mt-4">Agregar Publicación</a>
      <hr>
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Título</th>
            <th>Contenido</th>
            <th>Imagen</th>
            <th>Video</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($publicaciones && $sentencia->rowCount() > 0) {
            foreach ($publicaciones as $fila) {
              ?>
              <tr>
                <td><?php echo escapar($fila["id"]); ?></td>
                <td><?php echo escapar($fila["titulo"]); ?></td>
                <td><?php echo escapar(substr($fila["contenido"], 0, 50)); ?>...</td>
                <td>
                  <?php if ($fila["imagen_url"]): ?>
                    <img src="<?php echo escapar($fila["imagen_url"]); ?>" width="100">
                  <?php endif; ?>
                </td>
                <td>
                  <?php if ($fila["video_url"]): ?>
                    <video width="100" controls>
                      <source src="<?php echo escapar($fila["video_url"]); ?>" type="video/mp4">
                    </video>
                  <?php endif; ?>
                </td>
                <td>
                  <a href="editar.php?id=<?= escapar($fila["id"]) ?>">✏️Editar</a>
                  <a href="borrar.php?id=<?= escapar($fila["id"]) ?>">🗑️Borrar</a>
                </td>
              </tr>
              <?php
            }
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php include "templates/footer.php"; ?>
