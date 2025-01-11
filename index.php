<?php
session_start();

// Incluir configuración y clases principales
require 'config/config.php';
require 'core/Database.php';
require 'model/UsuarioModel.php';
require 'model/LibroModel.php';
require 'model/ReservarModel.php';
require 'controller/LoginController.php';
require 'controller/LibroController.php';
require 'controller/ReservaController.php';
require 'controller/DashboardController.php';
require 'controller/UserController.php';

// Inicializar base de datos y modelos
$database = new Database();
$db = $database->getConnection();

$usuarioModel = new UsuarioModel($db);
$libroModel = new LibroModel($db);
$reservaModel = new ReservarModel($db);

// Inicializar controladores
$loginController = new LoginController($usuarioModel);
$libroController = new LibroController($libroModel);
$reservaController = new ReservaController($reservaModel);
$dashboardController = new DashboardController();
$userController = new UserController();

// Determinar la acción
$action = isset($_GET['action']) ? $_GET['action'] : 'login';

// Rutas de acciones
switch ($action) {
    case 'login':
        include 'view/login.php';
        break;
    case 'autenticar':
        $loginController->autenticar();
        break;
    case 'dashboard':
        $dashboardController->mostrarDashboard();
        break;
    case 'mostrarLibros':
        $libroController->mostrarLibros();
        break;
    case 'reservarLibro':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $reservaController->reservarLibro();
        } else {
            include 'view/Reservar.php';
        }
        break;
    case 'agregarLibro':
        if ($_SESSION['rol'] == 'administrador') {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $libroController->agregarLibro();
            } else {
                include 'view/AgregarLibro.php';
            }
        } else {
            header('Location: index.php?action=dashboard');
            exit();
        }
        break;

    case 'modificarLibro':
        if ($_SESSION['rol'] == 'administrador') {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $libroController->modificarLibro();
            } else {
                $libroController->modificarLibro();
            }
        } else {
            header('Location: index.php?action=dashboard');
            exit();
        }
        break;
    case 'eliminarLibro':
        if ($_SESSION['rol'] == 'administrador') {
            $libroController->eliminarLibro();
        } else {
            header('Location: index.php?action=dashboard');
            exit();
        }
        break;
    case 'register':
        include 'view/register.php';
        break;
    case 'registerUser':
        $userController->register();
        break;
    default:
        include 'view/login.php';
        break;
}
