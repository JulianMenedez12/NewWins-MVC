<?php
if(! isset($_SESSION)) session_start();
if(!isset($_SESSION['correo'])) $_SESSION['correo']='';

include '../model/gestor_usuarios.php';

$conexion = ConexionBD::obtenerConexion();
$gestorUsuarios = new GestorUsuarios($conexion);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["emailadmin"]) && isset($_POST["passwordadmin"])) {
        $correo = $_POST["emailadmin"];
        $contrasena = $_POST["passwordadmin"];
        $gestorUsuarios->iniciarSesionAdmin($correo, $contrasena);
    } else {
        // Redirigir con un mensaje de error si no se proporcionaron las credenciales
        header("Location: ../view/admin.php?error=credenciales");
        exit();
    }
} else {
    // Redirigir si no es una solicitud POST
    $_SESSION['correo'] = $correo;
    header("Location: ../view/header.php");
    exit();
}
