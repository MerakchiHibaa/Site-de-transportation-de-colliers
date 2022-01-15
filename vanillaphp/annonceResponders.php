<?php if (isset($_GET['ida']) ) {
    session_start();
  $ID_annonce = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['ida']);


} else {
    echo '<h1> im outside </h1>' ;

}?>
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

    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="assetss/dataTables.bootstrap4.min.css">
    

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="./bootstrapDesign/css/mdb.min.css" />
    
    <title>Responders</title>
</head>
<body>


<div class="container my-5">
  <div class="shadow-4 rounded-5 overflow-hidden">
    <table class="table align-middle mb-0 bg-white">
      <thead class="bg-light">
        <tr>
          <th> Transporteur </th>
          <th>Actions</th>
          <?php   
include_once "./controllers/affichControl.php" ;
$_controller = new affichControl();
$result = $_controller->getDemande($ID_annonce) ;
              if ($result) {  
              foreach($result as $value) {
                 $user =  $_controller->getUserInfoById($value['ID_transporteur']) ; 
                 if ($user) {
                     foreach($user as $user) { ?>       
</tr>
      </thead>
      <tbody>

        <tr>
          <td>
         <div> 
              <img src="./assets/slider3.jpg" class="bg-info rounded-circle" width="7%" style="height: 4rem ;" alt="Cinque Terre">

                    <span class="fw-bold mb-1"> <?php echo $user['nom']." ".$user['prenom']?></span>
                    
                     </div>
          <?php if ($user['certifie']=="1" ) {?>
            <p class="badge badge-success rounded-pill"> <?php echo "Certifié.e"?></p>


       <?php   } else { ?>
        <p class="badge badge-warning rounded-pill">  <?php echo "Non certifié"?></p>


      <?php } ?>
         <p class="fw-bold mb-1"> <i class="fas fa-star"></i>  <?php echo $user['note']?></p>

          <p class="fw-bold mb-1"> <?php echo $user['numero']?></p>
          <p class="fw-bold mb-1"> <?php echo $user['email']?></p>


          </td>

          <td>
          <a class="btn btn-success btn-sm" href="#" > <i class="fas fa-check"> </i> Confirmer </a>
            
          </td>
</tbody>
<?php }
                 } ?>
            
<?php } ?>
<?php } ?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    </body>

</html>