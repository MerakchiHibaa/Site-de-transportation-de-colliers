<?php


include_once '../controllers/Users.php';
include_once '../controllers/affichControl.php';


class AdminProfile_view {


    public function display() {


/*  session_start() ; 
 */
 
  
   
 include_once '../controllers/affichControl.php';
 
 
 $_controller = new affichControl();
 /* case 'remove' :
   $remove = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['remove']);
   $init->deleteUserById($remove) ;
 case 'bannir' : 
   $bannir = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['bannir']);
   $init->bannirUserById($bannir) ;
    */
 if (isset($_GET['remove'])) {
   $remove = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['remove']);
   $removeUser = $_controller->deleteUserById($remove);
 }
 /* 
 if (isset($removeUser)) {
   echo $removeUser;
 } */
 if (isset($_GET['bannir'])) {
   $bannir = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['bannir']);
   $bannirId = $_controller->bannirUserById($bannir);
 }
 
 if (isset($_GET['action']) && $_GET['action'] == 'logout') {
   // Session::set('logout', '<div class="alert alert-success alert-dismissible mt-3" id="flash-msg">
   // <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   // <strong>Success !</strong> You are Logged Out Successfully !</div>');
  /*  Session::destroy(); */
 
  
 }
 /* 
 if (!empty($_SESSION['msg'])) {
   echo $_SESSION['msg'] ;
 } */

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
           <h3><i class="fas fa-users mr-2"></i>Liste des utilisateurs <span class="float-right">Welcome! <strong>
           ' ;
 if(isset($_SESSION['username'])) {
   echo'  <span class="badge badge-lg badge-secondary text-white"> ';

 
 $username = $_SESSION['username'];
 echo $username;
 
}
 echo '</span>
 
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
                       <th  class="text-center">Banni</th>
                       <th  width=\'25%\' class="text-center">Action</th>
                     </tr>
                   </thead>
                   <tbody> ' ;
 
                  
 
 include_once '../controllers/affichControl.php';
 
 
 $_controller = new affichControl();
 $allUser = $_controller->selectAllUserData(); 
                    
                       if ($allUser) {
                         $i = 0;
                         foreach ($allUser as  $value) {
                           $i++;
                            echo'
 
                       <tr class="text-center"
               
                       >
 
                         <td>'.$i .'</td>
                         <td>'.$value['nom'].'</td>
                         
 
 
                         <td>'.$value['prenom'].' <br>' ;
                        
             
                           if ( $value['type']  == 'client'){
                           echo "<span class='badge badge-lg badge-info text-white'>Client</span>";
                         } else/*  if ($value['type'] == 'transporteur') */ {
                           if($value['certifie'] == '0') {
                             echo "<span class='badge badge-lg badge-dark text-white'>Transporteur Non certifié.e</span>";
                           }
                           else {
                             echo "<span class='badge badge-lg badge-success text-white'>Transporteur certifié.e</span>";
 
                           }
                         } 
                         echo '</td>
 
                          <td>'. $value['adresse'].'</td>
                         <td>'. $value['numero'] .'</td>
                         <td>'. $value['email'] .'</td> ' ;
                        if($value['viewersNumber'] =="0") { 
                           echo '<td>Pas encore noté</td> ' ;
 
                          } else { 
                            echo'
                           <td>'.$value['note']/$value['viewersNumber'].'/5 </td>';
 
 
                          } 
 
                        echo'<td>' ;
                          if($value['type'] == 'transporteur' && $value['demande'] == '1') { 
                         
                            if ($value['statut'] == 'certifie') { 
                            echo ' <span class="badge badge-lg badge-info text-white">Certifié</span>' ;
                            } else if($value['statut']  == 'refuse'){ 
                            echo' <span class="badge badge-lg badge-danger text-white">Refusé</span>' ;
                            }
                           else { 
                             echo '<span class="badge badge-lg badge-secondary text-white">'. $value['statut'].' </span>' ;
                            } 
                         }  
                        echo' </td>
                         <td> ' ;
                            if( $value['banni'] =="1") { 
                            echo' <span class="badge badge-lg badge-danger text-white">Banni</span>' ;
 
                             
 
                           } else { 
                          echo' <span class="badge badge-lg badge-success text-white">Pas banni</span>' ;
 
                        } echo'
                         </td>
 
                         <td>
                           <a class="btn btn-success btn-sm" href="./userProfileAdmin.php?id='. $value['ID_user'] .'">Voir</a>
                           <a class="btn btn-info btn-sm " href="./userProfileAdmin.php?id=' . $value['ID_user'] .'">Editer</a>
                            <a onclick="return confirm(\'Vous voulez vraiment supprimer cet utilisateur ?\')" class="btn btn-danger btn-sm " href="?remove=' . $value['ID_user'].'">Supprimer</a>
                            ' ;
                             if($value['banni'] =="1") { 
                            echo' <a  class="btn btn-danger btn-sm disabled " href="?bannir=' . $value['ID_user'].'">Bannir</a>' ;
 
 
                            } else { 
                              echo'
                             <a onclick="return confirm(\'Vous voulez vraiment bannir cet utilisateur ?\')" class="btn btn-danger btn-sm " href="?bannir='. $value['ID_user'].'">Bannir</a>' ;
 
                           } 
 
                             
                             if ($value['type'] == 'transporteur' && $value['demande'] == '1') {  
                           echo'  <div class="card-body">
 
 
                             <form action="../controllers/Users.php" method="POST" > 
                             <input type="hidden" name="type" value ="changestatut">
 
                            <select  onchange="selectRefuse(this);" class=\'form-control inputstl\' name="selectstatut" id="selectstatut"> 
                            <option disabled selected value> -- Changer le statut -- </option>
 
                            <option value=\'1\' > En attente </option>
                              <option value=\'2\'> En cours de traitement</option>
                              <option value=\'3\' > Validé </option>
                              <option id="refus" value=\'4\' >Refusé</option>
                              <option value=\'5\' >Certifié</option>
 
                            </select>
 
 
 
                            <div class="from-group mb-3"> 
                               <input type="hidden" name="ID_user" value="'. $value['ID_user'].'">
   
                            <input type="submit" value="Changer"  >
                            </div>
 
                            </form>
                             </div>
 <!--form de justificatif debut-->
 <div id="container-justificatif" class="container-justificatif" style=" 
 
 position:relative;
 display:none ;" > 
   <label for="" id="closebtn-justificatif" class="closer-btn fas fa-times" style="
   position: absolute;
  
   right: 1rem;
   top: 1rem;
 
 "></label>
 
 <form action="../controllers/Users.php" method="POST" style="margin: 2rem;" > 
 <div class="text"  style="margin: 2rem;
 padding-top: 2rem ; 
 font-size: 1.2rem ; width: 80%;"> Envoyez un justificatif </div>
 <input type="hidden" name="type" value ="sendjustificatif" >
 <input type="hidden" name="nom" value ="'. $value['nom'].'" >
 <input type="hidden" name="prenom" value ="'. $value['prenom'].'" >
 
 <div class="from-group mb-3"> 
   <input type="text" style="margin: 0 2rem;height: 6rem ; ">
   </div> 
   <input type="submit" value="Envoyer"  style="margin: 2rem; " >
 
 
 </form> 
 </div> 
 <!--form de justificatif fin--> ';
 
                              } 
                            
 
                       echo'  </td>
                       </tr>' ;
                    
                
                  }}
                
                
 
                    else { 
                      echo' <tr class="text-center">
                       <td>No user availabe now !</td>
                     </tr>' ;
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

