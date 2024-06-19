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
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>

    <!-- Login 13 - Bootstrap Brain Component -->
    <section class="bg-light py-3 py-md-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                    <div class="card border border-light-subtle rounded-3 shadow-sm">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <div class="text-center mb-3">
                                <a href="#!">
                                    <img src="../img/logo.png" alt="img-fluid" width="175" height="157">
                                </a>
                            </div>
                            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Iniciar sesión con tu cuenta</h2>
                            <form action="../controller/procesar_login.php" method="POST">
                                <div class="row gy-2 overflow-hidden">
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
                                            <label for="email" class="form-label">Correo</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" name="password" id="password" value="" placeholder="Password" required>
                                            <label for="password" class="form-label">Contraseña</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-flex gap-2 justify-content-between">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" name="rememberMe" id="rememberMe">
                                                <label class="form-check-label text-secondary" for="rememberMe">
                                                    Mantener sesión iniciada
                                                </label>
                                                <br>
                                                <a href="#!" class="link-primary text-center text-decoration-none"> ¿olvidaste tu contraseña? </a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid my-3">
                                            <button class="btn btn-primary btn-lg" type="submit">Iniciar Sesión</button>
                                        </div>
                                    </div>
                                    <?php
                                    // Verificar si hay un mensaje de error en la URL
                                    if (isset($_GET['error']) && $_GET['error'] == 'contrasena') {
                                        echo '<div class="alert alert-danger" role="alert">Hay algún dato incorrecto. Por favor, intenta nuevamente.</div>';
                                    }
                                    ?>
                                    <div class="col-12">
                                        <p class="m-0 text-secondary text-center">Crear cuenta <a href="register.php" class="link-primary text-decoration-none">Sign up</a></p>
                                    </div>
                                    <div class="col-12">
                                        <p class="m-0 text-secondary text-center">Admin--<a href="admin.php" class="link-primary text-decoration-none">Entrar</a></p>
                                    </div>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</body>

</html>