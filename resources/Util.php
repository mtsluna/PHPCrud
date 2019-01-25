<?php

class Util {
   
    //Atributos
    private $uri;
    private $body;
    
    //Inicializa parametros
    public function __construct($uri, $body) {
        $this->uri = $uri;
        $this->body = $body;
    }
    
    //Esta funcion es la encargada de realizar el funcionamiento de la api
    public function analizeRequest(){
        
        //Variable verificadora de la existencia de un ID en la URI
        $idCase = false;
        
        //Si la posicion 3 existe en el array de la URI
        if (array_key_exists(3, $this->uri)){
            //Si el id no esta vacio y es mayor que 0
            if($this->uri[3] != "" && $this->uri[3] > 0){
                //La variable pasa a ser true, en caso contrario queda en false
                $idCase = true;
            }
        }
        
        //Determina el tipo de entidades a manejar
        switch ($this->uri[2]){
            //Casos que aparecen en la URI
            case "people":
                
                //Importa su controlador
                require_once './controlador/controladoresEspecificos/ControladorPersona.php';
                //Crea una instancia
                $controladorPersona = new ControladorPersona();        
                //Metodo que toma la instancia, el id y el body
                $this->method($controladorPersona, $this->uriExist($this->uri), $this->body);
                
                break;
            //Igual que el caso de arriba
            case "provinces":
                
                require_once './controlador/controladoresEspecificos/ControladorProvincia.php';
                $controladorProvincia = new ControladorProvincia();          
                $this->method($controladorProvincia, $this->uriExist($this->uri), $this->body);
                
                break;
            default:
                echo 'URI NOT FOUND';
        }

    }
    
    //Funcion generica que determina el tipo de REQUEST del server y realiza una accion GET, POST, PUT O DELETE
    public static function method($obj, $id, $body){   
        
        //Header
        switch ($_SERVER['REQUEST_METHOD']){
            
            //Caso de que sea GET
            case "GET":
                //Intenta
                try {
                //Listar todo (EL ID PUEDE IR VACIO, ESTO LO MANEJA EL CONTROLADOR SABIENDO SI TOMAR TODOS LOS ELEMENTOS O UNO ESPECIFICO)
                    echo json_encode($obj->get($id));
                    //Retorna codigo 200 OK
                    http_response_code(200);
                } catch (Exception $e) {
                    //Sino, retorna BAD REQUEST
                    http_response_code(404);
                }                
                break;
            //Caso de que sea POST
            case "POST":
                try {
                    //Si el ID esta vacio
                    if ($id == " "){
                        //Toma y decodifica el json obtenido desde el body
                        $array = json_decode($body, true);
                        //Le envia a la instancia del controlador el array con su respectivo metodo
                        $obj->post($array);
                        //Devuelve 201 CREATED
                        http_response_code(201);
                    }
                    else{
                        //Sino tira un 400 BAD REQUEST
                        http_response_code(400);
                    }
                } catch (Exception $exc) {
                    //Sino tira un 400 BAD REQUEST
                    http_response_code(400);
                }                
                break;
            //En el caso de que sea PUT
            case "PUT":
                try {
                    //Decodifica el json obtenido y lo transforma a array
                    $array = json_decode($body, true);
                    //Envia a traves de la instacia al array mediante su respectivo metodo
                    $obj->put($id, $array);
                    //Devuelve un 201 CREATED
                    http_response_code(201);
                } catch (Exception $exc) {
                    //Sino arroja BAD REQUEST
                    http_response_code(400);
                }
                break;
            //Caso que sea delete
            case "DELETE":
                try {
                    //Si el id esta vacio (IMPLICA QUE NO ESTE EN LA URI)
                    if ($id == " "){
                        //Responde 400 BAD REQUEST
                        http_response_code(400);
                    }
                    else{
                        //Sino pasa el id al metodo llamado por la instancia
                        $obj->delete($id);
                        //Y responde 204 NO CONTENT
                        http_response_code(204);
                    }
                } catch (Exception $exc) {
                    //Sino arroja un BAD REQUEST
                    http_response_code(400);
                }
                break;
            
        }
        
    }
    
    //Metodo que verifica el elemento ID de la uri
    public static function uriExist($uri){
        //Si la posicion 3 en el array existe
        if (array_key_exists(3, $uri)){
            //Si el ID esta vacio y es mayor que 0
            if($uri[3] != "" && $uri[3] > 0){
                //Returna el numero del ID
                return $uri[3];
            }
            else{
                //Sino retorna un vacio
                return " ";
            }
        }
        else{
            //Sino retorna un vacio
           return " ";
        }
    }
    
}
