# PHPCrud
Simple CRUD made in PHP. This is a consumable API REST that follow the restful parameters. If you want to try this project with the front end, please change your APACHE port to 8080.

#DOCUMENTATION

GET:

List all:   

http://localhost:8080/api/people/

http://localhost:8080/api/provinces/12

Only one by id:        

http://localhost:8080/api/people/

http://localhost:8080/api/provinces/12

POST:

http://localhost:8080/api/people/

Example body:

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

Example body:

{

    "name": "Nueva Inglaterra"
    
}

PUT:

http://localhost:8080/api/people/48

http://localhost:8080/api/provinces/25

The body are the same that in the method POST.

DELETE:

http://localhost:8080/api/people/48

http://localhost:8080/api/provinces/25

