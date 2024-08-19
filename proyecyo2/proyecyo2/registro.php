<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Estudiante</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body id="regis">
    <h1 id="reg">Registro de Usuario</h1>
    <form action="registro.php" method="POST">
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" required><br><br>
        <label for="lastname">Apellido:</label>
        <input type="text" id="lastname" name="lastname" required><br><br>
        <label for="facultad">Facultad:</label>
        <input type="text" id="facultad" name="facultad" required><br><br>
        <label for="lic">Licenciatura:</label>
        <input type="text" id="lic" name="lic" required><br><br>
        <button id="back" type="submit">Registrar</button>
        <button id="back" type="button" onclick="window.location.href='calculo.php'">Ir a calculadora</button>

    </form>
</body>
</html>
<?php
include 'conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $facultad = $_POST['facultad'];
    $lic = $_POST['lic'];
    $sql = "INSERT INTO estudiante_latina (nombre, apellido, facultad, lic) VALUES ('$name', '$lastname', '$facultad', '$lic')";
    if ($conn->query($sql) === TRUE) {
        echo "Estudiante guardado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>
