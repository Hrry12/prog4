<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Inicializar variables y mensajes de error
    $nombre = $email = $edad = $url = "";
    $nombreErr = $emailErr = $edadErr = $urlErr = "";

    // Validar nombre
    if (empty($_POST["nombre"])) {
        $nombreErr = "El nombre es requerido.";
    } else {
        $nombre = test_input($_POST["nombre"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $nombre)) {
            $nombreErr = "Solo se permiten letras y espacios en blanco.";
        }
    }

    // Validar email
    if (empty($_POST["email"])) {
        $emailErr = "El email es requerido.";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Formato de email inválido.";
        }
    }

    // Validar edad
    if (empty($_POST["edad"])) {
        $edadErr = "La edad es requerida.";
    } else {
        $edad = test_input($_POST["edad"]);
        if (!filter_var($edad, FILTER_VALIDATE_INT)) {
            $edadErr = "La edad debe ser un número entero.";
        }
    }

    // Validar URL
    if (!empty($_POST["url"])) {
        $url = test_input($_POST["url"]);
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            $urlErr = "Formato de URL inválido.";
        }
    }

    // Mostrar resultados si no hay errores
    if (empty($nombreErr) && empty($emailErr) && empty($edadErr) && empty($urlErr)) {
        echo "Nombre: $nombre<br>";
        echo "Email: $email<br>";
        echo "Edad: $edad<br>";
        echo "Sitio Web: $url<br>";
    } else {
        // Mostrar mensajes de error
        echo $nombreErr . "<br>";
        echo $emailErr . "<br>";
        echo $edadErr . "<br>";
        echo $urlErr . "<br>";
    }
}

// Función para limpiar datos
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
