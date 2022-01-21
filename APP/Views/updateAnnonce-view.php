<?php


include_once '../controllers/Users.php';
include_once '../controllers/affichControl.php';


class updateAnnonce_view {

    public function display($ID_annonce) {


echo'


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Detail annonce</title>
    <link rel="stylesheet" href="../assetss/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="../assetss/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../assetss/style.css">
  </head>
  <body>' ;



/*

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
  $updateUser = $users->updateUserByIdInfo($userid, $_POST);

}
if (isset($updateUser)) {
  echo $updateUser;
}
 
 */



 echo'

 <div class="card ">
   <div class="card-header">
          <h3>Modifier l\'annonce <span class="float-right"> <a href="profile.php" class="btn btn-primary">Retour</a> </h3>
        </div>
        <div class="card-body">' ;

include_once '../controllers/affichControl.php';


$_controller = new affichControl();
    $getAinfo = $_controller->getAnnonceInfoById($ID_annonce);
    if ($getAinfo) {
      foreach ($getAinfo as  $getUinfo) {
     


         echo' <div style="width:800px; margin:0px auto">';
         if(isset($_SESSION['msg']) && isset($_SESSION['status'])) {
            echo'  <div class="alert alert-'.$_SESSION['status'].'" role="alert">'.$_SESSION['msg'].
'                </div>
' ; 
unset($_SESSION['status']);
unset($_SESSION['msg']);
         }
echo'

          <form  action="../controllers/Users.php" method="POST">
        

          <div class="form-group">
          <label for="adresse">Titre de l\'annonce </label>
          <input required type="text" name="titreAnnonce" value="'. $getUinfo['titreAnnonce'].'" class="form-control">
        </div>
        <input required type="hidden" name="ID_annonce" value="'. $getUinfo['ID_annonce'].'" class="form-control">
        <input required type="hidden" name="type" value="updateAnnonceUser" class="form-control">

              <div class="form-group">
                <label for="adresse">Point de départ</label>
                <input required type="text" name="pointDepart" value="'. $getUinfo['pointDepart'].'" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Point d\'arrivée</label>
                <input required type="text" id="" name="pointArrivee" value="'. $getUinfo['pointArrivee'].'" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Type de transport</label>
                <input required type="text" id="" name="typeTransport" value="'. $getUinfo['typeTransport'].'" class="form-control">
              </div>

              <div class="form-group">
                <label for="">Poids Minimal</label>
                <input required type="text" id="" name="poidsMin" value="'. $getUinfo['poidsMin'].' " class="form-control">
              </div>

              <div class="form-group">
                <label for="">Poids Maximal</label>
                <input required type="text" id="" name="poidsMax" value="'. $getUinfo['poidsMax'].' " class="form-control">
              </div>

              <div class="form-group">
                <label for="">Volume Minimal</label>
                <input required type="text" id="" name="volumeMin" value="'. $getUinfo['volumeMin'].'" class="form-control">
              </div>

              <div class="form-group">
              <label for="">Volume Minimal</label>
              <input required type="text" id="" name="volumeMax" value="'. $getUinfo['volumeMax'].'" class="form-control">
            </div>
              <div class="form-group">
                <label for="">Moyen de transport</label>
                <input required type="text" id="" name="moyenTransport" value="'. $getUinfo['moyenTransport'].'" class="form-control">
              </div>
              <div class="form-group">
                       <button type="submit" name="" class="btn btn-primary">Modifier</button>
                     </div>
     

              
              
          </form>
        </div>' ;

      }
     }else{
        echo '<h1> couldnt get the page  </h1>' ;

       /*  header('Location:index.php'); */
      } echo'



      </div>
    </div>
   


  


' ;

    }}
