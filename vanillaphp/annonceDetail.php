<?php if (isset($_GET['id'])) {
  $ID_annonce = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['id']);

} ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Annonce </title>
</head>
<body>
<?php
include_once './controllers/affichControl.php';


$_controller = new affichControl();
    $getAinfo = $_controller->getAnnonceInfoById($ID_annonce);
    if ($getAinfo) {
      foreach ($getAinfo as  $getUinfo) {
        echo"<h1> avaaaant".$getUinfo['titreAnnonce']." aprees </h1>" ;

     ?>

<div class="container-affich"> 

    <div class="ann-affich">
        <div class="ann-affich_img">
            <img src="assets/slider1.jpg" alt="">
        </div>
    
        <div class="ann-affich_post">
            
            <h1 class="ann-affich_title"> <?php echo $getUinfo['titreAnnonce'] ?> </h1>
            <p class="ann-affich_text">  Type de transport: <?php echo $getUinfo['pointArrivee'] ?> </p>
            <p class="ann-affich_text"> Poids de l'objet entre <?php echo $getUinfo['poidsMin'] ?> à <?php echo $getUinfo['poidsMax'] ?> </p>
            <p class="ann-affich_text">  Volume de l'objet entre <?php echo $getUinfo['volumeMin'] ?> à <?php $getUinfo['volumeMax'] ?> </p>
        <p class="ann-affich_text">  Point de départ :  <?php echo $getUinfo['pointDepart'] ?> Point d'arrivée : <?php echo $getUinfo['pointArrivee'] ?> </p>
        <a  href="#" class="ann-affich_cta"> Répondre à cette annonce </a>
        </div> <!--ann-affich_post end-->
    
        
    </div> <!--ann-affich-->
    
    <?php }} ?>
    
    </div> <!--end contaainer-affich-->
</body>
</html>