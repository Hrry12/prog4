<?php
class coche{
    public $color;
    public $marca;

    public function arrancar(){
        echo "el coche ha arrancado<br>";
    }

    public function detener(){
        echo "el coche se ha detenido<br>";
    }

    public function descripcion(){
        echo "este es un coche normal<br>";
    }
}

// crear un objeto de la clase coche
$micoche =new coche();
$micoche->color ="rojo";
$micoche->marca ="toyota";
$micoche->descripcion();

//usar metodos del objeto
$micoche-> arrancar();
$micoche-> detener();

echo "color: " . $micoche->color . "<br>";
echo "marca: " . $micoche->marca . "<br>";

class cochedeportivo extends coche{
    public function turbo () {
        echo "el trubo esta activado<br>";
    } 
    public function descripcion(){
        echo "este es un coche normal<br>";
    }
}

// crear un objeto de la clase cochedeportivo
$micochedeportivo = new cochedeportivo();
$micochedeportivo -> color ="azul";
$micochedeportivo -> marca ="ferrari";
$micochedeportivo -> descripcion();

//usar metodos del objeto
$micochedeportivo->arrancar();
$micochedeportivo->turbo();
$micochedeportivo->detener();

echo "color: " . $micochedeportivo->color . "<br>";
echo "marca: " . $micochedeportivo->marca . "<br>";
?>