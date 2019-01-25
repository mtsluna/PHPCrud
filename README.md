# PHPCrud
Simple CRUD made in PHP. This is a consumable API REST that follow the restful parameters. If you want to try this project with the front end, please change your APACHE port to 8080.

#DOCUMENTATION

GET:

Todos los elementos:   

http://localhost:8080/api/people/

http://localhost:8080/api/provinces/12

Un elemento:        

http://localhost:8080/api/people/

http://localhost:8080/api/provinces/12

POST:

http://localhost:8080/api/people/

Body ejemplo:

 {
 
    "name": "ricardo",
    
    "surname": "Luna",
    
    "birthdate": "2019-01-16",
    
    "sex": "M",
    
    "province": {
    
    	"id": 2
      
    }  
}

http://localhost:8080/api/provinces/

Body ejemplo:

{

    "name": "Nueva Inglaterra"
    
}

PUT:

http://localhost:8080/api/people/48

http://localhost:8080/api/provinces/25

Los bodies deben estar igual formados que para el método POST 


DELETE:

http://localhost:8080/api/people/48

http://localhost:8080/api/provinces/25

