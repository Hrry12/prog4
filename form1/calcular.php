<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $a = $_POST['numero_a'];
    $b = $_POST['numero_b'];
    $c = $_POST['numero_c'];
    $operacion = $_POST['operacion'];
    // Variable para almacenar el resultado
    $resultado = null;

    // Realizar la operación seleccionada
    switch ($operacion) {
        case 'positivo':
            $resultado = (-($b) + sqrt(( $b)**2 - (4 * $a * $c ))) / (2*$a);
            break;
        case 'negativo':
            $resultado =( -($b) - sqrt(( $b)**2 - (4 * $a * $c )) )/ (2*$a);
            break;

        default:
            $resultado = "Operación no válida.";
            break;
    }

    // Mostrar el resultado
    echo "Resultado de la operación ($operacion): $resultado";
} else {
    echo "Método no permitido.";
}
?>
