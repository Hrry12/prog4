<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Tarea</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Editar Tarea</h1>
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $result = $conn->query("SELECT * FROM tasks WHERE id = $id");
        $row = $result->fetch_assoc();
    }
    ?>
    <form action="edit_task.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <label for="title">Título:</label>
        <input type="text" id="title" name="title" value="<?php echo $row['title']; ?>" required><br>

        <label for="description">Descripción:</label>
        <textarea id="description" name="description" required><?php echo $row['description']; ?></textarea><br>

        <label for="status">Estado:</label>
        <select id="status" name="status">
            <option value="por hacer" <?php if ($row['status'] == 'por hacer') echo 'selected'; ?>>Por Hacer</option>
            <option value="en progreso" <?php if ($row['status'] == 'en progreso') echo 'selected'; ?>>En Progreso</option>
            <option value="terminada" <?php if ($row['status'] == 'terminada') echo 'selected'; ?>>Terminada</option>
        </select><br>

        <label for="commitment_date">Fecha de Compromiso:</label>
        <input type="date" id="commitment_date" name="commitment_date" value="<?php echo $row['commitment_date']; ?>" required><br>

        <label for="responsible">Responsable:</label>
        <input type="text" id="responsible" name="responsible" value="<?php echo $row['responsible']; ?>" required><br>

        <label for="task_type">Tipo de Tarea:</label>
        <input type="text" id="task_type" name="task_type" value="<?php echo $row['task_type']; ?>" required><br>

        <input type="submit" value="Actualizar Tarea">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $status = $_POST['status'];
        $commitment_date = $_POST['commitment_date'];
        $edited_flag = 1;
        $responsible = $_POST['responsible'];
        $task_type = $_POST['task_type'];

        $sql = "UPDATE tasks SET
                title = '$title',
                description = '$description',
                status = '$status',
                commitment_date = '$commitment_date',
                edited_flag = '$edited_flag',
                responsible = '$responsible',
                task_type = '$task_type'
                WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            echo "Tarea actualizada exitosamente";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
    ?>
    </body>
    </html>