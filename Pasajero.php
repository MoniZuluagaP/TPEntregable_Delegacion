<?php

class Pasajero
{
    private $nombre;
    private $apellido;
    private $numDocumento;
    private $telefono;

    public function __construct($nom, $ape, $doc, $numTel)
    {
        $this->nombre = $nom;
        $this->apellido = $ape;
        $this->numDocumento = $doc;
        $this->telefono = $numTel;
    }
    public function setNombre($nom){
        $this->nombre = $nom;
    }
    public function setApellido($ape){
        $this->apellido = $ape;
    }
    public function setDocumento($doc){
        $this->numDocumento = $doc;
    }
    public function setNumeroTelef($numTel){
        $this->telefono = $numTel;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getDocumento(){
        return $this->numDocumento;
    }
    public function getNumeroTelef(){
        return $this->telefono;
    }
    public function __toString(){
        return "\nDNI del pasajero: ".$this->getDocumento()."\nNombre: ".$this->getNombre()." Apellido: ".$this->getApellido()."\nNumero telefónico: ".$this->getNumeroTelef()."\n";
    }
}