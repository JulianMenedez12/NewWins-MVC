<?php
// Archivo: model/BandejaEntradaModel.php

class BandejaEntradaModel
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function obtenerArticulos()
    {
        $sql = "SELECT b.id, u.nombre_usuario, b.fecha_envio, b.imagenes, b.titulo, b.contenido
                FROM bandeja_entrada b
                JOIN usuarios_registrados u ON b.usuario_id = u.id";
        $result = $this->conn->query($sql);

        if ($result === false) {
            die("Error en la consulta SQL: " . $this->conn->error);
        }

        $articulos = [];
        while ($row = $result->fetch_assoc()) {
            $articulos[] = $row;
        }

        return $articulos;
    }
}
