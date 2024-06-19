<?php
include '../model/conexion.php';
include '../model/gestor_noticias.php';

$conexion = ConexionBD::obtenerConexion();
$gestorNoticias = new GestorContenido($conexion);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['titulo']) && isset($_POST['contenido']) && isset($_POST['url']) && isset($_POST['categoria_id'])) {
    $titulo = $_POST['titulo'];
    $contenido = $_POST['contenido'];
    $url = $_POST['url'];
    $categoria_id = $_POST['categoria_id'];

    $gestorNoticias->subirNoticia($titulo, $contenido, $url, $categoria_id);
}
