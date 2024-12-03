<?php
include 'administrador/configuración/db.php'; // Incluye la conexión a la base de datos

$Email = $_POST['Email'];
$Password = $_POST['Password'];

$sentenciaSQL = $conexion->prepare("SELECT * FROM usuarios WHERE Email = :Email");
$sentenciaSQL->bindParam(":Email", $Email);
$sentenciaSQL->execute();
$user = $sentenciaSQL->fetch();

if ($user) {
    if (password_verify($Password, $user['Password'])) {
        // Iniciar sesión del usuario
        session_start();
        $_SESSION['Email'] = $user['Email'];
        echo "<script>alert('Login exitoso'); window.location.href='inicio.php';</script>";
    } else {
        echo "<script>alert('Usuario o contraseña incorrectas'); window.location.href='index.php';</script>";
    }
} else {

    echo "<script>alert('El usuario no existe'); window.location.href='index.php';</script>";
}

?>





