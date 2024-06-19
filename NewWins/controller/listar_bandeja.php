<?php
// Archivo: controller/listar_bandeja.php

require_once '../model/conexion.php';
require_once '../model/BandejaEntrada.php';

// Crear conexión
$conn = ConexionBD::obtenerConexion();

// Crear instancia del modelo
$model = new BandejaEntradaModel($conn);

// Obtener los artículos de la bandeja de entrada
$articulos = $model->obtenerArticulos();

// Cerrar la conexión
$conn->close();

// Devolver los artículos
return $articulos;
