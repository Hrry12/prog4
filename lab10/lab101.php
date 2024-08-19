<?php
if (is_uploaded_file ($_FILES['nombre_archivo_cliente'] ['tmp_name']))
{
    $nombredirectorio = " ";
    $nombrearchivo = $_FILES['nombre_archivo_cliente'] ['name'];
    $nombrecompleto =$nombredirectorio . $nombrearchivo;
    if (is_file ($nombrecompleto))
    {
        $idunico=time();
        $nombrearchivo=$idunico . "-" . $nombrearchivo;
        echo "archivo repetido, se cambiara el nombnre a $nombrearchivo
        <br><br>";
    }
    
    move_uploaded_file ( $_FILES['nombre_archivo_cliente'] ['tmp_name'],
    $nombredirectorio . $nombrearchivo);

    echo "el archivo se ha subido satisfactoriamente al directorio
    $nombrearchivo <br>";
} 
else
echo "no se ha podido subir el archivo <br>";
?>