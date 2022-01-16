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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Statistiques</title>
</head>
<body>


 




</div> 

  <div class="wrapper">
  <div class="counter-up">
    <div class="content">
      <div class="box">
        <div class="icon"><i class="fas fa-users"></i></div>
        <div class="counter"> <?php echo $_controller->getUsersNumber() ; ?></div>
        <div class="text"> Utilisateurs </div>
      </div>
      <div class="box">
        <div class="icon"><i class="fa fa-car" aria-hidden="true"></i></div>
        <div class="counter"><?php echo $_controller->getTransporteursNumber() ; ?>  </div>
        <div class="text"> Transporteurs</div>
      </div>
      <div class="box">
        <div class="icon"><i class="fas fa-user-tie"></i></div>
        <div class="counter"><?php echo $_controller->getClientsNumber() ; ?></div>
        <div class="text"> Clients</div>
      </div>
      <div class="box">
        <div class="icon"><i class="fas fa-bullhorn"></i></div>
        <div class="counter"><?php echo $_controller->getAnnncesNumber() ; ?> </div>
        <div class="text"> Annonces</div>
      </div>
      <div class="box">
        <div class="icon"><i class="fas fa-user-check"></i></div>
        <div class="counter"> <?php echo $_controller->getCertifiedNumber() ; ?></div>
        <div class="text">Transporteurs Certifiés</div>
      </div>
      <div class="box">
        <div class="icon"><i class="far fa-handshake"></i></div>
        <div class="counter"> <?php echo $_controller->getTrajetsNumber() ; ?></div>
        <div class="text"> Transactions</div>
      </div>
      <!-- <div class="box">
        <div class="icon"><i class="fas fa-award"></i></div>
        <div class="counter">120</div>
        <div class="text">Awards Received</div>
      </div>
      <div class="box">
        <div class="icon"><i class="fas fa-award"></i></div>
        <div class="counter">120</div>
        <div class="text">Awards Received</div>
      </div>
      <div class="box">
        <div class="icon"><i class="fas fa-award"></i></div>
        <div class="counter">120</div>
        <div class="text">Awards Received</div>
      </div> -->
    </div>
  </div>
  </div>
<!--   style="display: flex ;"
 -->  
<div class ='statistics topannonces'> 
<h2 style="margin: 30px 45px; color: #4481eb ;" > Nos Top Annonces :  </h2>
<div style="text-align:center; 
 height: 150px; display:flex ;"> 
<?php $annonces= $_controller->getTopAnnonces() ;
foreach($annonces as $annonce) {
 echo '<div class="col-sm-3 col-lg-3 col-md-3"   >
                    <div style="border:1px solid #ccc; border-radius:5px; margin:16px; height:300px;">

                    <p align="center"><strong><a href="#">'. $annonce['titreAnnonce'] .'</a></strong></p>
                    Type de transport : '. $annonce['typeTransport'] .' <br />
                    <p>Point de départ : '. $annonce['pointDepart'].' <br />
                        Point darrivée : '. $annonce['pointArrivee'] .' <br />
                        <p style="text-align:center;" class="text-danger" > Poids entre: '. $annonce['poidsMin'] .' - '. $annonce['poidsMax'] .' KG</p>
                        <p style="text-align:center;" class="text-danger" > Poids entre: '. $annonce['volumeMin'] .' - '. $annonce['volumeMax'] .'L</p>

                        <a href="annonceDetail.php?id='.$annonce['ID_annonce'].'"> Lire a suite </a>
                    </div>
    
                </div>' ;
    
 } ?> </div>
  <style> 

  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
.section{
  background: url("images/bg-1.jpg") no-repeat;
  height: 100vh;
  background-size: cover;
  background-position: center;
  background-attachment: fixed;
}
.wrapper{
  padding: 20px 50px;
}
.wrapper .title{
  font-size: 40px;
  font-weight: 600;
  margin-bottom: 10px;
}
.wrapper p{
  text-align: justify;
  padding-bottom: 20px;
}
.counter-up{
  min-height: 50vh;
  background-size: cover;
  background-attachment: fixed;
  padding: 0 50px;
  position: relative;
  display: flex;
  align-items: center;
}
.counter-up::before{
  position: absolute;
  content: "";
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  background: #4481eb;
}
.counter-up .content{
  z-index: 1;
  position: relative;
  display: flex;
  width: 100%;
  height: 100%;
  flex-wrap: wrap;
  align-items: center;
  justify-content: space-between;
}
.counter-up .content .box{
  border: 1px dashed rgba(255,255,255,0.6);
  width: calc(25% - 30px);
  border-radius: 5px;
  display: flex;
  align-items: center;
  justify-content: space-evenly;
  flex-direction: column;
  padding: 20px;
  margin: 10px 20px ;
}
.content .box .icon{
  font-size: 48px;
  color: #e6e6e6;
}
.content .box .counter{
  font-size: 50px;
  font-weight: 500;
  color: #f2f2f2;
  font-family: sans-serif;
}
.content .box .text{
  font-weight: 400;
  color: #ccc;
}
@media screen and (max-width: 1036px) {
  .counter-up{
    padding: 50px 50px 0 50px;
  }
  .counter-up .content .box{
    width: calc(50% - 30px);
    margin-bottom: 50px;
  }
}
@media screen and (max-width: 580px) {
  .counter-up .content .box{
    width: 100%;
  }
}
@media screen and (max-width: 500px) {
  .wrapper{
    padding: 20px;
  }
  .counter-up{
    padding: 30px 20px 0 20px;
  }
}
  </style>
  




</body> 
</html> 