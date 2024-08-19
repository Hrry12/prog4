<?php
session_start();
include('db_connection.php');

// Verificar si el usuario ha iniciado sesión
if(!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

// Obtener datos del usuario
$usuario_id = $_SESSION['usuario_id'];
$query = "SELECT * FROM usuarios WHERE id = $usuario_id";
$result = mysqli_query($conn, $query);
$usuario = mysqli_fetch_assoc($result);

// Actualizar datos del usuario
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    
    $update_query = "UPDATE usuarios SET nombre='$nombre', email='$email' WHERE id = $usuario_id";
    mysqli_query($conn, $update_query);
    header("Location: perfil.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - Foro Social</title>
    <link rel="stylesheet" href="estilo_perfil.css">
</head>
<body>
    <header>
        <h1>Perfil de Usuario</h1>
        <nav>
            <a href="home.php">Inicio</a>
            <a href="logout.php">Cerrar Sesión</a>
        </nav>
    </header>

    <section>
        <h2>Editar Información Personal</h2>
        <form method="POST" action="perfil.php">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="<?php echo htmlspecialchars($usuario['nombre']); ?>" required>
            
            <label for="email">Correo Electrónico:</label>
            <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($usuario['email']); ?>" required>
            
            <button type="submit">Guardar Cambios</button>
        </form>
    </section>
</body>
</html>
