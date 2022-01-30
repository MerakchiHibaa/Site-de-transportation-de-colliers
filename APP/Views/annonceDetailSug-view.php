<?php


include_once '../controllers/Users.php';
include_once '../controllers/affichControl.php';


class annonceDetailSug_view {

    public function display($ID_annonce) {



echo'

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css">
    <!-- <link rel="stylesheet" type="text/css" href="./map/map/css.css">
    <link rel="stylesheet" type="text/css" href="./map/map/css.css">
 -->

 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">            
<link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Annonce </title>
</head>
<body>' ;

include_once '../controllers/affichControl.php';


$_controller = new affichControl();
    $getAinfo = $_controller->getAnnonceInfoById($ID_annonce);
    if ($getAinfo) {
/*         readNotificationTrans($ID_annonce, $ID_client, $ID_transporteur)
 */       /*  $getAinfo = $_controller->readNotificationTrans($ID_annonce ); */

        
      foreach ($getAinfo as  $getUinfo) {
         

    echo'

<div class="container-affich"> 


    <div class="ann-affich">' ;
     /* if(!empty($_SESSION['msg'])) { 

echo $_SESSION['msg'] ; 
}  */
       echo' <div class="ann-affich_img">
            <img src="../assets/slider1.jpg" alt="">
        </div>
    
        <div class="ann-affich_post">
            
            <h1 class="ann-affich_title"> '. $getUinfo['titreAnnonce'].'</h1>
            <p class="ann-affich_text"> Créée le : '. $getUinfo['creationDate'].'</p>' ;

              $user = $_controller->getUserInfoById( $getUinfo['ID_User']);
           if ($user) {
            foreach ($user as  $user) {
                if(!isset($_SESSION['userID'])) { 
      
           

            echo '<p class="ann-affich_text"  >  Par : '. $user['username'].'</p>' ;

           } else {  
              echo'  <p class="ann-affich_text" style="text-transform:uppercase;" > <a href="profileClient.php?id='. $user['ID_user'] .'">   Par : '.  $user['nom'].' '.$user['prenom'].' </a> </p>
                <p class="ann-affich_text">  Moyen de transport: '. $getUinfo['moyenTransport'].'</p>' ;


           } 

           echo' <p class="ann-affich_text">  Type de transport: '. $getUinfo['typeTransport'].'</p>
            <p class="ann-affich_text"> Poids de l\'objet entre '. $getUinfo['poidsMin'].'et '. $getUinfo['poidsMax'].'</p>
            <p class="ann-affich_text">  Volume de l\'objet entre '. $getUinfo['volumeMin'].' et '. $getUinfo['volumeMax'].'</p>
        <p class="ann-affich_text">  Point de départ : '. $getUinfo['pointDepart'] .' Point d\'arrivée : '. $getUinfo['pointArrivee'] .' </p>

    

 <form method="post" action="../controllers/Users.php" > 
                 <input type="hidden" name="type" value ="trajetTrans">
                
        
                 <input type="hidden" name="ID_annonce" value=" '. $ID_annonce . '"> 
                 <input type="hidden" name="ID_client" value=" '.  $user['ID_user'].'"> 
                 <input type="hidden" name="ID_transporteur" value=" '. $_SESSION['userID'] .'"> 
                 <button type="submit" name="send" class="btn-up" style ="background-color: transparent;  left: 20%;
                 top: 80%;"  > Confirmer </button>
        
             </form>
                 
                ' ;
                if(isset($_SESSION['msg']) && isset($_SESSION['status'])) {
                    echo'  <div style ="width: 90% ; " class="alert alert-'.$_SESSION['status'].'" role="alert">'.$_SESSION['msg'].
  '                </div>
  ' ; 
  unset($_SESSION['status']);
  unset($_SESSION['msg']);
  
                  } 
        
    echo'
    </div>
        </div> <!--ann-affich_post end-->
        </div> <!--ann-affich-->
        </div>


   

 <?php }} } }?>

    
        
    
   
    
   


 <style>

.container-map-output {
    padding: 0;
    max-width: 100%;

margin: 2rem;
         height:30rem ;
         width: 70rem ;
     }
     #container-map {
   display: none;  
    max-width: 100%;
    height: 90%;
    width: 80%;
    margin: 0 auto;
    z-index: 200;
    /* transform: translateX(12%); */
    transform: translateY(-100%);
}
     
     #googleMap {
         margin :2rem ;
         padding: 1rem ;
        max-width: 100%;
       
        height: 90% ;

/*        bottom: 900px;
 */    width: 90%;
/*     height: 200px ;;
 */}



       .popup {
       /*  visibility: hidden;
        opacity: 0; */
/*         position: fixed;
 */        max-width: 100%;

        padding: 2rem; 
/* height: 100vh ; 
 *//* overflow: hidden;
 */transition: all .5s;


    }
    .popup:target {
        /* visibility: visible;
        opacity: 1; */
    }

    #pop--click {
    }
    .popup__content{
        max-width: 100%;

        border-radius: 0 4px 40px -5px #555555ad;
        width: 50rem;
        margin: 0 auto;
        position: relative;
    }

    .popup .popup__content .close {
        position: absolute;
        top: -6rem;
        right: -2rem ;
        /* top: 0;
        right: 0 ; */
        text-decoration: none;
        font-size: 3rem;
        font-weight: 700;
        transition: all .3s;
        z-index: 55;
    }

    .popup .popup__content .close:hover { 
        color: #33d9b2;
    }
	#voirCarte {
		
	}
  </style>



</body>
</html> ' ;

}
           }
        }
    }
}}