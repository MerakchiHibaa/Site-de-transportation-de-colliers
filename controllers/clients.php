<?php 

require_once '../models/clientmodel.php' ;
class Clients {
    public function register(){

    } 
}

$init = new Clients ; 

if($_SERVER["REQUEST_METHOD"] == "POST") {

switch($_SERVER['type']){
    case 'register' : 
        $init-> register() ; 
        break ; 
} 

}








?>