
<?php


include_once '../helpers/session_helper.php';



class signup_view{

    
    public function display() {


      echo '


      <!DOCTYPE html>
      <html lang="en">
        <head>
          <meta charset="UTF-8" />
          <meta name="viewport" content="width=device-width, initial-scale=1.0" />
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
       
          <script
            src="https://kit.fontawesome.com/64d58efce2.js"
            crossorigin="anonymous"
          ></script>
          <link rel="stylesheet" href="../css/signup.css" />
          <title>Inscription & Connexion</title>
        </head>
        <body>
          <div class="container">
            <div class="forms-container">
              <div class="signin-signup">
                <form action="../controllers/Users.php" method="post" name="login" class="sign-in-form">
                <input type="hidden" name="type" value="login"> ' ;
                
                if(isset($_SESSION['msg']) && isset($_SESSION['status'])) {
                  echo'  <div class="alert alert-'.$_SESSION['status'].'" role="alert">'.$_SESSION['msg'].
'                </div>
' ; 
unset($_SESSION['status']);
unset($_SESSION['msg']);

                } echo'

      
                  <h2 class="title">Se connecter</h2>
                  <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" placeholder="Email" />
                  </div>
                 
                  <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Password" />
                  </div>
                  <input type="submit" value="Se connecter" class="btn solid" />
                  <!-- <p class="social-text">Or Sign in with social platforms</p>
                  <div class="social-media">
                    <a href="#" class="social-icon">
                      <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-icon">
                      <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-icon">
                      <i class="fab fa-google"></i>
                    </a>
                    <a href="#" class="social-icon">
                      <i class="fab fa-linkedin-in"></i>
                    </a>
                  </div> -->
                </form>
                <a href="./loginAdmin.php" style="width:100%; "  class="btn solid" > Se connecter en tant qu\'un administrateur</a>
      
                <form action="../controllers/Users.php" method="POST" class="sign-up-form">
                <input type="hidden" name="type" value ="register">
                ';
                if(isset($_SESSION['msg']) && isset($_SESSION['status'])) {
                  echo'  <div class="alert alert-'.$_SESSION['status'].'" role="alert">'.$_SESSION['msg'].
'                </div>
' ; 
unset($_SESSION['status']);
unset($_SESSION['msg']);

  

                }
              echo'                <h2 class="title">S\'inscrire</h2>
                  
                  <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="nom" required placeholder="Nom" />
                  </div>
                  <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="prenom" required placeholder="Pr??nom" />
                  </div>
                  <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" required placeholder="Email" />
                  </div>
                  <div class="input-field">
                  <i class="fa fa-phone" aria-hidden="true"></i>
      
                    <input type="number" name="numero" required placeholder="Num??ro" />
                  </div>
                  <div class="input-field">
                  <i class="fa fa-map-marker" aria-hidden="true"></i>
      
                    <input type="text"  name="adresse" required placeholder="Adresse" />
                  </div>
                
                  <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" required placeholder="Mot de passe" />
                  </div>
                  <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="passwordrepeat" required placeholder="Confirmez votre mot de passe" />
                  </div>
                  <div class="input-field input-fieldd" >
                  <input type="checkbox" class="box-input" name="transporteur" id="checkTrans" onchange="displayWilaya()"
        placeholder="Transporteur" />
      <label class="checkLabel" for ="checkTrans" placeholder="Transporteur"> Je veux ??tre un transporteur  </label>
      </div>
        
      
        <div id="wilayasSelect" style="display: none;"> 
        <div class="input-field input-fieldd">
        <input type="checkbox" class="box-input" name="certifie" id="checkCertifie"
         />
        <label class="checkLabel" for ="checkCertifie"> Je veux ??tre un transporteur certifi??  </label>
      
        </div> ' ;
      
      
      include_once '../controllers/affichControl.php';
      
      
      $_controller = new affichControl();
      $ARRAY = $_controller->affichWilaya(); 
      echo "<div>
       <select  class='form-select' style='margin:5px ;' size='1' multiple name='wilaya[]'>" ;
       echo ("<option disabled > --- Chsoisissez les wilayas de d??part--- </option> ");
      
      foreach($ARRAY as $row){
        $wilaya = $row['wilaya'];
        $num = $row['numwilaya'] ;
        echo $wilaya ;
       echo ("<option value='$num' > $wilaya </option> ");
       }
      echo "</select> </div>" ; 
      
      
      $ARRAY = $_controller->affichWilaya(); 
      echo "<div>
      
      <select class='form-select' style='margin:10px;' size='1' multiple aria-label='les wilayas d'arrivee' name='wilayaA[]'>" ;
      echo ("<option disabled > ---Chsoisissez les wilayas d'arriv??e--- </option> ");
      foreach($ARRAY as $row){
        $wilaya = $row['wilaya'];
        $num = $row['numwilaya'] ;
        echo $wilaya ;
       echo ("<option value='$num' > $wilaya </option> ");
       }
      echo '</select> </div> 
      
      
        </div>
      
        <input type="submit" class="btn" value="S\'inscrire" />
      
                 <!--  <p class="social-text">Or Sign up with social platforms</p>
                  <div class="social-media">
                    <a href="#" class="social-icon">
                      <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-icon">
                      <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-icon">
                      <i class="fab fa-google"></i>
                    </a>
                    <a href="#" class="social-icon">
                      <i class="fab fa-linkedin-in"></i>
                    </a>
                  </div> -->
                </form>
              </div>
            </div>
      
            <div class="panels-container">
              <div class="panel left-panel">
                <div class="content">
                  <h3>Vous ??tes nouveau ici ?</h3>
                  <p>
                   Rejoignez notre communaut?? et profitez de nos services !
                  </p>
                  <button class="btn transparent" id="sign-up-btn">
                    S\'inscrire
                  </button>
                </div>
                <img src="../img/log.svg" class="image" alt="image" />
              </div>
              <div class="panel right-panel">
                <div class="content">
                  <h3>Vous avez d??ja un compte ?</h3>
                  <p>
                    Connectez vous maintenant.
                  </p>
                  <button class="btn transparent" id="sign-in-btn">
                    Connectez-vous!
                  </button>
                </div>
                <img src="../img/register.svg" class="image" alt="image register" />
              </div>
            </div>
          </div>
      
          <script type="text/javascript"> 
      /* $(document).ready(function(){ */
          
      
      
          let checktrans = document.getElementById(\'checkTrans\') ; 
          let wilayasSelect = document.getElementById(\'wilayasSelect\') ; 
          function displayWilaya() {
            if (checktrans.checked) { 
            wilayasSelect.style.display = \'block\';
          }else { wilayasSelect.style.display = \'none\'}
      
          }
        /* }) */
          /* checkTrans.addEventListener (\'change\', () => { if (this.checked) { 
            wilayasSelect.style.display = \'block\';
          }else { wilayasSelect.style.display = \'none\'} } ) ;
           */
      
        </script>
            <script src="../js/signup.js"></script>
      
        </body>
      </html>
      ' ;

        
      }}
