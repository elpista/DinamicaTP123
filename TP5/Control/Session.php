<?php

class Session
{



    public function __construct()
    {
        session_start();
    }


    //Actualiza el idUsuario según los datos ingresados. 
    public function iniciar($nombreUsuario, $psw)
    {
        $resp = false;
        $obj = new AbmUsuario();
        $param['usNombre'] = $nombreUsuario;
        $param['usPass'] = $psw;
        $param['usDeshabilitado'] = 'null';
        $resultado = $obj->buscar($param);
        if (count($resultado) > 0) {
            $usuario = $resultado[0];
            $_SESSION['idUsuario'] = $usuario->getIdUsuario();
            $resp = true;
        } else {
            $this->cerrar();
        }
        return $resp;
    }

    public function activa()
    {
        $resp = false;
        if (php_sapi_name() !== 'cli') {
            $resp = session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
        }

        return $resp;
    }


    public function validar()
    {
        $resp = false;
        if ($this->activa() && isset($_SESSION['idUsuario']))
            $resp = true;
        return $resp;
    }

    public function getUsuario(){
        $usuario = null;
        if($this->validar()){
            $obj = new AbmUsuario();
             $param['idUsuario'] = $_SESSION['idUsuario'];
             $usuario = $obj->buscar($param);
        }
        return $usuario;
    }

    public function getRol(){
        $roles = null;
        if($this->validar()){
            $obj = new AbmUsuarioRol();
             $param['idUsuario'] = $_SESSION['idUsuario'];
             $roles = $obj->buscar($param);
        }
        return $roles;

    }

    public function cerrar(){
        $resp = true;
        session_unset();
        session_destroy();
        return $resp;
    }
   
}


