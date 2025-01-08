<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Libro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
        <h1>Modificar Libro</h1>
        <form action="index.php?action=modificarLibro&id=<?php echo $libro['id']; ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" id="titulo" name="titulo" class="form-control" value="<?php echo $libro['titulo']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="autor" class="form-label">Autor:</label>
                <input type="text" id="autor" name="autor" class="form-control" value="<?php echo $libro['autor']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="isbn" class="form-label">ISBN:</label>
                <input type="text" id="isbn" name="isbn" class="form-control" value="<?php echo $libro['ISBN']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="portada" class="form-label">Portada:</label>
                <input type="file" id="portada" name="portada" class="form-control">
                <img src="<?php echo $libro['portada']; ?>" alt="Portada" width="100">
            </div>
            <button type="submit" class="btn btn-primary">Modificar Libro</button>
            <a href="index.php?action=dashboard" class="btn btn-secondary">Regresar al Dashboard</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>