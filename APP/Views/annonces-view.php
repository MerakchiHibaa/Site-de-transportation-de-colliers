<?php


include_once '../controllers/Users.php';
include_once '../controllers/affichControl.php';


class Annonces_view {

    public function display() { 

      echo '<!DOCTYPE html>
      <html lang="en">
      <head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link rel="stylesheet" href="../css/style.css">
         <link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.1/mapsjs-ui.css" />
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
         <link rel="stylesheet" href="../css/signup.css" />
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      
         <link rel="stylesheet" href="../css/notification.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
      
          <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">            
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
          <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
      
      
         
       
          <title>Annonce</title>
          <script src="https://js.api.here.com/v3/3.1/mapsjs-core.js"></script>
         <script src="https://js.api.here.com/v3/3.1/mapsjs-service.js"></script>
         <script src="https://js.api.here.com/v3/3.1/mapsjs-ui.js"></script>
         <script src="https://js.api.here.com/v3/3.1/mapsjs-mapevents.js"></script>
        <script src="../js/index.js"> </script>
      
        <script src="../js/jquery-1.10.2.min.js"></script>
          <script src="../js/jquery-ui.js"></script>
                <script src="../js/bootstrap.min.js"></script>
           
         <link rel="stylesheet" href="../css/bootstrap.min.css">
           <link href = "../css/jquery-ui.css" rel = "stylesheet">
      </head>
      <body>
              <div class="error" style="background : red ; "> 
      
              </div>
              <div id="result"></div>
        <div id="ajax-success"> </div>
        <div id="formajax">
            <!--     <h1> Ajouter une annonce :</h1>
              -->   
      <div class="container" >
            <div class="forms-container">
              <div class="signin-signup">
      <form id="ajax-annonce" class="sign-in-form" method="POST"  enctype="multipart/form-data">
      
               
      <h1 class="text-center" style="text-align: center; color: #5995FD" >Ajouter une annonce</h1> <!-- class="text-center" style="text-align: center;" -->
      
      <input class="input-field"  type="hidden" id="id_user" name="id_user" value ="'.$_SESSION['userID']. '">
      
            <input class="input-field"  type="hidden" name="type" value ="addannonce">
          
            
            <input class="input-field"  type="text"   name="titreAnnonce" id="titreAnnonce"  placeholder="Titre" required />
                 
      
            
            <input class="input-field"  type="text"   name="pointdepart" id="pointdepart" placeholder="Point de départ" onchange="getCoordinatesDepart()"  placeholder="" required />
                 
            <input   type="hidden" id="latitudedepart" name="latitudedepart" >
            <input  type="hidden" id="longitudedepart" name="longitudedepart">
      
      
           
            <input class="input-field"  type="text"  onchange="getCoordinatesArrivee()" placeholder="Point d\'arrivée" name="pointarrivee" id="pointarrivee"  placeholder="" required  />
                 
          <input   type="hidden" id="latitudearrivee" name="latitudearrivee" >
            <input  type="hidden" id="longitudearrivee" name="longitudearrivee">
      
           
          <input class="input-field"  type="text"  name="typetransport" id="typetransport"  placeholder="Type de transport" required  />
                  
           
          <input class="input-field"  type="number"  step=0.01  name="poidsmin" id="poidsmin" placeholder="Poids minimal" required />
                  
          <input class="input-field"  type="number"  step=0.01  name="poidsmax" id="poidsmax" placeholder="Poids maximal" required />
                 
      
          <input class="input-field"  type="number"  step=0.01  name="volumemin" id="volumemin"  placeholder="Volume minimal" required />
                 
          <input class="input-field"  type="number"  step=0.01  name="volumemax" id="volumemax"   placeholder="Volume maximal" required />
                  
          <input class="input-field"  type="text"   name="moyentransport" id="moyentransport" placeholder="Moyen de transport" required  />
                 
      
           
          <input class="input-field"  type="submit"  name="" 
          value="Publier" id="ajax-click"  />
        
      
        
          
          
        </form>
        </div>
        </div>
        <!-- <div class="panels-container">
              <div class="panel left-panel" style="z-index: -10 ;" >
                <div class="content">
                  
                </div>
                <img src="img/updateProfile.svg" style="width:50% ; height:50%" class="image" alt="" />
              </div>
              <div class="panel right-panel">
                <div class="content">
                 
                </div>
              </div>
            </div>
        </div> -->
        
        
        
      
        <script type="text/javascript"> 
           $(document).ready(function() {
              console.log("je suis dans script") ;
      
      
      
      
      ajaxAnnonce() ; 
        
      
      /*     console.log("je suis dans default") ; 
       */
      
            
      
       /*  $(function(){ */
      function ajaxAnnonce() {
              console.log("je suis dans ajaxAnnonce") ;
      
      
             
          
      $(\'#ajax-annonce\').on(\'submit\', function() {
      
              console.log("je suis on submit ajaxAnnonce") ;
      
                        
      let ajaxAnnonce = \'addannonce\';       
      let  id_user  = $(\'#id_user\').val();      
      let  titreAnnonce  = $(\'#titreAnnonce\').val();      
      let latitudedepart = $(\'#latitudedepart\').val();   
      let  longitudedepart = $(\'#longitudedepart\').val();   
      let latitudearrivee = $(\'#latitudearrivee\').val();   
      let  longitudearrivee = $(\'#longitudearrivee\').val();   
      let  typetransport = $(\'#typetransport\').val();   
      let  volumemin = $(\'#volumemin\').val();   
      let  volumemax = $(\'#volumemax\').val();   
      let  poidsmin = $(\'#poidsmin\').val();   
      let  poidsmax = $(\'#poidsmax\').val();   
      let  moyentransport = $(\'#moyentransport\').val();   
      let  pointarrivee = $(\'#pointarrivee\').val();   
      let pointdepart = $(\'#pointdepart\').val();   
      
      
      
      console.log(id_user) ; 
      console.log(titreAnnonce) ; 
      console.log(latitudedepart) ; 
      console.log(volumemin) ; 
       console.log(id_user) ; 
      console.log(titreAnnonce) ; 
      
      
      
      
                      $.ajax({
                  url:"../controllers/Users.php",
                  method:"POST",
                  data:{ajaxAnnonce:ajaxAnnonce, id_user:id_user, titreAnnonce, titreAnnonce, latitudedepart:latitudedepart, latitudearrivee:latitudearrivee, volumemin:volumemin, volumemax:volumemax , poidsmin:poidsmin , poidsmax:poidsmax, longitudedepart:longitudedepart, longitudearrivee:longitudearrivee, typetransport:typetransport, moyentransport:moyentransport ,pointdepart:pointdepart, pointarrivee:pointarrivee },
                  success:function(data){
                 
                      $(\'#ajax-success\').hide().append("Votre annonce sera publiée dés que les administrateurs la valident, voici quelques suggestions des transporteurs <div > </div>" ).slideDown() ;
                      $(\'#result\').append(data);
      
                      $(\'#formajax\').slideUp() ;
       
      
      
      
                                
                     
      /*                 $(\'#ajax-success\').hide().append("Votre annonce sera publiée dés que les administrateurs la valident, voici quelques suggestions des transporteurs " ).slideDown() ;
                                 */  
      
      
      
      
      /*                 $(\'#ajax-success\').html(data);
       */                     
                                 
                           
                  }
              });
              console.log("befoore false") ; 
              return false ;
      
      
      
                }) ;
              }
      
      }) ;
      
       /*  }) ; */
      </script>
      
      </body>
      </html>' ;


    }


  }

?>

<