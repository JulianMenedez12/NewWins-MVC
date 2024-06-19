<!DOCTYPE html>
<html lang="en">

<head>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-YV2NTLG0KJ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-YV2NTLG0KJ');
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</head>

<body>
    <!-- Section: Design Block -->
    <section class="">
        <!-- Jumbotron -->
        <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
            <div class="container">
                <div class="row gx-lg-5 align-items-center">
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <span class="text-primary"><img src="../img/logo.png" alt="img-fluid"></span>
                        </h1>
                        <br><br>
                        <p style="color: hsl(217, 10%, 50.8%)">
                            En NewWins, estamos comprometidos a brindarte las noticias más relevantes y actualizadas de todo el mundo.
                            Nuestra misión es mantenerte informado con integridad, objetividad y precisión. Con un equipo de periodistas apasionados y expertos en diversas áreas,
                            cubrimos una amplia gama de temas que incluyen política, economía, tecnología, cultura, deportes y más.
                        </p>
                    </div>

                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <div class="card">
                            <div class="card-body py-5 px-md-5">
                                <!-- Aquí se llama a la función registrarUsuario() en el atributo action -->
                                <form action="../controller/procesar_registro.php" method="POST">
                                    <!-- 2 column grid layout with text inputs for the first and last names -->
                                    <div class="row">
                                        <div class="col-md-4 mb-4">
                                            <div data-mdb-input-init class="form-outline">
                                                <input type="text" name="nombre" id="form3Example1" class="form-control" />
                                                <label class="form-label" for="form3Example1">Nombre</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <div data-mdb-input-init class="form-outline">
                                                <input type="text" name="apellido" id="form3Example2" class="form-control" />
                                                <label class="form-label" for="form3Example2">Apellido</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <div data-mdb-input-init class="form-outline">
                                                <input type="text" name="nombre_user" id="form3Example3" class="form-control" />
                                                <label class="form-label" for="form3Example3">Nombre de Usuario</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Email input -->
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="email" name="correo" id="form3Example4" class="form-control" />
                                        <label class="form-label" for="form3Example4">Correo</label>
                                    </div>

                                    <!-- Password input -->
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="password" name="contrasena" id="form3Example5" class="form-control" />
                                        <label class="form-label" for="form3Example5">Contraseña</label>
                                    </div>
                                    <div class="mb-3">
                                        <label for="pais" class="form-label">País</label>
                                        <select class="form-select" id="pais" name="pais" required>
                                            <option value="" selected disabled>Selecciona tu país</option>
                                            <option value="Argentina">Argentina</option>
                                            <option value="Bolivia">Bolivia</option>
                                            <option value="Brasil">Brasil</option>
                                            <option value="Chile">Chile</option>
                                            <option value="Colombia">Colombia</option>
                                            <option value="Costa Rica">Costa Rica</option>
                                            <option value="Cuba">Cuba</option>
                                            <option value="Ecuador">Ecuador</option>
                                            <option value="El Salvador">El Salvador</option>
                                            <option value="Guatemala">Guatemala</option>
                                            <option value="Honduras">Honduras</option>
                                            <option value="México">México</option>
                                            <option value="Nicaragua">Nicaragua</option>
                                            <option value="Panamá">Panamá</option>
                                            <option value="Paraguay">Paraguay</option>
                                            <option value="Perú">Perú</option>
                                            <option value="Puerto Rico">Puerto Rico</option>
                                            <option value="República Dominicana">República Dominicana</option>
                                            <option value="Uruguay">Uruguay</option>
                                            <option value="Venezuela">Venezuela</option>
                                            <option value="USA">Estados Unidos</option>
                                        </select>
                                    </div>

                                    <!-- Submit button -->
                                    <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">
                                        Registrar
                                    </button>

                                    <div class="col-12">
                                        <p class="m-0 text-secondary text-center">¿Ya tienes una cuenta? <a href="index.php" class="link-primary text-decoration-none">Iniciar sesión</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Section: Design Block -->
</body>

</html>