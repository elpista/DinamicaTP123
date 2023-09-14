<?php
include_once "./conector/BaseDatos.php";
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
        $this->objDuenio = 0;
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

    public function __toString()
    {
        $cadena = "\nPatente: " . $this->getPatente() .
        "\nMarca: " . $this->getMarca() .
        "\nModelo: " . $this->getModelo() .
        "\nDNI del dueño: " . $this->getObjDuenio()->getDni() . "\n";
        return $cadena;
    }

    public function insertar()
    {
        $base = new BaseDatos();
        $resp = false;
        $sql = "INSERT INTO auto(Patente, Marca, Modelo, objDuenio)
				VALUES ('" . $this->getPatente() . "','" . $this->getMarca() . "','" . $this->getModelo() . "','" . $this->getObjDuenio() . "')";
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

    public function modificar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "UPDATE auto SET Patente ='" . $this->getPatente() . "',Marca='" . $this->getMarca() . "',Modelo='" . $this->getModelo() .
        "',DniDuenio=" . $this->getObjDuenio()->getDni() . " WHERE Patente='" . $this->getPatente() . "'";
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

    public function buscar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM auto WHERE Patente=" . $this->getPatente();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                if ($row = $base->Registro()) {
                    $objDuenio = new Persona();
                    $objDuenio->buscar($row['dniDuenio']);
                    $this->cargar($row['patente'], $row['marca'], $row['modelo'], $objDuenio);
                    $resp = true;
                }
            } else {
                $this->setMensajeOperacion($base->getError());
            }
        } else {
            $this->setMensajeOperacion($base->getError());
        }
        return $resp;
    }

    public function cargar($patente, $marca, $modelo, $objDuenio)
    {
        $this->setPatente($patente);
        $this->setMarca($marca);
        $this->setModelo($modelo);
        $this->setObjDuenio($objDuenio);
    }

}
