<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado</title>
</head>
<body>
    <h1>Resultado del Desempeño en Ventas</h1>
    <?php
    // Obtener el valor del porcentaje de ventas ingresado por el usuario
    $ventas = $_POST['ventas'];

    // Verificar el valor del porcentaje y mostrar la imagen correspondiente
    if ($ventas > 80) {
        echo '<img src="supera_80.png" alt="Ventas > 80%">';
    } elseif ($ventas >= 50) {
        echo '<img src="entre_50_y_79.png" alt="Ventas 50% - 79%">';
    } else {
        echo '<img src="menos_50.png" alt="Ventas < 50%">';
    }
    ?>
    <br><br>
    <a href="lab1.html">Volver</a>
</body>
</html>