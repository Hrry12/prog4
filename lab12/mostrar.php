<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title> Mostrar Estudiantes</title>
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <h1> Lista de Estudiantes</h1>
        <?php
        include 'conexion.php';
        $sql ="select * from estudiantes";
        $result=$conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<table><tr><th>ID</th><th>Nombre</th><th>Correo</th><th>Teléfono</th><th>Dirección</th><th>Curso</th><th>Acciones</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["id"]."</td><td>".$row["nombre"]."</td><td>".$row["correo"]."</td><td>".$row["telefono"]."</td><td>".$row["direccion"]."</td><td>".$row["curso"]."</td>";
                echo "<td><a href='actualizar.php?id=".$row["id"]."'>Actualizar</a> | <a href='eliminar.php?id=".$row["id"]."'>Eliminar</a></td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 resultados";
        }
        $conn->close();
        ?>
        <button onclick="window.location.href='index.php'">Volver</button>
    </body>
</html>