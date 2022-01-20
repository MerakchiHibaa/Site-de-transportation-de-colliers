<?php


include_once '../controllers/Users.php';
include_once '../controllers/affichControl.php';


class annonceDetailAdmin_view {

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
          <h3>Détail de l\'annonce <span class="float-right"> <a href="index.php" class="btn btn-primary">Back</a> </h3>
        </div>
        <div class="card-body">' ;

include_once '../controllers/affichControl.php';


$_controller = new affichControl();
    $getAinfo = $_controller->getAnnonceInfoById($ID_annonce);
    if ($getAinfo) {
      foreach ($getAinfo as  $getUinfo) {
     


         echo' <div style="width:600px; margin:0px auto">

          <form class="" action="../controllers/Users.php" method="POST">
              <div class="form-group">
                <label for="name">ID_annonce</label>
                <input required type="text" name="nom" value="'. $getUinfo['ID_annonce'] .'" class="form-control">
              </div>

              <div class="form-group">
                <label for="name">ID_User</label>
                <input required type="text" name="prenom" value="'. $getUinfo['ID_User'].'" class="form-control">
              </div>

              <div class="form-group">
                <label for="name">Type d\'utilisateur</label>
                <input required type="text" name="prenom" value="'    ;                 
                        include_once '../controllers/affichControl.php';
                        $_controller = new affichControl();
                                                $user = $_controller->getTypeUtilisateur($getUinfo['ID_User']) ;
                                                if($user) {
                                                foreach($user as $user) {
                                                    echo $user['type'] ;
                                                } }
                                                else {
                                                    echo 'utilisateur' ;
                                                } echo'" class="form-control">
              </div>




             
              <div class="form-group">
                <label for="adresse">Point de départ</label>
                <input required type="text" name="adresse" value="'. $getUinfo['pointDepart'].'" class="form-control">
              </div>
              <div class="form-group">
                <label for="email">Point d\'arrivée</label>
                <input required type="email" id="email" name="email" value="'. $getUinfo['pointArrivee'].'" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Type de transport</label>
                <input required type="text" id="" name="" value="'. $getUinfo['typeTransport'].'" class="form-control">
              </div>

              <div class="form-group">
                <label for="">Poids</label>
                <input required type="text" id="" name="" value="'. $getUinfo['poidsMin'].' - '. $getUinfo['poidsMax'].'" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Volume</label>
                <input required type="text" id="" name="" value="'. $getUinfo['volumeMin'].' - '. $getUinfo['volumeMax'].'" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Moyen de transport</label>
                <input required type="text" id="" name="" value="'. $getUinfo['moyenTransport'].'" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Etat</label>
                <input required type="text" id="" name="" value="'. $getUinfo['etat'].'" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Date de création</label>
                <input required type="text" id="" name="" value="'. $getUinfo['creationDate'].'" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Nombre de vues</label>
                <input required type="text" id="" name="" value="'. $getUinfo['viewsNumber'].'" class="form-control">
              </div>

              <div class="form-group">
                <label for="">Archivée?</label>' ;
                if($getUinfo['archive'] == '1')
                {
                echo'  <input required type="text" id="" name="" value="OUI">' ;

                }
                else {
                  echo'  <input required type="text" id="" name="" value="NON"  class="form-control">
                  </div>
                  ' ;


                }
echo'
          </form>
        </div>' ;

      }
     }else{
        echo '<h1> couldnt get the page  </h1>' ;

       /*  header('Location:index.php'); */
      } echo'



      </div>
    </div>
    <script> 
    const selectTransporteur = document.getElementById(\'selectTransporteur\') ; 
    const selectClient = document.getElementById(\'selectClient\') ; 
    const opttranstrans =  document.getElementById(\'opttranstrans\') ; 
    const opttransclient =  document.getElementById(\'opttransclient\') ; 
    const optclienttrans =  document.getElementById(\'optclienttrans\') ; 
    const optclientclient =  document.getElementById(\'optclientclient\') ;
    
    function transClient(){

    } 
    function transtrans(){

    } 
    function clientClient() {

    }
    function clientTrans() {
      
    }

    if (selectTransporteur != null ){ 
      console.log(\'inside boucle\') ;

      if (opttransclient != null )  {

     
    opttransclient.onselect = () => {
      console.log(\'inside select 1\') ;
      selectTransporteur.setAttribute("style", "display: none");


    }  }
    if ( optclientclient !=null) {

   
    optclientclient.onselect = () => {
      console.log(\'inside select 2\') ;

      selectTransporteur.setAttribute("style", "display: none");


    } }
  }


    function hideclient(self) {
      if (self.value == "1" || self.value == "4" ) {
    console.log(\' selected client\');
    console.log(self.value);

     selectTransporteur.setAttribute("style", "display: none");
 
  }else{
    console.log(self.value);

     console.log(\' selected transporteur\');
     selectTransporteur.setAttribute("style", "display: block");


  }


    }




  </script>


  


' ;

    }}
