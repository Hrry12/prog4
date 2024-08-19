<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html leng="es">
<head>
    <meta charset="UTF-8">
    <title>SignUp</title>
    <link rel="stylesheet" type="text/css" href="css/styles_vistas.css">
</head>
<body>
    <form action="registro.php" method="POST">
        <h1>Registro de Usuario</h1>
        <label for="username">Nombre de Usuario:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br>
        <button type="submit">Registrar</button>
        <button onclick="window.location.href='index.php'">Volver al Inicio</button>
    </form>
</body>
</html>
