<?php

class Administradores extends Usuarios{

    protected $numeroEmpleado;
    protected $especialidad;

    public function __construct($nombre, $email, $password, $numeroEmpleado,$especialidad, $id = 0)
    {
        parent::__construct($id,$nombre,$email, $password, 'administrador');

        $this->numeroEmpleado=$numeroEmpleado;
        $this->especialidad=$especialidad;
    }


    /**
     * Get the value of numeroEmpleado
     */
    public function getNumeroEmpleado()
    {
        return $this->numeroEmpleado;
    }

    /**
     * Set the value of numeroEmpleado
     */
    public function setNumeroEmpleado($numeroEmpleado)
    {
        $this->numeroEmpleado = $numeroEmpleado;

        
    }

    /**
     * Get the value of especialidad
     */
    public function getEspecialidad()
    {
        return $this->especialidad;
    }

    /**
     * Set the value of especialidad
     */
    public function setEspecialidad($especialidad)
    {
        $this->especialidad = $especialidad;

        
    }
}