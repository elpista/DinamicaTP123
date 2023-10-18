<?php
class AbmGoogle{
    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Google
     */
    private function cargarObjeto($param){
        $obj = null;      
        if (array_key_exists('email',$param) && array_key_exists('name',$param) && array_key_exists('picture',$param)){
            $obj = new Google();
            $obj->setear($param['email'], $param['name'], $param['picture']);
        }
        return $obj;
    }
    
    /**
     * @param array $param
     * @return Google
     */
    private function cargarObjetoConClave($param){
        $obj = null;
        if( isset($param['email']) ){
            $objGoogle = new Google();
            $objGoogle -> setear($param['email'], null, null);
        }
        return $obj;
    }

    /**
     * @param array $param
     * @return boolean
     */
     private function seteadosCamposClaves($param){
        $resp = false;
        if (isset($param['email']))
            $resp = true;
        return $resp;
    }

    /**
     * @param array $param
     */
    public function alta($param){
        $resp = false;
        $objGoogle = $this->cargarObjeto($param);
        if ($objGoogle!=null && $objGoogle->insertar()){
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
            $objGoogle = $this->cargarObjetoConClave($param);
            if ($objGoogle!=null && $objGoogle->eliminar()){
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
            $objGoogle = $this->cargarObjeto($param);
            if($objGoogle!=null && $objGoogle->modificar()){
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
            if(isset($param['email'])) $where.=" and email = '".$param['email']."'";
            if(isset($param['name'])) $where.=" and name ='".$param['name']."'";
            if(isset($param['picture'])) $where.=" and picture ='".$param['picture']."'";
        }

        $objGoogle = new Google;
        $arreglo = $objGoogle->listar($where);

        return $arreglo;
    }
}
