<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestionar Perfil</title>
    <link rel="stylesheet" type="text/css" href="css/styles_vistas.css">
</head>
<body>
    <form action="gestion.php" method="POST" enctype="multipart/form-data">
        <h1>Gestionar Perfil</h1>
        <label for="new_username">Nuevo Nombre de Usuario:</label>
        <input type="text" id="new_username" name="new_username" value="<?php echo htmlspecialchars($username); ?>" required><br>
        <label for="new_password">Nueva Contraseña (dejar en blanco si no desea cambiarla):</label>
        <input type="password" id="new_password" name="new_password"><br>
        <label for="profile_picture">Foto de Perfil (dejar en blanco si no desea cambiarla):</label>
        <input type="file" id="profile_picture" name="profile_picture"><br>
        <button type="submit">Actualizar Perfil</button>
        <button onclick="window.location.href='index.php'">Volver al Inicio</button>
    </form>
</body>
</html>
