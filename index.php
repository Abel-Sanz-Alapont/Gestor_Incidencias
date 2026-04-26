<?php
require_once 'autoload.php';

session_start();

$accion = $_GET['accion'] ?? 'login';
$iController = new IncidenciasController();

switch ($accion) {

    case 'login':
        $usuarioController = new UsuariosController();
        $usuarioController->login();
        break;

    case 'registro':
        $usuarioController = new UsuariosController();
        $usuarioController->registro();
        break;

    case 'logout':
        $usuarioController = new UsuariosController();
        $usuarioController->logout();
        break;

    case 'listar':
    case 'crear':
    case 'actualizar':
    case 'eliminar':
        if (!isset($_SESSION['id'])) {
            header("Location: index.php?accion=login");
            exit();
        }

    
        if ($accion === 'listar') {
            $iController->listar();
        } elseif ($accion === 'crear') {
            $iController->crear();
        } elseif ($accion === 'actualizar') {
            $iController->actualizar();
        } elseif ($accion === 'eliminar') {
            $iController->eliminar();
        }

        break;

    default:
        header("Location: index.php?accion=login");
        break;
}
