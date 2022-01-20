
<?php 

include_once '../controllers/Users.php';
include_once '../controllers/affichControl.php';


$_controllerUsers = new Users() ; 
 if (isset($_GET['nom'])&& isset($_GET['prenom'])) {
    $nom= preg_replace('/[^a-zA-Z0-9-]/', '', $_GET['nom']);
    $prenom= preg_replace('/[^a-zA-Z0-9-]/', '', $_GET['prenom']);
  
  
  } 
$_controllerUsers->afficherCertifie( $nom , $prenom ) ; 


?>