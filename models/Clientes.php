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
 
}