<?php if (isset($_GET['id'])) {
  $ID_annonce = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['id']);

} ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" type="text/css" href="./map/map/css.css">
    <link rel="stylesheet" type="text/css" href="./map/map/css.css">
 -->

 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">            
<link rel="stylesheet" href="./bootstrap.min.css">
    <title>Annonce </title>
</head>
<body>
<?php
include_once './controllers/affichControl.php';


$_controller = new affichControl();
    $getAinfo = $_controller->getAnnonceInfoById($ID_annonce);
    if ($getAinfo) {
      foreach ($getAinfo as  $getUinfo) {

     ?>

<div class="container-affich"> 

    <div class="ann-affich">
        <div class="ann-affich_img">
            <img src="assets/slider1.jpg" alt="">
        </div>
    
        <div class="ann-affich_post">
            
            <h1 class="ann-affich_title"> <?php echo $getUinfo['titreAnnonce'] ?> </h1>
            <p class="ann-affich_text"> Créée le : <?php echo $getUinfo['creationDate'] ?> </p>

           <?php     $user = $_controller->getUserInfoById( $getUinfo['ID_User']);
           if ($user) {
            foreach ($user as  $user) {
                if(!isset($_SESSION['userID'])) { 
      
           ?>

            <p class="ann-affich_text">  Par : <?php echo $user['username'] ?> </p>
            <?php } else {  ?>
                <p class="ann-affich_text"> <a href="profileClient.php?id=<?php $user['ID_user'] ?>">   Par : <?php echo  $user['nom'].' '.$user['prenom'] ?>  </a> </p>
                <p class="ann-affich_text">  Moyen de transport: <?php echo $getUinfo['moyenTransport'] ?> </p>


            <?php } ?>

            <p class="ann-affich_text">  Type de transport: <?php echo $getUinfo['typeTransport'] ?> </p>
            <p class="ann-affich_text"> Poids de l'objet entre <?php echo $getUinfo['poidsMin'] ?> à <?php echo $getUinfo['poidsMax'] ?> </p>
            <p class="ann-affich_text">  Volume de l'objet entre <?php echo $getUinfo['volumeMin'] ?> à <?php $getUinfo['volumeMax'] ?> </p>
        <p class="ann-affich_text">  Point de départ :  <?php echo $getUinfo['pointDepart'] ?> Point d'arrivée : <?php echo $getUinfo['pointArrivee'] ?> </p>

    <i class="fa fa-eye" aria-hidden="true">    <?php echo"   ".$getUinfo['viewsNumber'] ; ?>   </i> 
<!--     <a  href="#" class="ann-affich_cta"> Voir sur une carte  </a>
 -->

 <div class="col-xs-offset-2 col-xs-10">
<button id="voirCarte"class="btn btn-info btn-lg">  <i class="fas fa-directions"  aria-hidden="true" onclick="calcRoute()" ></i></button>
 </div> 
        <a  href="#" class="ann-affich_cta"> Répondre à cette annonce </a>
        


        </div> <!--ann-affich_post end-->
        </div> <!--ann-affich-->
        </div>


    <div class="jumbotron" id="container-map"> 
     <div class="container-fluid"> 

    <div id="pop--click"  class="popup"> 
     <div  class="popup__content"> 
         <a href="#" class="close">  &times; </a>
 <form >
    <input type="hidden" id="from" class="form-control"  value="<?php echo $getUinfo['pointDepart'] ?>"> 
<!--     <?php echo "<footer>".$getUinfo['pointDepart']." </footer>" ; ?>
 --><input type="hidden" id="to" class="form-control" value="<?php echo $getUinfo['pointArrivee'] ?>"  > 

 </form>  
 <form> 
     <input type="text" id="price" value=''>
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
        max-width: 100%;

         height:90% ; 
         width: 80%;
         z-index: 200;
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
        top: 0;
        right: 0 ;
        text-decoration: none;
        font-size: 3rem;
        font-weight: 700;
        transition: all .3s;
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
    let mylatlng = {lat:36.7630648 , lng: 3.05055253 } ;
let mapOptions = {
    center: mylatlng ,
    zoom: 7 , 
    mapTypeId: google.maps.MapTypeId.ROADMAP
} ;

/* google.maps.event.addDomListener(window, 'load', initialize);
 */

let map = new google.maps.Map(document.getElementById('googleMap'), mapOptions) ;

let directionService = new google.maps.DirectionsService() ;
let directionDisplay = new google.maps.DirectionsRenderer() ;

directionDisplay.setMap(map) ;

function calcRoute() {
    let request = {
    origin: document.getElementById("from").value,
    destination: document.getElementById('to').value,
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
        distance = result.routes[0].legs[0].distance.text ;
      //nombre de kilomètres x consommation du véhicule au kilomètre x prix du carburant au litre

let price =  parseFloat(parseFloat(distance)*0.7*41.5).toFixed(2) ;
let pricevalue = document.getElementById('price') ; 
pricevalue.value = price ; 
        const output = document.getElementById("output") ; 
        output.innerHTML = "<h4  style='margin: 2rem; font-size:1.5rem;' > De : " + document.getElementById('from').value + " à: " + document.getElementById('to').value + ".<br /> Distance en voiture <i class='fas fa-road'> </i> : " + result.routes[0].legs[0].distance.text + ".<br /> Durée: <i class='fas fa-hourglass-start'> </i> : " + result.routes[0].legs[0].duration.text + " et le tarif est : "+price+".</h4>" ;
     console.log(document.getElementById('from').value + ".<br /> To: " + document.getElementById('to').value + ".<br /> Driving distance <i class='fas fa-road'> </i> : " + result.routes[0].legs[0].distance.text + ".<br /> Duration: <i class='fas fa-hourglass-start'> </i> : " + result.routes[0].legs[0].duration.text + " et le tarif est : "+price+".</h3>") ;

        directionDisplay.setDirections(result) ; 
    }
    else {
        directionDisplay.setDirections({routes: []}) ; 

        //center map in spain 
        map.setCenter(mylatlng) ;
        //show error message 
        
        output.innerHTML = "<h4 style='text-align: center; margin: 0 auto ; font-size:20rem;'> <i class='fas fa-exclamation-triangle'> </i> Impossible de calculer la distance </h4> ";
   console.log("<h4 > <i class='fas fa-exclamation-triangle'> </i> Could not retrieve driving distance </h4> ");
   
    }
}); 

}

//create autocomplete object  for all inputs
let options = {
    types: ['(cities)']
}
let input1 = document.getElementById('from') ; 
let autocomplete1 = new google.maps.places.Autocomplete(input1 , options) ;

let input2 = document.getElementById('to') ; 
let autocomplete2 = new google.maps.places.Autocomplete(input2 , options) ;




</script>
</body>
</html>