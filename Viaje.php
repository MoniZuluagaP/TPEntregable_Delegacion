<?php

class Viaje {
    private $codViaje;
    private $destViaje;
    private $cantMaxPasajeros;
    private $colPasajeros; //Arreglo multidimensional. Un arreglo indexado en el que cada elemento es un arreglo cuyos elementos son de clase Pasajero
    private $responsableViaje;

    public function __construct( $identViaje, $destino, $cantidadMax, ResponsableV $responsable){
        $this->codViaje = $identViaje;
        $this->destViaje = $destino;
        $this->cantMaxPasajeros = $cantidadMax;
        $this->responsableViaje = $responsable;
        $this->colPasajeros = [];
    }
    public function setCodViaje($identViaje){
        $this->codViaje = $identViaje;
    }
    public function setDestViaje($destino){
        $this->destViaje = $destino;
    }
    public function setCantPasajeros($cantidadMax){
        $this->cantMaxPasajeros = $cantidadMax;
    }
    public function setRespViaje(ResponsableV $responsable){
        $this->responsableViaje = $responsable;
    }
    public function setListaPasajeros($colPasajeros){
        $this->colPasajeros = $colPasajeros;
    }
    public function getCodViaje(){
        return $this->codViaje;
    }
    public function getDestViaje(){
        return $this->destViaje;
    }
    public function getCantPasajeros(){
        return $this->cantMaxPasajeros;
    }
    public function getRespViaje(){
        return $this->responsableViaje;
    }
    public function getListaPasajeros(){
        return $this->colPasajeros;
    }
    public function encontrarPasajero($idPasajero){
        $listadoPasaj = $this->getListaPasajeros();
        $estaEnLista = false;
        $i=0;
        while($i<count($listadoPasaj) ){
            if ($listadoPasaj[$i]->getDocumento()==$idPasajero){
                $estaEnLista = true;
            }
            $i++;
        }
        return $estaEnLista;
    }
    public function agregarPasajero(Pasajero $unPasajero){
        $existePasajero = $this->encontrarPasajero($unPasajero->getDocumento());
        //echo $existePasajero;
        $agregado = false;
        $listadoPasaj = $this->getListaPasajeros();
        if (!$existePasajero){
            if (count($listadoPasaj)<$this->getCantPasajeros()){
                array_push($listadoPasaj, $unPasajero);
                $this->setListaPasajeros($listadoPasaj);
                $agregado = true;
            }
        }
        return $agregado;
    }
    public function modifDatosPasajero($idPasajero){
        $existePasajero = $this->encontrarPasajero($idPasajero);
        $listadoPasaj = $this->getListaPasajeros();
        $i = 0;
        $encontrado = false;
        $posPasajero = -1;
        if ($existePasajero){
            while($i<count($listadoPasaj) && !$encontrado){
                if ($listadoPasaj[$i]->getDocumento() == $idPasajero ){
                    $encontrado = true;
                    $posPasajero = $i;
                }
                $i++;
            }
        }
        return $posPasajero;
    }
    public function mostrarPasajeros(){
        $listadoPasaj = $this->getListaPasajeros();
        for($i=0; $i<count($listadoPasaj);$i++){
            echo "Nombre: ".$listadoPasaj[$i]->getNombre()." ".$listadoPasaj[$i]->getApellido().". DNI: ".$listadoPasaj[$i]->getDocumento().". Numero telefónico: ".$listadoPasaj[$i]->getNumeroTelef();
            echo "\n";
        }
    }
    public function __toString(){
        return "Viaje: ".$this->getCodViaje().". Destino: ".$this->getDestViaje().". Capacidad: ".$this->getCantPasajeros()." personas".
            "\nReponsable del viaje: ".$this->getRespViaje()->getNombreEmpleado()." ".$this->getRespViaje()->getApellidoEmpleado();
    }
}