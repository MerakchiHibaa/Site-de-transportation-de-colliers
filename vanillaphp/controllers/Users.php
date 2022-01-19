<?php

    require_once '../models/User.php';
    require_once '../helpers/session_helper.php';
    include_once '../views/Accueil-view.php';
    include_once '../views/annonces-view.php';
    include_once '../views/addUser-view.php';
    include_once '../views/adminProfile-view.php';





    class Users {

        public $userModel;
        private $accueil ; 
        private $annonces ;
        private $addUser ; 
        private $adminProfile ; 
        
        public function __construct(){
            $this->userModel = new User;
            $this->accueil = new Accueil_view();
            $this->annonces = new Annonces_view();
            $this->addUser = new addUser_view() ;
            $this->adminProfile = new adminProfile_view() ;


            
        }
        public function setJustificatif() {
            if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['justificatif'])  )  {
                $data = [  
                    'nom' => trim($_POST['nom'] ) , //
                   'prenom' =>  trim($_POST['prenom'])  , //
                   'justificatif' =>  trim($_POST['justificatif'])  , //
                 ] ;
            }
            $this->userModel->setJustificatif($data) ;


        }
        
        public function afficherAdminProfile() {
            $this->adminProfile->display() ; 


        }

        public function afficherAddUser() {
            $this->addUser->display() ; 

        }
        public function afficherAnnonces() {
            $this->annonces->display() ; 

        }
        public function afficherAccueil() {
            $this->accueil->display() ; 

        }

        public function addNewUserByAdmin() {
            $this->userModel->addNewUserByAdmin() ;


        }

        public function sendDemandeCertifie() {
            if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['demande']) &&  isset($_POST['email']) )  {
                echo "<h1> insiiide sendDemandeCertifie </h1>";
                $data = [  
                   'nom' => trim($_POST['nom'] ) , //
                  'prenom' =>  trim($_POST['prenom'])  , //
                  'demande' =>  trim($_POST['demande'])  , //
                   'email' =>  trim($_POST['email'])  // client
                ] ;

            }
             $this->userModel->sendDemandeCertifie($data) ;
            redirect("../views/signup.php") ; 




        }


 
        public function getWilayaArr($ID_user) {
            return $this->userModel->getWilayaArr($ID_user) ;
    
        }
        public function getWilayaDep($ID_user) {
            return $this->userModel->getWilayaDep($ID_user) ;
    
        }

        public function insertDemandes() {
            if (isset($_POST['ID_annonce']) && isset($_POST['ID_client']) && isset($_POST['ID_transporteur']) )  {
             echo "<h1> insiiide inisertDemandes </h1>";
                $ID_annonce = (int) $_POST['ID_annonce']  ; //
                $ID_client = (int) $_POST['ID_client'] ; // client
                $ID_transporteur = (int) $_POST['ID_transporteur'] ; // transport
                $price = (float) $_POST['price'] ; //
                    
               
                $this->userModel->insertDemandes($ID_annonce, $ID_client ,$ID_transporteur , $price)  ;
                       redirect("../views/annonceDetail.php?id=$ID_annonce") ; 

                   

            }
        }

        public function setReport() {
            if (isset($_POST['reportText']) && isset($_POST['ID_trajet']) )  { 
                $ID_trajet = (int) $_POST['ID_trajet']  ; //
                $reportText =  trim($_POST['reportText'] ) ;

                $this->userModel->setReport($ID_trajet, $reportText )  ;
                redirect("../views/profile.php") ;




            }


        }
