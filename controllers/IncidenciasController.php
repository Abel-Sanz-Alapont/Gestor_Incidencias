<?php

class IncidenciasController
{
    private $gestor;

    public function __construct()
    {
        $this->gestor = new IncidenciasManager;
    }

    public function listar()
    {

        if (!isset($_SESSION['id'])) {
            header("Location: index.php?accion=login");
            exit;
        }
        $id_usuario = $_SESSION['id'];
        $rol = $_SESSION['rol'];
        $nombre = $_SESSION['nombre'];

        $incidencias = $this->gestor->obtenerIncidencias($id_usuario, $rol);
        require_once 'views/listar_incidencias.php';
    }

    public function crear()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];

            $id_cliente = $_SESSION['id'];

            if ($this->gestor->crearIncidencia($id_cliente, $titulo, $descripcion)) {
                header("Location: index.php?accion=listar");
                exit();
            } else {
                require_once "views/crear_incidencia.php";
            }
        } else {

            require_once "views/crear_incidencia.php";
        }
    }

    public function actualizar() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id_incidencia'];
        $nuevoEstado = $_POST['nuevo_estado'];
        $this->gestor->actualizarEstado($nuevoEstado, $id); 
        
        header("Location: index.php?accion=listar");
        exit();
    }
}
}
