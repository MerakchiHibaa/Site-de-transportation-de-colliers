
<?php


include_once '../controllers/Users.php';
include_once '../controllers/affichControl.php';


class newsDetail_view {

   
    public function display($ID_news) {
        echo'
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../css/index.css">
            <!-- <link rel="stylesheet" type="text/css" href="./map/map/css.css">
            <link rel="stylesheet" type="text/css" href="./map/map/css.css">
         -->
        
         <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">            
        <link rel="stylesheet" href="../css/bootstrap.min.css">
            <title>News </title>
        </head>
        <body>' ;
        
        
        include_once '../controllers/affichControl.php';
        
        
        $_controller = new affichControl();
            $getNInfo = $_controller->getNewsInfoById($ID_news);
            if ($getNInfo) {
              foreach ($getNInfo as  $getUinfo) {
                  $views =  $getUinfo['viewsNumber'] + 1 ; 
                  $_controller->setViewsN($views , $ID_news); 
              }
            }
        
      echo'  <div class="container-affich"> 
        
        
            <div class="ann-affich">' ;
             /* if(!empty($_SESSION['msg'])) { 
        
        echo $_SESSION['msg'] ; 
        } */

               echo' <div class="ann-affich_img">' ;
                
        include_once '../controllers/affichControl.php';
        
        
        $_controller = new affichControl();
            $getNInfo = $_controller->getNewsInfoById($ID_news);
            if ($getNInfo) {
              foreach ($getNInfo as  $getUinfo) {
                 
                
                 echo'   <img src="../assets/'. $getUinfo['image'] 
                    .'" alt="">
                </div>
            
                <div class="ann-affich_post">
                    
                    
                   
        <h1 class="ann-affich_title">'. $getUinfo['article'] .' </h1>
        <h6 class=""> '. $getUinfo['contenu'] .'</h6>
        
        
        
                    <i class="fa fa-eye" aria-hidden="true"> '.$getUinfo['viewsNumber'] .'  </i>
                    <p class="ann-affich_text"> Créée le : '. $getUinfo['creationDate'] .' </p>';
         
        
                    
                     }
                     }
                     else {  
                      echo'  <p class="ann-affich_text"> '. $getUinfo['contenu'] .' </p>';
        
        
                     } 
        
                   echo'
        <!--     <a  href="#" class="ann-affich_cta"> Voir sur une carte  </a>
         -->
         
         
        
                </div> <!--ann-affich_post end-->
                </div> <!--ann-affich-->
                </div>
        
        
        
          
        
        </body> 
        
        </html> ' ;
    }
}
