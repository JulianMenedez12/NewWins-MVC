<?php
require_once('../model/gestor_usuarios.php');

session_start();
if (!isset($_SESSION['correo'])) {
    header("Location: ../view/admin.php");
    exit();
}

$userEmail = $_SESSION['correo'];
$gestorUsuarios = new GestorUsuarios();

$result = $gestorUsuarios->subirFotoPerfil($userEmail, $_FILES['foto_perfil']);

if ($result === true) {
    // Redirigir al perfil del usuario con un mensaje de éxito
    header("Location: ../view/perfil.php?mensaje=exito");
} else {
    // Redirigir al perfil del usuario con un mensaje de error
    header("Location: ../view/perfil.php?mensaje=" . urlencode($result));
}
exit();
