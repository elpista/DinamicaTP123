<?php
class AbmPersona{
    //Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto

    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Persona
     */
    private function cargarObjeto($param){
        $obj = null;
           
        if (array_key_exists('dni',$param) && array_key_exists('nombre',$param) &&
        array_key_exists('apellido',$param) && array_key_exists('fechaNac',$param) &&
        array_key_exists('telefono',$param) && array_key_exists('domicilio',$param)){
            $obj = new Persona();
            $obj->setear($param['dni'], $param['nombre'], $param['apellido']
            , $param['fechaNac'], $param['telefono'], $param['domicilio']);
        }
        return $obj;
    }
    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return Persona
     */
    private function cargarObjetoConClave($param){
        $obj = null;
        
        if( isset($param['id']) ){
            $obj = new Persona();
            $obj->setear($param['id'], null, null, null, null, null);
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
        if (isset($param['dni']))
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
        //$param['dni'] =null;
        $elObjtPersona = $this->cargarObjeto($param);
//        verEstructura($elObjtPersona);
        if ($elObjtPersona!=null && $elObjtPersona->insertar()){
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
            $elObjtPersona = $this->cargarObjetoConClave($param);
            if ($elObjtPersona!=null && $elObjtPersona->eliminar()){
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
            $elObjtPersona = $this->cargarObjeto($param);
            if($elObjtPersona!=null && $elObjtPersona->modificar()){
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
            if(isset($param['dni'])) $where.=" and dni =".$param['dni'];
            if(isset($param['nombre'])) $where.=" and nombre ='".$param['nombre']."'";
            if(isset($param['apellido'])) $where.=" and apellido ='".$param['apellido']."'";
            if(isset($param['fechaNac'])) $where.=" and fechaNac ='".$param['fechaNac']."'";
            if(isset($param['telefono'])) $where.=" and telefono =".$param['telefono'];
        }


        $arreglo = Persona::listar($where);
        //si no funciona, probar con:
        //$obj = new Persona();
        //$arreglo = $obj->listar($where);


        return $arreglo;
    }
    
}
?>