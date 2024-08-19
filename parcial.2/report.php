<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Tareas</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Reporte de Tareas</h1>
    <h2>Por Tipo de Tarea</h2>
    <ul>
        <?php
        $result = $conn->query("SELECT task_type, COUNT(*) as count FROM tasks GROUP BY task_type");
        while ($row = $result->fetch_assoc()) {
            echo "<li>{$row['task_type']}: {$row['count']} tareas</li>";
        }
        ?>
    </ul>

    <h2>Por Estado</h2>
    <ul>
        <?php
        $result = $conn->query("SELECT status, COUNT(*) as count FROM tasks GROUP BY status");
        while ($row = $result->fetch_assoc()) {
            echo "<li>{$row['status']}: {$row['count']} tareas</li>";
        }
        ?>
    </ul>

    <h2>Por Fecha</h2>
    <ul>
        <?php
        $result = $conn->query("SELECT DATE(commitment_date) as date, COUNT(*) as count FROM tasks GROUP BY DATE(commitment_date)");
        while ($row = $result->fetch_assoc()) {
            echo "<li>{$row['date']}: {$row['count']} tareas</li>";
        }
        ?>
    </ul>
</body>
</html>

<?php $conn->close(); ?>
