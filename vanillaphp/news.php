<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">  
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">

       <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 
   
    <title>News</title>
</head>
<body>

<h3 style="margin: 20px ;"> <i style="font-size:3rem; margin:10px ;" class="far fa-newspaper"></i>  Nos Publicités:</h3>

<?php
include_once './controllers/affichControl.php';


$_controller = new affichControl(); ;  

        
        $result =  $_controller->selectAllNews() ;
        $output = '';
        if($result)
        {
            foreach($result as $row)
            {
                $output .= '
                <div class="col-sm-4 col-lg-3 col-md-3">
                    <div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:450px;">

                    <p align="center"><strong><a href="#">'. $row['article'] .'</a></strong></p>
                     '. $row['contenu'] .' <br />
                     <img src="assets/'.$row['image'].'" style="margin: 20px 0 ;" alt="" width="100%" height="50%" >

                    <p>Date de création : '. $row['creationDate'].' <br />
                        nombre de vues : '. $row['viewsNumber'] .' <br />
                       
                        <a href="newsDetail.php?id='.$row['ID_news'].'"> Voir en détail </a>
                    </div>
    
                </div>
                ';
            }
        }
        
        else
        {
            $output = '<h3>No Data Found</h3>';
        }
        echo $output;
    

     ?>



<div class="col-ms-9"  > <!--float left-->
            	<br />
                <div class="row filter_data">

                </div>
            </div>
</body>
</html>