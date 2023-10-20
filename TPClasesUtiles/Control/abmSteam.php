<?php
class AbmSteam{
    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Steam
     */
    private function cargarObjeto($param){
        $obj = null;      
        if (array_key_exists('steamid',$param) && array_key_exists('personaname',$param) && array_key_exists('avatarmedium',$param) && array_key_exists('googleEmail',$param) && array_key_exists('profileurl',$param)){
            $obj = new Steam();
            $obj->setear($param['steamid'], $param['personaname'], $param['avatarmedium'], $param['googleEmail'], $param['profileurl']);
        }
        return $obj;
    }
    
    /**
     * @param array $param
     * @return Steam
     */
    private function cargarObjetoConClave($param){
        $obj = null;
        if( isset($param['steamid']) ){
            $objGoogle = new Steam();
            $objGoogle -> setear($param['steamid'], null, null, null, null);
        }
        return $obj;
    }

    /**
     * @param array $param
     * @return boolean
     */
     private function seteadosCamposClaves($param){
        $resp = false;
        if (isset($param['steamid']))
            $resp = true;
        return $resp;
    }

    /**
     * @param array $param
     */
    public function alta($param){
        $resp = false;
        $objSteam = $this->cargarObjeto($param);
        if ($objSteam!=null && $objSteam->insertar()){
            $resp = true;
        }
        return $resp;
        
    }

    /**
     * @param array $param
     * @return boolean
     */
    public function baja($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $objSteam = $this->cargarObjetoConClave($param);
            if ($objSteam!=null && $objSteam->eliminar()){
                $resp = true;
            }

        }
        return $resp;
    }
    
    /**
     * @param array $param
     * @return boolean
     */
    public function modificacion($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $objSteam = $this->cargarObjeto($param);
            if($objSteam!=null && $objSteam->modificar()){
                $resp = true;
            }
        }
        return $resp;
    }

    /**
     * @param array $param
     * @return boolean
     */
    public function buscar($param){
        $where = " true ";
        if ($param<>NULL){
            if(isset($param['steamid'])) $where.=" and steamid = '".$param['steamid']."'";
            if(isset($param['personaname'])) $where.=" and personaname ='".$param['personaname']."'";
            if(isset($param['avatarmedium'])) $where.=" and avatarmedium ='".$param['avatarmedium']."'";
            if(isset($param['googleEmail'])) $where.=" and googleEmail = '".$param['googleEmail']."'";
            if(isset($param['profileurl'])) $where.=" and profileurl = '".$param['profileurl']."'";
        }

        $objSteam = new Steam;
        $arreglo = $objSteam->listar($where);

        return $arreglo;
    }
}