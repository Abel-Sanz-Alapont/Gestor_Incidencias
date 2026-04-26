<?php

class UsuariosController
{
    private $manager;

    public function __construct()
    {

        $this->manager = new GestorUsuarios();
    }


    public function login()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $recordar =$_POST['recodar'];


            $usuario = $this->manager->verificarLogin($email, $password);

            if ($usuario) {

                $_SESSION['id'] = $usuario['id'];
                $_SESSION['nombre'] = $usuario['nombre'];
                $_SESSION['rol'] = $usuario['rol'];
                if ($recordar) {
                    $token =base64_encode($usuario['email']);

                    setcookie(
                        "usuario_login",
                        $token,
                        [
                            'expires'=>time() +(86400 *30),
                            'path'=>'/',
                            'httponly'=>true,
                            'samesite'=>'Stric'
                        ]
                    );
                }


                header("Location: index.php?accion=listar");
                exit();
            }
        }
         include 'views/login.php';
    }


    public function registro()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $rol = $_POST['rol'];

            if ($rol == "administrador") {
                $numero_empleado = $_POST['numero_empleado'];
                $especialidad = $_POST['especialidad'];

                $this->manager->registrarAdministrador($nombre, $email, $password, $numero_empleado, $especialidad);
            } else {

                $departamento = $_POST['departamento'];
                $telefono = $_POST['telefono'];
                $this->manager->registrarCliente($nombre, $email, $password, $departamento, $telefono);
            }
            header("Location: index.php?accion=login");
            exit();
        }
        include "views/registro.php";
    }

    public function logout()
    {
        $_SESSION=[];
        session_destroy();

        if (isset($_COOKIE['usuario_login'])) {
            setcookie('usuario_login', '', time() - 360000, '/');
        }

        header("Location: index.php?accion=login");
        exit();
    }
}
