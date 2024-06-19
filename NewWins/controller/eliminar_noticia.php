<?php
// controller/eliminar_noticia.php
include '../model/conexion.php';
include '../model/gestor_noticias.php';

$conexion = ConexionBD::obtenerConexion();
$gestor = new GestorContenido($conexion);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $gestor->eliminarNoticia($id);
}
