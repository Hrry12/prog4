<?php
function factorial($numero) {
    if ($numero <= 1) {
        return 1;
    } else {
        return $numero * factorial($numero - 1);
    }
}

$numero = 5; // Puedes cambiar este valor para calcular el factorial de otro número
echo "El factorial de $numero es: " . factorial($numero) . "\n";
?>