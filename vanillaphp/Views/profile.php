<?php 
 session_start() ; 
 /* 
echo $_SESSION['userID'] ;
echo $_SESSION['userType'] ;
echo $_SESSION['userEmail'] ;
echo $_SESSION['userNom'] ;
echo $_SESSION['userPrenom'] ;
echo $_SESSION['userAdresse'] ;
echo $_SESSION['userNumero'] ;
echo $_SESSION['userPassword'];
echo $_SESSION['userPhoto'] ;
echo $_SESSION['userNote'] ; */

 
include '../controllers/affichControl.php';


$_controller = new affichControl();

if (!isset($_SESSION["userID"]) or !isset($_SESSION["userEmail"])) {
/*    redirect("../login.php");
 */ 
    header("Location: ./signup.php");
 }

 if (isset($_GET['modifan'])) {

  $modif = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['modifan']);
/*  $_controller->archiveAnnonce($archive);
 */}

 if (isset($_GET['suppriman'])) {

  $archive = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['suppriman']);
 $_controller->archiveAnnonce($archive);
}

if (isset($_GET['signalFinished'])) {

  $ID_trajet = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['signalFinished']);
 $_controller->reportFinished($ID_trajet);
/*  header("Location: ./profile.php");
 */
}


?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../assetss/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />

    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="../bootstrapDesign/css/mdb.min.css" />
<!--     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 --> 
 
    <title>Profile</title>
</head>
<body>

<section class="vh-100" style="background-color: #f4f5f7;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-6 mb-4 mb-lg-0">
        <div class="card mb-3" style="border-radius: .5rem;">
          <div class="row g-0">
            <div class="col-md-4 gradient-custom text-center text-white" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
              <img
                src= "../usersImages/<?php echo $_SESSION['userPhoto'] ; ?>"
                alt="Avatar"
                class="img-fluid my-5"
                style="width: 80px;"
              />
              <h5 style="color: black ; text-transform:uppercase; " ><?php echo $_SESSION['userNom']." ". $_SESSION['userPrenom'] ;?> </h5>
              <p style="color: black ;"><?php echo $_SESSION['userType']?></p> 
              <?php if($_SESSION['userViewersNumber'] =='0') { ?>
                <h5 style="color: black ;" > On ne vous a pas encore noté </h5>

            <?php  } else { ?>
            <p style="color: #ffff00 ; font-weight:800;">   <i class="fas fa-star"></i> <?php echo $_SESSION['userNote']/$_SESSION['userViewersNumber']."/5"; ?> </p>

          <?php  } ?>
              <?php if(isset($_SESSION['userCertifie'])){
                if($_SESSION['userCertifie'] == '0') {?>
                
                <p class="badge badge-success rounded-pill"> Certifié.e </p> <br>

             <?php } else {?>

              <p class="badge badge-warning rounded-pill"> Non certifié.e <br></p>
             
          <?php  }} ?>
        <a href="./updateProfileUser.php?id=<?php echo $_SESSION['userID']  ?>">      <i style="color: black ; margin-top: 40px ; font-size: 2.5rem;" class="far fa-edit mb-5"></i>  </a> 
            </div>
            <div class="col-md-8">
              <div class="card-body p-4">
                <h6>Informations</h6>
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h6>Email</h6>
                    <p class="text-muted"><?php echo $_SESSION['userEmail']?></p>
                  </div>
                  <div class="col-6 mb-3">
                    <h6>Numéro de téléphone</h6>
                    <p class="text-muted"><?php echo $_SESSION['userNumero']?></p>
                  </div>
                </div>
               <!--  <h6>Projects</h6> -->
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class="col-6 mb-3">
                    <h6>Wilayas de départ</h6>
                    <select class="form-control"> 
                      <?php foreach($_SESSION['userWilayaDep'] as $value) {
                        $namewilaya = $_controller->getNameWilaya($value['ID_wilaya']) ; 
                        foreach($namewilaya as $name) {
                          $name =  $name['wilaya'] ; 
                        } ?>
                        <option value="<?php echo $value['ID_wilaya'] ?>"> <?php echo $name ; ?></option>

                     <?php } ?>
                       

                    </select>
