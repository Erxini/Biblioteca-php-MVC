<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('http://localhost/Biblioteca/assets/images/fondo_estanteria.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1>Panel de Administración</h1>
        <div class="row text-center">
            <?php if ($_SESSION['rol'] == 'administrador'): ?>
                <div class="col-md-3">
                    <a href="index.php?action=agregarLibro" class="btn btn-secondary btn-block">Agregar Libro</a>
                </div>
            <?php endif; ?>
            <?php if ($_SESSION['rol'] == 'administrador'): ?>
                <div class="col-md-3">
                    <a href="index.php?action=modificarLibro" class="btn btn-secondary btn-block">Modificar Libros</a>
                </div>
            <?php endif; ?>
            <div class="col-md-3">
                <a href="index.php?action=mostrarLibros" class="btn btn-secondary btn-block">Ver Libros en la estantería</a>
            </div>
            <?php if ($_SESSION['rol'] == 'administrador'): ?>
                <div class="col-md-3">
                    <a href="index.php?action=reservarLibro" class="btn btn-secondary btn-block">Gestionar Reservas</a>
                </div>
            <?php endif; ?>
        </div>
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total de Libros</h5>
                        <p class="card-text"><?php echo $totalLibros; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total de Reservas</h5>
                        <p class="card-text"><?php echo $totalReservas; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>