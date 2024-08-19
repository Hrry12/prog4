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
</head>
<body>
    <p>Bienvenido, <?php echo $_SESSION['username']; ?> (Rol: <?php echo $_SESSION['rol']; ?>) | <a href="logout.php">Cerrar Sesión</a></p>
</body>
</html>