public function setParameters(){
    if (isset($_POST['p']) && isset($_POST['q']) && isset($_POST['ID_annonce'])  )  {
           $p = (float) $_POST['p']  ; //
           $q = (float) $_POST['q'] ; // 
           $ID_annonce = (int)  $_POST['ID_annonce'] ;
               
          
           $this->userModel->setParameters($ID_annonce, $p, $q )  ;
                  redirect("../views/adminProfile.php") ; 

              


}

}
        public function setTrajet() {
            if (isset($_POST['ID_annonce']) && isset($_POST['ID_client']) && isset($_POST['ID_transporteur']) )  {
                echo "<h1> insiiide inisertDemandes </h1>";
                   $ID_annonce = (int) $_POST['ID_annonce']  ; //
                   $ID_client = (int) $_POST['ID_client'] ; // client
                   $ID_transporteur = (int) $_POST['ID_transporteur'] ; // transport
                       
                  
                   $this->userModel->setTrajet($ID_annonce, $ID_client ,$ID_transporteur)  ;
                          redirect("../annonceDetail.php?id=$ID_annonce") ; 
   
                      
   

        }
    }

      
      

        public function addAnnonce() {
            echo"<script> alert('addannonce function') ;</script>" ; 

            echo "<script> console.log('insiiiide addanonce') ;  </script>" ;
       /*      if (isset($_POST['addannonce'])) { */
                $data = [  //Init data
                    'id_user' => trim($_POST['id_user']) ,
                       'titreAnnonce' => trim($_POST['titreAnnonce']) ,   
                    'latitudedepart' => trim($_POST['latitudedepart']) ,
                    'longitudedepart' => trim($_POST['longitudedepart']) ,
                    'latitudearrivee' => trim($_POST['latitudearrivee']) ,
                    'longitudearrivee' => trim($_POST['longitudearrivee']) ,
                    'typetransport' => trim($_POST['typetransport']) ,
                    'volumemin' => trim($_POST['volumemin'])  ,
                    'volumemax' => trim($_POST['volumemax']) ,
                    'poidsmin' => trim($_POST['poidsmin'])  ,
                    'poidsmax' => trim($_POST['poidsmax']) ,
                    'moyentransport' => trim($_POST['moyentransport']),
                    'pointarrivee' => trim($_POST['pointarrivee']),
                    'pointdepart' => trim($_POST['pointdepart']),

                ];
                if(floatval($_POST['volumemin']) > floatval($_POST['volumemax']) ) {
                    flash("addAnnonce", "le volume minimale ne peut pas etre plus grand que le volume maximal"); 
                    echo"<h1>le volume minimale ne peut pas etre plus grand que le volume maximal <h1>" ;
                    echo"<script> alert(' vol min > vol max') ;</script>" ; 

                    redirect("../views/annonces.php");


                }
                if(floatval($_POST['poidsmin']) > floatval($_POST['poidsmax']) ) {
                    flash("addAnnonce", "le poids minimale ne peut pas etre plus grand que le poids maximal"); 
                    echo"<h1>le poids minimale ne peut pas etre plus grand que le poids maximal <h1>" ;
                    echo"<script> alert('poids min > poids max ') ;</script>" ; 

                    redirect("../views/annonces.php");

                }
                $result = $this->userModel->addAnnonce($data) ; 
                $output = '';
        if($result)
        {
            foreach($result as $row)
            {
                
                $output .= '
                <div class="col-sm-4 col-lg-3 col-md-3">
                    <div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:450px;">

                    <p align="center"><strong><a href="#">'.$row['ID_User'].'</a></strong></p>
                     </div>
    
                </div>
                ';
            }
        }
        
        else
        {
            $output = '<h3>No Data Found</h3>';
        }
        echo $output;
     
    
/*                      redirect("../annonces.php"); 
 */               /*  }else{
    echo"<script> alert('il ya une errerur') ;</script>" ; 

                    die("Il y'a une erreur...");

                }  */
            

        }

         
    public function getCodeWilaya($wilaya) {
        return $this->userModel->getCodeWilaya($wilaya) ;
  
  
  
    }
  
    public function annonceSuggestion($depart , $arrivee) {
      return $this->userModel->annonceSuggestion($depart , $arrivee) ; 
       
  
  
   }
  

        public function updateProfile () {
            session_start();

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            if (isset($_POST['updateProfile'])) {
                $data = [  //Init data
                    'newnom' => trim($_POST['newnom']) ,
                    'newprenom' => trim($_POST['newprenom'])  ,
                    'newadresse' => trim($_POST['newadresse']) ,
                    'newemail' => trim($_POST['newemail']) ,
                    'newWilayaDep' => trim($_POST['newnumero']) ,
                    'newpassword' => trim($_POST['newpassword']),
                    'newpasswordrepeat' => trim($_POST['newpasswordrepeat'])  ,
                    'newphoto' => $_FILES['newprofileImage']['name'] ,
                    'newWilayaDep' => $_POST['newWilayaDep'] , 
                    'newWilayaArr' => $_POST['newWilayaArr'] , 


                ];

                if(empty($_POST['newnom'])){
                 $data['newnom'] = $_SESSION['userNom'] ;

                }
                if(empty($_POST['newprenom'])){
                $data['newprenom'] =  $_SESSION['userPrenom'] ; 

                }
                if(empty($_POST['newadresse'])){
                  $data['newadresse'] =  $_SESSION['userAdresse'] ; 

                }
                if(empty($_POST['newemail'])){
                  $data['newemail'] =  $_SESSION['userEmail'] ; 

                }
                if(empty($_POST['newnumero'])){
                   $data['newnumero'] = $_SESSION['userNumero'] ;

                }
                /* if(empty($_POST['newWilayaDep'])){
                    $data['newWilayaDep'] = $_SESSION['userWilayaDep'] ;
 
                 } */
               
                
                if(!empty($_POST['newpassword']) AND empty($_POST['newpasswordrepeat']) ){ 
                    echo"<h1> Veuillez confirmer votre mot de passe <h1>" ;
                    redirect("../views/profile.php");
                }
                if(empty($_POST['newpassword'])){
                    $data['newpassword'] = $_SESSION['userPassword'] ;
                }
 
                if(empty($_POST['newpasswordrepeat'])){
                   $data['newpasswordrepeat'] = $_SESSION['userPassword'] ;

                }
                if(empty($_FILES['newprofileImage']['name'])){
                    $data['newphoto'] = $_SESSION['userPhoto'] ;

                }

                
               
                echo"<h1> data email  ". $data['newemail'] ."  after  <h1>" ;


                if(strlen($data['newpassword']) < 6){
                 flash("register", "Choisissez un mot de passe plus long"); 
                echo"<h1> Choisissez un mot de passe plus long<h1>" ;
                 redirect("../views/profile.php"); 
                } else if($data['newpassword'] !== $data['newpasswordrepeat']){
                 flash("register", "les mots de passe sont différents"); 
                echo"<h1> Choisissez un mot de passe plus long<h1>" ;

               /*  redirect("../profile.php");    */
            }
                       
            echo"<h1>je vais appeler le model  <h1>" ;

            if( $this->userModel->updateProfile($data))  {
                echo"<h1> UPDATEED <h1>" ;
                

                redirect("../views/profile.php");
            }else{
                die("Il y'a une erreur...");
            } 

        }  

        }
        
        public function register(){
            $typeuser = '' ;
            //Process form
            
            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if( (empty($_POST["transporteur"]) || empty($_POST['wilaya']) || empty($_POST['wilayaA'])  ) ) { 

                if(!empty($_POST["transporteur"] )) {
                    flash("register", "Si vovus voulez etre un transporteur, veuillez remplir les wilayas s'il vous plait");

                }
                else { 
                echo("cheeeeckkkked") ;
                $typeuser ='client' ;
                $data = [  //Init data
                    'nom' => trim($_POST['nom']),
                    'prenom' => trim($_POST['prenom']),
                    'adresse' => trim($_POST['adresse']),
                    'email' => trim($_POST['email']),
                    'numero' => trim($_POST['numero']),
                    'password' => trim($_POST['password']),
                    'passwordrepeat' => trim($_POST['passwordrepeat'])
                ];
            }

              }
              else {   //Init data
                $typeuser ='transporteur' ;
                
                $data = [
                    'nom' => trim($_POST['nom']),
                    'prenom' => trim($_POST['prenom']),
                    'adresse' => trim($_POST['adresse']),
                    'email' => trim($_POST['email']),
                    'numero' => trim($_POST['numero']),
                    'transporteur' => trim($_POST['transporteur']),
                    //erreur
                    'wilaya' => $_POST['wilaya'],
                    'wilayaA' => $_POST['wilayaA'],
                    'password' => trim($_POST['password']),
                    'passwordrepeat' => trim($_POST['passwordrepeat'])
                ];
                
            

              }
           
/*                 $query = "INSERT into `clients` (nom, prenom, email, numero, adresse, password)
                VALUES ('$nom' , '$prenom' , '$email' , '$numero' ,  '$adresse' ,   '".hash('sha256', $password)."')";
            
            $res = mysqli_query($conn, $query);
             */
                
            
            //Validate inputs
           /*  if(empty($data['nom']) || empty($data['usersEmail']) || empty($data['usersUid']) || 
            empty($data['usersPwd']) || empty($data['pwdRepeat'])){
                flash("register", "Please fill out all inputs");
                redirect("../signup.php");
            } */

           /*  if(!preg_match("/^[a-zA-Z0-9]*$/", $data['usersUid'])){
                flash("register", "Invalid username");
                redirect("../signup.php");
            } */

            if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
                flash("register", "Email invalide");
                redirect("../views/signup.php");
            }

            if(strlen($data['password']) < 6){
                flash("register", "Choisissez un mot de passe plus long");
                redirect("../views/signup.php");
            } else if($data['password'] !== $data['passwordrepeat']){
                flash("register", "les mots de passe sont différents");
                redirect("../views/signup.php");
            }

            //User with the same email or password already exists
            if($this->userModel->findUserByEmail($data['email'])){
                flash("register", "Cet email est déja utilisé");
                redirect("../views/signup.php");
            }

            //Passed all validation checks.
            //Now going to hash password
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

            //Register User



            if($typeuser == 'client') {
                if($this->userModel->registerClient($data)){
                    redirect("../views/signup.php");
                }else{
                    die("Il y'a une erreur...");
                }

            }
            else {
                if($this->userModel->registerTransporteur($data)){ //return the id of the user
                    if(!empty($_POST["certifie"] )) {
                        redirect("../views/certifie.php?nom=".$_POST['nom']."&prenom=".$_POST['prenom']);
                    
                    }
/*                     redirect("../signup.php");
 */                }else{
                    die("Il y'a une erreur...");
                }

            } 
            
        }
        public function loginAdmin() {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //Init data
            $data=[
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password'])
            ];
    
            if(empty($data['email']) || empty($data['password'])){
                flash("login", "Please fill out all inputs");
                echo '<h1>veuillez remplir tous les champs</h1>' ; 
                header("location: ../views/loginAdmin.php");
                exit();
            } 
    
            //Check for user/email
            if($this->userModel->findAdminByEmail($data['email'])){
              $loggedAdmin = $this->userModel->loginAdmin($data['email'], $data['password']);
                if($loggedAdmin){
                    //Create session
                    $this->createAdminSession($loggedAdmin);
                    echo "<script> alert('after createadminsession'); </script>";

                                       echo"<footer> inside createUserSession</footer>" ;
                                       redirect("../views/adminProfile.php");

    
                }else{
                    flash("login", "Password Incorrect");
                    echo "<script> alert('Password Incorrect'); </script>";
                    redirect("../views/loginAdmin.php");
                }
            }else{
    /*             echo"<footer> outside finduserbyemail</footer>" ;
     */                    echo "<script> alert('no admin found'); </script>";

                 flash("login", "No admin found");
                redirect("../views/loginAdmin.php"); 
            }

        }

    public function login(){
        //Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        //Init data
        $data=[
            'email' => trim($_POST['email']),
            'password' => trim($_POST['password'])
        ];

        if(empty($data['email']) || empty($data['password'])){
            flash("login", "Please fill out all inputs");
            header("location: ../views/signup.php");
            exit();
        } 

        //Check for user/email
        if($this->userModel->findUserByEmail($data['email'])){
/*             echo"<footer> inside finduserbyemail</footer>" ;
 */            //User Found
            $loggedInUser = $this->userModel->login($data['email'], $data['password']);
            if($loggedInUser){
                //Create session
                $this->createUserSession($loggedInUser);
/*                                    echo"<footer> inside createUserSession</footer>" ;
 */
            }else{
                flash("login", "Password Incorrect");
                redirect("../views/signup.php");
            }
        }else{
/*             echo"<footer> outside finduserbyemail</footer>" ;
 */
             flash("login", "No user found");
            redirect("../views/signup.php"); 
        }
    }
    

