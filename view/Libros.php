<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
    <div class="container">
        <h1 class="mt-5">Lista de Libros</h1>
        <div class="d-flex justify-content-between mb-3">
            <a href="index.php?action=dashboard" class="btn btn-secondary">Regresar al panel de Administración</a>
            <a href="index.php?action=logout" class="btn btn-danger">Salir</a>
        </div>
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>Portada</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>ISBN</th>
                    <th>Préstamos</th>
                    <?php if ($_SESSION['rol'] == 'administrador'): ?>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($libros as $libro): ?>
                    <tr>
                        <td><img src="<?php echo $libro['portada']; ?>" alt="Portada" width="70"></td>
                        <td><?php echo $libro['titulo']; ?></td>
                        <td><?php echo $libro['autor']; ?></td>
                        <td><?php echo $libro['ISBN']; ?></td>
                        <td>
                            <a href="index.php?action=reservarLibro&isbn=<?php echo $libro['ISBN']; ?>" class="btn btn-primary">Reservar</a>
                        </td>
                        <?php if ($_SESSION['rol'] == 'administrador'): ?>
                            <td>
                                <a href="index.php?action=modificarLibro&isbn=<?php echo $libro['ISBN']; ?>&autor=<?php echo $libro['autor']; ?>&titulo=<?php echo $libro['titulo']; ?> " class="btn btn-primary">Editar</a>
                            </td>
                        <?php endif; ?>
                        <?php if ($_SESSION['rol'] == 'administrador'): ?>
                            <td>
                                <a href="index.php?action=eliminarLibro&isbn=<?php echo $libro['ISBN']; ?>" class="btn btn-primary">Eliminar</a>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>