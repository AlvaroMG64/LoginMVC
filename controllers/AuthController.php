<?php
require_once __DIR__ . '/../models/Usuario.php';

class AuthController
{
    private $userModel;
    private $timeout = 7200; // 2 horas

    public function __construct()
    {
        $this->userModel = new Usuario();
    }

    public function login()
    {
        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        include __DIR__ . '/../views/login.php';
    }

    public function authenticate()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') return;

        // CSRF
        if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            $_SESSION['error'] = "Token CSRF inválido.";
            header("Location: index.php");
            exit();
        }

        // Intentos de acceso
        $_SESSION['intentos'] = $_SESSION['intentos'] ?? 0;
        if ($_SESSION['intentos'] >= 5) {
            $_SESSION['error'] = "Demasiados intentos fallidos.";
            header("Location: index.php");
            exit();
        }

        // Sanitización
        $identificador = filter_input(INPUT_POST, 'identificador', FILTER_SANITIZE_SPECIAL_CHARS);
        $password = $_POST['password'];

        $user = $this->userModel->login($identificador, $password);

        if ($user) {
            session_regenerate_id(true);

            $_SESSION['idusuario'] = $user['idusuario'];
            $_SESSION['nombre'] = $user['nombre'];
            $_SESSION['apellidos'] = $user['apellidos'];
            $_SESSION['login_time'] = time();
            $_SESSION['intentos'] = 0;

            // Token de sesión
            $_SESSION['session_token'] = bin2hex(random_bytes(32));

            header("Location: index.php?action=dashboard");
            exit();
        } else {
            $_SESSION['intentos']++;
            $_SESSION['error'] = "Usuario o contraseña incorrectos.";
            header("Location: index.php");
            exit();
        }
    }

    public function dashboard()
    {
        if (!isset($_SESSION['idusuario']) || !isset($_SESSION['login_time']) ||
            (time() - $_SESSION['login_time']) > $this->timeout) {
            $this->logout();
        }
        include __DIR__ . '/../views/dashboard.php';
    }

    public function logout()
    {
        $_SESSION = [];
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
        header("Location: index.php");
        exit();
    }
}