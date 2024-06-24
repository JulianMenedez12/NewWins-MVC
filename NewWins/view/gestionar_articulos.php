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
    <div class="row">
        <div class="col-md-9">
            <div id="noticias" class="mt-4">
                <h4>Noticias</h4>
                <div class="mt-4">
                    <?php
                    include '../model/conexion.php';
                    include '../model/gestor_noticias.php';

                    $conexion = ConexionBD::obtenerConexion();
                    $gestor = new GestorContenido($conexion);
                    $result = $gestor->listarNoticias();

                    if ($result->num_rows > 0) {
                        echo '<div class="table-responsive">';
                        echo '<table class="table table-bordered table-striped">';
                        echo '<thead class="table-dark">';
                        echo '<tr><th>ID</th><th>Categoría</th><th>Título</th><th>Contenido</th><th>Imagen</th><th>Acciones</th></tr>';
                        echo '</thead>';
                        echo '<tbody>';

                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . htmlspecialchars($row["id"]) . '</td>';
                            echo '<td>' . htmlspecialchars($row["categoria"]) . '</td>';
                            echo '<td>' . htmlspecialchars($row["titulo"]) . '</td>';
                            echo '<td>' . htmlspecialchars($row["contenido"]) . '</td>';
                            
                            // Mostrar la imagen si la URL no está vacía
                            if (!empty($row["url"])) {
                                echo '<td><img src="' . htmlspecialchars($row["url"]) . '" class="img-thumbnail" style="max-width: 150px; max-height: 150px;"></td>';
                            } else {
                                echo '<td>No hay imagen disponible</td>';
                            }
                            
                            echo '<td>';
                            echo '<a href="../controller/eliminar_noticia.php?id=' . htmlspecialchars($row["id"]) . '" class="btn btn-danger btn-sm">Eliminar</a>';
                            echo '</td>';
                            echo '</tr>';
                        }

                        echo '</tbody>';
                        echo '</table>';
                        echo '</div>'; // Cierra table-responsive
                    } else {
                        echo '<p>No hay noticias disponibles.</p>';
                    }

                    $conexion->close();
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
