<?php

// Incluir el archivo de conexión y la clase GestorUsuarios
require_once('../model/conexion.php');
require_once('../model/gestor_usuarios.php');

// Inicializar la sesión si no está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verificar si el formulario fue enviado
// Obtener los datos del formulario
$username = $_POST['inputUsername'];
$firstName = $_POST['inputFirstName'];
$lastName = $_POST['inputLastName'];
$location = $_POST['inputLocation'];
$email = $_POST['inputEmailAddress'];
$currentEmail = $_SESSION['correo'];

// Actualizar la información del usuario
GestorUsuarios::updateUser($currentEmail, $username, $firstName, $lastName, $location, $email);

// Actualizar la sesión si se cambió el correo electrónico
if ($currentEmail != $email) {
    $_SESSION['correo'] = $email;
}

// Redirigir a la página de perfil
header("Location: ../view/perfil.php");
exit;
