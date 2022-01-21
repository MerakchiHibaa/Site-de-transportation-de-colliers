
<?php 
 include_once '../controllers/Users.php';
 include_once '../controllers/affichControl.php';
 
$_controllerUsers = new Users() ; 
$_controller = new affichControl() ; 

if (!isset($_SESSION["userID"]) or !isset($_SESSION["userEmail"])) {
       redirect("../login.php");
     
     }
    
    
    
     if (isset($_GET['suppriman'])) {
    
      $archive = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['suppriman']);
      echo'<h1> insiiiide supprimaaan </h1>';
     $_controller->archiveAnnonce($archive);
    }
    
    if (isset($_GET['signalFinished'])) {
    
      $ID_trajet = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['signalFinished']);
     $_controller->reportFinished($ID_trajet);
     header("Location: profile.php");
    
    }
  
  

$_controllerUsers->afficherProfile() ; 


?>