<!--                     <p class="text-muted">Lorem ipsum</p>
 -->                  </div>
                  <div class="col-6 mb-3">
                    <h6>Wilayas d'arrivée</h6>
                    <select class="form-control"> 
                      <?php foreach($_SESSION['userWilayaArr'] as $value) {
                        $namewilaya = $_controller->getNameWilaya($value['ID_wilaya']) ; 
                        foreach($namewilaya as $name) {
                          $name =  $name['wilaya'] ; 
                        } ?>
                        <option value="<?php echo $value['ID_wilaya'] ?>"> <?php echo $name ; ?></option>

                     <?php } ?>
                       

                    </select>
                  
<!--                     <p class="text-muted">Dolor sit amet</p>
 -->                  </div>
                </div>

                <?php if($_SESSION['userType'] == 'transporteur' && $_SESSION['userDemande'] == '1' ) { ?>

                
                <hr class="mt-0 mb-4">
                <div class="row pt-1">
                  <div class ="border border-dark" style="padding: 10px ; padding-top:20px ; margin-bottom: 10px ;">
                    <h6 class="text-center"> Statut de votre demande :</h6>
                    <!-- statue possible : en attente, en cours de traitement, validée, refusée
et certifiée) -->
<?php switch ( $_SESSION['userStatut']) {
  case "en attente" : ?>
                      <p style='font-weight:600 ;' class="text-center text-warning" > <i style="padding: 5px" class="fa fa-hourglass-end" aria-hidden="true"></i>
 En attente </p>
<?php 
break ;
case "en cours de traitement" : ?>
                      <p  style='font-weight:600 ;' class="text-center text-warning" > <i style="padding: 5px"  class="fas fa-recycle"></i> En cours de traitement... </p>
                      <?php 
                      break ;

case "refuse" : ?>
                      <p style='font-weight:600 ;' class="text-center text-danger" > <i style="padding: 5px" class="fas fa-times"></i>   Refusée </p>
                      <p style='font-size:1rem ;' class="text-center " >   <?php $_controller->getJustificatif($_SESSION['userNom'] , $_SESSION['userPrenom']) ?> </p>

<!-- justificatif -->

<?php
break ;

 case "valide" : ?>
                      <p style='font-weight:600 ;' class="text-center text-success" > <i style="padding: 5px"  class="fas fa-check"></i>Validée </p>
                      <p  style='font-weight:400 ;'  > Veuillez rapporter la liste de documents à 
suivante au bureau de l’entreprise : <br> 
- Deux photos  <br>
- Photocopie de la pièce d'identité  <br>
- Photocopie du permis de conduite  <br>


</p>

<!-- affichier les papiers
 -->

<?php } ?>
                  </div>
                </div>
            <?php  } ?>
                <div class="d-flex justify-content-start">
                  <a href="#" style="text-transform:uppercase; color:black ;"><i class="fas fa-map-marker-alt" style="cursor: pointer ; margin-right : 10px ;  "></i> <span class=""> <?php echo $_SESSION['userAdresse']?> </span></a>
                  <!-- <a href="#!"><i class="fab fa-twitter fa-lg me-3"></i></a>
                  <a href="#!"><i class="fab fa-instagram fa-lg"></i></a> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



 
  <div class="historique"> 
  <h1 style="margin-left: 7rem ; margin-top: 3.5rem ; font-size: 2.5rem ;"> <i  style="margin: 0 15px ;" class="fa fa-history" aria-hidden="true"></i>
 Mon historique d'annonces : </h1>

  <!--tryy begin-->
 



       
       
    
<!--try end-->

<?php   

