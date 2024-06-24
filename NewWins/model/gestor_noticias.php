<?php

class GestorContenido
{
    private $conn;

    public function __construct($conexion)
    {
        $this->conn = $conexion;
    }

    public function subirNoticia($titulo, $contenido, $url, $categoria_id)
    {
        $fecha_publicacion = date("Y-m-d");

        if (!empty($titulo) && !empty($contenido) && !empty($url) && !empty($categoria_id)) {
            $sql = "INSERT INTO articulos (titulo, fecha_publicacion, contenido, url, categoria_id) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("ssssi", $titulo, $fecha_publicacion, $contenido, $url, $categoria_id);

            if ($stmt->execute()) {
                header("Location: ../view/admin_dashboard.php?success=noticia_subida");
                exit();
            } else {
                header("Location: ../view/admin_dashboard.php?error=subir_noticia");
                exit();
            }
        } else {
            header("Location: ../view/admin_dashboard.php?error=falta_datos");
            exit();
        }
    }

    public function listarCategorias()
    {
        $sql = "SELECT * FROM categorias";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function listarNoticias()
    {
        $sql = "SELECT a.id, c.nombre AS categoria, a.titulo, a.contenido, a.url 
                FROM articulos a
                JOIN categorias c ON a.categoria_id = c.id";
        $result = $this->conn->query($sql);
        return $result;
    }


    public function eliminarNoticia($id)
    {
        $sql = "DELETE FROM articulos WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            header("Location: ../view/admin_dashboard.php?success=noticia_eliminada");
            exit();
        } else {
            header("Location: ../view/admin_dashboard.php?error=eliminar_noticia");
            exit();
        }
    }

    public function eliminarCategoria($id)
    {
        $sql = "DELETE FROM categorias WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            header("Location: ../view/gestionar_categorias.php?success=categoria_eliminada");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    public function crearCategoria($nombre, $descripcion, $imagen)
    {
        if (!empty($nombre) && !empty($descripcion)) {
            $stmt = $this->conn->prepare("INSERT INTO categorias (nombre, descripcion, imagen) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $nombre, $descripcion, $imagen);

            if ($stmt->execute()) {
                header("Location: ../view/admin_dashboard.php?success=categoria_creada");
            } else {
                echo "Error: " . $stmt->error;
            }
        } else {
            echo "Por favor, complete todos los campos.";
        }
    }
}
