<?php
$conn= new mysqli('localhost','root','','huella');
if($conn->connect_error){
    die("conexion fallida: ".$conn->connect_error);
}
?>