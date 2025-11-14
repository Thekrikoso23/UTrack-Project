<?php
require_once "../base.php"; 

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: ../login.php'); 
    exit;
}

$nombre_usuario = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROYECTO UTrack</title>
    <link rel="stylesheet" href="../Creacion_UTrack/menu.css">
</head>

<body>

    <header class="navbar">
        <div class="navbar-content">
            <img src="../Imagener_UTrack/image.png" alt="Logo de UTrack" class="logo">
            <nav class="navbar-links">
                <a href="../Estructura_UTrack/menu.php" class="active">UTrack</a>
                <a href="../Estructura_UTrack/mapa.php">Mapa</a>
                <a href="../Estructura_UTrack/comunidad.php">Comunidad</a>
                <a href="../Estructura_UTrack/estrategias.php">Estrategias de Estudio</a>
            </nav>

            <div class="navbar-user">
                <a href="../Estructura_UTrack/perfil.php" title="Perfil">
                    <img src="../Imagener_UTrack/Toros.png" alt="Los Toros" class="Toros">
                </a>
                <a href="../php.UTrack/logout.php" style="color:white; margin-left: 10px;">Cerrar Sesión</a>
            </div>
        </div>
    </header>

    <main class="content">
        <h1>¡BIENVENIDO, <?php echo htmlspecialchars($_SESSION['usuario']); ?>!</h1>
        <h3>¡Sigue tu camino sin perderte!</h3>
        <p class="content-title ">Enfoque del proyecto:</p>
        <p class="content-text">
            Facilitar la transición de los estudiantes de preparatoria a la vida universitaria en la UTCJ mediante una plataforma interactiva que ofrezca orientación, ubicación, mentoría y comunidad desde el primer día.
        </p>
        <br>
        <p>
            Empezar la universidad puede ser un reto, ¡pero no tienes que hacerlo solo!
            Aquí encontrarás apoyo, consejos y orientación para adaptarte más rápido a tu nueva etapa, conocer a otros estudiantes y aprovechar al máximo tu experiencia en la UTCJ.
        </p>
        <p>
            Desde cómo moverte por el campus hasta estrategias para rendir mejor en tus clases, UTrack te conecta con la información y las personas que te impulsarán a crecer.
        </p>
        <br>
        <p><strong>Tu historia universitaria comienza aquí. 💚</strong></p>
        <br>

    </main>

    <div class="carrusel"></div>

    <footer class="footer">
        <div class="footer-links">
            <a href="https://sise.utcj.edu.mx/" target="_blank" rel="noopener noreferrer">🌐 SISE UTCJ</a>
            <a href="https://www.facebook.com/SOYUTCJ" target="_blank" rel="noopener noreferrer">📘 Facebook</a>
            <a href="mailto:contacto@utrack.com">📧 Correo</a>
        </div>
    </footer>

</body>

</html>