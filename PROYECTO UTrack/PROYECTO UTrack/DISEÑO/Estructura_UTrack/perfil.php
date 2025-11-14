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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Iniciar Sesión - UTrack</title>
  <link rel="stylesheet" href="../Creacion_UTrack/perfil.css" />
</head>

<body>
  <header class="navbar">
    <div class="navbar-content">
      <img src="../Imagener_UTrack/image.png" alt="Logo UTrack" class="logo">
      <nav class="navbar-links">
        <a class="active">UTrack</a>
      </nav>
      <div class="navbar-user">
        <img src="../Imagener_UTrack/Toros.png" alt="Usuario" class="Toros">
      </div>
    </div>
  </header>

  <main class="registro-main">
    <div class="registro-contenedor">
      <h1>Bienvenido de nuevo</h1>
      <h3>Inicia sesión</h3>

      <form class="registro-form" method="POST" action="../php_UTrack/login.php">

        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" placeholder="Ingresa tu correo" required>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" placeholder="Ingresa tu contraseña" required>

        <button type="submit">Iniciar Sesión</button>
      </form>

      <p class="texto-secundario">
        ¿No tienes cuenta?
        <a href="../Estructura_UTrack/toros.php" class="enlace-toros">Regístrate aquí</a>
      </p>

      <p class="texto-secundario">
        <a href="../Estructura_UTrack/recuperar.php" class="enlace-olvido">¿Olvidaste tu contraseña?</a>
      </p>

    </div>
  </main>

  <footer class="footer">
    <div class="footer-links">
      <a href="https://sise.utcj.edu.mx/" target="_blank">🌐 SISE UTCJ</a>
      <a href="https://www.facebook.com/SOYUTCJ" target="_blank">📘 Facebook</a>
      <a href="mailto:contacto@utrack.com">📧 Correo</a>
    </div>
  </footer>
</body>
</html>
