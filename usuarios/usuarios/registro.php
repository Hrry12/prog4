<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
</head>
<body>
    <h1>Registro de Usuario</h1>
    <form method="post" action="registro.php">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="contra">Contraseña:</label>
        <input type="password" id="contra" name="contra" required>
        <br>
        <label for="rol">Rol:</label>
        <select id="rol" name="rol" required>
            <option value="normal">Usuario Normal</option>
            <option value="administrador">Administrador</option>
        </select>
        <br>
        <input type="submit" value="Registrar">
        <button type="button" onclick="window.location.href='login.php'">Iniciar Sesión</button>
    </form>
</body>
</html>

<?php
include 'conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$contra = $_POST['contra']; 
$rol = $_POST['rol'];

if ($rol === 'administrador') {
    $sql_count = "SELECT COUNT(*) AS admin_count FROM usuarios WHERE rol = 'administrador'";
    $result = $conn->query($sql_count);
    $row = $result->fetch_assoc();
    if ($row['admin_count'] >= 4) {
        die("No se pueden registrar más administradores. El límite es 4.");
    }
}
$sql = "INSERT INTO usuarios (nombre, email, contra, rol) VALUES ('$nombre', '$email', '$contra', '$rol')";
if ($conn->query($sql) === TRUE) {
    echo "Registro exitoso.";
} else {
    echo "Error en el registro: " . $conn->error;
}
}
$conn->close();
?>
