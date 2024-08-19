<?php
$conn= new mysqli('localhost','root','','crud_estudiantes');
if($conn->connect_error){
    die("conexion fallida: ".$conn->connect_error);
}
?>