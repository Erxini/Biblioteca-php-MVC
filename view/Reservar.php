<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservar Libro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="http://localhost/Biblioteca/assets/images/logo.jpg" type="image/x-icon">
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
        <h1 class="text-center mb-4">Reservar Libro</h1>
        <form action="index.php?action=reservarLibro" method="POST" class="p-4 border rounded shadow">
            <div class="mb-3">
                <label for="ISBN" class="form-label">ISBN del Libro:</label>
                <input readonly type="text" id="ISBN" name="ISBN" class="form-control" value=<?php echo $_GET['isbn']; ?>>
            </div>
            <div class="mb-3">
                <label for="fecha_desde" class="form-label">Fecha Desde:</label>
                <input type="date" id="fecha_desde" name="fecha_desde" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="fecha_hasta" class="form-label">Fecha Hasta:</label>
                <input type="date" id="fecha_hasta" name="fecha_hasta" class="form-control" required>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Reservar</button>
            </div>
        </form>
        <div class="mt-3 text-center">
            <a href="index.php?action=dashboard" class="btn btn-secondary">Volver a página principal</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>