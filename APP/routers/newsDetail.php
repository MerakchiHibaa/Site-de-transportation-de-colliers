
<?php 

include_once '../controllers/Users.php';
include_once '../controllers/affichControl.php';

if (isset($_GET['id'])) {
/*     session_start();
 */  $ID_news= preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['id']);

} 

$_controllerUsers = new Users() ; 
$_controllerUsers->afficherNewsDetail($ID_news) ; 


?>