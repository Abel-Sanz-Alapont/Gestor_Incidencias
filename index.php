<?php
require_once 'autoload.php';

session_start();

$accion = $_GET['accion'] ?? 'login';

switch ($accion) {
    
    case 'login':
        $uController = new UsuariosController();
        $uController->login();
        break;

    case 'registro':
        $uController = new UsuariosController();
        $uController->registro();
        break;

    case 'logout':
        $uController = new UsuariosController();
        $uController->logout();
        break;

    case 'listar':
    case 'crear':
        if (!isset($_SESSION['id'])) {
            header("Location: index.php?accion=login");
            exit();
        }

        $iController = new IncidenciasController();

        if ($accion === 'listar') {
            $iController->listar();
        } elseif ($accion === 'crear') {
            $iController->crear();
        }
        break;

    default:
        header("Location: index.php?accion=login");
        break;
}