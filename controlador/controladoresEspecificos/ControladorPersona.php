<?php

require 'ControladorGeneral.php';

class ControladorPersona extends ControladorGeneral{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function get($id){
        try {
            
            $this->refControladorPersistencia->iniciarTransaccion();

            if ($id == " "){
                $resultado = $this->refControladorPersistencia->ejecutarSentencia(DbSentencias::LISTAR_PERSONAS);
            }
            else if($id >= 1){
                $parametros = array("person_id" => $id);
                $resultado = $this->refControladorPersistencia->ejecutarSentencia(DbSentencias::LISTAR_PERSONA, $parametros);
            }            
            
            $arrayCompleto = array();
            foreach ($resultado as $personas){
                $province = array("id" => $personas['province_id'], "name" => $personas['province_name']);
                $array = array("id" => $personas['person_id'], "name" => $personas['person_name'], "surname" => $personas['person_surname'], "birthdate" => $personas['person_birthdate'], "sex" => $personas['person_sex'], "province" => $province);
                array_push($arrayCompleto, $array);                
            }
            
            return $arrayCompleto;
            //$arrayPersonas = $resultado->fetchAll(PDO::FETCH_ASSOC);   
            
            //return $arrayPersonas;
            
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
    public function delete($id){
        try{
            
            $this->refControladorPersistencia->iniciarTransaccion();
            $parametros = array("person_id" => $id);
            $resultado = $this->refControladorPersistencia->ejecutarSentencia(DbSentencias::ELIMINAR_PERSONA, $parametros);
            $this->refControladorPersistencia->confirmarTransaccion();
            
        } catch (Exception $e) {
            echo 'Se produjo una excepción: '.$e->getMessage();
        }
    }
    
    public function post($datos){
        try {
            $this->refControladorPersistencia->iniciarTransaccion();  
            $province = $datos['province'];
            $parametros = array("name" => $datos['name'], "surname" => $datos['surname'], "birthdate" => $datos['birthdate'], "sex" => $datos['sex'], "province" => $province['id']);
            $resultado = $this->refControladorPersistencia->ejecutarSentencia(DbSentencias::INSERTAR_PERSONA, $parametros);
            $this->refControladorPersistencia->confirmarTransaccion();
            
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
    public function put($id, $datos){
        try {
            
            $this->refControladorPersistencia->iniciarTransaccion();
            $province = $datos['province'];
            $parametros = array("name" => $datos['name'], "surname" => $datos['surname'], "birthdate" => $datos['birthdate'], "sex" => $datos['sex'], "province" => $province['id'], "id" => $id);
            $resultado = $this->refControladorPersistencia->ejecutarSentencia(DbSentencias::ACTUALIZAR_PERSONA, $parametros);
            $this->refControladorPersistencia->confirmarTransaccion();
            
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

}
