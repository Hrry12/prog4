<?php
// Parámetros de conexión a la base de datos
$servername = "localhost"; // Nombre del servidor (por lo general, 'localhost')
$username = "root"; // Usuario de MySQL (por lo general, 'root')
$password = ""; // Contraseña del usuario de MySQL (por lo general, vacío)
$dbname = "foro_social"; // Nombre de la base de datos
$port = "3310"; // Usa el puerto correcto

// Crear la conexión
$conn = mysqli_connect($servername, $username, $password, $dbname, $port);

if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

echo "Conexión exitosa a la base de datos";
mysqli_set_charset($conn, "utf8");
