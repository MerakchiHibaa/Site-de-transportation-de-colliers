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
          $_controller->setViewsN($views , $ID_news); ?>

          




    <?php  
    }
}  ?>

</body> 

</html> 