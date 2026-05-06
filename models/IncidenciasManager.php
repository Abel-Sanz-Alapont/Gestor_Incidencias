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
            $sql = "SELECT * FROM incidencias WHERE id_cliente =:id_cliente ORDER BY id DESC";
            $stmt = $this->db->prepare($sql);

           $stmt->bindValue(':id_cliente', $id_usuario,PDO::PARAM_INT);
           $stmt->execute();
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function crearIncidencia($id_cliente, $titulo, $descripcion)
    {
        $sql = "INSERT INTO incidencias (id_cliente, titulo, descripcion, estado) 
            VALUES (:id_cliente, :titulo, :descripcion, 'abierta')";

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':id_cliente', $id_cliente, PDO::PARAM_INT);
        $stmt->bindValue(':titulo', $titulo, PDO::PARAM_STR);
        $stmt->bindValue(':descripcion', $descripcion, PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function actualizarEstado($estado, $id)
    {
        $sql = "UPDATE incidencias SET estado = :estado WHERE id= :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':estado', $estado, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function eliminarIncidencia($id)
    {
        $sql = "DELETE FROM incidencias WHERE id=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id,PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function buscarIncidenciaPorIdUsuario($id_cliente)
    {
        $sql = "SELECT incidencias.*, usuarios.nombre AS nombre_cliente FROM incidencias JOIN usuarios ON incidencias.id_cliente = usuarios.id WHERE incidencias.id_cliente = :id_cliente ORDER BY incidencias.id DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_cliente', $id_cliente, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
