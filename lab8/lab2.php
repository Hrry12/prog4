<?php 
$precio1 = $_POST['precio1'];
$precio2 = $_POST['precio2'];
$precio3 = $_POST['precio3'];
$media = ($precio1+$precio2+$precio3)/3;
echo "</br> Datos Recibidos";
echo "</br> Precio producto establecimiento 1: ". $precio1. "doalres";
echo "</br> Precio producto establecimiento 2: ". $precio2. "doalres";
echo "</br> Precio producto establecimiento 3: ". $precio3. "doalres";
echo "</br> el precio medio del producto es de : ". $media. "doalres";
?>