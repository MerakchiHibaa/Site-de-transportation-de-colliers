
<?php 

include_once '../controllers/Users.php';
include_once '../controllers/affichControl.php';


$_controllerUsers = new Users() ; 
if (isset($_GET['id'])) {
    /*  session_start(); */
   $ID_report = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['id']);
 
 } 
$_controllerUsers->afficherTextSignal($ID_report) ; 


?>