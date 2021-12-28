<?php 
session_start() ; 

if (!isset($_SESSION["userID"]) or !isset($_SESSION["userEmail"])) {
    header("Location: ./login.php");
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-container"> 
<div class="row-profile"> 
<div class="col-4 offset-md-4 form-div"> 

<form class="box" action="./controllers/Users.php" method="POST" enctype="multipart/form-data">
 <div id="form-profile-div"> 
      <h1 class="text-center">Modifier votre profile</h1>
     <div class="form-group">
       <?php if(!empty($msg)) { ?>
         <div class="alert <?php echo $css_class ;?>">
         <?php echo $msg ; ?>
         </div>

         <?php  } ?>

     <label for="profileImgage"> Photo de profil</label>
     <input type="file" name="newprofileImage" id="" class="form_control">
    </div>
     
      <input class="form__input"  type="hidden" name="type" value ="update">
    
      <label class="custom-field"> 
      <input class="form__input"  type="text" class="box-input" name="newnom" 
    placeholder="<?php echo $_SESSION['userNom'] ;?>" required />
            <span class="placeholder ">Entrez un nouveau nom</span>

    </label> 

    <label class="custom-field"> 
      <input class="form__input"  type="text" class="box-input" name="newprenom" 
    placeholder="<?php echo $_SESSION['userPrenom'] ;?>" required />
            <span class="placeholder"> Entrez votre prénom </span>

    </label> 


    <label class="custom-field"> 
    <input class="form__input"  type="email" class="box-input" name="newemail" 
    placeholder="<?php echo $_SESSION['userEmail'] ;?>" required />
            <span class="placeholder "> Entrez votre email </span>

    </label> 
    <label class="custom-field"> 
    <input class="form__input"  type="text" class="box-input" name="newnumero" 
    placeholder="<?php echo $_SESSION['userNumero'] ;?>" required />
            <span class="placeholder "> Entrez votre numéro de téléphone </span>

    </label> 


    <label class="custom-field"> 
    <input class="form__input"  type="text" class="box-input" name="newadresse" 
    placeholder="<?php echo $_SESSION['userAdresse'] ;?>" required /><span class="placeholder"> Entrez votre adresse </span>

    </label> 


    <label class="custom-field"> 
    <input class="form__input"  type="password" class="box-input" name="newpassword" 
    placeholder="" required />
    <span class="placeholder"> Entrez un nouveau mot de passe </span>

    </label> 


    <label class="custom-field"> 
    <input class="form__input"  type="password" class="box-input" name="newpasswordrepeat" 
    placeholder="" required />  
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
</body>
</html>