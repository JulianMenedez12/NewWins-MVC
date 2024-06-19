<?php
if (!isset($_SESSION)) session_start();
if (!isset($_SESSION['correo'])) $_SESSION['correo'] = '';
include('../model/gestor_usuarios.php'); // Incluye la clase GestorUsuarios

// Verifica si se recibieron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtén los datos del formulario
    $correo = $_POST["email"];
    $contrasena = $_POST["password"];
    
    // Instancia la clase GestorUsuarios
    $gestorUsuarios = new GestorUsuarios();

    // Llama al método iniciarSesion con los datos del formulario
    $gestorUsuarios->iniciarSesion($correo, $contrasena);
    $_SESSION['correo'] = $correo;
    //header("Location: ../view/header.php");
    exit();
}
