<?php
include_once "./conector/BaseDatos.php";
class Persona {
    private $dni;
    private $nombre;
    private $apellido;
    private $fechaNac;
    private $telefono;
    private $domicilio;
    private $mensajeOperacion;
 
    public function __construct () {
        $this->dni = 0;
        $this->nombre = "";
        $this->apellido = "";
        $this->fechaNac = "";
        $this->telefono = 0;
        $this->domicilio = "";
        $this->mensajeOperacion = "";
    }

    public function getDni(){
        return $this->dni;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function getFechaNac(){
        return $this->fechaNac;
    }

    public function getTelefono(){
        return $this->telefono;
    }

    public function getDomicilio(){
        return $this->domicilio;
    }

    public function getMensajeOperacion(){
        return $this->mensajeOperacion;
    }



    public function setDni($dni){
        $this->dni=$dni;
    }

    public function setNombre($nombre){
        $this->nombre=$nombre;
    }

    public function setApellido($apellido){
        $this->apellido=$apellido;
    }

    public function setFechaNac($fechaNac){
        $this->fechaNac=$fechaNac;
    }

    public function setTelefono($telefono){
        $this->telefono=$telefono;
    }

    public function setDomicilio($domicilio){
        $this->domicilio=$domicilio;
    }

    public function setMensajeOperacion($mensajeOperacion){
        $this->mensajeOperacion=$mensajeOperacion;
    }

    public function __toString(){
        $cadena = "\nNombre: " .$this->getNombre().
                "\nApellido: " .$this->getApellido().
                "\nDNI: " .$this->getDni().
                "\nFecha de nacimiento: " .$this->getFechaNac().
                "\nNum. de telefono: " .$this->getTelefono().
                "\nDomicilio: " .$this->getDomicilio(). "\n";
        return $cadena;
    }

    public function insertar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "INSERT INTO persona(NroDni,Apellido,Nombre,fechaNac,Telefono,Domicilio) 
            VALUES(".$this->getDni().",'".$this->getApellido()."','".$this->getNombre()."','".$this->getFechaNac().
            "','".$this->getTelefono().",".$this->getDomicilio().");";
        if ($base->Iniciar()) {
            if ($dni = $base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion($base->getError());
            }
        } else {
            $this->setMensajeOperacion($base->getError());
        }
        return $resp;
    }

    public function modificar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "UPDATE persona SET NroDni='" .$this->getDni(). ",Apellido='" .$this->getApellido().
            "',Nombre='" .$this->getNombre(). "',fechaNac='" .$this->getFechaNac(). "',Telefono='" .$this->getTelefono().
            ",Domicilio='" .$this->getDomicilio(). "' WHERE NroDni=" .$this->getDni();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion($base->getError());
            }
        } else {
            $this->setMensajeOperacion($base->getError());
        }
        return $resp;
    }

    public function eliminar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM persona WHERE NroDni=" .$this->getDni();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion($base->getError());
            }
        } else {
            $this->setMensajeOperacion($base->getError());
        }
        return $resp;
    }

    public function buscar($dniBusqueda){
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM persona WHERE NroDni=" .$dniBusqueda;
        if ($base->Iniciar()) {
            if($base->Ejecutar($sql)){
                if($row = $base->Registro()){
                    $this->cargar($row['NroDni'], $row['Apellido'], $row['Nombre'], 
                    $row['fechaNac'], $row['Telefono'], $row['Domicilio']); 
                    $resp = true;
                }
            } else {
                $this->setMensajeOperacion($base->getError());
            }
        } else {
            $this->setMensajeOperacion($base->getError());
        }
        return $resp;
    }

    public function cargar($dni, $apellido, $nombre, $fechaNac, $telefono, $domicilio){
        $this->dni = $dni;
        $this->apellido = $apellido;
        $this->nombre = $nombre;
        $this->fechaNac = $fechaNac;
        $this->telefono = $telefono;
        $this->domicilio = $domicilio;
    }


}