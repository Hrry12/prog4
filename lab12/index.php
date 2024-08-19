<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD con PHP</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Formulario de Estudiantes</h1>
    <p>Bienvenido, <?php echo $_SESSION['username']; ?> | <a href="logout.php">Cerrar Sesión</a></p>
    <form action="insertar.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>
        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" required><br>
        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" required><br>
        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" required><br>
        <label for="curso">Curso:</label>
        <input type="text" id="curso" name="curso" required><br>
        <button type="submit">Insertar</button>
        <button type="button" onclick="window.location.href='mostrar.php'">Mostrar</button>
    </form>
</body>
</html>
