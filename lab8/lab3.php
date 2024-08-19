<html>
    <head>
        <title> laboratorio 3 </title>
    </head>
    <body> 
        <?php

        if( array_key_exists('enviar', $_POST)) {
            if ($_REQUEST ['apellido'] != "" )
            {
                echo "el apellido ingresado es : $_REQUEST[apellido]";
            }
            else 
            {
                echo "Favor coloque el apellido";
            }
            
            echo "</br>";

            if ($_REQUEST['nombre'] != "" )
            {
                echo "El nombre ingresado es: $_REQUEST[nombre]";
            }
            else 
            {
                echo "Favor coloque el nombre";
            }
        }
        else {
            ?>
            <form action ="lab3.php" method="post">
                Nombre: <input type="text" name="nombre"><br>
                Apellido: <input type="text" name="apellido"><br>
                <input type="submit" name="enviar" value="enviar datos">
            </form>
            <?php
        }
        ?>
    </body>
</html> 