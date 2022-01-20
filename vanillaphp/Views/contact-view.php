<?php


include_once '../controllers/Users.php';
include_once '../controllers/affichControl.php';


class contact_view {

   
    public function display() { 

      /* echo '
      <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Contact Us</title>
      <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto+Slab&display=swap" rel="stylesheet">
  </head>' ; */
   
  include_once "../controllers/affichControl.php"  ; 
  $_controller = new affichControl(); 
  $contact = $_controller->getContact() ; 
  foreach ($contact as $value){
    echo'
  
  <body style="background-image: url(../assets/'. $value['image'] .')">
      <div class="container">
          <header>
              <h1>Contact Us</h1>
              
              <p>'. $value['contenu'] .' </p>
          </header>
          <div class="content">
              <div class="content-form">
                  <section>
                      <i class="fa fa-map-marker fa-2x" aria-hidden="true"></i>
                      <h2>addresse</h2>
                      <p>
                          '. $value['adresse'] .' <br>
                         
                      </p>
                  </section>
  
                  <section>
                      <i class="fa fa-phone fa-2x" aria-hidden="true"></i>
                      <h2>Numéro</h2>
                      <p>  '. $value['numero'] .'</p>
                  </section>
  
                  <section>
                      <i class="fa fa-envelope fa-2x" aria-hidden="true"></i>
                      <h2>E-mail</h2>
                      <p>  '. $value['email'] .'</p>
                  </section>
              </div>
          </div>
  
        <form>
          <div class="form">
              <div class="right">
                <div class="contact-form">
                    <input type="text" required>
                    <span>Nom complet</span>
                </div>
    
                <div class="contact-form">
                    <input type="E-mail" required>
                    <span>E-mail </span>
                </div>
                <div class="contact-form">
                    <textarea name="text">
                      
                    </textarea>
                    <span> Ecrivez votre message....</span>
                </div>
    
                <div class="contact-form">
                    <input type="submit" name="submit">
                </div>
                </div>
              </div> ' ;
              
  }

         echo'   </div>
      </form>
          <div class="media">
          <ul> 
              <li><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></li>
              <li><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></li>
              <li><i class="fa fa-whatsapp fa-2x" aria-hidden="true"></i></li>
              <li><i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i></li>
          </ul>
          </div>
          <div class="empty">
  
          </div>
      </div>   
      <style> 
      * {
    padding: 0;
    margin: 0;
    color: #fff;
    -webkit-box-sizing: border-box;
            box-sizing: border-box;
    font-family: \'Poppins\', sans-serif;
    border: none;
  }
  
  body {
    background-image: url("../assets/"'.$value['image'] .'"");
    width: 100%;
    height: 100vh;
    background-size: 100% 110vh;
    position: relative;
    background-repeat: no-repeat;
  }
  
  header {
    position: absolute;
    text-align: center;
    width: 75%;
    left: 12%;
    top: 2rem;
  }
  
  header h1 {
    font-size: 30px;
  }
  
  .empty {
    width: 100%;
    height: 100vh;
    background-color: rgba(0, 0, 0, 0.5);
    position: absolute;
    top: 0px;
    left: 0;
    z-index: -1;
  }
  
  .content {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    min-height: 110vh;
  }
  
  .content section {
    margin-top: 8vh;
    margin-left: 20vh;
  }
  
  .content-form {
    margin-top: 7rem;
  }
  
  section i {
    border-radius: 50%;
    width: 40px;
    height: 40px;
    background-color: rgba(255, 255, 255, 0.8);
    color: black;
    text-align: center;
  }
  
  .form {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    position: absolute;
    top: 0;
    left: 0;
    margin-left: 50%;
    -webkit-box-pack: center;
        -ms-flex-pack: center;
            justify-content: center;
    -webkit-box-align: center;
        -ms-flex-align: center;
            align-items: center;
    min-height: 110vh;
  }
  
  .form .contact-form input {
    width: 30rem;
    background-color: transparent;
    border: 0px;
    border: transparent;
    margin: 20px;
    padding: 10px;
    font-size: 18px;
    border-bottom: 2px solid #fff;
  }
  
  .form .contact-form input ~ span {
    position: absolute;
    left: 20px;
    -webkit-transition: 0.9s ease-in-out;
    transition: 0.9s ease-in-out;
    margin-top: 10px;
  }
  
  .form .contact-form input:focus ~ span {
    -webkit-transform: translateY(-20px);
            transform: translateY(-20px);
    pointer-events: none;
  }
  
  .form .contact-form textarea {
    width: 30rem;
    border: 0px;
    background-color: transparent;
    margin: 20px;
    font-size: 17px;
    border-bottom: 2px solid white;
  }
  
  .form .contact-form textarea ~ span {
    position: absolute;
    left: 20px;
    margin-top: 10px;
    -webkit-transition: 0.9s ease-in-out;
    transition: 0.9s ease-in-out;
  }
  
  .form .contact-form textarea:focus ~ span {
    -webkit-transform: translateY(-20px);
            transform: translateY(-20px);
    pointer-events: none;
  }
  
  .form .contact-form input[type=submit] {
    background-color: dodgerblue;
    border: 2px solid dodgerblue;
    font-size: 18px;
    width: 50%;
    height: 40px;
    margin-top: -5px;
  }
  
  .form .contact-form input[type=submit]:hover {
    background-color: transparent;
    color: dodgerblue;
  }
  
  .media {
    position: absolute;
    top: 85vh;
    right: 20vh;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    list-style: none;
  }
  
  .media li {
    margin: 20px 30px;
  }
  
  @media screen and (max-width: 900px) {
    body {
      background-repeat: repeat-y;
      overflow: auto;
    }
    header {
      position: absolute;
      left: 0;
      top: 20%;
      width: 100%;
    }
    .empty {
      height: 210vh;
    }
    .form {
      position: absolute;
      top: 100vh;
      margin-left: 10%;
    }
    .content-form {
      display: -ms-grid;
      display: grid;
      -ms-grid-columns: (1fr)[3];
          grid-template-columns: repeat(3, 1fr);
      grid-gap: 0;
      margin-top: 53vh;
      margin-left: 10vh;
    }
    .content section {
      margin-top: 0vh;
      margin-left: 0vh;
    }
    .media {
      position: absolute;
      top: 190vh;
      right: 30px;
    }
  
      </style> 
  </body>
  </html>
  </body>
  </html>' ; 

    }
  }


