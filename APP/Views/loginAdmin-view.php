


<?php


include_once '../controllers/Users.php';
include_once '../controllers/affichControl.php';
include_once '../helpers/session_helper.php';



class loginAdmin_view {

   
    public function display() {

      echo'
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
                <input type="hidden" name="type" value="loginAdmin">
      
                  <h2 class="title">Administrateur</h2>
                  <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" placeholder="Email" />
                  </div>
                 
                  <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Password" />
                  </div>
                  <input type="submit" value="Se connecter" class="btn solid" />
                  
                </form>
              </div>
              </div>
              <div class="panels-container">
              <div class="panel left-panel">
                <div class="content">
                  <h3>Vous êtes un utilisateur ?</h3>
                  <p>
                  Connectez vous maintenant !
                  </p>
                  <a href="./signup.php" class="btn transparent" id="">
                    Utilisateur
                  </a>
                </div>
                <img src="../img/connectAdmin.svg" class="image" alt="" />
              </div>
              <div class="panel right-panel">
                <div class="content">
                  
                  </button>
                </div>
              </div>
            </div>
          </div>
      
                </body>
                </html>' ;

    }}