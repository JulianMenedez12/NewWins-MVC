<?php
if (!isset($_SESSION)) session_start();
if (!isset($_SESSION['correo'])) {
    header("Location: admin.php");
} else if (isset($_SESSION['correo']) == "") {
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
                echo '<div class="table-responsive" style="max-height: 400px; overflow-y: auto;">'; // Contenedor con scroll vertical
                echo '<table class="table table-bordered table-hover">';
                echo '<thead class="thead-light">';
                echo '<tr>';
                echo '<th>ID</th>';
                echo '<th>Nombre</th>';
                echo '<th>Descripción</th>';
                echo '<th>Imagen</th>';
                echo '<th>Acciones</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                foreach ($categorias as $categoria) {
                    echo '<tr>';
                    echo '<td>' . $categoria["id"] . '</td>';
                    echo '<td>' . $categoria["nombre"] . '</td>';
                    echo '<td>' . $categoria["descripcion"] . '</td>';
                    echo '<td><img src="' . $categoria["imagen"] . '" alt="' . $categoria["nombre"] . '"></td>';
                    echo '<td>';
                    echo '<a href="../controller/eliminar_categoria.php?id=' . $categoria["id"] . '" class="btn btn-danger btn-sm">Eliminar</a>';
                    echo '</td>';
                    echo '</tr>';
                }
                echo '</tbody>';
                echo '</table>';
                echo '</div>';
            } else {
                echo '<p class="text-muted">No hay categorías disponibles.</p>';
            }
        } else {
            echo '<p class="text-danger">Ocurrió un error al obtener las categorías.</p>';
        }

        // Cerrar la conexión a la base de datos
        $conexion->close();
        ?>
    </div>
</div>
