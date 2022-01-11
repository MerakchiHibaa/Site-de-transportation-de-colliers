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
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="./notification.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">            
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>


   
 
    <title>Annonce</title>
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery-ui.js"></script>
     <script src="js/bootstrap.min.js"></script>
     
   <link rel="stylesheet" href="css/bootstrap.min.css">
     <link href = "css/jquery-ui.css" rel = "stylesheet">
</head>
<body>
        <div class="error" style="background : red ; "> 

        </div>
  <div id="ajax-success"> </div>
  <div id="formajax">
          <h1> Ajouter une annonce :</h1>
<form id="ajax-annonce" class="box" method="POST"  enctype="multipart/form-data">

         

<input class=""  type="hidden" id="id_user" name="id_user" value ="<?php echo $_SESSION['userID'] ; ?>">

      <input class=""  type="hidden" name="type" value ="addannonce">
    
      <label class="">
      <input class=""  type="text" class="box-input"  name="titreAnnonce" id="titreAnnonce"  placeholder="titre" required />
            <span class="placeholder ">Le titre de l'annonce </span>
      </label>


      <label class="">
      <input class=""  type="text" class="box-input"  name="pointdepart" id="pointdepart" onchange="getCoordinatesDepart()"  placeholder="" required />
            <span class="placeholder ">Le point de départ</span>
      </label> 
      <input   type="hidden" id="latitudedepart" name="latitudedepart" >
      <input  type="hidden" id="longitudedepart" name="longitudedepart">


    <label class=""> 
      <input class=""  type="text" class="box-input" onchange="getCoordinatesArrivee()" name="pointarrivee" id="pointarrivee"  placeholder="" required  />
            <span class="placeholder"> Le point d'arrivée </span>
    </label> 
    <input   type="hidden" id="latitudearrivee" name="latitudearrivee" >
      <input  type="hidden" id="longitudearrivee" name="longitudearrivee">

    <label class=""> 
    <input class=""  type="text" class="box-input" name="typetransport" id="typetransport"  placeholder="" required  />
            <span class="placeholder "> Le type de transport </span>

    </label> 
    <label class=""> 
    <input class=""  type="number"  step=0.01 class="box-input" name="poidsmin" id="poidsmin" placeholder="" required />
            <span class="placeholder "> Le poids minimal </span>

    </label> 
    <input class=""  type="number"  step=0.01 class="box-input" name="poidsmax" id="poidsmax" placeholder="" required />
            <span class="placeholder "> Le poids maximal </span>

    </label> 

    <input class=""  type="number"  step=0.01 class="box-input" name="volumemin" id="volumemin"  placeholder="" required />
            <span class="placeholder "> Le volume minimal </span>

    </label> 
    <input class=""  type="number"  step=0.01 class="box-input" name="volumemax" id="volumemax"   placeholder="" required />
            <span class="placeholder "> Le volume maximal  </span>

    </label> 
    <label>
    <input class=""  type="text"  class="box-input" name="moyentransport" id="moyentransport" placeholder="" required  />
            <span class="placeholder "> Le moyen de transport </span>

    </label> 

    <label class=""> 
    <input class=""  type="submit"  name="" 
    value="Publier" id="ajax-click" class="box-button" />
  

    </label>   
    
    
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
     $(document).ready(function() {
        console.log("je suis dans script") ;




ajaxAnnonce() ; 
  

/*     console.log("je suis dans default") ; 
 */

      

 /*  $(function(){ */
function ajaxAnnonce() {
        console.log("je suis dans ajaxAnnonce") ;


       
    
$('#ajax-annonce').on('submit', function() {

        console.log("je suis on submit ajaxAnnonce") ;

                  
let ajaxAnnonce = 'addannonce';       
let  id_user  = $('#id_user').val();      
let  titreAnnonce  = $('#titreAnnonce').val();      
let latitudedepart = $('#latitudedepart').val();   
let  longitudedepart = $('#longitudedepart').val();   
let latitudearrivee = $('#latitudearrivee').val();   
let  longitudearrivee = $('#longitudearrivee').val();   
let  typetransport = $('#typetransport').val();   
let  volumemin = $('#volumemin').val();   
let  volumemax = $('#volumemax').val();   
let  poidsmin = $('#poidsmin').val();   
let  poidsmax = $('#poidsmax').val();   
let  moyentransport = $('#moyentransport').val();   
let  pointarrivee = $('#pointarrivee').val();   
let pointdepart = $('#pointdepart').val();   

console.log(id_user) ; 
console.log(titreAnnonce) ; 
console.log(latitudedepart) ; 
console.log(volumemin) ; 
/* alert(id_user) ; 
alert(titreAnnonce) ; 
alert(latitudedepart) ;
alert(volumemin) ; 
alert(volumemax) ; 
alert(typetransport) ; 
 */



                $.ajax({
            url:"./controllers/Users.php",
            method:"POST",
            data:{ajaxAnnonce:ajaxAnnonce, id_user:id_user, titreAnnonce, titreAnnonce, latitudedepart:latitudedepart, latitudearrivee:latitudearrivee, volumemin:volumemin, volumemax:volumemax , poidsmin:poidsmin , poidsmax:poidsmax, longitudedepart:longitudedepart, typetransport:typetransport, moyentransport:moyentransport ,pointdepart:pointdepart, pointarrivee:pointarrivee },
            success:function(data){
                 
                console.log('successs') ; 


                $('#ajax-success').hide().append("Votre annonce sera publiée dés que les administrateurs la valident, voici quelques suggestions des transporteurs <div class='suggestions'> </div>" ).slideDown() ;
                $('#formajax').slideUp() ;


/*                 $('#ajax-success').html(data);
 */                     
                           
                     
            }
        });
        return false ;



          }) ;
        }

}) ;

 /*  }) ; */
</script>

</body>
</html>