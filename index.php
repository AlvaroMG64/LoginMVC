<?php
require_once 'controllers/AuthController.php';
require_once 'models/Usuario.php';

// Cookies de sesión seguras
session_set_cookie_params([
    'lifetime' => 0,
    'path' => '/',
    'secure' => isset($_SERVER['HTTPS']),
    'httponly' => true,
    'samesite' => 'Strict'
]);

session_start();

$controller = new AuthController();

$action = $_REQUEST['action'] ?? 'login';

switch ($action) {
    case 'authenticate':
        $controller->authenticate();
        break;
    case 'dashboard':
        $controller->dashboard();
        break;
    case 'logout':
        $controller->logout();
        break;
    default:
        $controller->login();
        break;
}