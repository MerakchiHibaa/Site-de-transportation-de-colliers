
<?php 

include_once '../controllers/Users.php';
include_once '../controllers/affichControl.php';

if (isset($_GET['id'])) {
    $ID_user = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['id']);
  
  }
$_controllerUsers = new Users() ; 
$_controllerUsers->afficheruserPofileAdmin($ID_user) ; 


?>