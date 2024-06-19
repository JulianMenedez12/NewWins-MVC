<?php 

if (!isset($_SESSION)) session_start();
if (!isset($_SESSION['correo'])) {
    header("Location: admin.php");
} else if(isset($_SESSION['correo'])==""){
    header("Location: admin.php");
}

include 'header.php';

?>

<div class="container-fluid">
    <div class="mt-4">
        <?php
        include '../model/conexion.php';
        include '../model/gestor_noticias.php';

        $conexion = ConexionBD::obtenerConexion();
        $gestor = new GestorContenido($conexion);

        // Obtener las categorías
        $categorias = $gestor->listarCategorias();

        // Verificar si hay categorías disponibles
        if ($categorias) {
            // Verificar si hay al menos una categoría
            if (!empty($categorias)) {
                echo '<table class="table table-bordered">';
                echo '<tr><th>ID</th><th>Nombre</th><th>Descripción</th><th>Imagen</th><th>Acciones</th></tr>';
                foreach ($categorias as $categoria) {
                    echo '<tr>';
                    echo '<td>' . $categoria["id"] . '</td>';
                    echo '<td>' . $categoria["nombre"] . '</td>';
                    echo '<td>' . $categoria["descripcion"] . '</td>';
                    echo '<td><img src="' . $categoria["imagen"] . '" alt="' . $categoria["nombre"] . '" width="100"></td>';
                    echo '<td>';
                    echo '<a href="../controller/eliminar_categoria.php?id=' . $categoria["id"] . '" class="btn btn-danger btn-sm">Eliminar</a>';
                    echo '</td>';
                    echo '</tr>';
                }
                echo '</table>';
            } else {
                echo '<p>No hay categorías disponibles.</p>';
            }
        } else {
            echo '<p>Ocurrió un error al obtener las categorías.</p>';
        }

        // Cerrar la conexión a la base de datos
        $conexion->close();
        ?>
    </div>
</div>

