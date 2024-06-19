<?php
include '../model/conexion.php';
include '../model/gestor_noticias.php';

$conexion = ConexionBD::obtenerConexion();
$gestorNoticias = new GestorContenido($conexion);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nombre']) && isset($_POST['descripcion'])) {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $imagen = isset($_FILES['imagen']) ? $_FILES['imagen'] : null;

    $gestorNoticias->crearCategoria($nombre, $descripcion, $imagen);
}
