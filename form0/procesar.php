<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : 'No definido';
    $intereses = isset($_POST['intereses']) ? $_POST['intereses'] : [];
    $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : 'No definido';
    $comentario = isset($_POST['comentario']) ? $_POST['comentario'] : 'No definido';
    $pais = isset($_POST['pais']) ? $_POST['pais'] : 'No definido';

    // Procesar archivo
    $nombreArchivo = $_FILES['archivo']['name'];
    $tipoArchivo = $_FILES['archivo']['type'];
    $tamañoArchivo = $_FILES['archivo']['size'];
    $nombreTemporal = $_FILES['archivo']['tmp_name'];
    move_uploaded_file($nombreTemporal, 'carpeta_destino/' . $nombreArchivo);

    echo "Nombre: $nombre<br>";
    echo "Intereses: " . implode(', ', $intereses) . "<br>";
    echo "Sexo: $sexo<br>";
    echo "Comentario: $comentario<br>";
    echo "País: $pais<br>";
}
?>
