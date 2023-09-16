<?php
class Persona {
    private $NroDni;
    private $nombre;
    private $apellido;
    private $fechaNac;
    private $telefono;
    private $domicilio;
    private $mensajeOperacion;
 
    public function __construct () {
        $this->NroDni = 0;
        $this->nombre = "";
        $this->apellido = "";
        $this->fechaNac = "";
        $this->telefono = 0;
        $this->domicilio = "";
        $this->mensajeOperacion = "";
    }

    public function getNroDni(){
        return $this->NroDni;
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



    public function setNroDni($NroDni){
        $this->NroDni=$NroDni;
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

    /*
    public function __toString(){
        $cadena = "\nNombre: " .$this->getNombre().
                "\nApellido: " .$this->getApellido().
                "\nNroDni: " .$this->getNroDni().
                "\nFecha de nacimiento: " .$this->getFechaNac().
                "\nNum. de telefono: " .$this->getTelefono().
                "\nDomicilio: " .$this->getDomicilio(). "\n";
        return $cadena;
    }
    */

    public function cargar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="SELECT * FROM persona WHERE NroDni = ".$this->getNroDni();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $this->setear($row['NroDni'], $row['Nombre'], $row['Apellido']
                    , $row['fechaNac'], $row['Telefono'], $row['Domicilio']);
                    
                }
            }
        } else {
            $this->setmensajeoperacion($base->getError());
        }
        return $resp;
    
        
    }

    public function insertar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "INSERT INTO persona(NroDni,Apellido,Nombre,fechaNac,Telefono,Domicilio) 
            VALUES(".$this->getNroDni().",'".$this->getApellido()."','".$this->getNombre()."','".$this->getFechaNac().
            "','".$this->getTelefono()."','".$this->getDomicilio()."');";
        if ($base->Iniciar()) {
            if ($NroDni = $base->Ejecutar($sql)) {
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
        $sql = "UPDATE persona SET NroDni='" .$this->getNroDni(). ",Apellido='" .$this->getApellido().
            "',Nombre='" .$this->getNombre(). "',fechaNac='" .$this->getFechaNac(). "',Telefono='" .$this->getTelefono().
            ",Domicilio='" .$this->getDomicilio(). "' WHERE NroDni=" .$this->getNroDni();
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
        $sql = "DELETE FROM persona WHERE NroDni=" .$this->getNroDni();
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

    public static function listar($parametro=""){
        $arreglo = array();
        $base=new BaseDatos();
        $sql="SELECT * FROM 
        persona ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                
                while ($row = $base->Registro()){
                    $obj= new Persona();
                    $obj->setear($row['NroDni'], $row['Apellido'], $row['Nombre'], 
                    $row['fechaNac'], $row['Telefono'], $row['Domicilio']); 
                    array_push($arreglo, $obj);
                }
               
            }
            
        }
 
        return $arreglo;
    }
    


    public function setear($NroDni, $apellido, $nombre, $fechaNac, $telefono, $domicilio){
        $this->NroDni = $NroDni;
        $this->apellido = $apellido;
        $this->nombre = $nombre;
        $this->fechaNac = $fechaNac;
        $this->telefono = $telefono;
        $this->domicilio = $domicilio;
    }
}
