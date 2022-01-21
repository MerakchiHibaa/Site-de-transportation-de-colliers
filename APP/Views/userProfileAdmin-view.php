


<?php
/* 
 include_once 'header.php'; */

 /* include_once './controllers/affichControl.php';
 include_once '../Simple-User-Management-System-with-PHP-MySQL-master/inc/header.php' ;
 
 include_once './helpers/session_helper.php';
 */


class userProfileAdmin_view {

    private $userController;
    private $affichController;

    public function __construct(){
       /*  $this->userController = new Users;
        $this->affichController = new affichControl; */

    }
    public function display($ID_user) { 

      echo'

      <!DOCTYPE html>
      <html lang="en" dir="ltr">
        <head>
          <meta charset="utf-8">
          <title>Profile d\'utilisateur</title>
          <link rel="stylesheet" href="../assetss/bootstrap.min.css">
          <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
          <link rel="stylesheet" href="../assetss/dataTables.bootstrap4.min.css">
          <link rel="stylesheet" href="../assetss/style.css">
        </head>
        <body>
      ' ;
       
      
      if (isset($_GET['action']) && $_GET['action'] == 'logout') {
        // Session::set('logout', '<div class="alert alert-success alert-dismissible mt-3" id="flash-msg">
        // <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        // <strong>Success !</strong> You are Logged Out Successfully !</div>');
       /*  Session::destroy(); */
      }
      
      
      
     
      
      
      
      /* $allUser = $_controller->selectAllUserData(); 
       */
      
      /*
      
      if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
        $updateUser = $users->updateUserByIdInfo($userid, $_POST);
      
      }
      if (isset($updateUser)) {
        echo $updateUser;
      }
       
       */
      
      
      
      
        echo'
       <div class="card ">
         <div class="card-header">
                <h3>User Profile <span class="float-right"> <a href="index.php" class="btn btn-primary">Back</a> </h3>
              </div>
              <div class="card-body">' ;
      
        
      include_once '../controllers/affichControl.php';
      
      
      $_controller = new affichControl();
          $getUinfo = $_controller->getUserInfoById($ID_user);
          if ($getUinfo) {
            foreach ($getUinfo as  $getUinfo) {
           echo'
      
      
                <div style="width:600px; margin:0px auto">
      
                <form class="" action="../controllers/Users.php" method="POST">
                    <div class="form-group">
                      <label for="name">Nom</label>
                      <input required type="text" name="nom" value="'. $getUinfo['nom'].'" class="form-control">
                    </div>
      
                    <div class="form-group">
                      <label for="name">Prénom</label>
                      <input required type="text" name="prenom" value="'. $getUinfo['prenom'].'" class="form-control">
                    </div>
      
                    <div class="form-group">
                      <label for="adresse">Adresse</label>
                      <input required type="text" name="adresse" value="'. $getUinfo['adresse'].'" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input required type="email" id="email" name="email" value="'. $getUinfo['email'].'" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="mobile">Numéro</label>
                      <input required type="text" id="numero" name="numero" value="'. $getUinfo['numero'].'" class="form-control">
                    </div>
      
                   
      
                    
      
                    
                      <div class="form-group">
                        <label for="sel1">Le type de l\'utilisateur</label>
                        <select class="form-control" name="type"  id="type"> ' ;
      
                       
      
                      if($getUinfo['type'] == 'client'){
                        echo'
                        <option onselect="clientClient()" id="optclientclient" value="1" selected=\'selected\'>Client</option>
                        <option onselect="clientTrans()" id="optclienttrans" value="2">Transporteur</option>
                        </select>  
                     
                      ' ;
      
      
      
      include_once '../controllers/affichControl.php';
      
      
      $_controller = new affichControl();
      $ARRAY = $_controller->affichWilaya(); 
      
      echo "<select class='form-control' id='selectClient' style='display:none;' multiple name='wilaya[]'>" ;
      
      foreach($ARRAY as $row){
        $ID_wilaya =  $row['ID_wilaya'];                     
        $roww = $row['wilaya'];
        echo ("<option value='$roww' > $roww </option> ");
        
                     
      
         
       }
      
     echo'
      
      </select >' ;
      
      
                    
                    }elseif($getUinfo['type'] == 'transporteur'){
                      echo'
                        <option onselect="transClient()" id="opttransclient"  value="3">Client</option>
                        <option id="opttranstrans" onselect="transtrans()" value="4" selected=\'selected\'>Transporteur</option>
                     
      
                        </select>
      ' ;
                        
                       
      
                        include_once '../controllers/affichControl.php';
                        
                        
                        $_controller = new affichControl();
                        $ARRAY = $_controller->affichWilaya(); 
                       echo' 
                        <select class=\'form-control\' id=\'selectTransporteur\' multiple name=\'wilaya[]\'>;';
                         
                        
                        foreach($ARRAY as $row){
                          $ID_wilaya =  $row['ID_wilaya'];                     
                          $roww = $row['wilaya'];
      /*                     echo ("<option value='$roww' > $roww </option> ");
       */                    
                          if( $_controller->userWilayaSelected($getUinfo['ID_user'] , $ID_wilaya)){
                            echo ("<option value='$roww' selected='selected' > $roww </option> ");
                          }  
                          else {
                            echo ("<option value='$roww' > $roww </option> ");
      
                          }                  
                        
                           
                         }
                        
                        
                     echo'   </select>
                        
                      ';
                    } 
                    echo'  </div>
                    </div>
      
                    <input type="hidden" name="type" value="updateuseradmin">
      
                  <input type="hidden" name="updateiduser" value="'. $getUinfo['ID_user'].' ">
               
      
      
      
                    <div class="form-group">
                      <button type="submit" name="updateuseradmin" class="btn btn-success">Modifier</button>
                      <a class="btn btn-primary" href="changepass?id='. $getUinfo['ID_user'].'">Changer le mot de passe</a>
                    </div>
                   
      
      
                </form>
              </div>';
      
             } }else{

              echo '<h1> couldnt get the page  </h1>' ;
      
             /*  header('Location:index.php'); */
            } echo'
      
      
      
            </div>
          </div>
          <script> 
          const selectTransporteur = document.getElementById(\'selectTransporteur\') ; 
          const selectClient = document.getElementById(\'selectClient\') ; 
          const opttranstrans =  document.getElementById(\'opttranstrans\') ; 
          const opttransclient =  document.getElementById(\'opttransclient\') ; 
          const optclienttrans =  document.getElementById(\'optclienttrans\') ; 
          const optclientclient =  document.getElementById(\'optclientclient\') ;
          
          function transClient(){
      
          } 
          function transtrans(){
      
          } 
          function clientClient() {
      
          }
          function clientTrans() {
            
          }
      
          if (selectTransporteur != null ){ 
            console.log(\'inside boucle\') ;
      
            if (opttransclient != null )  {
      
           
          opttransclient.onselect = () => {
            console.log(\'inside select 1\') ;
            selectTransporteur.setAttribute("style", "display: none");
      
      
          }  }
          if ( optclientclient !=null) {
      
         
          optclientclient.onselect = () => {
            console.log(\'inside select 2\') ;
      
            selectTransporteur.setAttribute("style", "display: none");
      
      
          } }
        }
      
      
          function hideclient(self) {
            if (self.value == "1" || self.value == "4" ) {
          console.log(\' selected client\');
          console.log(self.value);
      
           selectTransporteur.setAttribute("style", "display: none");
       
        }else{
          console.log(self.value);
      
           console.log(\' selected transporteur\');
           selectTransporteur.setAttribute("style", "display: block");
      
      
        }
      
      
          }
      
      
      
      
        </script>
      
      
       
      
        
      ' ; 


    }}

