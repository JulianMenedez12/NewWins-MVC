<?php
if (!isset($_SESSION)) session_start();
if (!isset($_SESSION['correo'])) {
    header("Location: admin.php");
} else if (isset($_SESSION['correo']) == "") {
    header("Location: admin.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-Q99HS3X12S"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-Q99HS3X12S');
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style>
        /* Estilo para ajustar el margen izquierdo del botón */
        .dropdown-toggle {
            margin-left: 50px;
            /* Ajusta este valor según sea necesario */
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="admin_dashboard.php">Admin Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="gestionar_categorias.php">Gestionar Categorias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="gestionar_articulos.php">Gestionar Artículos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="noticias.php">Ver Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="manage_bandeja.php">Bandeja de Mensajes</a>
                    </li>
                </ul>
                <!-- Menú desplegable -->
                <div class="dropdown dropdown-custom ms-auto">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        Usuario
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="perfil.php">Ver perfil</a></li>
                        <li><a class="dropdown-item" href="../controller/logout.php">Cerrar sesión</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- Contenido de la página -->
    <div class="container mt-4">
        <!-- Aquí va el contenido de tu página -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>