<?php

class LibroController
{
    private $libroModel;

    public function __construct($libroModel)
    {
        $this->libroModel = $libroModel;
    }

    // Mostrar la vista de libros
    public function mostrarLibros()
    {
        $libros = $this->libroModel->obtenerTodosLosLibros();
        require_once 'view/Libros.php';
    }

    // Agregar un libro
    public function agregarLibro()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = trim($_POST['titulo']);
            $autor = trim($_POST['autor']);
            $isbn = trim($_POST['isbn']);
            $portada = null;

            if (isset($_FILES['portada']) && $_FILES['portada']['error'] == 0) {
                $portada = 'assets/images/' . basename($_FILES['portada']['name']);
                move_uploaded_file($_FILES['portada']['tmp_name'], $portada);
            }

            $this->libroModel->agregarLibro($titulo, $autor, $isbn, $portada);
            header('Location: index.php?action=mostrarLibros');
            exit();
        } else {
            require_once 'view/AgregarLibro.php';
        }
    }

    // Modificar un libro
    public function modificarLibro()
    {
        if (isset($_GET['isbn'])) {
            $isbn = $_GET['isbn'];
            $libro = $this->libroModel->obtenerLibroPorISBN($isbn);

            if (!$libro) {
                // Redirigir si el libro no existe
                header('Location: index.php?action=mostrarLibros');
                exit();
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $titulo = $_POST['titulo'];
                $autor = $_POST['autor'];
                $isbnNuevo = $_POST['isbn'];
                $portada = $libro['portada'];

                // Verificar si se ha subido una nueva portada
                if (isset($_FILES['portada']) && $_FILES['portada']['error'] == 0) {
                    $portada = 'assets/images/' . basename($_FILES['portada']['name']);
                    move_uploaded_file($_FILES['portada']['tmp_name'], $portada);
                }

                $this->libroModel->modificarLibroPorISBN($isbn, $titulo, $autor, $isbnNuevo, $portada);

                // Redirigir a la lista de libros
                header('Location: index.php?action=mostrarLibros');
                exit();
            }

            // Pasar los datos del libro a la vista
            include 'view/ModificarLibro.php';
        } else {
            // Si no hay parámetro isbn, redirigir
            header('Location: index.php?action=mostrarLibros');
            exit();
        }
    }

    // Eliminar Libro
    public function eliminarLibro()
    {
        if (isset($_GET['isbn'])) {
            $isbn = $_GET['isbn'];
            $this->libroModel->eliminarLibroPorIsbn($isbn);
            header('Location: index.php?action=mostrarLibros');
            exit();
        } else {
            header('Location: index.php?action=mostrarLibros');
            exit();
        }
    }
}
