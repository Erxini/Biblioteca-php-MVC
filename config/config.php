<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'biblioteca');
define('DB_USER', 'root');
define('DB_PASS', '');

// Ruta base del proyecto
define('BASE_URL', '/biblioteca/');

// Verificar si una sesión ya está activa
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Manejo de errores y configuración general (opcional)
error_reporting(E_ALL);
ini_set('display_errors', 1);
