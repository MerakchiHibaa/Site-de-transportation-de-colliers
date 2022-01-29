
<?php


include_once '../controllers/Users.php';
include_once '../controllers/affichControl.php';



class responseDemande_view {

   

   
    public function display($ID_annonce , $ID_transporteur) {

        echo'

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../css/index.css">
           
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

         <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">            
            <title>Réponses </title>
        </head>
        <body>
        ' ;
        
        include_once '../controllers/affichControl.php';
        
        
        $_controller = new affichControl();
            $getAinfo = $_controller->getAnnonceInfoById($ID_annonce);
            if ($getAinfo) {
              foreach ($getAinfo as  $getUinfo) {
                $_controller->readNotification($ID_annonce, $getUinfo['ID_User'], $ID_transporteur);
        
                  $views =  $getUinfo['viewsNumber'] + 1 ; 
                  $_controller->setViews($views , $ID_annonce);
        
         
                        $user = $_controller->getUserInfoById( $ID_transporteur);
                   if ($user) {
                    foreach ($user as  $user) {
              
                   echo'
                   
 <style> 

 @import url("https://fonts.googleapis.com/css?family=Open+Sans:300,400,700");
@import url("https://fonts.googleapis.com/icon?family=Material+Icons");
body,
html {
  margin: 0;
  padding: 0;
}

body {
  min-height: 100vh;
  min-width: 100vw;
  background: -webkit-gradient(linear, left top, right bottom, from(rgba(0, 0, 255, 0.5)), to(rgba(0, 128, 0, 0.5))), url(../assets/'.$getUinfo['image'].');
  background: linear-gradient(to right bottom, rgba(0, 0, 255, 0.5), rgba(0, 128, 0, 0.5)), url(../assets/'.$getUinfo['image'].');
  background-size: cover;
  background-position: center center;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
}

#header {
  width: 50vw;
  max-width: 400px;
  min-width: 300px;
  height: 150px;
  background: url(../assets/'.$getUinfo['image'].');
  background-size: cover;
  background-position: center center;
  -webkit-transition: all .08s linear;
  transition: all .08s linear;
}

#profile {
  width: 50vw;
  max-width:400px;
  min-width:300px;
  height: 30rem;
  background: white;
  position: relative;
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
  padding-top: 40px;
  padding-left: 25px;
  font-family: \'Open Sans\', sans-serif;
}

#profile .image {
  position: absolute;
  border: 3px solid white;
  top: -55px;
  left: 20px;
  height: 5rem;
  width: 5rem;
  border-radius: 10px;
}

#profile .image img {
  width: inherit;
  height: inherit;
  border-radius: 8px;
}

#profile .name {
  font-size: 1.3rem;
  font-weight: 500;
  color: #444;
}

#profile .nickname {
  color: #888;
  font-size: 0.9rem;
  padding-bottom: 7px;
}

#profile .location {
  color: #555;
  font-size: 0.9rem;
  padding-left: 0px;
  position: relative;
  left: -5px;
}

#profile .location .material-icons {
  position: relative;
  top: 3px;
  font-size: 1rem;
}

.shadow {
  -webkit-box-shadow: 0px 0px 10px 1px rgba(0, 0, 0, 0.5);
          box-shadow: 0px 0px 10px 1px rgba(0, 0, 0, 0.5);
}

.overflow {
  overflow: hidden;
}

.following,
.followers {
  font-family: \'Open Sans\', sans-serif;
  font-size: 0.9rem;
  color: #bbb;
  font-weight: 300;
}

.followers {
  float: right;
  padding-right: 30px;
}

.bottom {
  margin-top: 10px;
}

