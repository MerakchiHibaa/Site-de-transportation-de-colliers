<?php


include_once '../controllers/Users.php';
include_once '../controllers/affichControl.php';


class editPresentation_view{

    public function display() {



echo'

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assetss/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="../assetss/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../assetss/style.css">

    <title>Edit Présentation</title>
</head>
<body>
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