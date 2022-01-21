<?php 

include_once '../controllers/Users.php';
 include_once '../controllers/affichControl.php';
 
$_controllerUsers = new Users() ; 
$_controller = new affichControl() ; 

if (isset($_GET['modifan'])) {
    
    $modif = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['modifan']);
   $_controllerUsers->afficherUpdateAnnonce($modif);
  }

  ?>