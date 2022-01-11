<?php 

session_start() ; 

?>

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
        <div class="error" style="background : red ; "> 

        </div>
  <div id="ajax-success">
<form id="ajax-annonce" class="box" method="POST" enctype="multipart/form-data">
 
         

<input class=""  type="hidden" name="id_user" value ="<?php echo $_SESSION['userID'] ; ?>">

      <input class="form__input"  type="hidden" name="type" value ="addannonce">
    
      <label class="custom-field">
      <input class="form__input"  type="text" class="box-input"  name="titreAnnonce" id="titreAnnonce"  placeholder="titre" required />
            <span class="placeholder ">Le titre de l'annonce </span>
      </label>


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
    <input class="form__input"  type="text" class="box-input" name="typetransport" id="typetransport"  placeholder="" required  />
            <span class="placeholder "> Le type de transport </span>

    </label> 
    <label class="custom-field"> 
    <input class="form__input"  type="number"  step=0.01 class="box-input" name="poidsmin" id="poidsmin" placeholder="" required />
            <span class="placeholder "> Le poids minimal </span>

    </label> 
    <input class="form__input"  type="number"  step=0.01 class="box-input" name="poidsmax" id="poidsmax" placeholder="" required />
            <span class="placeholder "> Le poids maximal </span>

    </label> 

    <input class="form__input"  type="number"  step=0.01 class="box-input" name="volumemin" id="volumemin"  placeholder="" required />
            <span class="placeholder "> Le volume minimal </span>

    </label> 
    <input class="form__input"  type="number"  step=0.01 class="box-input" name="volumemax" id="volumemax"   placeholder="" required />
            <span class="placeholder "> Le volume maximal  </span>

    </label> 
    <label>
    <input class="form__input"  type="text"  class="box-input" name="moyentransport" id="moyentransport" placeholder="" required  />
            <span class="placeholder "> Le moyen de transport </span>

    </label> 

    <label class="custom-field"> 
    <input class="form__input"  type="submit"  name="addannonce" 
    value="Publier" class="box-button" />
  

    </label>   
    
    </div>
  </form>

  </div>
  <script src="https://js.api.here.com/v3/3.1/mapsjs-core.js"></script>
   <script src="https://js.api.here.com/v3/3.1/mapsjs-service.js"></script>
   <script src="https://js.api.here.com/v3/3.1/mapsjs-ui.js"></script>
   <script src="https://js.api.here.com/v3/3.1/mapsjs-mapevents.js"></script>
  <script src="./index.js"> </script>

  <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery-ui.js"></script>
     
  
  <script type="text/javascript"> //

let type = 'addannonce';       
let  id_user  = $('input[name=id_user]').val();      
let  titreAnnonce  = $('input[name=titreAnnonce]').val();      
let latitudedepart = $('input[name=latitudedepart]').val();   
let  longitudedepart = $('input[name=longitudedepart]').val();   
let latitudearrivee = $('input[name=latitudearrivee]').val();   
let  longitudearrivee = $('input[name=longitudearrivee]').val();   
let  typetransport = $('input[name=typetransport]').val();   
let  volumemin = $('input[name=volumemin]').val();   
let  volumemax = $('input[name=volumemax]').val();   
let  poidsmin = $('input[name=poidsmin]').val();   
let  poidsmax = $('input[name=poidsmax]').val();   
let  moyentransport = $('input[name=moyentransport]').val();   
let  pointarrivee = $('input[name=pointarrivee]').val();   
let pointdepart = $('input[name=pointdepart]').val();   

        

/*     console.log("je suis dans default") ; 
 */
      

ajaxAnnonce() ; 
 /*  $(function(){ */
        function ajaxAnnonce() {

       
    
          $('#ajax-annonce').on('submit', function() {


                $.ajax({
            url:"./controllers/Users.php",
            method:"POST",
            data:{type:type, id_user:id_user,  titreAnnonce:titreAnnonce, latitudedepart:latitudedepart, latitudearrivee:latitudearrivee, volumemin:volumemin, volumemax:volumemax , poidsmin:poidsmin , poidsmax:poidsmax, longitudedepart:longitudedepart, typeTransport:typeTransport, moyenTransport:moyenTransport ,pointdepart:pointdepart, pointarrivee:pointarrivee},
            success:function(data){
                console.log('successs') ; 

                  /*   if(data!='ok') {
                            console.log('successs') ; 
/*                             $(".error").empty().append(data) ; 
                    }
                    else {
/*                             $('#ajax-result').hide().append('successss ajax') ;
                           console.log('error') ; 

                    } */
            }
        });

        return false ;



          }) ;
        }
 /*  }) ; */
</script>

</body>
</html>