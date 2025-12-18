<?php
require_once 'config/Database.php';

class Usuario
{
    private $PDO;
    private $tabla = "usuarios";

    public function __construct()
    {
        $db = new Database();
        $this->PDO = $db->getConnection();
    }

    public function login($identificador, $password)
    {
        $sql = "SELECT * FROM {$this->tabla} WHERE idusuario = ? LIMIT 1";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute([$identificador]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Comparación directa de texto plano
        if ($user && $password === $user['password']) {
            return $user;
        }
        return false;
    }
}