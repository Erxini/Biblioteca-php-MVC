<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="http://localhost/Biblioteca/assets/images/logo.jpg" type="image/x-icon">
    <style>
        body {
            background-image: url('http://localhost/Biblioteca/assets/images/fondo.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .card {
            background-color: rgba(52, 73, 94, 0.9);
            color: #ecf0f1;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .card-body {
            padding: 2rem;
        }

        .btn-primary {
            background-color: #e74c3c;
            border: none;
        }

        .btn-primary:hover {
            background-color: #c0392b;
        }

        a {
            color: #ecf0f1;
            text-decoration: underline;
        }

        a:hover {
            color: #bdc3c7;
        }

        .welcome-text {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="card w-50">
        <div class="row g-0">
            <div class="col-md-6 p-4 d-flex flex-column justify-content-center">
                <h2 class="text-center mb-4">Acceso</h2>
                <form action="index.php?action=autenticar" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Nombre de usuario:</label>
                        <input type="text" id="username" name="username" class="form-control" placeholder="Introduce tu nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña:</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Introduce tu contraseña" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
                </form>

                <p class="text-center mt-3">
                    ¿No tienes cuenta? <a href="index.php?action=register">Regístrate aquí</a>
                </p>
            </div>
            <div class="col-md-6 d-none d-md-block bg-secondary text-center text-white p-4 pt-5 d-flex flex-column justify-content-center">
                <h3>Bienvenido</h3>
                <p class="mt-5">Accede a tu cuenta para gestionar el repertorio de lectura de nuestras estanterías.</p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>