<?php
require_once 'autoload.php';

session_start();


$iController = new IncidenciasController();

if (!isset($_SESSION['id']) && isset($_COOKIE['usuario_login'])) {

    $emailRecuperado = base64_decode($_COOKIE['usuario_login']);

    $gestorUsuario = new GestorUsuarios();
    $usuario = $GestorUsuarios->buscarUsuario($emailRecuperado);

    if ($usuario) {

        $_SESSION['id'] = $usuario = ['id'];
        $_SESSION['nombre'] = $usuario = ['nombre'];
        $_SESSION['rol'] = $usuario = ['id'];

    }else {
        setcookie('usuario_login', '', time() - 3600, '/');
    }

}

$accion = $_GET['accion'] ?? 'login';
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
