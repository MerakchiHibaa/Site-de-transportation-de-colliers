<?php 

require_once '../models/clientmodel.php' ;
class Clients {
    private $clientmodel ; 
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