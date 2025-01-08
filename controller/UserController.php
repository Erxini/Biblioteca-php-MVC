<?php
require_once 'model/User.php';

class UserController
{
    public function register()
    {
        $userModel = new User();
        $data = [
            'nombre' => $_POST['nombre'],
            'ape1' => $_POST['ape1'],
            'ape2' => $_POST['ape2'],
            'rol' => $_POST['rol'],
            'clave' => $_POST['password']
        ];
        $userModel->register($data);
        header('Location: index.php?action=login');
        exit;
    }


    public function update()
    {
        $userModel = new User();
        $userModel->update($_POST);
        header('Location: index.php?action=listUsers');
        exit;
    }

    public function delete()
    {
        $userModel = new User();
        $userModel->delete($_GET['id']);
        header('Location: index.php?action=listUsers');
        exit;
    }
}
