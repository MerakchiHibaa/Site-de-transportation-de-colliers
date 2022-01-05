<?php
include './controllers/affichControl.php';
$_controller = new affichControl() ;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">            
    <title>Statistiques</title>
</head>
<body>
<div class ='statistics users'> 
    <h1> numéro des utilisateurs : <?php echo $_controller->getUsersNumber() ; ?> </h1>
</div> 
<div class ='statistics clients'> 
<h1> numéro des clients : <?php echo $_controller->getClientsNumber() ; ?> </h1>

</div> 
<div class ='statistics transporteurs'>
<h1> numéro des transporteurs : <?php echo $_controller->getTransporteursNumber() ; ?> </h1>
 </div> 
<div class ='statistics annonces'> 
<h1> numéro des annonces : <?php echo $_controller->getAnnncesNumber() ; ?> </h1>

</div> 
<div class ='statistics trajets'>
<h1> numéro des trajets : <?php echo $_controller->getTrajetsNumber() ; ?> </h1>
 </div> 

<div class ='statistics topannonces'> 
<h1> Nos top annonces :  </h1>
<?php $annonces= $_controller->getTopAnnonces() ;
foreach($annonces as $annonce) {
    
}
 ?>


</div> 

</body> 
</html> 