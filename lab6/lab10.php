<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" contente="text/html; charset=UTF-8">
        <title> lab 9</title>
    </head>    
    <body>
    <?php
        $persona = array(
            
            array("nombre"=> "rosa","estatura"=> 168,"sexo"=> "F"),
            array("nombre"=> "Ignacio","estatura"=> 175,"sexo"=> "M"),
            array("nombre"=> "Daniel","estatura"=> 172,"sexo"=> "M"),
            array("nombre"=> "Ruben","estatura"=> 182,"sexo"=> "M")
        );
        echo"<b>Datos sobre el Personal<b><br><hr>";
        
        $numPersonas = count($persona);

        for ($i = 0; $i < $numPersonas; $i++) {
            echo "Nombre: <br>", $persona[$i]['nombre'], "</br><br>";
            echo "Estatura: <br>", $persona[$i]['estatura'], "cm</br><br>";
            echo "Sexo: <br>", $persona[$i]['sexo'], "</br><br><hr>";
            }
    ?>
    </body>
</html>