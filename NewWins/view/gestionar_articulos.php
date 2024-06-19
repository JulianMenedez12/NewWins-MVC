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
                        echo '<table class="table table-bordered">';
                        echo '<tr><th>ID</th><th>Categoría</th><th>Título</th><th>Contenido</th><th>Acciones</th></tr>';
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $row["id"] . '</td>';
                            echo '<td>' . $row["categoria"] . '</td>';
                            echo '<td>' . $row["titulo"] . '</td>';
                            echo '<td>' . $row["contenido"] . '</td>';
                            echo '<td>';
                            echo '<a href="../controller/eliminar_noticia.php?id=' . $row["id"] . '" class="btn btn-danger btn-sm">Eliminar</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        echo '</table>';
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

