<?php
if (!isset($_SESSION)) session_start();
if (!isset($_SESSION['correo'])) $_SESSION['correo'] = '';

include '../model/gestor_usuarios.php';
$conexion = ConexionBD::obtenerConexion();
$gestorUsuarios = new GestorUsuarios($conexion);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["emailadmin"]) && isset($_POST["passwordadmin"])) {
        $correo = $_POST["emailadmin"];
        $contrasena = $_POST["passwordadmin"];
        $exito = $gestorUsuarios->iniciarSesionAdmin($correo, $contrasena);

        if ($exito) {
            // Inicio de sesión exitoso, redireccionar a una página de administrador
            $_SESSION['correo'] = $correo; // Guardar el correo en sesión
            header("Location: ../view/admin_dashboard.php");
            exit();
        } else {
            // Inicio de sesión fallido, redireccionar con mensaje de error
            header("Location: ../view/admin.php?error=credenciales");
            exit();
        }
    } else {
        // Redirigir con un mensaje de error si no se proporcionaron las credenciales
        header("Location: ../view/admin.php?error=credenciales");
        exit();
    }
} else {
    // Redirigir si no es una solicitud POST (esto debería manejarse en el formulario)
    header("Location: ../view/admin.php");
    exit();
}
