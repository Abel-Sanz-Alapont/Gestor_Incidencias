<?php

class UsuariosController {
    private $manager;

    public function __construct() {
        
        $this->manager = new GestorUsuarios();
    }

   
    public function login() {
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            
            $usuario = $this->manager->verificarLogin($email, $password);

            if ($usuario) {
                
                $_SESSION['id'] = $usuario['id'];
                $_SESSION['nombre'] = $usuario['nombre'];
                $_SESSION['rol'] = $usuario['rol'];

                
                header("Location: index.php?accion=listar");
                exit();
            } else {
                
                $error = "Email o contraseña incorrectos.";
                require_once 'views/login.php';
            }
        } else {
            
            require_once 'views/login.php';
        }
    }

    
    public function registro() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $departamento = $_POST['departamento'];
            $telefono = $_POST['telefono'];

            
            if ($this->manager->registrarCliente($nombre, $email, $password, $departamento, $telefono)) {
                
                header("Location: index.php?accion=login");
                exit();
            } else {
                $error = "No se pudo realizar el registro. Inténtalo de nuevo.";
                require_once 'views/registro.php';
            }
        } else {
            require_once 'views/registro.php';
        }
    }

    public function logout() {
        session_destroy();
        header("Location: index.php?accion=login");
        exit();
    }
}