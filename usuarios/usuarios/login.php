<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset ="UTF-8">
        <title>Inicio de Sesion</title>
        <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Inicio de Sesion</h1>
<form action="login.php" method="POST">
    <label for=nombre>Nombre de Usuario:</label>
    <input type="text" id="nombre" name="nombre" required><br>
    <label for=password>Contraseña:</label>
    <input type="password" id="password" name="password" required><br>
    <button type="submit">Iniciar Sesion</button>
    <button type="button" onclick="window.location.href='registro.php'">Crear Usuario</button>
</form>
</body>
</html>
<?php   
session_start( );
include 'conexion.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];
    $sql ="SELECT * FROM usuarios WHERE nombre= '$nombre'";
    $result= $conn->query($sql);
    if($result ->num_rows >0) {
        $row = $result->fetch_assoc();
        if(password_verify($password, $row['password'])){
            $_SESSION['nombre']= $nombre;
            header('location: home.php');
        } else{
            echo" contraseña incorrecta";
        }
    }else {
        echo "usuario no encontrado ";
    }
    $conn->close();
}
?>