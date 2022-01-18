<?php
/* 
 include_once 'header.php'; */

 /* include_once './controllers/affichControl.php';
 include_once '../Simple-User-Management-System-with-PHP-MySQL-master/inc/header.php' ;
 
 include_once './helpers/session_helper.php';
 */
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Detail annonce</title>
    <link rel="stylesheet" href="assetss/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="../assetss/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../assetss/style.css">
  </head>
  <body>

  <?php


if (isset($_GET['action']) && $_GET['action'] == 'logout') {
  // Session::set('logout', '<div class="alert alert-success alert-dismissible mt-3" id="flash-msg">
  // <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  // <strong>Success !</strong> You are Logged Out Successfully !</div>');
 /*  Session::destroy(); */
}



 ?>


    <div class="container">

      <nav class="navbar navbar-expand-md navbar-dark bg-dark card-header">
        <a class="navbar-brand" href="index.php"><i class="fas fa-home mr-2"></i>Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav ml-auto">


            <!---verifier si ladministrateur est connecté-->

        
           
              <li class="nav-item">

                  <a class="nav-link" href="index.php"><i class="fas fa-users mr-2"></i>User lists </span></a>
              </li>
              <li class="nav-item

              <?php

                          $path = $_SERVER['SCRIPT_FILENAME'];
                          $current = basename($path, '.php');
                          if ($current == 'addUser') {
                            echo " active ";
                          }

                         ?>">

                <a class="nav-link" href="addUser.php"><i class="fas fa-user-plus mr-2"></i>Add user </span></a>
              </li>
         <!--  -->
            <li class="nav-item
            <?php

      				$path = $_SERVER['SCRIPT_FILENAME'];
      				$current = basename($path, '.php');
      				if ($current == 'profile') {
      					echo "active ";
      				}

      			 ?>

            ">

              <a class="nav-link" href="profile.php?id=<?php /* echo $_SESSION['ID_user'];  */?>"><i class="fab fa-500px mr-2"></i>Profile <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="?action=logout"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a>
            </li>
          

            <!---verifier si ladministrateur est connecté-->


          </ul>

        </div>
      </nav>
      <div class="card ">
        <div class="card-header">
          <h3><i class="fa fa-bullhorn mr-2" aria-hidden="true" ></i>Liste des annonces <span class="float-right">Welcome! <strong>
            <span class="badge badge-lg badge-secondary text-white">
<?php
/* $prenom = $_SESSION['userPrenom'];
if (isset($prenom)) {
  echo $prenom;
} */
 ?></span>

          </strong></span></h3>
        </div>
<?php


/* $allUser = $_controller->selectAllUserData(); 
 */
 if (isset($_GET['id'])) {
  $ID_annonce = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['id']);

}
/*

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
  $updateUser = $users->updateUserByIdInfo($userid, $_POST);

}
if (isset($updateUser)) {
  echo $updateUser;
}
 
 */



 ?>

 <div class="card ">
   <div class="card-header">
          <h3>Détail de l'annonce <span class="float-right"> <a href="index.php" class="btn btn-primary">Back</a> </h3>
        </div>
        <div class="card-body">

    <?php
include_once '../controllers/affichControl.php';


