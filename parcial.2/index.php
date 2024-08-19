<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Tareas</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Lista de Tareas</h1>
    <a href="create_task.php">Crear Nueva Tarea</a>
    <h2>Por Hacer</h2>
    <ul>
        <?php
        $result = $conn->query("SELECT * FROM tasks WHERE status = 'por hacer'");
        while ($row = $result->fetch_assoc()) {
            echo "<li>{$row['title']} - <a href='edit_task.php?id={$row['id']}'>Editar</a> | <a href='delete_task.php?id={$row['id']}'>Eliminar</a></li>";
        }
        ?>
    </ul>
    <h2>En Progreso</h2>
    <ul>
        <?php
        $result = $conn->query("SELECT * FROM tasks WHERE status = 'en progreso'");
        while ($row = $result->fetch_assoc()) {
            echo "<li>{$row['title']} - <a href='edit_task.php?id={$row['id']}'>Editar</a> | <a href='delete_task.php?id={$row['id']}'>Eliminar</a></li>";
        }
        ?>
    </ul>
    <h2>Terminadas</h2>
    <ul>
        <?php
        $result = $conn->query("SELECT * FROM tasks WHERE status = 'terminada'");
        while ($row = $result->fetch_assoc()) {
            echo "<li>{$row['title']} - <a href='edit_task.php?id={$row['id']}'>Editar</a> | <a href='delete_task.php?id={$row['id']}'>Eliminar</a></li>";
        }
        ?>
    </ul>
</body>
</html>

<?php $conn->close(); ?>
