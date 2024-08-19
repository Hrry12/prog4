<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <h1>Registrar Usuario</h1>
    <form action="registro.php" method="POST">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit">Registrar</button>
    </form>
</body>
</html>

<?php
include 'conexion.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

     // Verifica si el nombre de usuario ya existe
     $sql_check = "SELECT * FROM users WHERE username = '$username'";
     $result = $conn->query($sql_check);

     if ($result->num_rows > 0) {
        echo "El nombre de usuario '$username' ya existe, intente nuevamente.";
  } else {
        // Si no existe, insertar el nuevo usuario
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

    $sql = "INSERT INTO users (username, password) VALUES ('$username','$password')";
    if($conn->query($sql) === TRUE){
        echo "Registro exitoso";
    }else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
}
?>
<button onClick="window.location.href='login.php'">Iniciar Sesión</button>
