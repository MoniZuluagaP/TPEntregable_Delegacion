<?php

class ResponsableV
{
    private $numeroEmpleado;
    private $numeroLicencia;
    private $nombreEmpleado;
    private $apellidoEmpleado;

    public function __construct($numEmp, $licEmp, $nomEmp, $apeEmp){
        $this->numeroEmpleado = $numEmp;
        $this->numeroLicencia = $licEmp;
        $this->nombreEmpleado = $nomEmp;
        $this->apellidoEmpleado = $apeEmp;
    }
    public function setNumeroEmpleado($numEmp){
        $this->numeroEmpleado = $numEmp;
    }
    public function setNumLicencia($licEmp){
        $this->numeroLicencia = $licEmp;
    }
    public function setNombreEmpleado($nomEmp){
        $this->nombreEmpleado = $nomEmp;
    }
    public function setApellidoEmpleado($apeEmp){
        $this->apellidoEmpleado = $apeEmp;
    }
    public function getNumeroEmpleado(){
        return $this->numeroEmpleado;
    }
    public function getNumLicencia(){
        return $this->numeroLicencia;
    }
    public function getNombreEmpleado(){
        return $this->nombreEmpleado;
    }
    public function getApellidoEmpleado(){
        return $this->apellidoEmpleado;
    }
    public function __toString(){
        return "\nNumero de empleado: ".$this->getNumeroEmpleado()."\nLicencia: ".$this->getNumLicencia()."\nNombre: ".$this->getNombreEmpleado()." apellido: ".$this->getApellidoEmpleado()."\n";
    }
}