<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio de Sesion</title>
</head>
<body>
    <h1>Inicio de Sesion</h1>
    <form action="login.php" method="POST">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit">Iniciar Sesion</button>
    </form><br>
    <button onClick="window.location.href='registro.php'">Registrar usuario</button>
</body>
</html>


<?php
session_start();
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consulta con JOIN para obtener el nombre del rol
    $sql = "SELECT users.username, users.password, roles.rol AS rol 
            FROM users 
            JOIN roles ON users.role_id = roles.id 
            WHERE users.username = '$username'";
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verifica la contraseña
        if (password_verify($password, $row['password'])) {
            // Guarda el username y el rol en la sesión
            $_SESSION['username'] = $username;
            $_SESSION['rol'] = $row['rol']; // Guarda el nombre del rol

            // Redirige al usuario al archivo index.php
            header('Location: index.php');
            exit();
        } else {
            echo "Contraseña incorrecta";
        }
    } else {
        echo "Usuario no encontrado";
    }

    $conn->close();
}
?>

