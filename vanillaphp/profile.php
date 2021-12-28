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
    <link rel="stylesheet" href="./style.css">
<!--     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 -->
 
    <title>Profile</title>
</head>
<body>

<div class="form-container"> 
<div class="row-profile"> 
<div class="col-4 offset-md-4 form-div"> 

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
<img src="./usersImages/standard.jpg" onclick="triggerClick()" id="profileDisplay" alt="" width="50%" style=" display: block;
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
     <input type="file" name="newprofileImage" onchange="displayImage(this)" id="profileImage" class="form_control"  style="
            display: none;
 ">
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

  <script src="./index.js"> </script>
</body>
</html>