$result = $_controller->getHistoriqueAnnonce($_SESSION['userID']) ;
              if ($result) {   ?>
                   
<div class="container my-5">
  <div class="shadow-4 rounded-5 ">
    <table class="table align-middle mb-0 bg-white">
      <thead class="bg-light">
        <tr>
          <th>Titre  </th>
          <th>Point de départ et d'arrivée</th>
          <th>Type de transport</th>
          <th>Poids entre </th> 
          <th>Volume entre </th>
          <th>Moyen de transport </th>
          <th>Etat </th>
          <th>Date de création </th>
          <th>Nombre des vues </th>
          <th> Statut </th>
          <th> Réponses </th>
          <th> Actions </th>




                
                  <?php  foreach($result as $value) { ?>
 

</tr>
      </thead>
      <tbody>
        <tr>
          <td>
          <p class="fw-bold mb-1"> <?php echo $value['titreAnnonce']?></p>
          </td>

          <td>
            <p class="fw-bold mb-1"> <?php echo "De ".$value['pointDepart']." à ".$value['pointArrivee']?></p>
            
          </td>
          <td>
            <p class="fw-bold mb-1"> <?php echo $value['typeTransport']?></p>
            
          </td>

          <td>
            <p class="fw-bold mb-1"> <?php echo "De ".$value['poidsMin']." à ".$value['poidsMax']?></p>
            
          </td>
          <td>
            <p class="fw-bold mb-1"> <?php echo "De ".$value['volumeMin']." à ".$value['volumeMax']?></p>
            
          </td>
          <td>
            <p class="fw-bold mb-1"> <?php echo $value['moyenTransport']?></p>
            
          </td>
      <?php if ($value['etat'] =="valide") {?>
          <td>
            <span class="badge badge-success rounded-pill"> <?php echo $value['etat'] ?></span>
          </td>
          <?php } else {?>
            <td>
            <span class="badge badge-warning rounded-pill"> <?php echo $value['etat'] ?></span>
          </td>
            <?php } ?>
            <td>
            
            <div class="ms-3">
                <p class="text-muted mb-0">  <?php echo $value['creationDate'] ?></p>
              </div>
          </td>
          <td>
              <div class="ms-3">
                <p class="text-muted mb-0">  <?php echo $value['viewsNumber'] ?></p>
              </div>
          </td>

          <?php if ($value['statut'] =="1") {?>
          <td>
            <span class="badge badge-success rounded-pill"> <?php echo 'confirmé' ; ?></span>
          </td>
          <?php } else {?>
            <td>
            <span class="badge badge-warning rounded-pill"> <?php echo 'En attente' ; ?></span>
          </td>
            <?php } ?>



            <td>
              <div class="ms-3">
              <a
                <?php 
                if($value['statut'] =="0") { ?>


               
                href= "annonceResponders.php?ida=<?php echo $value['ID_annonce'];?>"  > Voir qui a répondu à votre annonce </a> 
                <?php } else { ?>
                  class="text-muted mb-0" > Pas de réponse </a> 
                  <?php
                  
                } ?>
                
              </div>
          </td>


          <td>
<!--             <a class="btn btn-success btn-sm" href="annonceDetailAdmin.php?id=<?php echo $value['ID_annonce'] ;?>"> Voir </a>
 -->
            <a  class="btn btn-success btn-sm <?php  if( $value['statut'] == '1' )  {
  echo "disabled";
} ?>
" href="?modifan=<?php echo $value['ID_annonce'];?>"> <i class="fas fa-edit"></i>  </a>


 <a onclick="return confirm('Vous voulez vraiment supprimer cette annonce ?')" class="btn btn-danger btn-sm " href="?suppriman=<?php echo $value['ID_annonce'];?>"> <i class="fas fa-trash-alt"></i> </a>
  




 </td>       

          
        </tr>

  
       

<?php } ?> 
</tbody>
    </table>
  </div>
</div>
<?php  }   else {?>
  <div class="ms-3">
                <p class="text-muted mb-0"> Vous n'avez pas encore publier des annonces. </p>
              </div>

  <?php } ?>

  <h1 style="margin-left: 7rem ; margin-top: 3.5rem ; font-size: 2.5rem ;"> <i style="margin: 0 15px ;"  class="fa fa-history" aria-hidden="true"></i>
 Mon historique de transactions : </h1>
  
  
