
<?php 

 include '../controllers/Users.php';
 
if (isset($_GET['id']) && isset($_GET['idtr'])) { 
    $ID_user = $_GET['id'];
    $ID_trajet = $_GET['idtr'] ;
   
}
$_controllerUsers = new Users() ; 
$_controllerUsers->afficherRate( $ID_user , $ID_trajet) ; 


?>