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
        <div class="card-body pr-2 pl-2">

          <table id="example" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <th  class="text-center">SL</th>
                      <th  class="text-center">Nom</th>
                      <th  class="text-center">Prenom</th>

                      <th  class="text-center">Addresse</th>
                      <th  class="text-center">Numéro de téléphone</th>
                      <th  class="text-center">Email</th>
                      <th  class="text-center">Note</th>
                      <th  class="text-center">Statut</th>
                      <th  width='25%' class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>

                 
 <?php 

include_once './controllers/affichControl.php';


$_controller = new affichControl();
$allUser = $_controller->selectAllUserData(); 
                   
                      if ($allUser) {
                        $i = 0;
                        foreach ($allUser as  $value) {
                          $i++;

                     ?>

                      <tr class="text-center"
              
                      >

                        <td><?php echo $i; ?></td>
                        <td><?php echo $value['nom']; ?></td>
                        


                        <td><?php echo $value['prenom']; ?> <br>
                       
            
                          <?php if ( $value['type']  == 'client'){
                          echo "<span class='badge badge-lg badge-info text-white'>Client</span>";
                        } else/*  if ($value['type'] == 'transporteur') */ {
                          echo "<span class='badge badge-lg badge-dark text-white'>Transporteur</span>";
                        } ?></td>

                         <td><?php echo $value['adresse']  ?></td>
                        <td><?php echo $value['numero'] ; ?></td>
                        <td><?php echo $value['email'] ; ?></td>
                        <td><?php echo $value['note'] ; ?></td>

                        <td>
                        <?php if($value['type'] == 'transporteur') { ?> 
                        
                          <?php if ($value['statut'] == 'certifie') { ?>
                            <span class="badge badge-lg badge-info text-white">Certifié</span>
                          <?php } else if($value['statut']  == 'refuse'){ ?>
                            <span class="badge badge-lg badge-danger text-white">Refusé</span>
                          <?php }
                          else { ?>
                            <span class="badge badge-lg badge-secondary text-white"><?php echo $value['statut'] ; ?></span>
                          <?php } 
                        }  ?>
                        </td>

                        <td>
                          <a class="btn btn-success btn-sm" href="userProfileAdmin.php?id=<?php echo $value['ID_user'] ;?>">Voir</a>
                          <a class="btn btn-info btn-sm " href="userProfileAdmin.php?id=<?php echo $value['ID_user'] ;?>">Editer</a>
                           <a onclick="return confirm('Vous voulez vraiment supprimer cet utilisateur ?')" class="btn btn-danger btn-sm " href="?remove=<?php echo $value['ID_user'];?>">Supprimer</a>
                            
                           <?php if ($value['type'] == 'transporteur') { ?> 
                            <div class="card-body">


                            <form action="./controllers/Users.php" method="POST" > 
                            <input type="hidden" name="type" value ="changestatut">

                           <select  class='form-control inputstl' name="selectstatut" id="selectstatut"> 
                           <option disabled selected value> -- Changer le statut -- </option>

                           <option value='1' > En attente </option>
                             <option value='2'> En cours de traitement</option>
                             <option value='3' > Validé </option>
                             <option value='4' >Refusé</option>
                             <option value='5' >Certifié</option>

                           </select>
                           <div class="from-group mb-3"> 
                              <input type="hidden" name="ID_user" value="<?php echo $value['ID_user']?>">
  
                           <input type="submit" value="Changer"  >
                           </div>

                           </form>
                            </div>
                            <?php } ?>
<!--                                <a onclick="return confirm('Vous voulez changer le statut à <En cours de traitement> ?')" class="btn btn-secondary btn-sm " href="?deactive=<?php echo $value['ID_user'];?>">Changer le statut</a>
 -->                             

                        </td>
                      </tr>
                  <?php 
                  } 
                }

                   else{ ?>
                      <tr class="text-center">
                      <td>No user availabe now !</td>
                    </tr>
                    <?php } ?>

                  </tbody>

              </table>









        </div>
      </div>



  <?php
   include '../Simple-User-Management-System-with-PHP-MySQL-master/inc/footer.php' ;


  ?>
