<?php
include_once("../Modelo/Google.php");
class AbmGoogle{
    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Auto
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
     * 
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
     * permite buscar un objeto
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
