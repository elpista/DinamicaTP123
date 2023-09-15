<?php
class Auto
{
    private $patente;
    private $marca;
    private $modelo;
    private $objDuenio;
    private $mensajeOperacion;

    public function __construct()
    {
        $this->patente = "";
        $this->marca = "";
        $this->modelo = 0;
        $this->objDuenio = new Persona();
        $this->mensajeOperacion = "";
    }

    public function getPatente()
    {
        return $this->patente;
    }

    public function getMarca()
    {
        return $this->marca;
    }

    public function getModelo()
    {
        return $this->modelo;
    }

    public function getObjDuenio()
    {
        return $this->objDuenio;
    }

    public function getMensajeOperacion()
    {
        return $this->mensajeOperacion;
    }

    public function setPatente($patente)
    {
        $this->patente = $patente;
    }

    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    public function setObjDuenio($objDuenio)
    {
        $this->objDuenio = $objDuenio;
    }

    public function setMensajeOperacion($mensajeOperacion)
    {
        $this->mensajeOperacion = $mensajeOperacion;
    }

    /*
    public function __toString()
    {
        $cadena = "\nPatente: " . $this->getPatente() .
        "\nMarca: " . $this->getMarca() .
        "\nModelo: " . $this->getModelo() .
        "\nDNI del dueño: " . $this->getObjDuenio()->getDni() . "\n";
        return $cadena;
    }
    */

    public function cargar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="SELECT * FROM auto WHERE patente = ".$this->getPatente();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $this->setear($row['patente'], $row['marca'], $row['modelo'], $row['objDuenio']);
                }
            }
        } else {
            $this->setmensajeoperacion($base->getError());
        }
        return $resp;
    
        
    }

    public function insertar()
    {
        $base = new BaseDatos();
        
        $resp = false;
        $dniDuenio = $this->getObjDuenio()->getNroDni(); //NO TOMA EL DNI DE UN OBJ DUENIO CORREGIIRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR
        $sql = "INSERT INTO auto(Patente, Marca, Modelo, DniDuenio)
				VALUES ('" . $this->getPatente() . "','" . $this->getMarca() . "','" . $this->getModelo() . "','" . $dniDuenio."')";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion($base->getError());
            }
        } else {
            $this->setmensajeoperacion($base->getError());
        }
        return $resp;
    }

    public function modificar(){
        $res=false;
        $base=new BaseDatos();
        $sql="UPDATE auto SET Marca='".$this->getMarca()."', Modelo='".$this->getModelo()."', DniDuenio='".$this->getObjDuenio()."' WHERE Patente='".$this->getPatente()."'";
        if($base->Iniciar()){
            if($base->Ejecutar($sql)){
                $res=true;
            }
            else{
                $this->setMensajeOperacion("Auto -> Modificar ".$base->getError());
            }        
        }
        else{
            $this->setMensajeOperacion("Auto -> Modificar".$base->getError());
        }

        return $res; 
    }

    public function eliminar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM auto
                WHERE Patente=" . $this->getPatente();
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
        $arreglo=array ();
        $base=new BaseDatos();
        
        $sql="SELECT * FROM auto";
        if($parametro!=""){
            $sql.=' WHERE '.$parametro;
            
        }
        $res=$base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                while($row=$base->Registro()){
                    $obj=new Auto();
                    $objDuenio = new AbmPersona();
                    $objDuenio->buscar($row['DniDuenio']);
                    $obj->setear($row["Patente"],$row["Marca"],$row["Modelo"],$objDuenio);
                    array_push($arreglo,$obj);
                    //var_dump($arreglo); 
                }
            }
        }
        return $arreglo; 
    }

    public function setear($patente, $marca, $modelo, $objDuenio)
    {
        $this->setPatente($patente);
        $this->setMarca($marca);
        $this->setModelo($modelo);
        $this->setObjDuenio($objDuenio);
    }

}
