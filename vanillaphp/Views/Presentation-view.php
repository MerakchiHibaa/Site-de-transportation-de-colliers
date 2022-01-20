
<?php


include_once '../controllers/Users.php';
include_once '../controllers/affichControl.php';


class presentation_view {

   
    public function display() {
       echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../css/index.css">
            <title>Présentation</title>
        </head>
        <body id="presentation-body"> ' ;
       
        include_once "../controllers/affichControl.php"  ; 
        $_controller = new affichControl(); 
        $presentation = $_controller->getpresentation() ; 
        foreach ($presentation as $value){
        
        
           echo' <section class="presentation-section"  style=" 
            z-index: -1;
            width: 100%;
            height: 100vh;
            background: url(../assets/' . $value['image'] .' );
            background-size: cover;
        
            "
            > 
                <div class="box"> 
                    <div class="content">
                    
                        <h1 style="font-size:2.5em ; text-align:center;"> Annonces </h1> 
                        <p>'. $value['contenu'].' </p>
            <a id="presentation-btn" class="btn-up" href="#" onclick="playvideo(\'../assets/'.  $value['video'].')"> Qui Sommes Nous ?</a>
            
                    </div>
                </div>
                
        
                
        
            </section>
            <div class="video" id="video-player"> 
                <video width="100%" controls autoplay src="../assets/'.  $value['video'].'" id="presentation-video">  </video>
               <img src="../assets/close-icon.png" alt="" class="close-btn" onclick="stopvideo()">
            </div>
           }
            <script> 
        let videoplayer =  document.getElementById(\'video-player\') ; 
        let myvideo =  document.getElementById(\'myvideo\') ; 
        let presentationbtn = document.getElementById(\'presentation-btn\') ;
        
        function stopvideo() {
            videoplayer.style.display="none" ; 
            presentationbtn.style.zIndex = 1 ;
        
        }
        
        function playvideo(file) {
          //  myvideo.src = file ; 
            videoplayer.style.display = "block" ; 
            presentationbtn.style.zIndex = -1 ;
        
        
        }
        
             
            </script>
           
        </body>
        </html>
        ' ; 
    }
}
}