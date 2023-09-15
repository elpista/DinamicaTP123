<?php
class AbmAuto{
    //Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto

    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Auto
     */
    private function cargarObjeto($param){
        $obj = null;
           
        if (array_key_exists('Patente',$param) && array_key_exists('Marca',$param) &&
        array_key_exists('Modelo',$param) && array_key_exists('DniDuenio',$param)){
            $obj = new Auto();
            $obj->setear($param['Patente'], $param['Marca'], $param['Modelo'], $param['DniDuenio']);
        }
        return $obj;
    }


    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return Auto
     */
    private function cargarObjetoConClave($param){
        $obj = null;
        
        if( isset($param['Patente']) ){
            $obj = new Auto();
            $obj->setear($param['patente'], null, null, null);
        }
        return $obj;
    }
    
    
    /**
     * Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param array $param
     * @return boolean
     */
    
    private function seteadosCamposClaves($param){
        $resp = false;
        if (isset($param['Patente']))
            $resp = true;
        return $resp;
    }
    
    /**
     * 
     * @param array $param
     */
    public function alta($param){
        $resp = false;
        //el siguiente comando debería hacerse si tuviera autoIncrement, pero no es el caso
        //$param['patente'] =null;
        $elObjtAuto = $this->cargarObjeto($param);
//        verEstructura($elObjtAuto);
        if ($elObjtAuto!=null && $elObjtAuto->insertar()){
            $resp = true;
        }
        return $resp;
        
    }
    /**
     * permite eliminar un objeto 
     * @param array $param
     * @return boolean
     */
    public function baja($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $elObjtAuto = $this->cargarObjetoConClave($param);
            if ($elObjtAuto!=null && $elObjtAuto->eliminar()){
                $resp = true;
            }
        }
        
        return $resp;
    }
    
    /**
     * permite modificar un objeto
     * @param array $param
     * @return boolean
     */
    public function modificacion($param){
        //echo "Estoy en modificacion";
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $elObjtAuto = $this->cargarObjeto($param);
            if($elObjtAuto!=null && $elObjtAuto->modificar()){
                $resp = true;
            }
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
            if(isset($param['patente'])) $where.=" and patente =".$param['patente'];
            if(isset($param['marca'])) $where.=" and marca ='".$param['marca']."'";
            if(isset($param['modelo'])) $where.=" and modelo ='".$param['modelo']."'";
            if(isset($param['objDuenio'])) $where.=" and DniDuenio =".$param['objDuenio']['NroDni'];
        }


        $arreglo = Auto::listar($where);
        //si no funciona, probar con:
        //$obj = new Auto();
        //$arreglo = $obj->listar($where);


        return $arreglo;
    }
    
}
?>