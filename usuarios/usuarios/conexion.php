<?php
$conn = new mysqli('localhost', 'root', '', 'proyectof');
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>