
<?php
include 'conexion.php';
$query = "SELECT * FROM publicaciones ORDER BY fecha_creacion DESC LIMIT 10";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Foro Social</title>
    <link rel="stylesheet" href="estilo_inicio.css">
</head>
<body>
    <header>
        <h1>Bienvenido al Foro Social</h1>
        <nav>
            <a href="home.php">Inicio</a>
            <a href="login.php">Iniciar Sesión</a>
            <a href="registro.php">Registrarse</a>
        </nav>
    </header>

    <section>
        <h2>Publicaciones Recientes</h2>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
            <div class="post">
                <h3><?php echo htmlspecialchars($row['titulo']); ?></h3>
                <p><?php echo htmlspecialchars($row['contenido']); ?></p>
                <small>Publicado por: <?php echo htmlspecialchars($row['usuario']); ?> el <?php echo htmlspecialchars($row['fecha_creacion']); ?></small>
            </div>
        <?php endwhile; ?>
    </section>
</body>
</html>