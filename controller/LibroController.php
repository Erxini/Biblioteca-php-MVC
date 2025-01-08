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
            $portada = $_FILES['portada'];

            if (!empty($titulo) && !empty($autor) && !empty($isbn) && !empty($portada)) {
                // Crear el directorio 'uploads' si no existe
                if (!is_dir('assets/images')) {
                    mkdir('assets/images', 0777, true);
                }

                // Manejar la carga de la imagen de la portada
                $portadaRuta = 'assets/images/' . basename($portada['name']);
                if (move_uploaded_file($portada['tmp_name'], $portadaRuta)) {
                    $this->libroModel->agregarLibro($titulo, $autor, $isbn, $portadaRuta);
                    header('Location: index.php?action=mostrarLibros');
                    exit();
                } else {
                    echo "Error al cargar la imagen de la portada.";
                }
            } else {
                echo "Por favor, complete todos los campos.";
            }
        } else {
            require_once 'view/AgregarLibro.php';
        }
    }

    // Modificar un libro
    public function modificarLibro()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_GET['id'];
            $titulo = trim($_POST['titulo']);
            $autor = trim($_POST['autor']);
            $isbn = trim($_POST['isbn']);
            $portada = $_FILES['portada'];

            if (!empty($titulo) && !empty($autor) && !empty($isbn)) {
                // Manejar la carga de la imagen de la portada si se ha subido una nueva imagen
                if (!empty($portada['name'])) {
                    // Crear el directorio 'uploads' si no existe
                    if (!is_dir('assets/images')) {
                        mkdir('assets/images', 0777, true);
                    }

                    $portadaRuta = 'assets/images/' . basename($portada['name']);
                    if (move_uploaded_file($portada['tmp_name'], $portadaRuta)) {
                        $this->libroModel->modificarLibro($id, $titulo, $autor, $isbn, $portadaRuta);
                    } else {
                        echo "Error al cargar la imagen de la portada.";
                        return;
                    }
                } else {
                    $this->libroModel->modificarLibro($id, $titulo, $autor, $isbn);
                }
                header('Location: index.php?action=mostrarLibros');
                exit();
            } else {
                echo "Por favor, complete todos los campos.";
            }
        } else {
            $id = $_GET['id'];
            $libro = $this->libroModel->obtenerLibroPorId($id);
            require_once 'view/modificarLibro.php';
        }
    }
    // Eliminar Libro
    public function eliminarLibro()
    {
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $this->libroModel->eliminarLibroPorId($id);
            header('Location: index.php?action=mostrarLibros');
            exit();
        } else {
            echo "ID del libro no proporcionado.";
        }
    }
}
