
<?php


include_once '../controllers/Users.php';
include_once '../controllers/affichControl.php';


class textSignal_view
{

   
    public function display($ID_report) { 
        
        echo'
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../css/bootstrap.min.css">  
            <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
        
               <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
         </head> 
         
         <body>
         ';
         
include_once '../controllers/affichControl.php';


$_controller = new affichControl();
    $getAinfo = $_controller->getReportById($ID_report);
    if ($getAinfo) {
      foreach ($getAinfo as  $getUinfo) {
          $text = $getUinfo['textSignal'] ;}


         echo'
         <div style="margin: 2rem ; padding: 2rem ; border: 2px solid #black ;">
<h1> Le texte de signalement : </h1>
         <h3 style="margin: 2rem ; padding: 2rem ; border: 2px solid #black ;"> 
         '.$text.'
         </h3>


          </div>
         ';
         
         echo'
         </body>
         </html>
           ' ;
    }


}
}