<?php   
 

 
 $result = $_controller->getHistoriqueTrajet($_SESSION['userID']) ;
               if ($result) {   ?>
                    
 <div class="container my-5">
   <div class="shadow-4 rounded-5">
     <table class="table align-middle mb-0 bg-white">
       <thead class="bg-light">
         <tr>
           <th width="2%">Numéro  </th>
           <th width="15%">Transporteur</th>
           <th width="7%">Titre  </th>
           <th width="15%">Date </th>
           <th width="15%">Note </th>  
           <?php if($_SESSION['userType'] == 'transporteur') { ?>
             <th>Gains </th> 

         <?php  } ?>
           <th width="20%">Actions </th> 

           
                
                   <?php 
                    $i = 0 ;
                    foreach($result as $value) {
                      $i ++ ;  ?>
  
 
 </tr>
       </thead>
       <tbody>
         <tr>
           <td>
             <div class="d-flex align-items-center">
               
               <div class="ms-3">
                 <p class="fw-primary mb-1"><?php echo $i ?></p>
               </div>
             </div>
           </td>
           <td>
             <p class="fw-primary mb-1"> <?php 
             $user = $_controller->getUserInfoById($value['ID_transporteur'] ) ;
             foreach ($user as $user) {
               $nom = $user['nom'] ;
               $prenom = $user['prenom'];

             }
              echo $nom." ".$prenom ;?>
             </p>
             </p>
             
           </td>
           <td>
             <?php
             $annonces = $_controller->getAnnonceInfoById($value['ID_annonce']) ; 
             foreach ($annonces as $annonce) {
               $titre = $annonce['titreAnnonce'] ; 
             
              ?>
             <p class="fw-primary mb-1"> <?php echo $titre ?></p>
             <?php } ?>
           </td>
 
           <td>
             <div class="ms-3">
                 <p class="text-muted mb-0">  <?php echo $value['creationDate'] ?></p>
               </div>
                    </td>



                    <td>
             <div class="d-flex align-items-center">
               
               <div class="ms-3">
                 <?php if ($value['note']== '0' ) { ?>
                  <p class="fw-primary mb-1"><?php echo "Vous n'avez pas encore noté ce trajet." ?></p>

                <?php } else { ?>
                  <p class="fw-primary mb-1"><?php echo $value['note'].'/5' ?></p>

                <?php } ?>
               </div>
             </div>
           </td>
<!---Gains--->
<?php
if($_SESSION['userType'] == 'transporteur') { ?>
  <td>
             <div class="d-flex align-items-center">
               
               <div class="ms-3">
               <p class="fw-primary mb-1"><?php echo "Prix :".$value['price'] ?></p>
               <p class="fw-primary mb-1"><?php echo "Gain net :" .$value['price']*(1-0.3) ?></p>
               <p class="fw-primary mb-1"><?php echo "Le site prend 30% :" .$value['price']*0.3 ?></p>


               </div>
             </div>
           </td>


<?php }?>
                    <!---actions---->

                    <td>
                      <?php if($value['termine'] == '0') {  ?>
                        <a class="btn btn-success btn-sm" href="?signalFinished=<?php echo $value['ID_trajet'];?>" > <i class="fas fa-check"> </i> Signaler comme terminé </a>


                      <?php } else { ?>
                        <a class="btn btn-success btn-sm disabled"  onclick=''>  <i class="fas fa-check"></i> Terminé </a>

                       <?php } ?>


           

      <a href="rate.php?id=<?php echo $value['ID_transporteur'] ;?>&idtr=<?php echo $value['ID_trajet'] ;?>" class="btn btn-warning btn-sm 
      <?php if ($value['note']== '0' ) { ?> " <?php } else { echo "disabled"; echo '"' ; }?> > <i class="fas fa-star"> </i> Noter </a>

               


      <a href="report.php?id=<?php echo $value['ID_trajet'] ;?>&idsd=<?php echo $value['ID_transporteur'] ;?>&ids=<?php echo $_SESSION['userID'] ;?>" class="btn btn-danger btn-sm ">       <i class="fas fa-exclamation-triangle"></i> 
  Signaler cet utilisateur </a>

           

 
        

 </td>    

                   

 
               
 
           
         </tr>
 
   
         
 
 <?php } ?>
 </tbody>
     </table>
   </div>
 </div>
<?php  }   else {?>
   <div class="ms-3">
                 <p class="text-muted mb-0"> Vous n'avez pas encore des transactions. </p>
               </div>
 
   <?php } ?>
 


   </div>
   <script type="text/javascript" src="../bootstrapDesign/js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
  <script src="../js/index.js"> </script>
</body>
</html>