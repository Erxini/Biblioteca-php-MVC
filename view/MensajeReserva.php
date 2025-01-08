<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensaje de Reserva</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .mensaje-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .mensaje-boton {
            padding: 20px;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <div class="container mensaje-container">
        <a href="index.php?action=mostrarLibros" class="btn btn-primary mensaje-boton"><?php echo $mensaje; ?></a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>