
<?php 

include_once '../controllers/Users.php';
include_once '../controllers/affichControl.php';


$_controllerUsers = new Users() ; 

$_controllerUsers->afficherContact() ; 


?>