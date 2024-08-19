<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Tarea</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Crear Nueva Tarea</h1>
    <form action="create_task.php" method="post">
        <label for="title">Título:</label>
        <input type="text" id="title" name="title" required><br>

        <label for="description">Descripción:</label>
        <textarea id="description" name="description" required></textarea><br>

        <label for="commitment_date">Fecha de Compromiso:</label>
        <input type="date" id="commitment_date" name="commitment_date" required><br>

        <label for="responsible">Responsable:</label>
        <input type="text" id="responsible" name="responsible" required><br>

        <label for="task_type">Tipo de Tarea:</label>
        <input type="text" id="task_type" name="task_type" required><br>

        <input type="submit" value="Crear Tarea">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $status = 'por hacer';
        $commitment_date = $_POST['commitment_date'];
        $edited_flag = 0;
        $responsible = $_POST['responsible'];
        $task_type = $_POST['task_type'];

        $sql = "INSERT INTO tasks (title, description, status, commitment_date, edited_flag, responsible, task_type)
                VALUES ('$title', '$description', '$status', '$commitment_date', '$edited_flag', '$responsible', '$task_type')";

        if ($conn->query($sql) === TRUE) {
            echo "Nueva tarea creada exitosamente";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
    ?>
</body>
</html>
