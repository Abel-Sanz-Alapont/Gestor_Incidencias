<?php

class GestorUsuarios
{

    private $db;

    public function __construct()
    {
        $this->db = Connection::getInstance()->getConn();
    }

    public function registrarCliente($nombre, $email, $password, $departamento, $telefono)
    {
        $passwordEncryptada = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (nombre, email, password, rol, departamento, telefono) VALUES(:nombre,:email,:password,'cliente',:departamento,:telefono)";

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':password', $password, PDO::PARAM_STR);
        $stmt->bindValue(':departamento', $departamento, PDO::PARAM_STR);
        $stmt->bindValue(':telefono', $telefono, PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function registrarAdministrador($nombre, $email, $password, $numero_empleado, $especialidad)
    {
        $passwordEncryptada = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (nombre, email, password, rol, numero_empleado, especialidad) VALUES(:nombre,:email,:password,'administrador',:numero_empleado,:especialidad)";

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':password', $password, PDO::PARAM_STR);
        $stmt->bindValue(':numero_empleado', $numero_empleado, PDO::PARAM_STR);
        $stmt->bindValue(':especialidad', $especialidad, PDO::PARAM_STR);

        return $stmt->execute();
    }


    public function verificarLogin($email, $password)
    {
        $sql = "SELECT * FROM usuarios WHERE email= :email";
        $stmt = $this->db->prepare($sql);
        
        $stmt->bindValue(':email',$email,PDO::PARAM_STR);

        $stmt->execute();
        $datosUsuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($datosUsuario && password_verify($password, $datosUsuario['password'])) {
            return $datosUsuario;
        }
        return false;
    }

    public function buscarUsuario($email)
    {
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
