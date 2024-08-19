<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Registro de Usiario</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <h1> registro de usuario</h1>
        <form action="registro.php" method="post">
            <label for="username">nombre de usuario:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Registrar</button>
        </form>
    </body>
</html>

<?php
include 'conexion.php';
if ($_SERVER['REQUEST_METHOD']== 'POST'){
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $sql ="INSERT INTO usuarios (username, password) VALUES ('$username', '$password')";
    if ($conn->query($sql)=== TRUE){
        echo "registo exitoso";
    } else {
        echo"error: ". $sql. "<br>".$conn->error;
    }
    $conn->close();
}
?>
<button onclick="window.location.href='login.php'">Iniciar session</button>