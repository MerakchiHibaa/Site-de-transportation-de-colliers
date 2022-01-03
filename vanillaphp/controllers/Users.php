<?php

    require_once '../models/User.php';
    require_once '../helpers/session_helper.php';

    class Users {

        private $userModel;
        
        public function __construct(){
            $this->userModel = new User;
        }

        public function addAnnonce() {
            if (isset($_POST['addannonce'])) {
                $data = [  //Init data

                          
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
                    redirect("../annonces.php");


                }
                if(floatval($_POST['poidsmin']) > floatval($_POST['poidsmax']) ) {
                    flash("addAnnonce", "le poids minimale ne peut pas etre plus grand que le poids maximal"); 
                    echo"<h1>le poids minimale ne peut pas etre plus grand que le poids maximal <h1>" ;
                    redirect("../annonces.php");

                }

                if( $this->userModel->addAnnonce($data))  {
                    echo"<h1> annonce ajoutée <h1>" ;
                    
    
                  /*   redirect("../profile.php"); */
                }else{
                    die("Il y'a une erreur...");
                } 
            }

        }

        public function updateProfile () {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            if (isset($_POST['updateProfile'])) {
                $data = [  //Init data
                    'newnom' => trim($_POST['newnom']) ,
                    'newprenom' => trim($_POST['newprenom'])  ,
                    'newadresse' => trim($_POST['newadresse']) ,
                    'newemail' => trim($_POST['newemail']) ,
                    'newnumero' => trim($_POST['newnumero']) ,
                    'newpassword' => trim($_POST['newpassword']),
                    'newpasswordrepeat' => trim($_POST['newpasswordrepeat'])  ,
                    'newphoto' => $_FILES['newprofileImage']['name'] 

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
               
                
                if(!empty($_POST['newpassword']) AND empty($_POST['newpasswordrepeat']) ){ 
                    echo"<h1> Veuillez confirmer votre mot de passe <h1>" ;
                    redirect("../profile.php");
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
                 redirect("../profile.php"); 
                } else if($data['newpassword'] !== $data['newpasswordrepeat']){
                 flash("register", "les mots de passe sont différents"); 
                echo"<h1> Choisissez un mot de passe plus long<h1>" ;

               /*  redirect("../profile.php");    */
            }
                       
            echo"<h1>je vais appeler le model  <h1>" ;

            if( $this->userModel->updateProfile($data))  {
                echo"<h1> UPDATEED <h1>" ;
                

                redirect("../profile.php");
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

            if( (empty($_POST["transporteur"]) || empty($_POST['wilaya']) ) ) { 

                if(!empty($_POST["transporteur"] )) {
                    flash("register", "Si vovus voulez etre un transporteur, veuillez remplir les wilayas sil vous plait");

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
                    'wilaya' => trim($_POST['wilaya']),
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
                redirect("../signup.php");
            }

            if(strlen($data['password']) < 6){
                flash("register", "Choisissez un mot de passe plus long");
                redirect("../signup.php");
            } else if($data['password'] !== $data['passwordrepeat']){
                flash("register", "les mots de passe sont différents");
                redirect("../signup.php");
            }

            //User with the same email or password already exists
            if($this->userModel->findUserByEmail($data['email'])){
                flash("register", "Cet email est déja utilisé");
                redirect("../signup.php");
            }

            //Passed all validation checks.
            //Now going to hash password
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

            //Register User



            if($typeuser == 'client') {
                if($this->userModel->registerClient($data)){
                    redirect("../signup.php");
                }else{
                    die("Il y'a une erreur...");
                }

            }
            else {
                if($this->userModel->registerTransporteur($data)){
                    if(!empty($_POST["certifie"] )) {
                        redirect("../certifie.php");
                    
                    }
                    redirect("../signup.php");
                }else{
                    die("Il y'a une erreur...");
                }

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
            header("location: ../login.php");
            exit();
        }

        //Check for user/email
        if($this->userModel->findUserByEmail($data['email'])){
            //User Found
            $loggedInUser = $this->userModel->login($data['email'], $data['password']);
            if($loggedInUser){
                //Create session
                $this->createUserSession($loggedInUser);
            }else{
                flash("login", "Password Incorrect");
                redirect("../login.php");
            }
        }else{
            flash("login", "No user found");
            redirect("../login.php");
        }
    }

    public function createUserSession($user){
        if ($user['typeuser'] == 'client') {

            $_SESSION['userID'] = $user['user']['ID_client'];
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
            $_SESSION['usersId'] =  $user['user']['ID_transporteur'] ;
            $_SESSION['email'] =  $user['user']['email'];
            redirect("../signup.php");

        }
      
    }

    public function sendRate() {
        

    }

    public function logout(){
        unset($_SESSION['userID']);
        unset($_SESSION['userEmail']);
        session_destroy();
        redirect("../index.php");
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


      
    }


}

    $init = new Users;


    



    //Ensure that user is sending a post request
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
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
            case 'addannonce': 
                $init-> addAnnonce(); 
            case 'rate' : 
                $init-> sendRate(); 
            case 'updateuseradmin':
                $init->updateUserAdmin() ;  
            case 'changestatut': 
/*                 $ID_user = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['changestatut']);
 */                $init->userChangeStatut() ; 
            case 'changeetat': 
                $init-> AnnonceChangeEtat() ;

/*             default : redirect("../index.php");
 */        }
        
    }else{
       /* switch($_GET['q']){
            //we add cases for get here
            case 'logout':
                $init->logout();
                break;
             default:
            redirect("../index.php"); 
        }*/
    }

    