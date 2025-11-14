<?php
session_start();
// Esto YA INICIA LA SESIÓN
require_once "base.php";

// session_start(); se eliminó de aquí porque ya está en base.php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = $_POST["correo"] ?? "";
    $password = $_POST["password"] ?? "";

    if (empty($email) || empty($password)) {
        echo "<script>alert('Por favor completa todos los campos'); window.history.back();</script>";
        exit;
    }

    try {
        $db = new Base();
        $conn = $db->conectar();

        $query = "SELECT * FROM usuarios WHERE email = :email LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            // Asumiendo que tu columna de contraseña se llama 'password_hash'
            if (password_verify($password, $usuario["password_hash"])) {

                // ¡ÉXITO! Guardamos los datos en la sesión
                $_SESSION["usuario"] = $usuario["nombre_usuario"];
                
                // ¡RECOMENDADO! Guarda también el ID
                $_SESSION["usuario_id"] = $usuario["id"]; // Asumiendo que la columna se llama 'id'
                $_SESSION["logged_in"] = true;

                // 2. ¡REDIRECCIÓN CORREGIDA!
                // Redirigimos a un archivo .php, no .html
                header('Location: ../Estructura_UTrack/menu.php');
                exit; // ¡Importante! Detener el script después de redirigir.

            } else {
                echo "<script>alert('Contraseña incorrecta'); window.history.back();</script>";
            }
        } else {
            echo "<script>alert('Correo no encontrado'); window.history.back();</script>";
        }

    } catch (PDOException $e) {
        echo "<script>alert('Error: " . addslashes($e->getMessage()) . "');</script>";
    }
}
?>