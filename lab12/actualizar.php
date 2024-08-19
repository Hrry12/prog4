<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Estudiante</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Actualizar Estudiante</h1>
    <?php
    include 'conexion.php';
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM estudiantes WHERE id=$id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<form action='actualizar.php' method='POST'>";
            echo "<input type='hidden' name='id' value='".$row['id']."'>";
            echo "<label for='nombre'>Nombre:</label>";
            echo "<input type='text' id='nombre' name='nombre' value='".$row['nombre']."' required><br>";
            echo "<label for='correo'>Correo:</label>";
            echo "<input type='email' id='correo' name='correo' value='".$row['correo']."' required><br>";
            echo "<label for='telefono'>Teléfono:</label>";
            echo "<input type='text' id='telefono' name='telefono' value='".$row['telefono']."' required><br>";
            echo "<label for='direccion'>Dirección:</label>";
            echo "<input type='text' id='direccion' name='direccion' value='".$row['direccion']."' required><br>";
            echo "<label for='curso'>Curso:</label>";
            echo "<input type='text' id='curso' name='curso' value='".$row['curso']."' required><br>";
            echo "<button type='submit'>Guardar</button>";
            echo "</form>";
        } else {
            echo "Registro no encontrado";
        }
    } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $curso = $_POST['curso'];
        $sql = "UPDATE estudiantes SET nombre='$nombre', correo='$correo', telefono='$telefono', direccion='$direccion', curso='$curso' WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            echo "Registro actualizado exitosamente";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
    ?>
    <button onclick="window.location.href='mostrar.php'">Volver</button>
</body>
</html>

