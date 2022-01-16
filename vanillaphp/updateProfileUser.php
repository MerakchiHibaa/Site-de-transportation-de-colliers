<?php 
 session_start() ; 
 
 
include './controllers/affichControl.php';


$_controller = new affichControl();

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
    <link rel="stylesheet" href="signup.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Update Profile</title>


</head>
<body>


<div class="container" >
      <div class="forms-container">
        <div class="signin-signup">
<form class="sign-in-form" action="./controllers/Users.php" method="POST" enctype="multipart/form-data">
  
      <h1 class="text-center" style="text-align: center; color: #5995FD" >Modifier votre profile</h1> <!-- class="text-center" style="text-align: center;" -->
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
            width:6rem ;
            height:6rem;
">
</div>
    <!--  <label for="profileImage"  style="
    justify-content: center;
    justify-self: center;
    justify-items: center;
    display: flex;
 ;" > Photo de profil</label> -->
     <input type="file" name="newprofileImage" onchange="displayImage(this)" id="profileImage" class="form_control"  style="display: none;">
    </div>
     
      <input class="input-field"   type="hidden" name="type" value ="updateProfile">
    
      <!-- <label class="">  -->
      <input class="input-field"  type="text" style="margin: 6px 0 ;"name="newnom" 
    placeholder="<?php echo $_SESSION['userNom'] ;?>"  />
            <!-- <span class="placeholder ">Entrez un nouveau nom</span> -->

   <!--  </label>  -->

  <!--   <label class=""> label -->
      <input class="input-field"   type="text"  name="newprenom" 
    placeholder="<?php echo $_SESSION['userPrenom'] ;?>"  />
           <!--  <span class="placeholder"> Entrez votre prénom </span>

    </label> 
 -->

   <!--  <label class="">  -->
    <input class="input-field"   type="email" style="margin: 6px 0 ;"name="newemail" 
    placeholder="<?php echo $_SESSION['userEmail'] ;?>"  />
            <!-- <span class="placeholder "> Entrez votre email </span>

    </label> 
    <label class="">  -->
    <input class="input-field"   type="text" style="margin: 6px 0 ;"name="newnumero" 
    placeholder="<?php echo $_SESSION['userNumero'] ;?>"  />
           <!--  <span class="placeholder "> Entrez votre numéro de téléphone </span>

    </label> 


    <label class="">  -->
    <input class="input-field"   type="text" style="margin: 6px 0 ;"name="newadresse" 
    placeholder="<?php echo $_SESSION['userAdresse'] ;?>"  /><!-- <span class="placeholder"> Entrez votre adresse </span>

    </label> 


    <label class="">  -->
    <input class="input-field"   type="password" style="margin: 6px 0 ;"name="newpassword" 
    placeholder="Entrez un nouveau mot de passe"  />
   <!--  <span class="placeholder"> Entrez un nouveau mot de passe </span>

    </label> 
 -->

   <!--  <label class="">  -->
    <input class="input-field"   type="password" style="margin: 6px 0 ;"name="newpasswordrepeat" 
    placeholder="Confirmez votre mot de passe"  />  
    
    
    <?php 

include_once './controllers/affichControl.php';


$_controller = new affichControl();
$ARRAY = $_controller->affichWilaya(); 
echo "<div'>
 <select  class='form-select' style='margin:5px ;' size='2' multiple name='wilaya[]'>" ;
 echo ("<option disabled > --- Chsoisissez les wilayas de départ--- </option> ");

foreach($ARRAY as $row){
  $wilaya = $row['wilaya'];
  $num = $row['numwilaya'] ;
  echo $wilaya ;
 echo ("<option value='$num' > $wilaya </option> ");
 }
echo "</select>" ; 


$ARRAY = $_controller->affichWilaya(); 
echo "<select class='form-select' style='margin:10px;' size='2' multiple aria-label='les wilayas d'arrivee' name='wilayaA[]'>" ;
echo ("<option disabled > ---Chsoisissez les wilayas d'arrivée--- </option> ");
foreach($ARRAY as $row){
  $wilaya = $row['wilaya'];
  $num = $row['numwilaya'] ;
  echo $wilaya ;
 echo ("<option value='$num' > $wilaya </option> ");
 }
echo "</select>" ; 


?> 
    <input class="input-field"   type="submit" name="updateProfile" 
    value="Modifier" class="box-button" />
  

    </div>
    
  </form>

  </div>
  </div>
  <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            
          </div>
          <img src="img/updateProfile.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
           
          </div>
        </div>
      </div>
    </div>

<!--   <script type="text/javascript" src="./bootstrapDesign/js/mdb.min.js"></script>
 -->    <!-- Custom scripts -->
    <script type="text/javascript"></script>
  <script src="./index.js"> </script>

  </body>
</html>