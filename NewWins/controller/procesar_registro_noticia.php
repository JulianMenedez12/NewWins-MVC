<?php
include '../model/conexion.php';
include '../model/GestorContenido.php';

$conexion = ConexionBD::obtenerConexion();
$gestor = new GestorContenido($conexion);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $contenido = $_POST['contenido'];
    $url = $_POST['url'];
    $categoria_id = $_POST['categoria_id'];

    $gestor->subirNoticia($titulo, $contenido, $url, $categoria_id);
}
