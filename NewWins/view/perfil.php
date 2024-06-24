<?php
// Incluye el archivo del modelo para obtener la información del usuario
require_once '../model/gestor_usuarios.php';
if (!isset($_SESSION)) session_start();
if (!isset($_SESSION['correo'])) {
    header("Location: admin.php");
} else if (isset($_SESSION['correo']) == "") {
    header("Location: admin.php");
}
// Obtener la información del usuario desde la base de datos
$userEmail = $_SESSION['correo'];
include 'header.php';
$user = GestorUsuarios::getUserByEmail($userEmail);
?>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Perfil</title>
</head>

<body>
    <div class="container-xl px-4 mt-4">

        <nav class="nav nav-borders">
            <a class="nav-link active ms-0" href="#">Perfil</a>
            <a class="nav-link" href="#">Facturación</a>
            <a class="nav-link" href="change_pass.php">Seguridad</a>
        </nav>
        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-xl-4">
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Foto de Perfil</div>
                    <div class="card-body text-center">
                        <img class="img-account-profile mb-2" src="<?php echo htmlspecialchars($user['foto_perfil'] ?: 'http://bootdey.com/img/Content/avatar/avatar1.png'); ?>" alt="">
                        <div class="small font-italic text-muted mb-4">JPG o PNG máximo 5 MB</div>
                        <form action="../controller/upload_profile.php" method="POST" enctype="multipart/form-data">
                            <input type="file" name="foto_perfil" accept="image/*" required>
                            <button class="btn btn-primary" type="submit">Subir Nueva imagen</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card mb-4">
                    <div class="card-header">Detalles de la cuenta</div>
                    <div class="card-body">
                        <form action="../controller/edit_perfil_c.php" method="POST">
                            <div class="mb-3">
                                <label class="small mb-1" for="inputUsername">Nombre de Usuario</label>
                                <input class="form-control" id="inputUsername" name="inputUsername" type="text" placeholder="Ingresa tu nombre de usuario" value="<?php echo htmlspecialchars($user['nombre_usuario']); ?>">
                            </div>
                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputFirstName">Nombre</label>
                                    <input class="form-control" id="inputFirstName" name="inputFirstName" type="text" placeholder="Ingresa tu nombre" value="<?php echo htmlspecialchars($user['nombre']); ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLastName">Apellido</label>
                                    <input class="form-control" id="inputLastName" name="inputLastName" type="text" placeholder="Ingresa tu apellido" value="<?php echo htmlspecialchars($user['apellido']); ?>">
                                </div>
                            </div>
                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLocation">Ubicación</label>
                                    <input class="form-control" id="inputLocation" name="inputLocation" type="text" placeholder="Ingresa tu ubicación" value="<?php echo htmlspecialchars($user['ubicacion']); ?>">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Correo Electrónico</label>
                                <input class="form-control" id="inputEmailAddress" name="inputEmailAddress" type="email" placeholder="Ingresa tu correo electrónico" value="<?php echo htmlspecialchars($user['correo_electronico']); ?>">
                            </div>
                            <button class="btn btn-primary" type="submit">Guardar Cambios</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script type="text/javascript">
    </script>
</body>

</html>