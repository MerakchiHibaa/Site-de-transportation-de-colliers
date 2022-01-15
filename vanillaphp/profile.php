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

 
include './controllers/affichControl.php';


$_controller = new affichControl();

if (!isset($_SESSION["userID"]) or !isset($_SESSION["userEmail"])) {
/*    redirect("../login.php");
 */ 
    header("Location: ./login.php");
 }



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
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="assetss/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="./bootstrapDesign/css/mdb.min.css" />
<!--     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 -->
 
    <title>Profile</title>
</head>
<body>

<div class="form-container"> 
<div class="row-profile"> 
<div class="form-div">  <!-- col-4 offset-md-4 form-div -->

<form class="box" action="./controllers/Users.php" method="POST" enctype="multipart/form-data">
 <div id="form-profile-div"> 
      <h1 class="text-center" style="text-align: center;" >Modifier votre profile</h1> <!-- class="text-center" style="text-align: center;" -->
     <div > <!-- class="form-group" -->
       <?php if(!empty($msg)) { ?>
         <div class="alert <?php echo $css_class ;?>">
         <?php echo $msg ; ?>
         </div>

         <?php  } ?>
         <div class="profile-img">
<img src="./usersImages/<?php echo $_SESSION['userPhoto'] ; ?>" onclick="triggerClick()" id="profileDisplay" alt="" width="10%" style=" display: block;
            margin: 10px auto;
            border-radius: 50% ;
">
</div>
     <label for="profileImage"  style="
    justify-content: center;
    justify-self: center;
    justify-items: center;
    display: flex;
 ;" > Photo de profil</label>
     <input type="file" name="newprofileImage" onchange="displayImage(this)" id="profileImage" class="form_control"  style="display: none;">
    </div>
     
      <input class=""  type="hidden" name="type" value ="updateProfile">
    
      <label class=""> 
      <input class=""  type="text" class="box-input" name="newnom" 
    placeholder="<?php echo $_SESSION['userNom'] ;?>"  />
            <span class="placeholder ">Entrez un nouveau nom</span>

    </label> 

    <label class=""> 
      <input class=""  type="text" class="box-input" name="newprenom" 
    placeholder="<?php echo $_SESSION['userPrenom'] ;?>"  />
            <span class="placeholder"> Entrez votre prénom </span>

    </label> 


    <label class=""> 
    <input class=""  type="email" class="box-input" name="newemail" 
    placeholder="<?php echo $_SESSION['userEmail'] ;?>"  />
            <span class="placeholder "> Entrez votre email </span>

    </label> 
    <label class=""> 
    <input class=""  type="text" class="box-input" name="newnumero" 
    placeholder="<?php echo $_SESSION['userNumero'] ;?>"  />
            <span class="placeholder "> Entrez votre numéro de téléphone </span>

    </label> 


    <label class=""> 
    <input class=""  type="text" class="box-input" name="newadresse" 
    placeholder="<?php echo $_SESSION['userAdresse'] ;?>"  /><span class="placeholder"> Entrez votre adresse </span>

    </label> 


    <label class=""> 
    <input class=""  type="password" class="box-input" name="newpassword" 
    placeholder=""  />
    <span class="placeholder"> Entrez un nouveau mot de passe </span>

    </label> 


    <label class=""> 
    <input class=""  type="password" class="box-input" name="newpasswordrepeat" 
    placeholder=""  />  
      <span class="placeholder"> Confirmez le nouveau mot de passe </span>

    </label> 

    <label class=""> 
    <input class=""  type="submit" name="updateProfile" 
    value="Modifier" class="box-button" />
  

    </label>   
    
    </div>
  </form>

  </div>
  </div>
  </div>
 
  <div class="historique"> 
  <h1> <i class="fa fa-history" aria-hidden="true"></i>
 Mon historique d'annonces : </h1>

  <!--tryy begin-->
 



       
       
    
<!--try end-->

<?php   

$result = $_controller->getHistoriqueAnnonce($_SESSION['userID']) ;
              if ($result) {   ?>
                   
<div class="container my-5">
  <div class="shadow-4 rounded-5 overflow-hidden">
    <table class="table align-middle mb-0 bg-white">
      <thead class="bg-light">
        <tr>
          <th>Titre d'annonce </th>
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
" href="?modifan=<?php echo $value['ID_annonce'];?>"> <i class="fas fa-edit"></i> Modifier </a>


 <a onclick="return confirm('Vous voulez vraiment supprimer cette annonce ?')" class="btn btn-danger btn-sm " href="?suppriman=<?php echo $value['ID_annonce'];?>"> <i class="fas fa-trash-alt"></i> Supprimer</a>
  




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

  <h1> <i class="fa fa-history" aria-hidden="true"></i>
 Mon historique de transactions : </h1>


  
<?php   
 

 
 $result = $_controller->getHistoriqueTrajet($_SESSION['userID']) ;
               if ($result) {   ?>
                    
 <div class="container my-5">
   <div class="shadow-4 rounded-5 overflow-hidden">
     <table class="table align-middle mb-0 bg-white">
       <thead class="bg-light">
         <tr>
           <th width="2%">Numéro de transaction </th>
           <th width="15%">Transporteur</th>
           <th width="7%">Titre de l'anonce </th>
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
   <script type="text/javascript" src="./bootstrapDesign/js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
  <script src="./index.js"> </script>
</body>
</html>