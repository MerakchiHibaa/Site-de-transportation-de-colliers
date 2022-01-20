<?php



class report_view {

    
    public function __construct(){
       /*  $this->userController = new Users;
        $this->affichController = new affichControl; */

    }
    public function display($ID_trajet) { 

        echo'
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../css/report.css">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
        
            <title>Report</title>
        </head>
        <body>
        
         
        
       
         
            <div class="wrapper">
                <h2> <i class="fas fa-exclamation-triangle"></i> Signaler l\'utilisateur </h2>
                <form method="POST" action="../controllers/Users.php"> 
                    <input type="hidden" name="type" value="report">
                    <input type="hidden" name="ID_trajet" value="'.$ID_trajet. ' ">
        
        
                    <textarea name="reportText" id="report" rows="" cols="30"  required="required" placeholder="Pourquoi souhaitez-vous signaler cet utilisateur ?" required>  </textarea>
                
                    <input type="submit" onclick="" name="report" value="Envoyer" id="submitreport" >
        <!-- un message comme quoi on va voir et tt 
         -->        </form>
        
            </div>
        
            <script type="text/javascript">
            const textarea = document.getElementById(\'report\') ; 
            textarea.addEventListener(\'keyup\', e => {
                let scheight = e.target.scrollHeight ; //
                textarea.style.height = `${scheight}px` ; 
        
            })
            </script>
        </body>
        </html>' ;
    }}
