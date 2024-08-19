<?php
if (is_uploaded_file($_FILES['nombre_archivo_cliente']['tmp_name'])) {
    $nombreDirectorio = " ";
    $nombrearchivo = $_FILES['nombre_archivo_cliente']['name'];
    $nombreCompleto = $nombreDirectorio . $nombrearchivo;
    $tamañoArchivo = $_FILES['nombre_archivo_cliente']['size'];
    $tipoArchivo = $_FILES['nombre_archivo_cliente']['type'];
    $tiposPermitidos = array("image/jpeg", "image/jpg", "image/gif", "image/png");
    
    if ($tamañoArchivo > 1048576) {
        echo "El archivo es demasiado grande. El tamaño máximo permitido es 1MB.<br>";
    } elseif (!in_array($tipoArchivo, $tiposPermitidos)) {
        echo "El archivo no es un formato válido. Solo se permiten imágenes jpg, jpeg, gif y png.<br>";
    } else {
        if (is_file($nombreCompleto)) {
            $idUnico = time();
            $nombrearchivo = $idUnico . "-" . $nombrearchivo;
            echo "Archivo repetido, se cambiará el nombre a $nombrearchivo<br><br>";
        }
        move_uploaded_file($_FILES['nombre_archivo_cliente']['tmp_name'], $nombreDirectorio . $nombrearchivo);
        echo "El archivo se ha subido satisfactoriamente al directorio el archivo: $nombrearchivo<br>";
    }
} else {
    echo "No se ha podido subir el archivo<br>";
}
?>