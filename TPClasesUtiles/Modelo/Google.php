<?php
include_once("./conector/BaseDatos.php");
class Google
{
    private $email;
    private $name;
    private $picture;
    private $mensajeOperacion;

    public function __construct()
    {
        $this->email = "";
        $this->name = "";
        $this->picture = "";
        $this->mensajeOperacion = "";
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPicture()
    {
        return $this->picture;
    }

    public function getMensajeOperacion()
    {
        return $this->mensajeOperacion;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

    public function setMensajeOperacion($mensajeOperacion)
    {
        $this->mensajeOperacion = $mensajeOperacion;
    }

    public function cargar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="SELECT * FROM google WHERE email = ".$this->getEmail();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $this->setear($row['email'], $row['name'], $row['picture']);
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

        $sql = "INSERT INTO google(email, name, picture)
				VALUES ('" . $this->getEmail() . "','" . $this->getName() . "','" . $this->getPicture() . "')";
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
        $sql="UPDATE google SET name='".$this->getName()."', picture='".$this->getPicture()."'WHERE email='".$this->getEmail()."'";
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
        $sql = "DELETE FROM google
                WHERE email=" . $this->getEmail();
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
        
        $sql="SELECT * FROM google";
        if($parametro!=""){
            $sql.=' WHERE '.$parametro;
            
        }
        $res=$base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                while($row=$base->Registro()){
                    $obj=new Google();
                    $obj->setear($row["email"],$row["name"],$row["picture"]);
                    array_push($arreglo,$obj);
                    //var_dump($arreglo); 
                }
            }
        }
        return $arreglo; 
    }

    public function setear($email, $name, $picture)
    {
        $this->setEmail($email);
        $this->setName($name);
        $this->setPicture($picture);
    }

}
