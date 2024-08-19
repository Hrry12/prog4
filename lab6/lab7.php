<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> lab 7</title>
    </head>    
    <body>
        <?php
        $posicion = "arriba";

        switch ($posicion) {
            case "arriba":
                echo"La variable contiene";
                echo" El valor arriba ";
                break;
                case "abajo":
                    echo"La variable contiene";
                    echo" El valor abajo ";
                    break;
                default:
                echo "La variable contiene otro valor";
                echo "distinto de arriba y abajo";
                }
        ?>
    </body>
</html>