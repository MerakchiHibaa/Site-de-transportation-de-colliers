<?php


include_once '../controllers/Users.php';
include_once '../controllers/affichControl.php';


class editPresentation_view{

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
               <h3 class="text-center">Modifier la page Présentation</h3>
             </div>
             <div class="cad-body">
     
     
     
                 <div style="width:600px; margin:0px auto">
     
                 <form class="" action="../controllers/Users.php" method="POST">
                     
                     
                     <div class="form-group pt-3">
                       <label for="contenu">Conetnu</label>
                       <input required type="text" name="contenu"  class="form-control">
                     </div>
                     <div class="form-group">
                       <label for="image">Nom de l\'image</label>
                       <input required type="text" name="image"  class="form-control">
                     </div>
                     <div class="form-group">
                       <label for="image">Nom de la vidéo</label>
                       <input required type="text" name="video"  class="form-control">
                     </div>

                     <input  type="hidden" name="type" value="PresentationPage" class="form-control">

                     <div class="form-group">
                       <button type="submit" name="" class="btn btn-primary">Modifier</button>
                     </div>
     
     
                 </form>
               </div>
     
     
             </div>
           </div>
</body>
</html>' ;
    }
}