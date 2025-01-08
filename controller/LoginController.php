<?php

class LoginController
{
    private $usuarioModel;

    public function __construct($usuarioModel)
    {
        $this->usuarioModel = $usuarioModel;
    }

    public function showLogin()
    {
        $error = isset($_GET['error']) ? "Usuario o contraseña incorrectos" : null;
        require_once 'view/login.php';
    }

    public function showRegister()
    {
        require_once 'view/register.php';
    }
    public function autenticar()
    {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        // Depuración: Verificar que los datos se están recibiendo correctamente
        error_log("Username: " . $username);
        error_log("Password: " . $password);

        if (!empty($username) && !empty($password)) {
            $usuario = $this->usuarioModel->autenticarUsuario($username, $password);

            // Depuración: Verificar que la autenticación se está realizando correctamente
            if ($usuario) {
                error_log("Usuario autenticado: " . print_r($usuario, true));
                $_SESSION['id_usuario'] = $usuario->id;
                $_SESSION['rol'] = $usuario->rol;

                // Redirigir al administrador a la página dashBoard.php
                if ($usuario->rol === 'administrador') {
                    header('Location: index.php?action=dashboard');
                } else {
                    header('Location: index.php?action=mostrarLibros');
                }
                exit();
            } else {
                error_log("Autenticación fallida para el usuario: " . $username);
            }
        } else {
            error_log("Datos de login incompletos");
        }
        header('Location: index.php?action=login&error=1');
        exit();
    }
}