$_controller = new affichControl();
    $getAinfo = $_controller->getAnnonceInfoById($ID_annonce);
    if ($getAinfo) {
      foreach ($getAinfo as  $getUinfo) {
     ?>


          <div style="width:600px; margin:0px auto">

          <form class="" action="../controllers/Users.php" method="POST">
              <div class="form-group">
                <label for="name">ID_annonce</label>
                <input required type="text" name="nom" value="<?php echo $getUinfo['ID_annonce']; ?>" class="form-control">
              </div>

              <div class="form-group">
                <label for="name">ID_User</label>
                <input required type="text" name="prenom" value="<?php echo $getUinfo['ID_User']; ?>" class="form-control">
              </div>

              <div class="form-group">
                <label for="name">Type d'utilisateur</label>
                <input required type="text" name="prenom" value="<?php 
                        
                        include_once '../controllers/affichControl.php';
                        $_controller = new affichControl();
                                                $user = $_controller->getTypeUtilisateur($getUinfo['ID_User']) ;
                                                if($user) {
                                                foreach($user as $user) {
                                                    echo $user['type'] ;
                                                } }
                                                else {
                                                    echo 'utilisateur' ;
                                                }?>" class="form-control">
              </div>




             
              <div class="form-group">
                <label for="adresse">Point de départ</label>
                <input required type="text" name="adresse" value="<?php echo $getUinfo['pointDepart']; ?>" class="form-control">
              </div>
              <div class="form-group">
                <label for="email">Point d'arrivée</label>
                <input required type="email" id="email" name="email" value="<?php echo $getUinfo['pointArrivee']; ?>" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Type de transport</label>
                <input required type="text" id="" name="" value="<?php echo $getUinfo['typeTransport']; ?>" class="form-control">
              </div>

              <div class="form-group">
                <label for="">Poids</label>
                <input required type="text" id="" name="" value="<?php echo $getUinfo['poidsMin']; ?> - <?php echo $getUinfo['poidsMax']; ?>" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Volume</label>
                <input required type="text" id="" name="" value="<?php echo $getUinfo['volumeMin']; ?> - <?php echo $getUinfo['volumeMax']; ?>" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Moyen de transport</label>
                <input required type="text" id="" name="" value="<?php echo $getUinfo['moyenTransport']; ?>" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Etat</label>
                <input required type="text" id="" name="" value="<?php echo $getUinfo['etat']; ?>" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Date de création</label>
                <input required type="text" id="" name="" value="<?php echo $getUinfo['creationDate']; ?>" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Nombre de vues</label>
                <input required type="text" id="" name="" value="<?php echo $getUinfo['viewsNumber']; ?>" class="form-control">
              </div>

              <div class="form-group">
                <label for="">Archivée?</label>
<?php  ?>
                <input required type="text" id="" name="" value="<?php if($getUinfo['archive'] == '1')
 {
    echo "Oui"; } else {
      echo "Non"; 

    } ?>" class="form-control">
              </div>
             
             


          </form>
        </div>

      <?php } }else{
        echo '<h1> couldnt get the page  </h1>' ;

       /*  header('Location:index.php'); */
      } ?>



      </div>
    </div>
    <script> 
    const selectTransporteur = document.getElementById('selectTransporteur') ; 
    const selectClient = document.getElementById('selectClient') ; 
    const opttranstrans =  document.getElementById('opttranstrans') ; 
    const opttransclient =  document.getElementById('opttransclient') ; 
    const optclienttrans =  document.getElementById('optclienttrans') ; 
    const optclientclient =  document.getElementById('optclientclient') ;
    
    function transClient(){

    } 
    function transtrans(){

    } 
    function clientClient() {

    }
    function clientTrans() {
      
    }

    if (selectTransporteur != null ){ 
      console.log('inside boucle') ;

      if (opttransclient != null )  {

     
    opttransclient.onselect = () => {
      console.log('inside select 1') ;
      selectTransporteur.setAttribute("style", "display: none");


    }  }
    if ( optclientclient !=null) {

   
    optclientclient.onselect = () => {
      console.log('inside select 2') ;

      selectTransporteur.setAttribute("style", "display: none");


    } }
  }


    function hideclient(self) {
      if (self.value == "1" || self.value == "4" ) {
    console.log(' selected client');
    console.log(self.value);

     selectTransporteur.setAttribute("style", "display: none");
 
  }else{
    console.log(self.value);

     console.log(' selected transporteur');
     selectTransporteur.setAttribute("style", "display: block");


  }


    }




  </script>


  <?php
/*   include 'inc/footer.php';
 */
  ?>
