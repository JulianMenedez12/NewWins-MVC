<?php
if (!isset($_SESSION)) session_start();
if (!isset($_SESSION['correo'])) {
    header("Location: admin.php");
} else if (isset($_SESSION['correo']) == "") {
    header("Location: admin.php");
}
include 'header.php';
include '../model/conexion.php';
include '../model/gestor_noticias.php';
?>

<div class="col-md-9">
    <div id="noticias" class="mt-4">
        <h4>Noticias</h4>
        <div class="card">
            <div class="card-body">
                <!-- Formulario para subir noticias -->
                <form action="../controller/subir_noticia.php" method="post">
                    <div class="form-group">
                        <label for="titulo">Título:</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" required>
                    </div>
                    <div class="form-group">
                        <label for="contenido">Contenido:</label>
                        <textarea class="form-control" id="contenido" name="contenido" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="url">URL:</label>
                        <input type="text" class="form-control" id="url" name="url" required>
                    </div>
                    <div class="form-group">
                        <label for="categoria_id">Categoría:</label>
                        <select class="form-control" id="categoria_id" name="categoria_id" required>
                            <?php
                            include '../controller/listar_categoria.php';
                            echo aa();
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Subir Noticia</button>
                </form>
            </div>
        </div>
    </div>

    <div id="categorias" class="mt-4">
        <h4>Categorías</h4>
        <div class="card">
            <div class="card-body">
                <!-- Formulario para crear categorías -->
                <form action="../controller/crear_categoria.php" method="post">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción:</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="imagen">Imagen (URL):</label>
                        <input type="text" class="form-control" id="imagen" name="imagen">
                    </div>
                    <button type="submit" class="btn btn-secondary">Crear Categoría</button>
                </form>
            </div>
        </div>
    </div>
</div>
