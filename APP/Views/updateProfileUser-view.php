
<?php



class updateProfileUser_view {

    private $userController;
    private $affichController;

    public function __construct(){
       /*  $this->userController = new Users;
        $this->affichController = new affichControl; */

    }
    public function display() {

/*        session_start() ; 
 */ 
 
      include_once '../controllers/affichControl.php';
      
      
      $_controller = new affichControl();
      
      if (!isset($_SESSION["userID"]) or !isset($_SESSION["userEmail"])) {
      /*    redirect("../login.php");
       */ 
      /*     header("Location: ./signup.php");
       */ }
       echo'
      <!DOCTYPE html>
      <html lang="en">
      <head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" href="../css/signup.css" />
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      
          <title>Update Profile</title>
      
      
      </head>
      <body>
      
      
      <div class="container" >
            <div class="forms-container">
              <div class="signin-signup">' ;
              echo' <div style="width:600px; margin:0px auto">';
         if(isset($_SESSION['msg']) && isset($_SESSION['status'])) {
            echo'  <div class="alert alert-'.$_SESSION['status'].'" role="alert">'.$_SESSION['msg'].
'                </div>
</div>
' ; 
unset($_SESSION['status']);
unset($_SESSION['msg']);
         }
         echo'
      <form class="sign-in-form" action="../controllers/Users.php" method="POST" enctype="multipart/form-data">
      <input  type="hidden" name="type" value="updateProfile">

        
            <h1 class="text-center" style="text-align: center; color: #5995FD" >Modifier votre profile</h1> <!-- class="text-center" style="text-align: center;" -->
           <div > <!-- class="form-group" -->' ;
           
echo'
               <div class="profile-img">
      <img src="../usersImages/'. $_SESSION['userPhoto'] .'" onclick="triggerClick()" id="profileDisplay" alt="" width="10%" style=" display: block;
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
           
          
            <!-- <label class="">  -->
            <input  class="input-field"  type="text" style="margin: 6px 0 ;"name="newnom" 
          placeholder="'.$_SESSION['userNom'] .'"  />
                  <!-- <span class="placeholder ">Entrez un nouveau nom</span> -->
      
         <!--  </label>  -->
      
        <!--   <label class=""> label -->
            <input  class="input-field"   type="text"  name="newprenom" 
          placeholder="'.$_SESSION['userPrenom'] .'"  />
                 <!--  <span class="placeholder"> Entrez votre pr??nom </span>
      
          </label> 
       -->
      
         <!--  <label class="">  -->
          <input  class="input-field"   type="email" style="margin: 6px 0 ;" name="newemail" 
          placeholder="'.$_SESSION['userEmail'] .'"  />
                  <!-- <span class="placeholder "> Entrez votre email </span>
      
          </label> 
          <label class="">  -->
          <input  class="input-field"   type="text" style="margin: 6px 0 ;" name="newnumero" 
          placeholder="'. $_SESSION['userNumero'] .'"  />
                 <!--  <span class="placeholder "> Entrez votre num??ro de t??l??phone </span>
      
          </label> 
      
      
          <label class="">  -->
          <input  class="input-field"   type="text" style="margin: 6px 0 ;"name="newadresse" 
          placeholder="'. $_SESSION['userAdresse'] .'"  /><!-- <span class="placeholder"> Entrez votre adresse </span>
      
          </label> 
      
      
          <label class="">  -->
          <input  class="input-field"   type="password" style="margin: 6px 0 ;"name="newpassword" 
          placeholder="Entrez un nouveau mot de passe"  />
         <!--  <span class="placeholder"> Entrez un nouveau mot de passe </span>
      
          </label> 
       -->
      
         <!--  <label class="">  -->
          <input  class="input-field"   type="password" style="margin: 6px 0 ;"name="newpasswordrepeat" 
          placeholder="Confirmez votre mot de passe"  />' ;  
          
           
      include_once '../controllers/affichControl.php';
      
      
      $_controller = new affichControl();
      $ARRAY = $_controller->affichWilaya(); 
      echo "<div'>
       <select  class='form-select' style='margin:5px ;' size='2' multiple name='newWilayaDep[]'>" ;
       echo ("<option disabled > --- Chsoisissez les wilayas de d??part--- </option> ");
      
      foreach($ARRAY as $row){
        $wilaya = $row['wilaya'];
        $num = $row['numwilaya'] ;
        echo $wilaya ;
       echo ("<option value='$num' > $wilaya </option> ");
       }
      echo "</select>" ; 
      
      
      $ARRAY = $_controller->affichWilaya(); 
      echo "<select class='form-select' style='margin:10px;' size='2' multiple aria-label='les wilayas d'arrivee' name='newWilayaArr[]'>" ;
      echo ("<option disabled > ---Chsoisissez les wilayas d'arriv??e--- </option> ");
      foreach($ARRAY as $row){
        $wilaya = $row['wilaya'];
        $num = $row['numwilaya'] ;
        echo $wilaya ;
       echo ("<option value='$num' > $wilaya </option> ");
       }
      echo '</select>
      
      
          <input class="input-field" type="submit" name="" 
          value="Modifier" class="box-button" />
        
      
          </div>
          
        </form>
      
        </div>
        </div>
        <div class="panels-container">
              <div class="panel left-panel">
                <div class="content">
                <a href="../routers/profile.php" class="btn transparent" id="sign-up-btn">
               Retour
              </a>
                </div>
                <img src="../img/updateProfile.svg" class="image" alt="" />
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
        <script src="../js/index.js"> </script>
      
        </body>
      </html>' ;
    }
  }