public function createAdminSession($admin) {
    session_start() ; 

    $_SESSION['adminID'] = $admin['ID_admin'];
    $_SESSION['adminUsername'] = $admin['username'];
    $_SESSION['adminEmail'] = $admin['email'];
    redirect("../views/adminProfile.php");

}
    
   
    public function createUserSession($user){

        session_start() ; 

        $_SESSION['userID'] = $user['ID_user'];
        $_SESSION['userType'] = $user['type'];
        $_SESSION['userEmail'] = $user['email'];
        $_SESSION['userNom'] = $user['nom'];
        $_SESSION['userPrenom'] = $user['prenom'];
        $_SESSION['userAdresse'] = $user['adresse'];
        $_SESSION['userNumero'] = $user['numero'];
        $_SESSION['userPassword'] = $user['password'];
        $_SESSION['userPhoto'] = $user['photo'];
        $_SESSION['userNote'] = $user['note'];
        $_SESSION['userViewersNumber'] = $user['viewersNumber'];

        if($user['type'] =='transporteur') {
            $_SESSION['userCertifie'] = $user['certifie'];
            $_SESSION['userStatut'] = $user['statut'];
            $_SESSION['userDemande'] = $user['demande'];

        }


        $_SESSION['userWilayaDep'] = $this->getWilayaDep($user['ID_user']) ; 
        $_SESSION['userWilayaArr'] = $this->getWilayaArr($user['ID_user']) ; 


         $_SESSION['msg'] ='' ;



        if ($user['type'] == 'transporteur') {

            $_SESSION['userStatut'] = $user['statut'];
            redirect("../views/profile.php");

        }


/*         redirect("../profile.php");
 */

        /* if ($user['typeuser'] == 'client') {

            $_SESSION['userID'] = $user['user']['ID_user'];
            $_SESSION['userType'] = $user['typeuser'];
            $_SESSION['userEmail'] = $user['user']['email'];
            $_SESSION['userNom'] = $user['user']['nom'];
            $_SESSION['userPrenom'] = $user['user']['prenom'];
            $_SESSION['userAdresse'] = $user['user']['adresse'];
            $_SESSION['userNumero'] = $user['user']['numero'];
            $_SESSION['userPassword'] = $user['user']['password'];
            $_SESSION['userPhoto'] = $user['user']['photo'];


            
            redirect("../signup.php");
            
        }
        else { 
            $_SESSION['userID'] =  $user['user']['ID_user'] ;
            $_SESSION['userEmail'] =  $user['user']['email'];
            redirect("../signup.php");

        } */
      
    }

   
    public function logout(){
        unset($_SESSION['userID']);
        unset($_SESSION['userEmail']);
        session_destroy();
        redirect("../views/signup.php");
    }

    public function updateUserAdmin() {
        if (!empty($_POST['wilaya'])){ 
        $data = [
            'nom' => trim($_POST['nom']),
            'prenom' => trim($_POST['prenom']),
            'adresse' => trim($_POST['adresse']),
            'email' => trim($_POST['email']),
            'numero' => trim($_POST['numero']),
            'type' => trim($_POST['type']),
            'wilaya' => trim($_POST['wilaya'])

            /* 'password' => trim($_POST['password']),
            'passwordrepeat' => trim($_POST['passwordrepeat']) */
        ];
        $wilaya = $data['wilaya'];

    } else {
        $data = [
            'nom' => trim($_POST['nom']),
            'prenom' => trim($_POST['prenom']),
            'adresse' => trim($_POST['adresse']),
            'email' => trim($_POST['email']),
            'numero' => trim($_POST['numero']),
            'type' => trim($_POST['type']),
        ] ;

    }

            $nom = $data['nom'];
            $prenom = $data['prenom'];
            $adresse = $data['adresse'];
            $email = $data['email'];
            $numero = $data['numero'];
            $type = $data['type'];

            $ID_user = $_POST['updateiduser'] ;
      
            if ($nom == "" || $prenom == "" ||  $adresse == ""|| $email == "" || $type == ""  || $numero == "" ||$wilaya = ""  ) {
              $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Error !</strong> Input Fields must not be Empty !</div>';
                return $msg;
              
              }elseif (filter_var($numero,FILTER_SANITIZE_NUMBER_INT) == FALSE) {
                $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Error !</strong> Enter only Number Characters for Mobile number field !</div>';
                  return $msg;
      
      
            }elseif (filter_var($email, FILTER_VALIDATE_EMAIL === FALSE)) {
              $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Error !</strong> Invalid email address !</div>';
                return $msg;
            }else{
      
              return $this->userModel->updateUserAdmin($ID_user, $data) ;
      
      
            }
      
      
          
          
    }

  
    public function AnnonceChangeEtat() {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (!empty($_POST['selectetat'])  ) {
            $etat ="invalide" ; 

if ($_POST['selectetat'] == '1') {
    $etat ="invalide" ; 
} else if($_POST['selectetat'] == '2') {
    $etat ="Valide" ; 

}
            $data = [ 
                'ID_annonce' => trim($_POST['ID_annonce']) ,
                'etat' => $etat ] ; 

            return $this->userModel->AnnonceChangeEtat($data ) ;

        
        }
        else {
            echo "<h1> this iddnt woork !! </h1>" ;
            
        }

    }
   
   
    public function sendRate() {
        echo"<script> alert('Rate') ;  </script>" ;
/*         !empty($_POST['star'])  && 
 */        if(!empty($_POST['user'])  && !empty($_POST['trajet']) ) {
            $rate = $_POST['star'];
            $user = $_POST['user'];
            $trajet = $_POST['trajet'];
             $this->userModel->sendRate($rate, $user , $trajet) ;
             redirect("../views/profile.php") ;




        }
        

    }


    public function userChangeStatut(){
       $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (!empty($_POST['selectstatut'])  ) {
            $ID_user = trim($_POST['ID_user']) ;
            $etat = trim($_POST['selectstatut']) ;

        if($etat == '1') {
          return $this->userModel->userAttente( $ID_user) ;

        }
        if($etat == '2') {
          
          return $this->userModel->userTraitement( $ID_user) ;

        }
        if($etat == '3') {
          return $this->userModel->userValider( $ID_user) ;

          
        }

        if($etat == '4') {
          return $this->userModel->userRefuser($ID_user) ;   
        }
        if($etat == '5') {
            return $this->userModel->userCertifier($ID_user) ;   
          }
      }

      redirect('../views/adminProfile.php');


      
    }


}

