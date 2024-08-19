<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Inicio de sesion</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <h1> Inicion de sesion</h1>
        <form action="login.php" method="post">
            <label for="username">nombre de usuario:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Iniciar sesion</button>
        </form>
    </body>
</html>

<?php   
session_start( );
include 'conexion.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql ="SELECT * FROM usuarios WHERE username= '$username'";
    $result= $conn->query($sql);
    if($result ->num_rows >0) {
        $row = $result->fetch_assoc();
        if(password_verify($password, $row['password'])){
            $_SESSION['username']= $username;
            header('location: index.php');
        } else{
            echo" contraseña incorrecta";
        }
    }else {
        echo "usuario no encontrado ";
    }
    $conn->close();
}
?>