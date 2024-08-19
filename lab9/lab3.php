<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mayor en Arreglo</title>
</head>
<body>
    <?php
    $arreglo = array();
    for ($i = 0; $i < 20; $i++) {
        do {
            $num = rand(1, 100);
        } while (in_array($num, $arreglo));
        $arreglo[] = $num;
    }

    $max_val = max($arreglo);
    $max_pos = array_search($max_val, $arreglo);

    echo "El valor mayor es $max_val y está en la posición $max_pos<br>";
    echo "Arreglo: " . implode(", ", $arreglo);
    ?>
</body>
</html>
