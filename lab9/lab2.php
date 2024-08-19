<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado del Factorial</title>
</head>
<body>
    <?php
    function factorial($n) {
        if ($n == 0) {
            return 1;
        }
        return $n * factorial($n - 1);
    }

    $numero = $_POST['numero'];
    $resultado = factorial($numero);
    echo "<h1>El factorial de $numero es $resultado</h1>";
    ?>
</body>
</html>
