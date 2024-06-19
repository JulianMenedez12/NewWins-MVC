<?php

// Incluir el archivo de conexión y la clase GestorUsuarios
require_once('../model/conexion.php');
require_once('../model/gestor_usuarios.php');

// Inicializar la sesión si no está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si todos los campos obligatorios están presentes (puedes agregar más validaciones según necesites)
    if (isset($_POST["inputUsername"]) && isset($_POST["inputFirstName"]) && isset($_POST["inputLastName"]) && isset($_POST["inputLocation"]) && isset($_POST["inputEmailAddress"])) {

        // Recoger los datos del formulario
        $idUsuario = $_SESSION['user_id'];
        $username = $_POST['inputUsername'];
        $nombre = $_POST["inputFirstName"];
        $apellido = $_POST["inputLastName"];
        $ubicacion = $_POST["inputLocation"];
        $correo = $_POST["inputEmailAddress"];

        // Instanciar el gestor de usuarios y llamar al método para actualizar el perfil
        $gestorUsuarios = new GestorUsuarios();
        $actualizacionExitosa = $gestorUsuarios->actualizarPerfil($idUsuario, $username, $nombre, $apellido, $ubicacion, $correo);

        if ($actualizacionExitosa) {
            // Redirigir a la página de perfil con un mensaje de éxito
            header("Location: ../view/perfil.php?exito=perfil_actualizado");
            exit();
        } else {
            // Redirigir a la página de edición de perfil con un mensaje de error
            header("Location: ../view/perfil.php?error=actualizacion_fallida");
            exit();
        }
    } else {
        // Redirigir a la página de edición de perfil con un mensaje de error si faltan campos
        header("Location: ../view/perfil.php?error=campos_obligatorios");
        exit();
    }
} else {
    // Redirigir a la página de edición de perfil si el formulario no fue enviado
    header("Location: ../view/perfil.php");
    exit();
}
