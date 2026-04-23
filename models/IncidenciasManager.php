<?php

class IncidenciasManager{
    private $db;

       public function __construct(){   
        // conexion Singleton
        $this->db= Connection::getInstance()->getConn();
    }

    // Metodo de obtener incicendias dependiendo del usuario
    public function obtenerIncidencias($id_usuario, $rol){
        //si es administrador ve todo 
        if ($rol=== 'administrador') {
            $sql = "SELECT incidiencias.*, usuarios.nombre FROM incidencias INNER JOIN usuarios ON incidencias.id_cliente = usuarios.id ORDER BY incidencias.id DESC ";

            $stmt=$this->db->prepare($sql);
            $stmt->execute();

        }else{
            // si es cliente solo ve sus propias incidencias
            $sql="SELECT * FROM incidencias WHERE id_cliente = ? ORDER BY id DESC";
            $stmt=$this->db->prepare($sql);
            $stmt->execute();

        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}