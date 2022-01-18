<?php if (isset($_GET['id'])) {
    session_start();
  $ID_news= preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['id']);

} ?>


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
    <title>News </title>
</head>
<body>

<?php
include_once './controllers/affichControl.php';


$_controller = new affichControl();
    $getNInfo = $_controller->getNewsInfoById($ID_news);
    if ($getNInfo) {
      foreach ($getNInfo as  $getUinfo) {
          $views =  $getUinfo['viewsNumber'] + 1 ; 
          $_controller->setViewsN($views , $ID_news); 
      }}?>

<div class="container-affich"> 


    <div class="ann-affich">
    <?php if(!empty($_SESSION['msg'])) { 

echo $_SESSION['msg'] ; 
} ?>
        <div class="ann-affich_img">
        <?php
include_once './controllers/affichControl.php';


$_controller = new affichControl();
    $getNInfo = $_controller->getNewsInfoById($ID_news);
    if ($getNInfo) {
      foreach ($getNInfo as  $getUinfo) {
          ?>
            <img src="assets/<?php  echo $getUinfo['image'] ;?>" alt="">
        </div>
    
        <div class="ann-affich_post">
            
            
           
<h1 class="ann-affich_title"> <?php echo $getUinfo['article'] ?> </h1>
<h6 class=""> <?php echo $getUinfo['contenu'] ?> </h6>



            <i class="fa fa-eye" aria-hidden="true">    <?php echo"   ".$getUinfo['viewsNumber'] ; ?>   </i>
            <p class="ann-affich_text"> Créée le : <?php echo $getUinfo['creationDate'] ?> </p>
 

            <?php
             }
             }
             else {  ?>
                <p class="ann-affich_text">  <?php echo $getUinfo['contenu'] ?> </p>


            <?php } ?>

           
<!--     <a  href="#" class="ann-affich_cta"> Voir sur une carte  </a>
 -->
 
 <

        </div> <!--ann-affich_post end-->
        </div> <!--ann-affich-->
        </div>



  

</body> 

</html> 