<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Arreglo de Números Pares</title>
</head>
<body>
    <form action="" method="POST">
        <label for="numero">Ingrese un número par:</label>
        <input type="number" id="numero" name="numero" required>
        <button type="submit">Añadir</button>
    </form>

    <?php
    session_start();
    if (!isset($_SESSION['arreglo'])) {
        $_SESSION['arreglo'] = array();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $numero = $_POST['numero'];
        if ($numero % 2 == 0) {
            $_SESSION['arreglo'][] = $numero;
        } else {
            echo "El número no es par. Inténtelo de nuevo.<br>";
        }
    }

    if (!empty($_SESSION['arreglo'])) {
        echo "Arreglo: " . implode(", ", $_SESSION['arreglo']);
    }
    ?>
</body>
</html>
