<?php
include'conexion.php';
if($_SERVER['REQUEST_METHOD']== 'GET' && isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="delete from estudiantes where id=$id";
    if($conn->query($sql)===TRUE){
        echo"registro eliminado correctamente ";
    } else {
        echo"error: " . $conn->error;
    }
} else {
    echo "Id no proporcionado";
}
$conn->close();
?>
<button onclick="window.location.href='mostrar.php'"> Volver</button>