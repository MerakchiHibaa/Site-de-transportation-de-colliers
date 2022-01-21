<?php


include_once '../controllers/Users.php';
include_once '../controllers/affichControl.php';


class annonceDetail_view {

    public function display() {

if (isset($_GET['id'])) {
    session_start();
  $ID_annonce = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['id']);

} 

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
      foreach ($getAinfo as  $getUinfo) {
          $views =  $getUinfo['viewsNumber'] + 1 ; 
          $_controller->setViews($views , $ID_annonce);

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

    <i class="fa fa-eye" aria-hidden="true">  '.$getUinfo['viewsNumber']  .'   </i> 
<!--     <a  href="#" class="ann-affich_cta"> Voir sur une carte  </a>
 -->
 
 <div class="col-xs-offset-2 col-xs-10">
<button id="voirCarte"class="btn btn-info btn-lg">  <i class="fas fa-directions"  aria-hidden="true" onclick="calcRoute()" ></i></button>
 </div> 
 <form method="POST" action="../controllers/Users.php" > 
         <input type="hidden" name="type" value ="notif">
        

         <input type="hidden" name="ID_annonce" value="'.  $ID_annonce .'"> 
         <input type="hidden" name="ID_transporteur" value="'. $_SESSION['userID'] .'"> 
         <input type="hidden" name="ID_client" value="'. $getUinfo['ID_User'] .'"> 
         <input type="hidden" name="price" id="price" value=\'0\'>
         <input type="hidden" name="p" id="p" value="'. $getUinfo['p'] .'">
         <input type="hidden" name="q" id="q" value="'. $getUinfo['q'] .'"> ' ;


  if(isset($_SESSION['userType'] ) ) { 
     
     if ($_SESSION['userType'] == 'client') { 
        echo' </form>' ;

        
 } else if($_SESSION['userType'] =='transporteur'){ 

  echo'  <input type="submit" value="Répondre à cette annonce" name="send"class="ann-affich_cta " > </input>
         </form>' ;

 } } echo'
        </div> <!--ann-affich_post end-->
        </div> <!--ann-affich-->
        </div>


    <div class="jumbotron" id="container-map"> 
     <div class="container-fluid"> 

    <div id="pop--click"  class="popup"> 
     <div  class="popup__content"> 
         <!-- <div >  -->
         <a href="#" class="close" id="closebtn">  &times; </a>
         
 <form >
    <input type="hidden" id="from" class="form-control"  value="'. $getUinfo['pointDepart'].'"> 
 <input type="hidden" id="to" class="form-control" value="'. $getUinfo['pointArrivee'].'"  > 

 </form> 
 
 <div class="container-map-output"> 
 <div id="googleMap">

</div> <!-- end googlemap-->

<div id="output">

</div> <!--end output-->
     
 </div> <!--end cntainer fluid--->
  <!--    
 </div>
 -->
 </div> <!--popup__content--->


 
 </div> <!--end popup-->
 </div> <!--end container fluid-->
 </div> <!--end jumbotron-->


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

<!--  <script type="text/javascript" src="bootstrap.min.js"></script>
 -->
 <script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsZrS5LkAXAqzgVYMJQQMYOoWgYCHHZTU&libraries=places"></script>

<!--   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9j4ulOm4Iw2U76rtSDNam10oWOhy0TEU&libraries=places"></script> 
 -->
 <!-- <script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6cIUVCcSaRbVqNTES9gwZ1uZeIOrE-_o&libraries=places&callback=mapInit"></script>
 -->
<script  >
  /*   let voirCarte = document.getElementById(\'voirCarte\') ; 
    let containermap = document.getElementById(\'container-map\') ; 
    voirCarte.onclick = function() {
        containermap.style.display = \'block\' ;

    } */

    let closebtn = document.getElementById(\'closebtn\') ; 
    closebtn.onclick = function() {
        let containermap = document.getElementById(\'container-map\') ; 

        containermap.style.display = \'none\' ;

    }
    let mylatlng = {lat:36.7630648 , lng: 3.05055253 } ;
let mapOptions = {
    center: mylatlng ,
    zoom: 7 , 
    mapTypeId: google.maps.MapTypeId.ROADMAP
} ;

/* google.maps.event.addDomListener(window, \'load\', initialize);
 */

let map = new google.maps.Map(document.getElementById(\'googleMap\'), mapOptions) ;

let directionService = new google.maps.DirectionsService() ;
let directionDisplay = new google.maps.DirectionsRenderer() ;

directionDisplay.setMap(map) ;

function calcRoute() {
    let containermap = document.getElementById(\'container-map\') ; 
        containermap.style.display = \'block\' ;

    
    let request = {
    origin: document.getElementById("from").value,
    destination: document.getElementById(\'to\').value,
    travelMode: google.maps.TravelMode.DRIVING ,  //WALKING, BYCYCLING ,TRANSIT
    unitSystem: google.maps.UnitSystem.METRIC

    } //ens request
    console.log(request.origin) ;
/* AIzaSyBsZrS5LkAXAqzgVYMJQQMYOoWgYCHHZTU   */
/* AIzaSyCqd1XS0Jt-VUrhm_x1nY9bmQEk5xwf*/
//pass the request to the root method
let distance = 0 ;
directionService.route(request ,  (result, status) => { 
    if(status == google.maps.DirectionsStatus.OK){
        //get distance and time 
        distance =  parseFloat(result.routes[0].legs[0].distance.text) ;
        let price =  parseFloat(distance*0.4*41.5).toFixed(2) ;
        if(distance < 18) {
            price = 500 ; 

        }

      //nombre de kilomètres x consommation du véhicule au kilomètre x prix du carburant au litre

let pricevalue = document.getElementById(\'price\') ; 
pricevalue.value = price ; 
console.log(pricevalue.value) ;
        const output = document.getElementById("output") ; 
        output.innerHTML = "<h4  style=\'margin: 2rem; font-size:1.5rem;\' > De : " + document.getElementById(\'from\').value + " à: " + document.getElementById(\'to\').value + ".<br /> Distance en voiture <i class=\'fas fa-road\'> </i> : " + result.routes[0].legs[0].distance.text + ".<br /> Durée: <i class=\'fas fa-hourglass-start\'> </i> : " + result.routes[0].legs[0].duration.text + ". <br /> Le tarif est : "+price+" DA.</h4>" ;
     console.log(document.getElementById(\'from\').value + ".<br /> To: " + document.getElementById(\'to\').value + ".<br /> Driving distance <i class=\'fas fa-road\'> </i> : " + result.routes[0].legs[0].distance.text + ".<br /> Duration: <i class=\'fas fa-hourglass-start\'> </i> : " + result.routes[0].legs[0].duration.text + " et le tarif est : "+price+".</h3>") ;

        directionDisplay.setDirections(result) ; 
    }
    else {
        directionDisplay.setDirections({routes: []}) ; 

        //center map in spain 
        map.setCenter(mylatlng) ;
        //show error message 
        
        output.innerHTML = "<h4 style=\'text-align: center; margin: 0 auto ; font-size:20rem;\'> <i class=\'fas fa-exclamation-triangle\'> </i> Impossible de calculer la distance </h4> ";
   console.log("<h4 > <i class=\'fas fa-exclamation-triangle\'> </i> Could not retrieve driving distance </h4> ");
   
    }
}); 

}

//create autocomplete object  for all inputs
let options = {
    types: [\'(cities)\']
}
let input1 = document.getElementById(\'from\') ; 
let autocomplete1 = new google.maps.places.Autocomplete(input1 , options) ;

let input2 = document.getElementById(\'to\') ; 
let autocomplete2 = new google.maps.places.Autocomplete(input2 , options) ;




</script>
</body>
</html> ' ;

}
           }
        }
    }
}}