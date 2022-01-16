
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