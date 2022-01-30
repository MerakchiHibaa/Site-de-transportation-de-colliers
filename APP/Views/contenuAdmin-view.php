<?php
include_once '../controllers/affichControl.php';
  $_controller = new affichControl();
      
  if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    // Session::set('logout', '<div class="alert alert-success alert-dismissible mt-3" id="flash-msg">
    // <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    // <strong>Success !</strong> You are Logged Out Successfully !</div>');
   /*  Session::destroy(); */
  
   
  }
  if (isset($_GET['removea'])) {
      echo"<h1> insiiide remove </h1>" ;
      $remove = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['removea']);
      $_controller->deleteAnnonceById($remove);
  }
    if (isset($_GET['archivea'])) {
      echo"<h1> insiiide archive </h1>" ;
  
      $archive = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['archivea']);
     $_controller->archiveAnnonce($archive);
    }
  
  /* if (!empty($_SESSION['msg'])) {
    echo $_SESSION['msg'] ;
  } */

include_once '../controllers/Users.php';
include_once '../controllers/affichControl.php';


class contenuAdmin_view {

   
    public function display() { 

      echo'
      
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title> </title>
     <link rel="stylesheet" href="../assetss/bootstrap.min.css">
     <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
     <link rel="stylesheet" href="../assetss/dataTables.bootstrap4.min.css">
     <link rel="stylesheet" href="../assetss/style.css">
   </head>
   <body>' ;
 
 echo'
 
 <div class="container">

 <nav class="navbar navbar-expand-md navbar-dark bg-dark card-header">
   <a class="navbar-brand" href="index.php"><i class="fas fa-home mr-2"></i>Dashboard</a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
   </button>

   <div class="collapse navbar-collapse" id="navbarsExampleDefault">
     <ul class="navbar-nav ml-auto">



   
      
       <li class="nav-item">

<a class="nav-link" href="adminProfile.php"><i class="fas fa-users mr-2"></i> Liste des utilisateurs </span></a>
</li>
<li class="nav-item">

<a class="nav-link" href="signalAdmin.php"><i class="fas fa-users mr-2"></i> Liste des signalements </span></a>
</li>
<li class="nav-item">

<a class="nav-link" href="newsAdmin.php"><i class="fas fa-users mr-2"></i> Liste des publicités </span></a>
</li>
<li class="nav-item">

<a class="nav-link" href="contenuAdmin.php"><i class="fas fa-users mr-2"></i> Gestion de contenu </span></a>
</li>
         <li class="nav-item

         <?php

                     $path = $_SERVER[\'SCRIPT_FILENAME\'];
                     $current = basename($path, \'.php\');
                     if ($current == \'addUser\') {
                       echo " active ";
                     }

                    ?>  "> 

            <a class="nav-link" href="addUser.php"><i class="fas fa-user-plus mr-2"></i>Ajouter </span></a>
         </li>
    
        <li class="nav-item  
       <?php

         $path = $_SERVER[\'SCRIPT_FILENAME\'];
         $current = basename($path, \'.php\');
         if ($current == \'adminProfile\') {
           echo "active ";
         }

        ?>

        "> 

          <a class="nav-link" href="adminProfile.php"><i class="fab fa-500px mr-2"></i>Profile <span class="sr-only">(current)</span></a>
       </li>

       <li class="nav-item">
         <a class="nav-link" href="?q=logoutA"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a>
       </li>
     

     


     </ul>

   </div>
 </nav>
      
            <div class="card ">
              <div class="card-header">
              
                <h3><i class="fas fa-cogs"></i> Gestion De Contenu <span class="float-right">Welcome! <strong>
                  <span class="badge badge-lg badge-secondary text-white">' ;
                  if( isset($_SESSION['userPrenom'])) {
                    $prenom = $_SESSION['userPrenom'];
                    echo $prenom;

                  }
     
       
      echo'
       </span>
      
                </strong></span></h3>
              </div>
              <div class="card-body pr-2 pl-2">
              <h3> Gestion de la page contact </h3>
      
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                          <tr> 
                              <!--12 -->
                              <th  class="text-center">Adresse</th>
                            <th  class="text-center">Numéro</th>
                            <th  class="text-center">Email</th>
      
                            <th  class="text-center">Contenu</th>
                            <th  class="text-center">Image</th>
                            <th  class="text-center">Actions</th>
      
      
                          </tr>
                        </thead>
                        <tbody>' ;
      
                       
       
      include_once '../controllers/affichControl.php';
      
      
      $_controller = new affichControl();
      $contact = $_controller->getContact(); 
                         
                            if ($contact) {
                             
                              foreach ($contact as  $value) {
                             
                           
      
                          echo'  <tr class="text-center"
                    
                            >
      
                              <td>' . $value['adresse'].' </td>
                              <td>'. $value['numero'].'  </td>  
                              
        
      
                               <td>'. $value['email'] .' </td>
                               <td>'. $value['contenu'] .' </td>
                               <td>'. $value['image']  .' </td>
      
                             
                            
      
                              <td>
                              <a class="btn btn-success btn-sm" href="contact.php">Voir</a>
      
                                <a  class="btn btn-primary btn-sm" href="editContact.php">Modifier </a>
                          
                                  
                              </td>
                            </tr>' ;
                       
                        } 
                      }
      
                         else{ echo'
                            <tr class="text-center">
                            <td>Aucune donnée est disponible !</td>
                          </tr>' ;
                          } echo'
      
                        </tbody>
      
                    </table>
                    
              </div>
           
      
              <div class="card-body pr-2 pl-2">
            
                    <h3> Gestion de la page présentation </h3>
      
      
      
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                          <tr> 
                              <!--12 -->
                              <th  class="text-center">Contenu</th>
                            <th  class="text-center">Image</th>
                            <th  class="text-center">Video</th>
                            <th  class="text-center">Actions</th>
      
      
                          </tr>
                        </thead>
                        <tbody>' ;
      
                       
      
      include_once '../controllers/affichControl.php';
      
      
      $_controller = new affichControl();
      $presentation = $_controller->getPresentation(); 
                         
                            if ($presentation) {
                             
                              foreach ($presentation as  $value) {
                             
                           echo'
      
                            <tr class="text-center"
                    
                            >
      
                              <td>'. $value['contenu'] .'</td>
                              <td>'. $value['image'] .' </td>  
                              
        
      
                               <td>'. $value['video'] .' </td>
                              <td>
                              <a class="btn btn-success btn-sm" href="presentation.php">Voir</a>
      
                                <a  class="btn btn-primary btn-sm" href="editPresentation.php">Modifier </a>
                          
                                  
                              </td>
                            </tr>' ;
                       
                        } 
                      }
      
                         else{ echo'
                            <tr class="text-center">
                            <td>Aucune donnée est disponible !</td>
                          </tr>' ;
                         } echo'
      
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
      
      
      
        </body>
      
      
        <!-- Jquery script -->
        <script src="../assetss/jquery.min.js"></script>
        <script src="../assetss/bootstrap.min.js"></script>
        <script src="../assetss/jquery.dataTables.min.js"></script>
        <script src="../assetss/dataTables.bootstrap4.min.js"></script>
        <script>
            $(document).ready(function () {
                $("#flash-msg").delay(7000).fadeOut("slow");
            });
            $(document).ready(function() {
                $(\'#example\').DataTable();
            } );
        </script>
      </html>
      ';



    }
  }






/* include_once '../inc/header.php';
 */
