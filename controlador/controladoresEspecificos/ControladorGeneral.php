<?php
require_once 'controlador/persistencia/ControladorPersistencia.php';
require_once 'controlador/persistencia/DbSentencias.php';

abstract class ControladorGeneral implements DbSentencias {

    protected $refControladorPersistencia;
    
    function __construct() {
        $this->refControladorPersistencia = ControladorPersistencia::obtenerCP();
    }

    public abstract function get($id);
    public abstract function delete($id);
    public abstract function post($datos);
    public abstract function put($id, $datos);
    
}
