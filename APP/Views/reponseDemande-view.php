
<?php



class responseDemande_view {

   

    public function __construct(){
      
    }
    public function display($ID_annonce , $ID_transporteur) {
        echo'
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../css/style.css">
            <!-- <link rel="stylesheet" type="text/css" href="../map/map/css.css">
            <link rel="stylesheet" type="text/css" href="../map/map/css.css">
         -->
        
         <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">            
        <link rel="stylesheet" href="../assetss/bootstrap.min.css">
            <title>Annonce </title>
        </head>
        <body>' ;
        
        include_once '../controllers/affichControl.php';
        
        
        $_controller = new affichControl();
            $getAinfo = $_controller->getAnnonceInfoById($ID_annonce);
            if ($getAinfo) {
              foreach ($getAinfo as  $getUinfo) {
                $_controller->readNotification($ID_annonce, $getUinfo['ID_User'], $ID_transporteur);
        
                  $views =  $getUinfo['viewsNumber'] + 1 ; 
                  $_controller->setViews($views , $ID_annonce);
        
             echo'
        
        <div class="container-affich"> 
        
        
            <div class="ann-affich">' ;
            /*  if(!empty($_SESSION['msg'])) { 
        
        echo $_SESSION['msg'] ; 
        }  */echo'
                <div class="ann-affich_img">
                    <img src="../assets/slider1.jpg" alt="">
                </div>
            
                <div class="ann-affich_post">
        
                   ' ;
                        $user = $_controller->getUserInfoById( $ID_transporteur);
                   if ($user) {
                    foreach ($user as  $user) {
              
                   echo'
                <p class="ann-affich_text"> Le transporteur'.   $user['nom'].' '.$user['prenom']. ' a répondu à cette annonce, vous pouvez le contacter par téléphone : '.   $user['numero'] .' ou par email : '.  $user['email'] . '  </p>
        
                
                <h3 class="ann-affich_title"> '.  $getUinfo['titreAnnonce'] . ' </h3>
                    <p class="ann-affich_text"> Créée le :  '. $getUinfo['creationDate'] .' </p>
        
                        <p class="ann-affich_text">  Moyen de transport: '.  $getUinfo['moyenTransport'] .' </p>' ;
        
        
                     } echo'
        
                    <p class="ann-affich_text">  Type de transport:  '. $getUinfo['typeTransport'] .' </p>
                    <p class="ann-affich_text"> Poids de l\'objet entre '.  $getUinfo['poidsMin'] .' ET '. $getUinfo['poidsMax'] .' </p>
                    <p class="ann-affich_text">  Volume de l\'objet entre '.  $getUinfo['volumeMin'] .' ET '. $getUinfo['volumeMax'] .' </p>
                <p class="ann-affich_text">  Point de départ : '.   $getUinfo['pointDepart'] .' Point d\'arrivée : '.  $getUinfo['pointArrivee'] .' </p>
        
            <i class="fa fa-eye" aria-hidden="true">     '.$getUinfo['viewsNumber'] . '   </i> 
        <!--     <a  href="#" class="ann-affich_cta"> Voir sur une carte  </a>
         -->
         
         
                </div> <!--ann-affich_post end-->
        
                <form method="post" action="./controllers/Users.php" > 
                 <input type="hidden" name="type" value ="trajet">
                
        
                 <input type="hidden" name="ID_annonce" value=" '. $ID_annonce . '"> 
                 <input type="hidden" name="ID_client" value=" '. $_SESSION['userID'] .'"> 
                 <input type="hidden" name="ID_transporteur" value=" '. $user['ID_user'] .'"> 
                 <button type="submit" name="send"class="ann-affich_cta" > Confirmer </button>
        
             </form>
                </div> <!--ann-affich-->
                </div>
        
        
             <!--end jumbotron-->' ;
        
        
          } }  }
        
            
                
            
           echo'
        
        </body>
        </html>' ; 
    }
}


