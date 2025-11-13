<?php
require_once "base.php";
session_start();

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

            if (password_verify($password, $usuario["password_hash"])) {

                $_SESSION["usuario"] = $usuario["nombre_usuario"];

                echo "<script>
                        alert('Bienvenido {$usuario['nombre_usuario']}');
                        window.location.href='../Estructura_UTrack/menu.html';
                      </script>";
                exit;
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
