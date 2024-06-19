<?php

class ConexionBD {
    public static function obtenerConexion() {
        $servername = '127.0.0.1';
        $username = 'root';
        $password = 'root';
        $dbname = 'NewWins';

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        return $conn;
    }
}

?>
