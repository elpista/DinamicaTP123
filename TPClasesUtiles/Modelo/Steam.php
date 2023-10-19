<?php

class Steam {
    private $avatarMedium;
    private $steamid;
    private $personaName;
    private $googleEmail;
    private $profileUrl;
    private $mensajeOperacion;

    public function __construct() {
        $this->avatarMedium = "";
        $this->steamid = "";
        $this->personaName = "";
        $this->googleEmail = "";
        $this->profileUrl = "";
        $this->mensajeOperacion = "";
    }

public function getAvatarMedium() {
    return $this->avatarMedium;
}

public function getSteamid() {
    return $this->steamid;
}

public function getPersonaName() {
    return $this->personaName;
}

public function getGoogleEmail() {
    return $this->googleEmail;
}

public function getProfileUrl() {
    return $this->profileUrl;
}

public function getMensajeOperacion() {
    return $this->mensajeOperacion;
}


public function setAvatarMedium($avatarMedium) {
    $this->avatarMedium=$avatarMedium;
}

public function setSteamid($steamid) {
    $this->steamid=$steamid;
}

public function setPersonaName($personaName) {
    $this->personaName=$personaName;
}

public function setGoogleEmail($googleEmail) {
    $this->googleEmail=$googleEmail;
}

public function setProfileUrl($profileUrl) {
    $this->profileUrl=$profileUrl;
}

public function setMensajeOperacion($mensajeOperacion) {
    $this->mensajeOperacion=$mensajeOperacion;
}

public function cargar() {
    $resp = false;
    $base=new BaseDatos();
    $sql="SELECT * FROM steam WHERE steamid = ".$this->getSteamid();
    if ($base->Iniciar()) {
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                $row = $base->Registro();
                $this->setear($row['steamid'], $row['personaname'], $row['avatarmedium'], $row['googleEmail'], $row['profileurl']);
            }
        }
    } else {
        $this->setmensajeoperacion($base->getError());
    }
    return $resp;
}

public function insertar() {
    $base = new BaseDatos();
    
    $resp = false;

    $sql = "INSERT INTO steam(steamid, personaname, avatarmedium, googleEmail, profileurl)
            VALUES ('" . $this->getSteamid() . "','" . $this->getPersonaName() . "','" . $this->getAvatarMedium() . "','" . $this->getGoogleEmail() ."','" . $this->getProfileUrl() . "')";
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

public function modificar() {
    $res=false;
    $base=new BaseDatos();
    $sql="UPDATE steam SET personaname='".$this->getPersonaName()."', avatarmedium='".$this->getAvatarMedium()."', googleEmail='" .$this->getGoogleEmail(). "', profileurl='" .$this->getProfileUrl(). "'WHERE steamid='".$this->getSteamid()."'";
    if($base->Iniciar()){
        if($base->Ejecutar($sql)){
            $res=true;
        }
        else{
            $this->setMensajeOperacion("Steam -> Modificar ".$base->getError());
        }        
    }
    else{
        $this->setMensajeOperacion("Steam -> Modificar".$base->getError());
    }

    return $res; 
}

public function eliminar() {
    $resp = false;
    $base = new BaseDatos();
    $sql = "DELETE FROM steam
            WHERE steamid=" . $this->getSteamid();
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
    
    $sql="SELECT * FROM steam";
    if($parametro!=""){
        $sql.=' WHERE '.$parametro;
        
    }
    $res=$base->Ejecutar($sql);
    if($res>-1){
        if($res>0){
            while($row=$base->Registro()){
                $obj=new Steam();
                $obj->setear($row["steamid"],$row["personaname"],$row["avatarmedium"], $row["googleEmail"], $row["profileurl"]);
                array_push($arreglo,$obj);
                //var_dump($arreglo); 
            }
        }
    }
    return $arreglo; 
}

public function setear($steamid, $personaName, $avatarMedium, $googleEmail, $profileUrl) {
    $this->setSteamid($steamid);
    $this->setPersonaName($personaName);
    $this->setAvatarMedium($avatarMedium);
    $this->setGoogleEmail($googleEmail);
    $this->setProfileUrl($profileUrl);
}

}