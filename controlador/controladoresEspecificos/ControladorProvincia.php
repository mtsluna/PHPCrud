<?php

require 'ControladorGeneral.php';

class ControladorProvincia extends ControladorGeneral{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function get($id) {
        try {
            
            $this->refControladorPersistencia->iniciarTransaccion();

            if ($id == " "){
                $resultado = $this->refControladorPersistencia->ejecutarSentencia(DbSentencias::LISTAR_PROVINCIAS);
            }
            else if($id >= 1){
                $parametros = array("province_id" => $id);
                $resultado = $this->refControladorPersistencia->ejecutarSentencia(DbSentencias::LISTAR_PROVINCIA, $parametros);
            }            
            
            $arrayPersonas = $resultado->fetchAll(PDO::FETCH_ASSOC);    

            return $arrayPersonas;
            
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
    public function post($datos) {
        try {
            $this->refControladorPersistencia->iniciarTransaccion();  
            $parametros = array("name" => $datos['province_name']);
            $resultado = $this->refControladorPersistencia->ejecutarSentencia(DbSentencias::INSERTAR_PROVINCIA, $parametros);
            $this->refControladorPersistencia->confirmarTransaccion();
            
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
    public function put($id, $datos) {
        try {
            
            $this->refControladorPersistencia->iniciarTransaccion();
            $parametros = array("name" => $datos['province_nombre'], "id" => $id);
            $resultado = $this->refControladorPersistencia->ejecutarSentencia(DbSentencias::ACTUALIZAR_PROVINCIA, $parametros);
            $this->refControladorPersistencia->confirmarTransaccion();
            
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
    public function delete($id) {
        try{
            
            $this->refControladorPersistencia->iniciarTransaccion();
            $parametros = array("province_id" => $id);
            $resultado = $this->refControladorPersistencia->ejecutarSentencia(DbSentencias::ELIMINAR_PROVINCIA, $parametros);
            $this->refControladorPersistencia->confirmarTransaccion();
            
        } catch (Exception $e) {
            echo 'Se produjo una excepción: '.$e->getMessage();
        }
    }

}
