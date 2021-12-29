<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="style.css">
   <link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.1/mapsjs-ui.css" />

    <title>Annonce</title>
</head>
<body>
  
<form class="box" action="./controllers/Users.php" method="POST" enctype="multipart/form-data">
 
         
     
      <input class="form__input"  type="hidden" name="type" value ="addannonce">
    
      <label class="custom-field">
      <input class="form__input"  type="text" class="box-input"  name="pointdepart" id="pointdepart" onchange="getCoordinatesDepart()"  placeholder="" required />
            <span class="placeholder ">Le point de départ</span>
      </label> 
      <input   type="hidden" id="latitudedepart" name="latitudedepart" >
      <input  type="hidden" id="longitudedepart" name="longitudedepart">


    <label class="custom-field"> 
      <input class="form__input"  type="text" class="box-input" onchange="getCoordinatesArrivee()" name="pointarrivee" id="pointarrivee"  placeholder="" required  />
            <span class="placeholder"> Le point d'arrivée </span>
    </label> 
    <input   type="hidden" id="latitudearrivee" name="latitudearrivee" >
      <input  type="hidden" id="longitudearrivee" name="longitudearrivee">

    <label class="custom-field"> 
    <input class="form__input"  type="text" class="box-input" name="typetransport"   placeholder="" required  />
            <span class="placeholder "> Le type de transport </span>

    </label> 
    <label class="custom-field"> 
    <input class="form__input"  type="number"  step=0.01 class="box-input" name="poidsmin"  placeholder="" required />
            <span class="placeholder "> Le poids minimal </span>

    </label> 
    <input class="form__input"  type="number"  step=0.01 class="box-input" name="poidsmax"  placeholder="" required />
            <span class="placeholder "> Le poids maximal </span>

    </label> 

    <input class="form__input"  type="number"  step=0.01 class="box-input" name="volumemin"  placeholder="" required />
            <span class="placeholder "> Le volume minimal </span>

    </label> 
    <input class="form__input"  type="number"  step=0.01 class="box-input" name="volumemax"  placeholder="" required />
            <span class="placeholder "> Le volume maximal  </span>

    </label> 
    <label>
    <input class="form__input"  type="text"  class="box-input" name="moyentransport" placeholder="" required  />
            <span class="placeholder "> Le moyen de transport </span>

    </label> 

    <label class="custom-field"> 
    <input class="form__input"  type="submit"  name="addannonce" 
    value="Publier" class="box-button" />
  

    </label>   
    
    </div>
  </form>
  <script src="https://js.api.here.com/v3/3.1/mapsjs-core.js"></script>
   <script src="https://js.api.here.com/v3/3.1/mapsjs-service.js"></script>
   <script src="https://js.api.here.com/v3/3.1/mapsjs-ui.js"></script>
   <script src="https://js.api.here.com/v3/3.1/mapsjs-mapevents.js"></script>
  <script src="./index.js"> </script>
  
  <script type="text/javascript"> 
function getCoordinatesDepart(){
    let adresseDepart = document.getElementById('pointdepart').value ; 


    let latitudedepart = document.getElementById('latitudedepart') ;
    let longitudedepart = document.getElementById('longitudedepart') ;

   
    let URL = "https://geocoder.ls.hereapi.com/6.2/geocode.json?searchtext="+adresseDepart+"&apiKey=iK_k5qbfo9wdhfxz0rJp3NSn485xuHeAnLMckU190Qk&gen=9";

    let xmlHttp = new XMLHttpRequest() ; 

    if (!xmlHttp) {  
                alert(' Cannot create an XMLHTTP instance');  
                return false;  
            }  
            xmlHttp.onreadystatechange = function () {        // ready state event, will be executed once the server send back the data   
                if (xmlHttp.readyState === XMLHttpRequest.DONE) {  
                    if (xmlHttp.status === 200) {  
                        alert(xmlHttp.responseText);  
                    } else {  
                        alert('There was a problem with the request.');  
                    }  
                }  
            };  
        

            xmlHttp.open("GET" , URL , false) ; 
 
            xmlHttp.send(null) ;

            let json = JSON.parse(xmlHttp.responseText) ; 

            latitudedepart.value =  json.Response.View[0].Result[0].Location.DisplayPosition.Latitude ; ;
            longitudedepart.value =json.Response.View[0].Result[0].Location.DisplayPosition.Longitude ;
        
                


            
   // document.getElementById()

}


function getCoordinatesArrivee(){

    let adresseArrivee = document.getElementById('pointarrivee').value ;

   
    let latitudearrivee = document.getElementById('latitudearrivee') ;
    let longitudearrivee = document.getElementById('longitudearrivee') ;

    let URL2 = "https://geocoder.ls.hereapi.com/6.2/geocode.json?searchtext="+adresseArrivee+"&apiKey=iK_k5qbfo9wdhfxz0rJp3NSn485xuHeAnLMckU190Qk&gen=9";

    let xmlHttp2 = new XMLHttpRequest() ; 
    if (!xmlHttp2) {  
                alert(' Cannot create an XMLHTTP instance');  
                return false;  
            }  


            xmlHttp2.onreadystatechange = function () {        // ready state event, will be executed once the server send back the data   
                if (xmlHttp2.readyState === XMLHttpRequest.DONE) {  
                    if (xmlHttp2.status === 200) {  
                        alert(xmlHttp2.responseText);  
                    } else {  
                        alert('There was a problem with the request.');  
                    }  
                }  
            };  
        

            
            xmlHttp2.open("GET" , URL2 , false) ; 
 
            xmlHttp2.send(null) ;

            let json2 = JSON.parse(xmlHttp2.responseText) ; 


            latitudearrivee.value = json2.Response.View[0].Result[0].Location.DisplayPosition.Latitude ;
            longitudearrivee.value = json2.Response.View[0].Result[0].Location.DisplayPosition.Longitude ;

        



  
   // document.getElementById()

}

</script>

</body>
</html>