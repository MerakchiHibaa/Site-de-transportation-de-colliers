<?php

    require_once '../models/User.php';
    require_once '../helpers/session_helper.php';

    class Users {

        private $userModel;
        
        public function __construct(){
            $this->userModel = new User;
        }

        function affichWilaya() {
            $this->userModel->affichWilaya() ; 
                }

        public function register(){
            $typeuser = '' ;
            //Process form
            
            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if( (empty($_POST["transporteur"]) && empty($_POST['wilaya']) ) ) { 
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
              else {   //Init data
                $typeuser ='transporteur' ;
                $data = [
                    'nom' => trim($_POST['nom']),
                    'prenom' => trim($_POST['prenom']),
                    'adresse' => trim($_POST['adresse']),
                    'email' => trim($_POST['email']),
                    'numero' => trim($_POST['numero']),
                    'transporteur' => trim($_POST['transporteur']),
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
                    redirect("../login.php");
                }else{
                    die("Il y'a une erreur...");
                }

            }
            else {
                if($this->userModel->registerTransporteur($data)){
                    redirect("../login.php");
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
            'name/email' => trim($_POST['name/email']),
            'usersPwd' => trim($_POST['usersPwd'])
        ];

        if(empty($data['name/email']) || empty($data['usersPwd'])){
            flash("login", "Please fill out all inputs");
            header("location: ../login.php");
            exit();
        }

        //Check for user/email
        if($this->userModel->findUserByEmailOrUsername($data['name/email'], $data['name/email'])){
            //User Found
            $loggedInUser = $this->userModel->login($data['name/email'], $data['usersPwd']);
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
        $_SESSION['usersId'] = $user->usersId;
        $_SESSION['email'] = $user->email;
        redirect("../index.php");
    }

    public function logout(){
        unset($_SESSION['usersId']);
        unset($_SESSION['usersName']);
        unset($_SESSION['usersEmail']);
        session_destroy();
        redirect("../index.php");
    }
}

    $init = new Users;


     function invoke()  
    {  
         if (isset($_GET['signup']))  
         {  
              // no special book is requested, we'll show a list of all available books  
              $books = $this->userModel->affichWilaya();  
/*               include '../signup /booklist.php'; 
 */         } 
         else 
         { 
              // show the requested book 
              /* $book = $this->model->getBook($_GET['book']); 
              include 'view/viewbook.php';   */
         }  
    }  



    //Ensure that user is sending a post request
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        switch($_POST['type']){
    
            case 'register':
                $init->register();
                break;
            case 'login':
                $init->login();
                break;
            default:
            redirect("../index.php");
        }
        
    }else{
        switch($_GET['q']){
            case 'logout':
                $init->logout();
                break;
            default:
            redirect("../index.php");
        }
    }

    