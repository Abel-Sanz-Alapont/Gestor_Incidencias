<?php

class Clientes extends Usuario{
    protected $departamento;
    protected $telefono;

    public function __construct($email, $password, $departamento, $telefono, $id = 0)
    {
        parent::__construct($email, $password, $id);

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