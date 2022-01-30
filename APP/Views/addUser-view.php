<?php

/* include_once '../inc/header.php';
 */include_once '../controllers/Users.php';
include_once '../controllers/affichControl.php';


class addUser_view {

 
    public function display() {
      if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addUser'])) {
        include_once '../controllers/Users.php';
        $users = new Users();
        $userAdd = $users->addNewUserByAdmin($_POST);
      }
      
      if (isset($userAdd)) {
        echo $userAdd;
      }


      echo '
      
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

          <a class="nav-link" href="adminProfile.php?id=<?php if( isset($_SESSION[\'ID_user\'])) {
            echo $_SESSION[\'ID_user\'];

          }  ?>"><i class="fab fa-500px mr-2"></i>Profile <span class="sr-only">(current)</span></a>
       </li>

       <li class="nav-item">
         <a class="nav-link" href="?action=logout"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a>
       </li>
     

     


     </ul>

   </div>
 </nav>     
 
      <div class="card ">
        <div class="card-header">
               <h3 class="text-center">Ajouter un utilisateur</h3>
             </div>
             <div class="cad-body">
     
     
     
                 <div style="width:600px; margin:0px auto">
     
                 <form class="" action="" method="post">
                     <div class="form-group pt-3">
                       <label for="nom">Nom</label>
                       <input type="text" name="nom"  class="form-control">
                     </div>
                     <div class="form-group">
                       <label for="prenom">Prénom</label>
                       <input type="text" name="prenom"  class="form-control">
                     </div>
     
                     <div class="form-group pt-3">
                       <label for="adresse">Adresse</label>
                       <input type="text" name="adresse"  class="form-control">
                     </div>
     
                     <div class="form-group">
                       
                       <label for="email">Email </label>
                       <input type="email" name="email"  class="form-control">
                     </div>
                     <div class="form-group">
                       <label for="numero">Numéro</label>
                       <input type="text" name="numero"  class="form-control">
                     </div>
                     <div class="form-group">
                       <label for="password">Mot de passe</label>
                       <input type="password" name="password" class="form-control">
                     </div>
                     <div class="form-group">
                       <div class="form-group">
                         <label for="sel1"  >Type de l\'utilisateur</label>
                         <select  onchange="selectType(this)" class="form-control" name="type" id="typeadd">
                           <option value="1">Client</option>
                           <option id="optTransporteur" value="2">Transporteur</option>
     
                         </select>
                       </div>
                     </div>
                     <div style="display: none;" class="form-group" id="wilayaSelect" >
                         <label for="sel1"  >Les wilayas</label>
                         
                     <select class="form-control" multiple  name=\'wilaya[]\'> ' ;
     
                   
     
     include_once '../controllers/affichControl.php';
     
     
     $_controller = new affichControl();
     $ARRAY = $_controller->affichWilaya(); 
     
     
     foreach($ARRAY as $row){
       $ID_wilaya =  $row['ID_wilaya'];                     
       $roww = $row['wilaya'];
       echo ("<option value='$roww' > $roww </option> ");
       
                    
     
        
      }
  echo'   
     </select >
     </div>
     </div>
                     <div class="form-group">
                       <button type="submit" name="addUser" class="btn btn-success">Register</button>
                     </div>
     
     
                 </form>
               </div>
     
     
             </div>
           </div>
     
     ' ; 



    }
  }


?>

<?php

/* if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addUser'])) {
  include_once '../controllers/Users.php';
  $users = new Users();
  $userAdd = $users->addNewUserByAdmin($_POST);
}

if (isset($userAdd)) {
  echo $userAdd;
}
 */

 