.count {
  color: black;
  font-family: \'Open Sans\', sans-serif;
  font-size: 0.9rem;
  font-weight: 700;
}
 </style>

                   <div class="shadow overflow">
                   <div id="header"> </div>
                   <div id="profile">
                     <div class="image">
                     <img src="../assets/'.$getUinfo['image'].'" alt="" />
                     </div>
                     <div class="name">
                     '.   $user['nom'].' '.$user['prenom']. '
                     </div>
                     <div class="nickname">
                     <i class="fas fa-envelope"> </i>
                     '.   $user['email'].' 
                     </div>
                     <div class="nickname">
                     <i class="fas fa-phone"></i>
                     '.   $user['numero'].' 
                     </div>
                     <div class="location">
                     <i class="material-icons">place</i>'.   $user['adresse'].' 
                     </div>
                     <div class="bottom">
                     <span class="following">
                       <span class="count">'.   $user['note'].' </span>
                       <i class="fa fa-star" aria-hidden="true"></i>

                       </span>
                       ' ; 
                       if($user['certifie'] =="1") {
                           echo'
                           
                        <span class="followers" style ="color: green ; ">
                        <i class="fas fa-check"> </i>

                        <span style ="color: green ; " class="count">Certifié</span>
                        
                        
                      </span>
                     ' ;

                       }
                       else { 
                        echo'
                        <span class="followers" style ="color: orange ; ">
                        <i class="fas fa-exclamation-triangle"> </i>
                        <span style ="color: orange ; " class="count">Non Certifié</span>
                        
                        
                        
                      </span>' ;

                       }
                       echo'
                       <div class="bottom">
                       <span class="location">
                        L\'annonce concernée est : <span class="location"> '. $getUinfo['titreAnnonce'].'</span>
                      
                       
                       </span>
                       </div>
                       <div class="bottom">
                       <span class="location">
                        De : <span class="location"> '. $getUinfo['pointDepart'].' à '. $getUinfo['pointArrivee'].' </span>
                      
                       
                       </span>
                       </div>
                      

                       <form method="post" action="../controllers/Users.php" > 
                 <input type="hidden" name="type" value ="trajet">
                
        
                 <input type="hidden" name="ID_annonce" value=" '. $ID_annonce . '"> 
                 <input type="hidden" name="ID_client" value=" '. $_SESSION['userID'] .'"> 
                 <input type="hidden" name="ID_transporteur" value=" '. $user['ID_user'] .'"> 
                 <button type="submit" name="send" class="btn-up" style ="background-color: transparent;  left: 20%;
                 top: 80%;"  > Confirmer </button>
        
             </form>
                </div> 
                ' ;
                if(isset($_SESSION['msg']) && isset($_SESSION['status'])) {
                    echo'  <div style ="width: 90% ; " class="alert alert-'.$_SESSION['status'].'" role="alert">'.$_SESSION['msg'].
  '                </div>
  ' ; 
  unset($_SESSION['status']);
  unset($_SESSION['msg']);
  
                  } echo'
                       
                     </div>
                   </div>
                 </div>

                 <!--  <div class="ann-affich_img">
                   <img src="../assets/'.$getUinfo['image'].'" alt="">
               </div>
           
               <div class="ann-affich_post">
       
                  
                <p class="ann-affich_text"> Le transporteur'.   $user['nom'].' '.$user['prenom']. ' a répondu à cette annonce, vous pouvez le contacter par téléphone : '.   $user['numero'] .' ou par email : '.  $user['email'] . '  </p>
        
                
                <h3 class="ann-affich_title"> '.  $getUinfo['titreAnnonce'] . ' </h3>
                    <p class="ann-affich_text"> Créée le :  '. $getUinfo['creationDate'] .' </p>
        
                        <p class="ann-affich_text">  Moyen de transport: '.  $getUinfo['moyenTransport'] .' </p>' ;
        
        
                     } echo'
        
                    <p class="ann-affich_text">  Type de transport:  '. $getUinfo['typeTransport'] .' </p>
                    <p class="ann-affich_text"> Poids de l\'objet entre '.  $getUinfo['poidsMin'] .' KG ET '. $getUinfo['poidsMax'] .' KG </p>
                    <p class="ann-affich_text">  Volume de l\'objet entre '.  $getUinfo['volumeMin'] .' L ET '. $getUinfo['volumeMax'] .' L </p>
                <p class="ann-affich_text">  Point de départ : '.   $getUinfo['pointDepart'] .' Point d\'arrivée : '.  $getUinfo['pointArrivee'] .' </p>
        
            <i class="fa fa-eye" aria-hidden="true">     '.$getUinfo['viewsNumber'] . '   </i> 
        <!--     <a  href="#" class="ann-affich_cta"> Voir sur une carte  </a>
         -->' ;
        
        
          } }  }
          else { echo
        'no user ' ; }
        
            
                
            
           echo'
           <script type="text/javascript"> 

           
const header = document.getElementById(\'header\')

window.addEventListener(\'mousewheel\',(event)=>{
  let delta = (event.wheelDelta + 3)*-1
  animate(delta>0, delta)
})

const animate = (check,delta) => {
  const MIN_HEIGHT = 80
  const HEIGHT = 150
  const MAX_ZOOM = 3
  const MAX_BLUR = 3
    if(check){
    let blur = 1+delta/150 < MAX_BLUR ? Math.ceil(1+delta/150) : MAX_BLUR 
    let height = HEIGHT - delta/10 > MIN_HEIGHT ? Math.ceil(HEIGHT- delta/10) : MIN_HEIGHT
    let zoom = 1+delta/200 <= MAX_ZOOM ? 1+delta/200 : MAX_ZOOM 
    requestAnimationFrame(transform(header,blur,height,zoom))
  } else
    requestAnimationFrame(transform(header,0,150,1))
}

const transform = (element,blur,height,zoom) =>{
  element.style.filter = `blur(${blur}px)`
  element.style.height = `${height}px`
  element.style.transform = `scale(${zoom},${zoom})`
}
           </script>
        
        </body>
        </html>' ; 
    }
}


