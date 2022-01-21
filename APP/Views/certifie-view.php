
<?php


include_once '../controllers/Users.php';
include_once '../controllers/affichControl.php';


class certifie_view {

   
    public function display($nom , $prenom) {

        echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"> 
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

         <link rel="stylesheet" href="../css/certifie.css"> 
            <title>Document</title>
        </head>
        <body>
            <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,300" rel="stylesheet" type="text/css">
           
            <div class="text-center text-black">
               <h1 class="text-center" style="font-weight: bolder;"> Merci pour votre inscription !</h1>
               <h3 class="text-center"> Veuillez envoyer une demande aux administrateur si vous voulez toujours devenir un transporteur certifié</h3>
           </div>
           
            <div id="mainButton" style="margin-top: -12em ;padding-bottom: 110px;
            ">
                <div class="btn-text" style="margin-left: 9em;"  onclick="openForm()"> Transportateur certifié</div>
                
                    <form action="../controllers/Users.php" method="post" class="modal">
                    <div class="close-button" onclick="closeForm()">x</div>
                    <div class="form-title">Envoyer une demande</div>
                    <div class="input-group">
                        <input type="hidden" name="type" value="demandeCertifie">
                        <input type="hidden" name="nom" value="'.$nom.'">
                        <input type="hidden" name="prenom" value="'.$prenom.'">
        
                        <input type="text" id="email" name="email" required onblur="checkInput(this)" />
                        <label for="name">Email</label>
                    </div>
                    <div class="input-group">
                        <input type="text" id="demande" name="demande" required onblur="checkInput(this)" />
                        <label for="demande">Demande </label>
                    </div>
                    <input type="submit"  value="Envoyer" class="form-button" onsubmit="closeForm()"></input>
                </form>
               
            </div>
 
        <img  src="../img/thanks.svg"  style="position: absolute;
        bottom: 0;
        left: -20rem; " width="80%%" height="50%"class="image" alt="image" />

    
            <script src="../js/certifie.js"> </script>
        
        </body>
        </html>' ;

    
    }}
