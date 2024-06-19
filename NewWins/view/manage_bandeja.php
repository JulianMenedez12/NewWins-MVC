<?php include 'header.php'; ?>

<body>
    <div class="container my-5">
        <h1 class="mb-4">Bandeja de Entrada</h1>

        <?php
        // Incluir el controlador para obtener los artículos
        include '../controller/listar_bandeja.php';
        ?>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Autor</th>
                    <th>Fecha</th>
                    <th>Imagen</th>
                    <th>Título</th>
                    <th>Contenido</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($articulos)) : ?>
                    <?php foreach ($articulos as $articulo) : ?>
                        <tr>
                            <td><?= htmlspecialchars($articulo["nombre_usuario"]) ?></td>
                            <td><?= date("Y-m-d H:i:s", strtotime($articulo["fecha_envio"])) ?></td>
                            <td>
                                <?php if (!empty($articulo["imagenes"])) : ?>
                                    <img src="data:image/jpeg;base64,<?= base64_encode($articulo["imagenes"]) ?>" alt="Imagen" width="100">
                                <?php else : ?>
                                    No hay imagen
                                <?php endif; ?>
                            </td>
                            <td><?= htmlspecialchars($articulo["titulo"]) ?></td>
                            <td><?= htmlspecialchars($articulo["contenido"]) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="5">No hay artículos en la bandeja de entrada.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
