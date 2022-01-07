<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">            
<link rel="stylesheet" href="bootstrap.min.css">
    <title>Map</title>
</head>
<body>
<!--     add the class of the font awesome in the input
 -->
<!--  <div> <i class="fas fa-directions" onclick="calcRoute()" ></i></div>
 --> <!-- <div class="container-map">
 <div id="googleMap">

</div>
<div id="output">

</div>
 </div> -->

 <div class="jumbotron"> 
     <div class="container-fluid"> 
 <form action="form-horizontal">
     <div class="form-group"> 
     <label class="col-xs-2 control-label" for="from"  >
         <i class="fa fa-dot-circle"></i> </label>
         
         <div class="col-xs-4"> 
    <input type="text" id="from" class="form-control" placeholder="Départ"> 
    </div>
    </div>

    <div class="form-group"> 
<label for="to"  class="col-xs-2 control-label" >
    <i class="fa fa-map-marker-alt"></i> </label>
    <div class="col-xs-4"> 
<input type="text" id="to" class="form-control"  placeholder="Destination"> 
</div>
</div>

 </form>  
 <div class="col-xs-offset-2 col-xs-10">
<button class="btn btn-info btn-lg">  <i class="fas fa-directions" onclick="calcRoute()" ></i></button>
 </div> 

 <div class="container-fluid"> 
 <div id="googleMap">

</div> <!-- end googlemap-->

<div id="output">

</div> <!--end output-->
     
 </div> <!--end cntainer fluid--->
  
 </div> <!--container-fluid lkbir--->

 </div> <!--end jumbotron-->
 <script type="text/javascript" src="bootstrap.min.js"></script>

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
    unitSystem: google.maps.UnitSystem.IMPERIAL

    } //ens request

/* AIzaSyBsZrS5LkAXAqzgVYMJQQMYOoWgYCHHZTU   */
/* AIzaSyCqd1XS0Jt-VUrhm_x1nY9bmQEk5xwf*/
//pass the request to the root method
directionService.route(request ,  (result, status) => { 
    if(status == google.maps.DirectionsStatus.OK){
        //get distance and time 
        const output = document.getElementById("output") ; 
        output.innerHTML = "<h3 class='alert-info'> From:" + document.getElementById('from').value + ".<br /> To: " + document.getElementById('to').value + ".<br /> Driving distance <i class='fas fa-road'> </i> : " + result.routes[0].legs[0].distance.text + ".<br /> Duration: <i class='fas fa-hourglass-start'> </i> : " + result.routes[0].legs[0].duration.text + ".</h3>" ;
     console.log(document.getElementById('from').value + ".<br /> To: " + document.getElementById('to').value + ".<br /> Driving distance <i class='fas fa-road'> </i> : " + result.routes[0].legs[0].distance.text + ".<br /> Duration: <i class='fas fa-hourglass-start'> </i> : " + result.routes[0].legs[0].duration.text + ".</h3>") ;

        directionDisplay.setDirections(result) ; 
    }
    else {
        directionDisplay.setDirections({routes: []}) ; 

        //center map in spain 
        map.setCenter(mylatlng) ;
        //show error message 
        output.innerHTML = "<h3 class='alert-danger'> <i class='fas fa-exclamation-triangle'> </i> Could not retrieve driving distance </h3> ";
   console.log("<h3 class='alert-danger'> <i class='fas fa-exclamation-triangle'> </i> Could not retrieve driving distance </h3> ");
   
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