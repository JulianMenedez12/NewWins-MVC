<?php

require_once('conexion.php');

class GestorUsuarios
{
    private $conn;

    public function __construct()
    {
        $this->conn = ConexionBD::obtenerConexion(); // Obtener la conexión
    }

    public function iniciarSesion($correo, $contra)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["email"]) && isset($_POST["password"])) {
                // Consulta para obtener el usuario por su correo electrónico
                $sql = "SELECT * FROM usuarios_registrados WHERE correo_electronico = ?";
                $stmt = $this->conn->prepare($sql);
                $stmt->bind_param("s", $correo);
                $stmt->execute();
                $result = $stmt->get_result();

                // Verificar si se encontró el usuario
                if ($result->num_rows == 1) {
                    // Obtener los datos del usuario
                    $row = $result->fetch_assoc();
                    // Verificar la contraseña
                    if (password_verify($contra, $row['contrasena'])) {
                        // Guardar información del usuario en la sesión
                        $_SESSION['user_id'] = $row['id'];
                        $_SESSION['user_nombre'] = $row['nombre'];
                        $_SESSION['user_apellido'] = $row['apellido'];
                        // Redirigir al usuario a otra página (puedes cambiar 'v.html' por la página que desees)
                        header("Location: v.html");
                        exit;
                    } else {
                        // Contraseña incorrecta
                        header("Location: index.php?error=contrasena");
                        exit();
                    }
                } else {
                    // Usuario no encontrado
                    echo "Usuario no encontrado";
                }

                // Cerrar la conexión
                $stmt->close();
            } else {
                // Todos los campos son obligatorios
                echo "Todos los campos son obligatorios.";
            }
        }
    }

    public function iniciarSesionAdmin($correo, $contrasena)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["emailadmin"]) && isset($_POST["passwordadmin"])) {
                $stmt = $this->conn->prepare("SELECT contrasena, es_admin FROM usuarios_registrados WHERE correo_electronico = ?");
                $stmt->bind_param("s", $correo);
                $stmt->execute();
                $stmt->bind_result($hash_contrasena, $es_admin);
                $stmt->fetch();

                if (password_verify($contrasena, $hash_contrasena) && $es_admin == 1) {
                    header("Location: ../view/header.php");
                    exit();
                } else {
                    // Si las credenciales son incorrectas, redirige con un mensaje de error
                    header("Location: admin.php?error=contrasena");
                    exit();
                }

                $stmt->close();
            } else {
                // Todos los campos son obligatorios
                echo "Todos los campos son obligatorios.";
            }
        }
    }

    public function registrarUsuario($nombre, $apellido, $nombreUsuario, $correo, $contrasena, $pais)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Verificar si se recibieron los campos obligatorios
            if (isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["nombre_user"]) && isset($_POST["correo"]) && isset($_POST["contrasena"]) && isset($_POST["pais"])) {
                // Asignar valores a las variables
                $nombreUsuario = $_POST["nombre_user"];
                $nombre = $_POST["nombre"];
                $apellido = $_POST["apellido"];
                $correo = $_POST["correo"];
                $contrasena = $_POST["contrasena"];
                $contrasenaEncriptada = password_hash($contrasena, PASSWORD_DEFAULT);
                $pais = $_POST["pais"];

                // Consulta para insertar el nuevo usuario
                $sql = "INSERT INTO usuarios_registrados (nombre_usuario, contrasena, correo_electronico, nombre, ubicacion, apellido) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $this->conn->prepare($sql);
                $stmt->bind_param("ssssss", $nombreUsuario, $contrasenaEncriptada, $correo, $nombre, $pais, $apellido);

                if ($stmt->execute()) {
                    header("Location: ../view/index.php");
                    exit();
                } else {
                    header("Location: ../view/register.php");
                    exit();
                }

                $stmt->close();
            } else {
                echo "Todos los campos son obligatorios.";
            }
        }
    }
    public function validarUsuario($nombre_usuario, $password)
    {
        $sql = "SELECT * FROM usuarios_registrados WHERE nombre_usuario = ? AND contrasena = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ss', $nombre_usuario, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }
    public function listarUsuarios()
    {
        // Consulta SQL para obtener los usuarios
        $sql = "SELECT id, nombre_usuario, correo_electronico FROM usuarios_registrados";
        $result = $this->conn->query($sql);

        $usuarios = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $usuarios[] = $row;
            }
        }

        return $usuarios;
    }
 
    public function actualizarPerfil($idUsuario, $username, $nombre, $apellido, $ubicacion, $correo)
    {
        // Consulta para actualizar los datos del perfil
        $sql = "UPDATE usuarios_registrados SET nombre_usuario = ?, nombre = ?, apellido = ?, ubicacion = ?, correo_electronico = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);

        // Verificar si la preparación de la consulta fue exitosa
        if ($stmt === false) {
            die('Error en la preparación de la consulta: ' . $this->conn->error);
        }

        // Enlaza los parámetros a la consulta preparada
        $stmt->bind_param("sssssi", $username, $nombre, $apellido, $ubicacion, $correo, $idUsuario);

        // Ejecuta la consulta
        if ($stmt->execute()) {
            return true; // Actualización exitosa
        } else {
            return false; // Error al actualizar
        }

        // Cierra la declaración preparada
        $stmt->close();
    }


}



