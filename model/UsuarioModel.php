<?php
class Usuario
{
    public $id;
    public $nombre;
    public $ape1;
    public $ape2;
    public $rol;
    private $password;

    public function __construct($id, $nombre, $ape1, $ape2, $rol, $password = null)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->ape1 = $ape1;
        $this->ape2 = $ape2;
        $this->rol = $rol;
        $this->password = $password;
    }
    public function verificarPassword($password)
    {
        return password_verify($password, $this->password);
    }
}
class UsuarioModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
    public function autenticarUsuario($username, $password)
    {
        $query = "SELECT * FROM usuarios WHERE nombre = :username";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        error_log("Resultado de la consulta: " . print_r($result, true));

        if ($result && $password === $result['clave']) {
            return new Usuario($result['id'], $result['nombre'], $result['ape1'], $result['ape2'], $result['rol']);
        } else {
            error_log("Contraseña incorrecta o usuario no encontrado para: " . $username);
        }
        return null;
    }
}
