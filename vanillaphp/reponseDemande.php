<?php if (isset($_GET['ida']) && isset($_GET['idt']) ) {
    session_start();
  $ID_annonce = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['ida']);
  $ID_user = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['idt']);


} else {
    echo '<h1> im outside </h1>' ;

}?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" type="text/css" href="./map/map/css.css">
    <link rel="stylesheet" type="text/css" href="./map/map/css.css">
 -->

 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">            
<link rel="stylesheet" href="./bootstrap.min.css">
    <title>Annonce </title>
</head>
<body>
<?php
include_once './controllers/affichControl.php';


$_controller = new affichControl();
    $getAinfo = $_controller->getAnnonceInfoById($ID_annonce);
    if ($getAinfo) {
      foreach ($getAinfo as  $getUinfo) {
          $views =  $getUinfo['viewsNumber'] + 1 ; 
          $_controller->setViews($views , $ID_annonce);

     ?>

<div class="container-affich"> 


    <div class="ann-affich">
    <?php if(!empty($_SESSION['msg'])) { 

echo $_SESSION['msg'] ; 
} ?>
        <div class="ann-affich_img">
            <img src="assets/slider1.jpg" alt="">
        </div>
    
        <div class="ann-affich_post">

           
           <?php     $user = $_controller->getUserInfoById( $ID_user);
           if ($user) {
            foreach ($user as  $user) {
      
           ?>
        <p class="ann-affich_text"> Le transporteur <?php echo $user['nom'].' '.$user['prenom'] ; ?> a répondu à cette annonce, vous pouvez le contacter par téléphone :  <?php echo $user['numero'] ?> ou par email : <?php echo $user['email'] ?>  </p>

        
        <h3 class="ann-affich_title"> <?php echo $getUinfo['titreAnnonce'] ?> </h3>
            <p class="ann-affich_text"> Créée le : <?php echo $getUinfo['creationDate'] ?> </p>

                <p class="ann-affich_text">  Moyen de transport: <?php echo $getUinfo['moyenTransport'] ?> </p>


            <?php } ?>

            <p class="ann-affich_text">  Type de transport: <?php echo $getUinfo['typeTransport'] ?> </p>
            <p class="ann-affich_text"> Poids de l'objet entre <?php echo $getUinfo['poidsMin'] ?> à <?php echo $getUinfo['poidsMax'] ?> </p>
            <p class="ann-affich_text">  Volume de l'objet entre <?php echo $getUinfo['volumeMin'] ?> à <?php $getUinfo['volumeMax'] ?> </p>
        <p class="ann-affich_text">  Point de départ :  <?php echo $getUinfo['pointDepart'] ?> Point d'arrivée : <?php echo $getUinfo['pointArrivee'] ?> </p>

    <i class="fa fa-eye" aria-hidden="true">    <?php echo"   ".$getUinfo['viewsNumber'] ; ?>   </i> 
<!--     <a  href="#" class="ann-affich_cta"> Voir sur une carte  </a>
 -->
 
 
        </div> <!--ann-affich_post end-->

        <form method="post" action="./controllers/Users.php" > 
         <input type="hidden" name="type" value ="trajet">
        

         <input type="hidden" name="ID_annonce" value="<?php echo $ID_annonce ?>"> 
         <input type="hidden" name="ID_client" value="<?php echo $_SESSION['userID'] ?>"> 
         <input type="hidden" name="ID_transporteur" value="<?php echo $user['ID_user'] ?>"> 
         <button type="submit" name="send"class="ann-affich_cta" > Confirmer </button>

     </form>
        </div> <!--ann-affich-->
        </div>


     <!--end jumbotron-->


 <?php } }  }?>

    
        
    
   

</body>
</html>