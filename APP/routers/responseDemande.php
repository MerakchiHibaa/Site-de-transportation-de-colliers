
<?php 

include_once '../controllers/Users.php';
include_once '../controllers/affichControl.php';


$_controllerUsers = new Users() ; 
if (isset($_GET['ida']) && isset($_GET['idt']) ) {
    session_start();
  $ID_annonce = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['ida']);
  $ID_transporteur = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['idt']);


} else {
    echo '<h1> im outside </h1>' ;

}
$_controllerUsers->afficherResponseDemande($ID_annonce , $ID_transporteur) ; 


?>