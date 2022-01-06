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

if (!isset($_SESSION["userID"]) or !isset($_SESSION["userEmail"])) {
/*    redirect("../login.php");
 */ 
    header("Location: ./login.php");
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
      <h1 class="text-center" style="text-align: center;">Modifier votre profile</h1>
     <div class="form-group">
       <?php if(!empty($msg)) { ?>
         <div class="alert <?php echo $css_class ;?>">
         <?php echo $msg ; ?>
         </div>

         <?php  } ?>
         <div class="profile-img">
<img src="./usersImages/<?php echo $_SESSION['userPhoto'] ; ?>" onclick="triggerClick()" id="profileDisplay" alt="" width="50%" style=" display: block;
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
     
      <input class="form__input"  type="hidden" name="type" value ="updateProfile">
    
      <label class="custom-field"> 
      <input class="form__input"  type="text" class="box-input" name="newnom" 
    placeholder="<?php echo $_SESSION['userNom'] ;?>"  />
            <span class="placeholder ">Entrez un nouveau nom</span>

    </label> 

    <label class="custom-field"> 
      <input class="form__input"  type="text" class="box-input" name="newprenom" 
    placeholder="<?php echo $_SESSION['userPrenom'] ;?>"  />
            <span class="placeholder"> Entrez votre prénom </span>

    </label> 


    <label class="custom-field"> 
    <input class="form__input"  type="email" class="box-input" name="newemail" 
    placeholder="<?php echo $_SESSION['userEmail'] ;?>"  />
            <span class="placeholder "> Entrez votre email </span>

    </label> 
    <label class="custom-field"> 
    <input class="form__input"  type="text" class="box-input" name="newnumero" 
    placeholder="<?php echo $_SESSION['userNumero'] ;?>"  />
            <span class="placeholder "> Entrez votre numéro de téléphone </span>

    </label> 


    <label class="custom-field"> 
    <input class="form__input"  type="text" class="box-input" name="newadresse" 
    placeholder="<?php echo $_SESSION['userAdresse'] ;?>"  /><span class="placeholder"> Entrez votre adresse </span>

    </label> 


    <label class="custom-field"> 
    <input class="form__input"  type="password" class="box-input" name="newpassword" 
    placeholder=""  />
    <span class="placeholder"> Entrez un nouveau mot de passe </span>

    </label> 


    <label class="custom-field"> 
    <input class="form__input"  type="password" class="box-input" name="newpasswordrepeat" 
    placeholder=""  />  
      <span class="placeholder"> Confirmez le nouveau mot de passe </span>

    </label> 

    <label class="custom-field"> 
    <input class="form__input"  type="submit" name="updateProfile" 
    value="Modifier" class="box-button" />
  

    </label>   
    
    </div>
  </form>

  </div>
  </div>
  </div>
 
  <div class="historique"> 
  <h1> Mon historique d'annonces : </h1>

  <!--tryy begin-->
 



       
       
    
<!--try end-->

<?php   
 
include './controllers/affichControl.php';


$_controller = new affichControl();
$result = $_controller->getHistoriqueAnnonce($_SESSION['userID']) ;
              if ($result) {   ?>
                   { ?>  
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
                
                  <?php  foreach($result as $value) { ?>
 

</tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <div class="d-flex align-items-center">
              
              <div class="ms-3">
                <p class="fw-bold mb-1"><?php $value['titreAnnonce']?></p>
              </div>
            </div>
          </td>
          <td>
            <p class="fw-bold mb-1"> <?php echo "De".$value['pointDepart']."à".$value['pointArrivee']?></p>
            
          </td>
          <td>
            <p class="fw-bold mb-1"> <?php $value['typeTransport']?></p>
            
          </td>

          <td>
            <p class="fw-bold mb-1"> <?php echo "De".$value['poidsMin']."à".$value['poidsMax']?></p>
            
          </td>
          <td>
            <p class="fw-bold mb-1"> <?php echo "De".$value['volumeMin']."à".$value['volumeMax']?></p>
            
          </td>
          <td>
            <p class="fw-bold mb-1"> <?php $value['moyenTransport']?></p>
            
          </td>
      <?php if ($value['etat'] =="valide") {?>
          <td>
            <span class="badge badge-success rounded-pill"> <?php $value['etat'] ?></span>
          </td>
          <?php } else {?>
            <td>
            <span class="badge badge-warning rounded-pill"> <?php $value['etat'] ?></span>
          </td>
            <?php } ?>
            <td>
            
            <div class="ms-3">
                <p class="text-muted mb-0">  <?php $value['creationDate'] ?></p>
              </div>
          </td>
          <td>
              <div class="ms-3">
                <p class="text-muted mb-0">  <?php $value['viewsNumber'] ?></p>
              </div>
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

  <h1> Mon historique de transactions : </h1>


  
<?php   
 

 
 $result = $_controller->getHistoriqueTrajet($_SESSION['userID']) ;
               if ($result) {   ?>
                    { ?>  
 <div class="container my-5">
   <div class="shadow-4 rounded-5 overflow-hidden">
     <table class="table align-middle mb-0 bg-white">
       <thead class="bg-light">
         <tr>
           <th>Numéro de transaction </th>
           <th>Transporteur</th>
           <th>Titre de l'anonce </th>
           <th>Date </th> 
           
                
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
                 <p class="fw-bold mb-1"><?php $i ?></p>
               </div>
             </div>
           </td>
           <td>
             <p class="fw-bold mb-1"> <?php 
             $nom = $_controller->returnAttributeUser($result['ID_transporteur'] , 'nom') ;
             $prenom = $_controller->returnAttributeUser($result['ID_transporteur'] , 'prenom') ; 
             echo $nom." ".$prenom ;?>
             </p>
             ?></p>
             
           </td>
           <td>
             <p class="fw-bold mb-1"> <?php $value['ID_annonce']?></p>
             
           </td>
 
           <td>
             <div class="ms-3">
                 <p class="text-muted mb-0">  <?php $value['creationDate'] ?></p>
               </div>
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