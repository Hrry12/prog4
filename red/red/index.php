<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Forum</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<nav class="main-nav">
    <img src="https://1000logos.net/wp-content/uploads/2023/01/Myspace-Logo-2004.png" alt="Logo">
    <ul>
        <?php if (isset($_SESSION['username'])): ?>
            <li><a href="gestion.php">Perfil</a></li>
            <li><a href="logout.php">Logout</a></li>
        <?php else: ?>
            <li><a href="login.php">LogIn</a></li>
            <li><a href="registro.php">SignUp</a></li>
        <?php endif; ?>
    </ul>
    <div class="search-container">
        <form action="/buscador.php">
            <input type="text" placeholder="Search.." name="search">
            <button type="submit">Submit</button>
        </form>
    </div>
</nav>

<header>
    <nav class="navbar">
        <ul>
            <li><a href="#home">Inicio</a></li>
            <li><a href="#forum">Foro</a></li>
            <li><a href="#buscador">Buscador</a></li>
        </ul>
    </nav>
</header>

<main>
    <section>
        <h1>Publicaciones Recientes</h1>
        <?php
        include('red_tracker.php');
        $query = "SELECT * FROM publicaciones ORDER BY fecha_creacion DESC LIMIT 10";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)): ?>
            <div class="post">
                <h3><?php echo htmlspecialchars($row['titulo']); ?></h3>
                <p><?php echo htmlspecialchars($row['contenido']); ?></p>
                <small>Publicado por: <?php echo htmlspecialchars($row['usuario']); ?> el <?php echo htmlspecialchars($row['fecha_creacion']); ?></small>
            </div>
        <?php endwhile; ?>
    </section>
</main>
</body>
</html>
