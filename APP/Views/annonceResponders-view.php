


<?php


include_once '../controllers/Users.php';
include_once '../controllers/affichControl.php';


class annoncesResponders_view {

   
    public function display($ID_annonce) {
echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../assetss/dataTables.bootstrap4.min.css">
    

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="../bootstrapDesign/css/mdb.min.css" />
    
    <title>Responders</title>
</head>
<body>


<div class="container my-5">
  <div class="shadow-4 rounded-5 overflow-hidden">
    <table class="table align-middle mb-0 bg-white">
      <thead class="bg-light">
        <tr>
          <th> Transporteur </th>
          <th>Actions</th> ' ;
         
include_once "../controllers/affichControl.php" ;
$_controller = new affichControl();
$result = $_controller->getDemande($ID_annonce) ;
              if ($result) {  
              foreach($result as $value) {
                 $user =  $_controller->getUserInfoById($value['ID_transporteur']) ; 
                 if ($user) {
                     foreach($user as $user) { echo'      
</tr>
      </thead>
      <tbody>

        <tr>
          <td>
         <div> 
              <img src="../usersImages/'.$user['photo'].'" class="bg-info rounded-circle" width="70rem" style="height: 4rem ;" alt="Cinque Terre">

                    <span class="fw-bold mb-1">'. $user['nom'].' '.$user['prenom'].' </span>
                    
                     </div>' ;
          if ($user['certifie']=="1" ) {
            echo'
            <p class="badge badge-success rounded-pill"> "Certifié.e"</p>' ;


         } else { 
           echo'
        <p class="badge badge-warning rounded-pill">  "Non certifié"</p>' ;


      } 
      echo'
         <p class="fw-bold mb-1"> <i class="fas fa-star"></i>  ' ;
         if($user['viewersNumber'] == "0") { 
             echo $user['note'] ; 
         }
         else { 

         
         echo $user['note']/$user['viewersNumber']  ;
         } 
         echo'</p>

          <p class="fw-bold mb-1"> "Numéro de téléphone : '. $user['numero'] .'</p>
          <p class="fw-bold mb-1"> "Email : '. $user['email']. '</p>


          </td>

          <td>
          <a class="btn btn-success btn-sm" href="#" > <i class="fas fa-check"> </i> Confirmer </a>
            
          </td>
</tbody>' ;
 }
                 }
            
 }
 }
 echo'
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    </body>

</html>' ;
    }}
