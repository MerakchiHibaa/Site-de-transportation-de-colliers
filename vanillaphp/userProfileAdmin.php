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
    <title>PHP CRUD User Management</title>
    <link rel="stylesheet" href="assetss/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="assetss/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assetss/style.css">
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
          <h3><i class="fas fa-users mr-2"></i>User list <span class="float-right">Welcome! <strong>
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
  $ID_user = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['id']);

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
          <h3>User Profile <span class="float-right"> <a href="index.php" class="btn btn-primary">Back</a> </h3>
        </div>
        <div class="card-body">

    <?php
include_once './controllers/affichControl.php';


$_controller = new affichControl();
    $getUinfo = $_controller->getUserInfoById($ID_user);
    if ($getUinfo) {
      foreach ($getUinfo as  $getUinfo) {
     ?>


          <div style="width:600px; margin:0px auto">

          <form class="" action="./controllers/Users.php" method="POST">
              <div class="form-group">
                <label for="name">Nom</label>
                <input required type="text" name="nom" value="<?php echo $getUinfo['nom']; ?>" class="form-control">
              </div>

              <div class="form-group">
                <label for="name">Prénom</label>
                <input required type="text" name="prenom" value="<?php echo $getUinfo['prenom']; ?>" class="form-control">
              </div>

              <div class="form-group">
                <label for="adresse">Adresse</label>
                <input required type="text" name="adresse" value="<?php echo $getUinfo['adresse']; ?>" class="form-control">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input required type="email" id="email" name="email" value="<?php echo $getUinfo['email']; ?>" class="form-control">
              </div>
              <div class="form-group">
                <label for="mobile">Numéro</label>
                <input required type="text" id="numero" name="numero" value="<?php echo $getUinfo['numero']; ?>" class="form-control">
              </div>

             

              

              
                <div class="form-group">
                  <label for="sel1">Le type de l'utilisateur</label>
                  <select class="form-control" name="type" id="type">

                  <?php

                if($getUinfo['type'] == 'client'){?>
                  <option value="1" selected='selected'>Client</option>
                  <option value="2">Transporteur</option>
                <?php }elseif($getUinfo['type'] == 'transporteur'){?>
                  <option value="1">Client</option>
                  <option value="2" selected='selected'>Transporteur</option>
               


                  </select>

                  <?php
                 

                  include_once './controllers/affichControl.php';
                  
                  
                  $_controller = new affichControl();
                  $ARRAY = $_controller->affichWilaya(); 
                  
                  /* $rows = implode ("SEPARATOR", $ARRAY);
                   */
                  
                  /* $array = json_decode(json_encode($ARRAY), true); */
                  
                  
                   
                  
                  echo "<select class='form-control' multiple name='wilaya[]'>" ;
                  
                  foreach($ARRAY as $row){
                    $ID_wilaya =  $row['ID_wilaya'];                     
                    $roww = $row['wilaya'];
                    echo ("<option value='$roww' > $roww </option> ");
                    
                    if( $_controller->userWilayaSelected($getUinfo['ID_user'] , $ID_wilaya)){
                      echo ("<option value='$roww' selected='selected' > $roww </option> ");
                    }  
                    else {
                      echo ("<option value='$roww' > $roww </option> ");

                    }                  
                  
                     
                   }
                  
                  
                  echo "</select>" ; 
                  
                 } ?>
                </div>
              </div>

              <input type="hidden" name="type" value="updateuseradmin">

            <input type="hidden" name="updateiduser" value="<?php echo $getUinfo['ID_user']; ?>">
         



              <div class="form-group">
                <button type="submit" name="updateuseradmin" class="btn btn-success">Modifier</button>
                <a class="btn btn-primary" href="changepass.php?id=<?php echo $getUinfo['ID_user'];?>">Changer le mot de passe</a>
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
    const 
  </script>


  <?php
/*   include 'inc/footer.php';
 */
  ?>
