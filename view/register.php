<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
    </style>
</head>

<body>
    <div class="card w-75">
        <div class="row g-0">
            <div class="col-md-7 p-4 d-flex flex-column justify-content-center">
                <h2 class="text-center mb-4">Registro</h2>
                <form action="index.php?action=registerUser" method="POST">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Tu nombre" required>
                        </div>
                        <div class="col-md-6">
                            <label for="password" class="form-label">Contraseña:</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Tu contraseña" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="ape1" class="form-label">Primer Apellido:</label>
                            <input type="text" id="ape1" name="ape1" class="form-control" placeholder="Tu primer apellido" required>
                        </div>
                        <div class="col-md-6">
                            <label for="ape2" class="form-label">Segundo Apellido:</label>
                            <input type="text" id="ape2" name="ape2" class="form-control" placeholder="Tu segundo apellido" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="rol" class="form-label">Rol:</label>
                        <select id="rol" name="rol" class="form-select" required>
                            <option value="registrado">Registrado</option>
                            <option value="administrador">Administrador</option>
                        </select>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
                </form>
                <p class="text-center mt-3">
                    ¿Ya tienes cuenta? <a href="index.php?action=login">Inicia sesión aquí</a>
                </p>
            </div>
            <div class="col-md-5 d-none d-md-block bg-secondary text-center text-white p-5 d-flex flex-column justify-content-center">
                <h3>Bienvenido</h3>
                <p class="mt-5">Regístrate en nuestra aplicación para poder gestionar el repertorio de lectura de nuestras estanterías.</p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>