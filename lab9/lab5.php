<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Matriz Identidad</title>
</head>
<body>
    <?php
    $orden = $_POST['orden'];

    if ($orden % 2 != 0) {
        echo "El orden debe ser un número par.";
    } else {
        echo "<table border='1'>";
        for ($i = 0; $i < $orden; $i++) {
            echo "<tr>";
            for ($j = 0; $j < $orden; $j++) {
                if ($i == $j) {
                    echo "<td>1</td>";
                } else {
                    echo "<td>0</td>";
                }
            }
            echo "</tr>";
        }
        echo "</table>";
    }
    ?>
</body>
</html>
