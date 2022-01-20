
<?php


include_once '../controllers/Users.php';
include_once '../controllers/affichControl.php';


class rate_view
{

   
    public function display( $ID_user , $ID_trajet) {
        echo'
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">            
        <link rel="stylesheet" href="../css/rate.css">
            <title>Rate </title>
        </head>
        <body>
            <div class="container-rate"> 
                <div id="post-rate">
                    <div class="text-rate">Merci pour votre feedback !</div>
                    
                </div>
                
        
                <form action="../controllers/Users.php"  id="rateForm" method="POST"> 
                <input type="hidden" name="star" id="star" value="0" >
                <input type="hidden" name="user"  value="'. $ID_user .'" />
                <input type="hidden" name="trajet" value="'.$ID_trajet.'" />
                <input type="hidden" name="type" value="rate">
                <div class="star-widget">
                    <input type="radio" name="rate" id="rate-5"  >
                    <label id="star5"  for="rate-5" class="fas fa-star"></label>
        
                    <input type="radio" name="rate" id="rate-4">
                    <label id="star4"  for="rate-4" class="fas fa-star"></label>
        
                    <input type="radio" name="rate" id="rate-3">
                    <label id="star3"  for="rate-3"class="fas fa-star"></label>
        
                    <input type="radio" name="rate" id="rate-2">
                    <label id="star2"  for="rate-2"class="fas fa-star"></label>
        
                    <input type="radio" name="rate" id="rate-1">
                    <label id="star1"  for="rate-1"class="fas fa-star"></label>
        
        
                    <div class="form-rate"> 
                        <header> </header>
        
                        <div class="textarea-rate">
                            
                            <textarea name="avis" id="" cols="30" placeholder="Que pensez-vous de cette expérience? " ></textarea>
                           
        
                        </div>
        
                        <div class="btn-rate">
        
                            <button id="input-rate" type="submit"> Envoyer  </button>
                        </div>
                        </div>
                    </form>
        
                </div>
            </div>
            <script src="../js/rate.js"></script>
            <script type="text/javascript"> 
        
        let star = document.getElementById(\'star\') ; 
        let rate1 = document.getElementById(\'star1\') ; 
        let rate2 = document.getElementById(\'star2\') ; 
        let rate3 = document.getElementById(\'star3\') ; 
        let rate4 = document.getElementById(\'star4\') ; 
        let rate5 = document.getElementById(\'star5\') ; 
        
        
        rate1.onclick = () => {
            star.value = "1" ; 
            console.log(star.value) ; 
        
        }
        
        rate2.onclick = () => {
            star.value = "2" ; 
            console.log(star.value) ; 
        
        
        }
        rate3.onclick = () => {
            star.value = "3" ; 
            console.log(star.value) ; 
        
        
        }
        rate4.onclick = () => {
            star.value = "4" ; 
            console.log(star.value) ; 
        
        
        }
        rate5.onclick = () => {
            star.value = "5" ; 
            console.log(star.value) ; 
        
        
        }
        
           
        </script>
        </body>
        </html>' ;

    }

}