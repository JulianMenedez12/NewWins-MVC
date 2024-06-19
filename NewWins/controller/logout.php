<?php
// Iniciar la sesión si no está iniciada
if (!isset($_SESSION)) {
    session_start();
}

// Destruir todas las variables de sesión
$_SESSION = array();

// Destruir la sesión actual
session_destroy();

// Redirigir al usuario a la página de inicio de sesión o a donde desees
header("Location: ../view/index.php");
exit();
