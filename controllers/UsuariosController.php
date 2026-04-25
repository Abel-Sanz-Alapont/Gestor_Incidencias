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


            $usuario = $this->manager->verificarLogin($email, $password);

            if ($usuario) {

                $_SESSION['id'] = $usuario['id'];
                $_SESSION['nombre'] = $usuario['nombre'];
                $_SESSION['rol'] = $usuario['rol'];


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
        session_destroy();
        header("Location: index.php?accion=login");
        exit();
    }
}
