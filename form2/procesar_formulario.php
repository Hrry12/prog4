<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger y limpiar los datos del formulario
    $nombre = htmlspecialchars($_POST['nombre']);
    $email = htmlspecialchars($_POST['email']);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    // Validar que los campos no estén vacíos
    if (!empty($nombre) && !empty($email) && !empty($mensaje)) {
        // Puedes guardar los datos en una base de datos, enviar un correo, etc.
        
        echo "Nombre: " . $nombre . "<br>";
        echo "Email: " . $email . "<br>";
        echo "Mensaje: " . $mensaje . "<br>";
    } else {
        echo "Por favor, rellena todos los campos.";
    }
} else {
    echo "Método no permitido.";
}
?>
