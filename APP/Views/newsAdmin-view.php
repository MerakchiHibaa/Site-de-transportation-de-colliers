<?php


include_once '../controllers/Users.php';
include_once '../controllers/affichControl.php';
/* include_once '../inc/header.php';
 */include_once '../controllers/affichControl.php';
      
      
$_controller = new affichControl();

if (isset($_GET['action']) && $_GET['action'] == 'logout') {


 
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



class newsAdmin_view {

   
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

<a class="nav-link" href="newsAdmin.php"><i class="fas fa-users mr-2"></i> Liste des publicit??s </span></a>
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
              
                <h3><i class="fa fa-bullhorn mr-2" aria-hidden="true" ></i> News <span class="float-right">Welcome! <strong>
                  <span class="badge badge-lg badge-secondary text-white">
     ' ;
      
      if (isset($_SESSION['userPrenom'])) {
        $prenom = $_SESSION['userPrenom'] ;
        echo $prenom;
      } 
      echo'
       </span>
      
                </strong></span></h3>
              </div>
              <div class="card-body pr-2 pl-2">
      
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                          <tr> 
                              <!--12 -->
                            <th  class="text-center">SL</th>
                            <th  class="text-center">Article</th>
                            <th  class="text-center">Contenu</th>
                            <th  class="text-center">Date de cr??ation</th>
                            <th  class="text-center">Nombre de vues</th>
                            <th  class="text-center">Actions</th>
      
      
                          </tr>
                        </thead>
                        <tbody>' ;
      
                       
    
      
      include_once '../controllers/affichControl.php';
      
      
      $_controller = new affichControl();
      $allNews = $_controller->selectAllNews(); 
                         
                            if ($allNews) {
                              $i = 0;
                              foreach ($allNews as  $value) {
                                $i++;
      
                           
      echo'
                            <tr class="text-center"
                    
                            >
      
                              <td>'. $i .' </td>
                              <td> <a href="newsDetailAdmin.php?id='. $value['ID_news'].'">  
                              
        
      
                               <td>'. $value['article'] .' </td>
                               <td>'. $value['contenu'] .'  </td>
                               <td>'. $value['creationDate'] .' </td>
      
                              <td>
                              '. $value['viewsNumber']  .' 
                              </td>
      
                            
      
                              <td>
                              <a class="btn btn-success btn-sm" href="newsDetail.php?id='.$value['ID_news'].'">Voir</a>
      
                                <a   onclick="return confirm(\'Vous voulez vraiment archiver cette publicit??? \')" class="btn btn-danger btn-sm" href="?deleteN='. $value['ID_news'] .'">Supprimer </a>
                          
                                  
                              </td>
                            </tr>
                       ' ;
                        } 
                      }
      
                         else{ 
                           echo'
                            <tr class="text-center">
                            <td>No user availabe now !</td>
                          </tr> ' ;
                          } 
      
                       echo' </tbody>
      
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
      
      const closebtn = document.getElementById(\'closebtn-justificatif\') ;
      const containerjust = document.getElementById(\'container-justificatif\') ;
      closebtn.onclick = () => {
        containerjust.style.display = \'none\' ; 
      
      }
      function selectRefuse(nameselect) {
        if(nameselect) {
          const refus = document.getElementById(\'refus\').value ;
          if(refus == nameselect.value) {
            console.log(\'inside selectrefuse function \') ;
        containerjust.style.display = \'block\' ; 
          }
          else{
            containerjust.style.display = \'none\' ; 
      
      
          }
         
      
        }
        else {
          containerjust.style.display = \'none\' ; 
      
      
        }
        
      
      
      }
      
      </script>
      
      
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
      ' ;

      


    }
  }