/* 
if($result)
{
    foreach($result as $row)
    {
        $info = $this->userModel->getUserInfoById($row['ID_User'] ) ; 
        if($info) {
            foreach($info as $value) {

        $output .= '
        <div class="col-sm-4 col-lg-3 col-md-3">
            <div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:450px;">

            <p align="center"><strong><a href="#">'. $value['nom'] .'</a></strong></p>
            <p align="center"><strong><a href="#">'. $value['prenom'] .'</a></strong></p>
            <p align="center"><strong><a href="#">'. $value['numero'] .'</a></strong></p>
            <p align="center"><strong><a href="#">'. $value['email'] .'</a></strong></p>
            <p align="center"><strong><a href="#">'. $value['type'] .'</a></strong></p>
            <p align="center"><strong><a href="#">'. $value['certifie'] .'</a></strong></p>



             </div>

        </div>
        ';
    }
}
    }
} */

    $init = new Users;

       
     if(isset($_POST["ajaxAnnonce"]))
    {
    
        if(isset($_POST["ajaxAnnonce"]))
        {
            echo"<script> alert('addannonce function') ;</script>" ; 

            echo "<script> console.log('insiiiide addanonce') ;  </script>" ;
       /*      if (isset($_POST['addannonce'])) { */
                $data = [  //Init data
                    'id_user' => trim($_POST['id_user']) ,
                       'titreAnnonce' => trim($_POST['titreAnnonce']) ,   
                    'latitudedepart' => trim($_POST['latitudedepart']) ,
                    'longitudedepart' => trim($_POST['longitudedepart']) ,
                    'latitudearrivee' => trim($_POST['latitudearrivee']) ,
                    'longitudearrivee' => trim($_POST['longitudearrivee']) ,
                    'typetransport' => trim($_POST['typetransport']) ,
                    'volumemin' => trim($_POST['volumemin'])  ,
                    'volumemax' => trim($_POST['volumemax']) ,
                    'poidsmin' => trim($_POST['poidsmin'])  ,
                    'poidsmax' => trim($_POST['poidsmax']) ,
                    'moyentransport' => trim($_POST['moyentransport']),
                    'pointarrivee' => trim($_POST['pointarrivee']),
                    'pointdepart' => trim($_POST['pointdepart']),

                ];
                if(floatval($_POST['volumemin']) > floatval($_POST['volumemax']) ) {
                    flash("addAnnonce", "le volume minimale ne peut pas etre plus grand que le volume maximal"); 
                    echo"<h1>le volume minimale ne peut pas etre plus grand que le volume maximal <h1>" ;
                    echo"<script> alert(' vol min > vol max') ;</script>" ; 

                    redirect("../views/annonces.php");


                }
                if(floatval($_POST['poidsmin']) > floatval($_POST['poidsmax']) ) {
                    flash("addAnnonce", "le poids minimale ne peut pas etre plus grand que le poids maximal"); 
                    echo"<h1>le poids minimale ne peut pas etre plus grand que le poids maximal <h1>" ;
                    echo"<script> alert('poids min > poids max ') ;</script>" ; 

                    redirect("../views/annonces.php");

                }
                $result = $init->userModel->addAnnonce($data) ; 
                $output = '';




                
        /* if($result)
        {
            foreach($result as $row)
            {
                $output .= '
                <div class="col-sm-4 col-lg-3 col-md-3">
                    <div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:450px;">

                    <p align="center"><strong><a href="#">'. $row['ID_User'] .'</a></strong></p>
                     </div>
    
                </div>
                ';
            }
        } */
        if($result)
        {
            foreach($result as $row)
            {
                $info = $init->userModel->getUserInfoById($row['ID_User'] ) ; 
                if($info) {
                    foreach($info as $value) {
                        $nom = $value['nom']  ;
                        $prenom = $value['prenom']  ;
                        $numero = $value['numero']  ;
                        $email = $value['email']  ;
                        $type = $value['type']  ;


                   
                $output .= '
                <div class="col-sm-4 col-lg-3 col-md-3">
                    <div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:450px;">
        
                    <p align="center"><strong><a href="#">'.$nom .'</a></strong></p>
                    <p align="center"><strong><a href="#">'. $prenom.'</a></strong></p>
                    <p align="center"><strong><a href="#">'. $numero .'</a></strong></p>
                    <p align="center"><strong><a href="#">'. $email .'</a></strong></p>
                    <p align="center"><strong><a href="#">'. $type .'</a></strong></p>
        
        
        
                     </div>
        
                </div>
                ';
            }
        }
           
            }
        }
        
        else
        {
            $output = '<h3>No Data Found</h3>';
        }
        echo $output;
        }
    }
         
    



    //Ensure that user is sending a post request
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['type'])){
        echo"<script> alert('POST request') ;</script>" ; 
        switch($_POST['type']){
    
            case 'register':
                $init->register();
                break;
            case 'login':
                $init->login();
                break;
            case 'updateProfile':
                $init-> updateProfile() ;
                break ;
            /* case 'addannonce': 
                echo"<script> alert('addannonce') ;</script>" ;  */

              /*   $init-> addAnnonce();  */
            case 'rate' : 
                $init->sendRate(); 
            case 'updateuseradmin':
                $init->updateUserAdmin() ;  
            case 'changestatut': 
/*                 $ID_user = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['changestatut']);
 */                $init->userChangeStatut() ; 
            case 'changeetat': 
                $init->AnnonceChangeEtat() ;
            case 'notif' : 
                $init->insertDemandes() ;  
            case 'trajet' : 
                $init->setTrajet() ; 
            case 'report' : 
                $init->setReport() ; 
            case 'demandeCertifie' : 
                $init->sendDemandeCertifie() ;
            case 'sendjustificatif' : 
                $init->setJustificatif() ;
            case 'loginAdmin' : 
                $init->loginAdmin() ;
            case 'setParameters' : 
                $init->setParameters() ;

/*             default : redirect("../index.php");
 */        }
        
    }else if ($_SERVER['REQUEST_METHOD'] == 'GET'){
        /* switch($_GET['q']){
            //we add cases for get here
            case 'logout':
                $init->logout();
                break;
             default:
            redirect("../routers/signup.php"); 
        } */
        
    }


  /*   
if (isset($_GET['remove'])) {
  $remove = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['remove']);
  $removeUser = $users->deleteUserById($remove);
}

if (isset($removeUser)) {
  echo $removeUser;
}
if (isset($_GET['deactive'])) {
  $deactive = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['deactive']);
  $deactiveId = $users->userDeactiveByAdmin($deactive);
} */
    