<?php

include('../model/gestor_usuarios.php'); // Incluye la clase GestorUsuarios

// Verifica si se recibieron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtén los datos del formulario
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $nombreUsuario = $_POST["nombre_user"];
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];
    $pais = $_POST["pais"];

    // Instancia la clase GestorUsuarios
    $gestorUsuarios = new GestorUsuarios();

    // Llama al método registrarUsuario con los datos del formulario
    $gestorUsuarios->registrarUsuario($nombre, $apellido, $nombreUsuario, $correo, $contrasena, $pais);
}
