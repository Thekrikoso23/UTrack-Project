<?php
session_start();
// 1. Iniciar la sesión (a través de base.php)
require_once "base.php"; 

// 2. Eliminar todas las variables de sesión
$_SESSION = array();

// 3. Destruir la cookie de sesión (Buena práctica de seguridad)
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 4. Destruir la sesión en el servidor
session_destroy();


header("Location: login.php");
exit;
?>