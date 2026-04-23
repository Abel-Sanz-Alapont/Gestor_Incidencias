<?php

class Clientes extends Usuarios{
    protected $departamento;
    protected $telefono;

    public function __construct($nombre, $email, $password, $departamento, $telefono, $id = 0)
    {
        parent::__construct($id, $nombre, $email, $password, 'cliente');

        $this->departamento=$departamento;
        $this->telefono=$telefono;

    }
 

    /**
     * Get the value of departamento
     */
    public function getDepartamento()
    {
        return $this->departamento;
    }

    /**
     * Set the value of departamento
     */
    public function setDepartamento($departamento)
    {
        $this->departamento = $departamento;

        
    }

    /**
     * Get the value of telefono
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set the value of telefono
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        
    }
}