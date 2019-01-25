<?php
    
    //Si el formulario esta seteado
    if(isset($_GET['Formulario'])){
        
        //Se reciben de la url el formulario y la acción
        $formulario = $_GET['Formulario'];
        $accion = $_GET['accion'];
        
        //Se determina el controlador
        $controlador = 'Controlador' . $formulario;
        
        //Se carga el controlador
        require_once '../../controlador/controladoresEspecificos/' . $controlador . '.php';
        
        //Se guardan los datos recibidos en una variable
        $datosFormulario = $_POST;
        
        //Se instancia un objeto de tipo Controlador+Formulario
        $refControlador = new $controlador($datosFormulario);
        
        //Se realiza la accion requerida
        $resultado = $refControlador->$accion($datosFormulario);
        
        //Los datos son codificados a json
        echo json_encode($resultado);
        
    }
    else{
        echo json_encode(true);
    }



