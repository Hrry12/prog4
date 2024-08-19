<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = htmlspecialchars($_POST['first_name']);
    $last_name = htmlspecialchars($_POST['last_name']);
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $tel = htmlspecialchars($_POST['tel']);
    $password = htmlspecialchars($_POST['password']);
    $confirmed_password = htmlspecialchars($_POST['confirmed_password']);

    // Verificar si las contraseñas coinciden
    if ($password != $confirmed_password) {
        echo "Las contraseñas no coinciden.";
        exit;
    }

    // Mostrar los datos ingresados
    echo "<h2>Datos ingresados:</h2>";
    echo "First Name: " . $first_name . "<br>";
    echo "Last Name: " . $last_name . "<br>";
    echo "Username: " . $username . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Tel. Number: " . $tel . "<br>";
    echo "Password: " . $password . "<br>"; // Nota: No es seguro mostrar la contraseña en pantalla
}
?>
