<?php
include("administrador/configuración/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errores = array();
    

    $Nombres = isset($_POST["Nombres"]) ? $_POST["Nombres"] : null;
    $Apellidos = isset($_POST["Apellidos"]) ? $_POST["Apellidos"] : null;
    $Email = isset($_POST["Email"]) ? $_POST["Email"] : null;
    $Password = isset($_POST["Password"]) ? $_POST["Password"] : null;
    $ConfirmarPassword = isset($_POST["ConfirmarPassword"]) ? $_POST["ConfirmarPassword"] : null;
    $Genero = isset($_POST["Genero"]) ? $_POST["Genero"] : null;

    if (empty($Nombres)) {
        $errores["Nombres"] = "Debe ingresar los Nombres";
    }
    if (empty($Apellidos)) {
        $errores["Apellidos"] = "Debe ingresar los Apellidos";
    }
    if (empty($Email)) {
        $errores["Email"] = "El Email es obligatorio";
    } elseif (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        $errores['Email'] = 'Formato de Email incorrecto';
    } else {
        // Verificar si el correo ya existe
        $sql = "SELECT * FROM usuarios WHERE Email = :Email";
        $sentenciaSQL = $conexion->prepare($sql);
        $sentenciaSQL->bindParam(':Email', $Email);
        $sentenciaSQL->execute();
        if ($sentenciaSQL->fetch()) {
            echo "<script>alert('El correo electrónico ya está registrado intenta con otro correo'); window.location.href='index.php';</script>";
            exit();
        }
    }
    if (empty($Password)) {
        $errores["Password"] = "La contraseña es obligatoria";
    } elseif (strlen($Password) < 8 || !preg_match('/[A-Z]/', $Password) || !preg_match('/[0-9]/', $Password)) {
            echo "<script>alert('La contraseña debe tener al menos 8 caracteres, incluyendo al menos una letra mayúscula y un número.'); window.location.href='index.php';</script>";
    exit();
    }
    if (empty($ConfirmarPassword)) {
        $errores["ConfirmarPassword"] = "Debes de confirmar la contraseña";
    } elseif ($Password != $ConfirmarPassword) {
        echo "<script>alert('Las contraseñas no coinciden'); window.location.href='index.php';</script>";
        exit();
    }
    if (empty($Genero)) {
        $errores["Genero"] = "Debes seleccionar el Género";
    }

    if (!empty($errores)) {
        // Mostrar errores y redirigir a la página de registro
        $mensajeErrores = implode("\\n", $errores);
        echo "<script>alert('Errores:\n" . addslashes($mensajeErrores) . "'); window.location.href='index.php';</script>";
        exit();
    }

        try {
            $conexion = new PDO("mysql:host=$host;dbname=$bd", $usuario, $contraseña);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $nuevoPassword = password_hash($Password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO usuarios (id, Nombres, Apellidos, Email, Password, Genero) VALUES (NULL, :Nombres, :Apellidos, :Email, :Password, :Genero);";
            $sentenciaSQL = $conexion->prepare($sql);
            $sentenciaSQL->execute(array(
                ':Nombres' => $Nombres,
                ':Apellidos' => $Apellidos,
                ':Email' => $Email,
                ':Password' => $nuevoPassword,
                ':Genero' => $Genero
            ));
            echo "<script>alert('Registro exitoso. Bienvenido!'); window.location.href='index.php';</script>";
            exit();
        } catch (PDOException $ex) {
            echo "<script>alert('Las contraseñas no coinciden');</script>";
            exit();
        }
    }
?>




