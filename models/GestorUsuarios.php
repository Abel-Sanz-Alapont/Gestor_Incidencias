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

        $sql = "INSERT INTO usuarios (nombre, email, password, rol, departamento, telefono) VALUES(?,?,?,'cliente',?,?)";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([$nombre, $email, $passwordEncryptada, $departamento, $telefono]);
    }

    public function registrarAdministrador($nombre, $email, $password, $numero_empleado, $especialidad)
    {
        $passwordEncryptada = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (nombre, email, password, rol, numero_empleado, especialidad) VALUES(?,?,?,'administrador',?,?)";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([$nombre, $email, $passwordEncryptada, $numero_empleado, $especialidad]);
    }


    public function verificarLogin($email, $password)
    {
        $sql = "SELECT * FROM usuarios WHERE email= ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$email]);
        $datosUsuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($datosUsuario && password_verify($password, $datosUsuario['password'])) {
            return $datosUsuario;
        }
        return false;
    }
}
