<?php

class IncidenciasManager
{
    private $db;

    public function __construct()
    {
        // conexion Singleton
        $this->db = Connection::getInstance()->getConn();
    }

    // Metodo de obtener incicendias dependiendo del usuario
    public function obtenerIncidencias($id_usuario, $rol)
    {
        //si es administrador ve todo 
        if ($rol === 'administrador') {
            $sql = "SELECT incidencias.*, usuarios.nombre AS nombre_cliente 
                    FROM incidencias 
                    INNER JOIN usuarios ON incidencias.id_cliente = usuarios.id 
                    ORDER BY incidencias.id DESC";

            $stmt = $this->db->prepare($sql);
            $stmt->execute();
        } else {
            // si es cliente solo ve sus propias incidencias
            $sql = "SELECT * FROM incidencias WHERE id_cliente = ? ORDER BY id DESC";
            $stmt = $this->db->prepare($sql);

            $stmt->execute([$id_usuario]);
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function crearIncidencia($id_cliente, $titulo, $descripcion)
    {
        $sql = "INSERT INTO incidencias (id_cliente, titulo, descripcion, estado) 
            VALUES (?, ?, ?, 'abierta')";

        $stmt = $this->db->prepare($sql);
        
        return $stmt->execute([$id_cliente, $titulo, $descripcion]);
    }
}
