<?php
include 'conexion.php';
if($_SERVER['REQUEST_METHOD']== 'POST') {
    $nombre=$_POST['nombre'];
    $correo=$_POST['correo'];
    $telefono=$_POST['telefono'];
    $direccion=$_POST['direccion'];
    $curso=$_POST['curso'];
    $sql = "INSERT INTO estudiantes (nombre, correo, telefono, direccion, curso) VALUES ('$nombre', '$correo', '$telefono', '$direccion', '$curso')";
    if($conn->query($sql)===TRUE){
        echo"registro insertado correctamente";
    } else {
        echo "error:". $sql."<BR>". $conn->error;
    }
    $conn->close();
}
?>
<button onclick="window.location.href='index.php'">Volver</button>