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

if (!empty($_SESSION['msg'])) {
  echo $_SESSION['msg'] ;
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
      				if ($current == 'adminProfile') {
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
        
          <h3><i class="fa fa-bullhorn mr-2" aria-hidden="true" ></i> Annonces <span class="float-right">Welcome! <strong>
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
                        <!--12 -->
                      <th  class="text-center">SL</th>
                      <th  class="text-center">ID_user</th>
                      <th  class="text-center">Point de départ</th>
                      <th  class="text-center">Point d'arrivée</th>
                      <th  class="text-center">Type de transport</th>
                      <th  class="text-center">Fourchette de poids</th>
                      <th  class="text-center">Fourchette de volume</th>
                      <th  class="text-center">Moyen de transport</th>
                      <th  width='25%' class="text-center">Date de création</th>
                      <th  width='25%' class="text-center">Nombre de vues</th>

                      <th  width='25%' class="text-center">Archivée?</th>

                      <th  width='25%' class="text-center">Etat</th>
                      <th  width='25%' class="text-center">Actions</th>


                    </tr>
                  </thead>
                  <tbody>

                 
 <?php 

include_once './controllers/affichControl.php';


$_controller = new affichControl();
$allannonces = $_controller->selectAllAnnouncements(); 
                   
                      if ($allannonces) {
                        $i = 0;
                        foreach ($allannonces as  $value) {
                          $i++;

                     ?>

                      <tr class="text-center"
              
                      >

                        <td><?php echo $i; ?></td>
                        <td> <a href="userProfileAdmin.php?id=<?php echo $value['ID_User'] ;?>">  <?php  echo  $value['ID_User']; ?></a> </td>

                        <td><?php echo $value['pointDepart']; ?></td>
                        


                        <td><?php echo $value['pointArrivee']; ?> </td>
                       
            
                          

                         <td><?php echo $value['typeTransport']  ?></td>
                        <td><?php echo $value['poidsMin']."-".$value['poidsMax'] ; ?></td>
                        <td><?php echo  $value['volumeMin']."-".$value['volumeMax']; ?></td>
                        <td><?php echo $value['moyenTransport'] ; ?></td>

                        <td>
                        <?php echo $value['creationDate'] ; ?>
                        </td>

                        <td>
                        <?php echo $value['viewsNumber'] ; ?>
                        </td>

                        <td>
                        <?php if($value['archive'] == '0') { ?>
                         <a class="btn btn-success btn-sm" href="">Non</a>

                         <?php 

                        } else {
                            echo "Oui" ;

                        } ?>
                        </td>

                        <td>
                        <?php echo $value['etat'] ; ?>

                        <div class="card-body">


                            <form action="./controllers/Users.php" method="POST" > 
                            <input type="hidden" name="type" value ="changeetat">

                           <select   class='form-control inputstl' name="selectstatut" id="selectstatut"> 
                           <option disabled selected value> -- Changer l'état -- </option>

                           <option value='1' > Invalide </option>
                             <option value='2'> Valide </option>
                            

                           </select>



                           <div class="from-group mb-3"> 
                              <input type="hidden" name="ID_User" value="<?php echo $value['ID_annonce']?>">
  
                           <input type="submit" value="Changer"  >
                           </div>

                           </form>
                            </div>
                        </td>

                        <td>
                          <a class="btn btn-success btn-sm" href="aanonceDetailAdmin.php?id=<?php echo $value['ID_annonce'] ;?>">Voir</a>
                          <a class="btn btn-info btn-sm " href="aanonceDetailAdmin.php?id=<?php echo $value['ID_annonce'] ;?>">Editer</a>
                           <a onclick="return confirm('Vous voulez vraiment supprimer cet utilisateur ?')" class="btn btn-danger btn-sm " href="?remove=<?php echo $value['ID_annonce'];?>">Supprimer</a>
                            
                         
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

<!-- footer -->

 <div class="well card-footer">
  <p
      <span class="float-right"></span>
  </p>
</div>


<script> 

const closebtn = document.getElementById('closebtn-justificatif') ;
const containerjust = document.getElementById('container-justificatif') ;
closebtn.onclick = () => {
  containerjust.style.display = 'none' ; 

}
function selectRefuse(nameselect) {
  if(nameselect) {
    const refus = document.getElementById('refus').value ;
    if(refus == nameselect.value) {
      console.log('inside selectrefuse function ') ;
  containerjust.style.display = 'block' ; 
    }
    else{
      containerjust.style.display = 'none' ; 


    }
   

  }
  else {
    containerjust.style.display = 'none' ; 


  }
  


}

</script>


  </body>


  <!-- Jquery script -->
  <script src="assetss/jquery.min.js"></script>
  <script src="assetss/bootstrap.min.js"></script>
  <script src="assetss/jquery.dataTables.min.js"></script>
  <script src="assetss/dataTables.bootstrap4.min.js"></script>
  <script>
      $(document).ready(function () {
          $("#flash-msg").delay(7000).fadeOut("slow");
      });
      $(document).ready(function() {
          $('#example').DataTable();
      } );
  </script>
</html>
