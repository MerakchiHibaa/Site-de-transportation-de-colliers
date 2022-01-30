<?php

    require_once '../models/User.php';
/*     require_once '../helpers/session_helper.php';
 */    include_once '../views/Accueil-view.php';
    include_once '../views/annonces-view.php';
    include_once '../views/addUser-view.php';
    include_once '../views/adminProfile-view.php';
    include_once '../views/annonceDetail-view.php';
    include_once '../views/annonceDetailSug-view.php';

    include_once '../views/annonceDetailAdmin-view.php';
    include_once '../views/annoncesAdmin-view.php';
    include_once '../views/annonceResponders-view.php';
    include_once '../views/certifie-view.php';
    include_once '../views/contact-view.php';
    include_once '../views/contenuAdmin-view.php';
    include_once '../views/loginAdmin-view.php';
    include_once '../views/news-view.php';
    include_once '../views/newsAdmin-view.php';
    include_once '../views/newsDetail-view.php';
    include_once '../views/presentation-view.php';
    include_once '../views/profile-view.php';
    include_once '../views/rate-view.php';
    include_once '../views/report-view.php';
    include_once '../views/statistiques-view.php';
    include_once '../views/signalAdmin-view.php';
    include_once '../views/updateProfileUser-view.php';
    include_once '../views/userProfileAdmin-view.php';
    include_once '../views/reponseDemande-view.php';
    include_once '../views/updateAnnonce-view.php';
    include_once '../views/signup-view.php';
    /* session_start() ; */




    



   

    class Users {

        public $userModel;
        private $accueil ; 
        private $annonces ;
        private $addUser ; 
        private $adminProfile ; 
        private $annonceDetail ; 
        private $annonceDetailSug ;
        private $annonceDetailAdmin ; 
        private $annoncesAdmin ;
        private $annoncesResponders ; 
        private $certifie ; 
        private $contact ; 
        private $contenu ;
        private $loginAdmin ;
        private $newsAdmin ;
        private $news ; 
        private $newsDetail ; 
        private $profile ;
        private $rate ; 
        private $report ; 
        private $stats ; 
        private $signalAdmin  ;
        private $updateProfileUser  ;
        private $userProfileAdmin ;
        private $responseDemande ;
        private $signup ;
        private $updateAnnonceUser ; 

        



        

        
        
        public function __construct(){
            $this->userModel = new User;
            $this->accueil = new Accueil_view();
            $this->annonces = new Annonces_view();
            $this->addUser = new addUser_view() ;
            $this->adminProfile = new adminProfile_view() ;
            $this->annonceDetail = new annonceDetail_view() ;
            $this->annonceDetailAdmin = new annonceDetailAdmin_view() ;
            $this->annoncesAdmin = new annoncesAdmin_view() ;
            $this->annoncesResponders = new annoncesResponders_view() ; 
            $this->certifie = new certifie_view() ; 
            $this->contact = new contact_view() ; 
            $this->contenu = new contenuAdmin_view() ; 
            $this->loginAdmin = new loginAdmin_view() ; 
            $this->newsAdmin =  new newsAdmin_view() ; 
            $this->news = new news_view() ; 
            $this->newsDetail = new newsDetail_view() ; 
            $this->presentation = new presentation_view() ; 
            $this->profile = new profile_view() ; 
            $this->rate = new rate_view() ; 
            $this->report = new report_view() ; 
            $this->stats = new Statistiques_view() ; 
            $this->signalAdmin = new signalAdmin_view() ; 
            $this->updateProfileUser = new updateProfileUser_view() ; 
            $this->userProfileAdmin = new userProfileAdmin_view() ; 
            $this->responseDemande = new responseDemande_view() ; 
            $this->updateAnnonceUser = new updateAnnonce_view() ; 
            $this->annonceDetailSug = new annonceDetailSug_view() ; 

            

            
            $this->signup = new signup_view() ; 

    
            
            

            
            






            
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
        
        public function afficherUpdateAnnonce($ID_annonce ) {
            $this->updateAnnonceUser->display($ID_annonce ) ; 
        }

        
        public function afficherResponseDemande($ID_annonce , $ID_transporteur) {
           
            $this->responseDemande->display($ID_annonce , $ID_transporteur) ; 
          

        }
        
        public function afficheruserPofileAdmin($ID_user) {
            $this->userProfileAdmin->display($ID_user) ; 
        }
        public function afficherUpdateProfileUser() {
            $this->updateProfileUser->display() ; 
        }
        
        public function afficherSignalAdmin() {
            $this->signalAdmin->display() ; 
        }
        public function afficherStatistiques() {
            $this->stats->display() ; 
        }
        
        public function afficherReport($ID_trajet) {
            $this->report->display($ID_trajet) ; 
        }
        
        public function afficherRate( $ID_user , $ID_trajet) {
            $this->rate->display( $ID_user , $ID_trajet) ; 
        }
        
        public function afficherProfile() {
            $this->profile->display() ; 
        }
        public function afficherPresentation() {
            $this->presentation->display() ; 


        }
        public function afficherNewsDetail($ID_news) {
            $this->newsDetail->display($ID_news) ; 


        }
        public function afficherNewsAdmin() {
            $this->newsAdmin->display() ; 


        }
        
        public function afficherNews() {
            $this->news->display() ; 


        }
        
        public function afficherLoginAdmin() {
            $this->loginAdmin->display() ; 


        }
        
        public function afficherContenuAdmin() {
            $this->contenu->display() ; 


        }
  
    public function afficherSignup() {
        $this->signup->display() ; 
    }
    

        
        public function afficherContact() {
            $this->contact->display() ; 


        }
        public function afficherCertifie( $nom , $prenom ) {
            $this->certifie->display($nom , $prenom ) ; 


        }
        
        public function  afficherAnnonceDetailSug($ID_annonce)

        {
            $this->annonceDetailSug->display($ID_annonce) ; 

        }
        public function  afficherAnnonceResponders($ID_annonce)

        {
            $this->annoncesResponders->display($ID_annonce) ; 

        }
        public function afficherAnnoncesAdmin()
        {
            $this->annoncesAdmin->display() ; 

        }
        
        public function afficherAnnonceDetailAdmin($ID_annonce) {
            $this->annonceDetailAdmin->display($ID_annonce) ; 

        }
        public function afficherAnnonceDetail($ID_annonce) {
            $this->annonceDetail->display($ID_annonce) ; 

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
                $data = [  
                   'nom' => trim($_POST['nom'] ) , //
                  'prenom' =>  trim($_POST['prenom'])  , //
                  'demande' =>  trim($_POST['demande'])  , //
                   'email' =>  trim($_POST['email'])  // client
                ] ;

            }
             $this->userModel->sendDemandeCertifie($data) ;
             redirect("../routers/signup.php") ; 
 



        }


 
        public function getWilayaArr($ID_user) {
            return $this->userModel->getWilayaArr($ID_user) ;
    
        }
        public function getWilayaDep($ID_user) {
            return $this->userModel->getWilayaDep($ID_user) ;
    
        }

        public function insertDemandes() {
            if (isset($_POST['ID_annonce']) && isset($_POST['ID_client']) && isset($_POST['ID_transporteur']) )  {
                $ID_annonce = (int) $_POST['ID_annonce']  ; //
                $ID_client = (int) $_POST['ID_client'] ; // client
                $ID_transporteur = (int) $_POST['ID_transporteur'] ; // transport
                $price = (float) $_POST['price'] ; //
                    
               
                $this->userModel->insertDemandes($ID_annonce, $ID_client ,$ID_transporteur , $price)  ;
                       redirect("../routers/annonceDetail.php?id=$ID_annonce") ; 

                   

            }
        }
        

        public function insertDemandesTrans() {
         
                $ID_annonce = (int) $_POST['ID_annonce']  ; //
                $ID_client = (int) $_POST['ID_client'] ; // client
                $ID_transporteur = (int) $_POST['ID_transporteur'] ; // transport

               
                $this->userModel->insertDemandesTrans($ID_annonce, $ID_client ,$ID_transporteur  )  ;

                       redirect("../routers/accueil.php") ; 

                   

            
        }

        

        public function setReport() {
            if (isset($_POST['reportText']) && isset($_POST['ID_trajet']) )  { 
                $ID_trajet = (int) $_POST['ID_trajet']  ; //
                $reportText =  trim($_POST['reportText'] ) ;

                $this->userModel->setReport($ID_trajet, $reportText )  ;
                redirect("../routers/profile.php") ;




            }


        }
public function setParameters(){
    if (isset($_POST['p']) && isset($_POST['q']) && isset($_POST['ID_annonce'])  )  {
           $p = (float) $_POST['p']  ; //
           $q = (float) $_POST['q'] ; // 
           $ID_annonce = (int)  $_POST['ID_annonce'] ;
               
          
           $this->userModel->setParameters($ID_annonce, $p, $q )  ;
                  redirect("../routers/adminProfile.php") ; 

              


}

}
public function informRefuse($ID_annonce , $ID_transporteur ) {
    $this->userModel->informRefuse($ID_annonce, $ID_transporteur) ;

}
        public function setTrajet() {
           
/*                 echo "<h1> insiiide inisertDemandes </h1>";
 */                   $ID_annonce = (int) $_POST['ID_annonce']  ; //
                   $ID_client = (int) $_POST['ID_client'] ; // client
                   $ID_transporteur = (int) $_POST['ID_transporteur'] ; // transport
                       
                  
                   $this->userModel->setTrajet($ID_annonce, $ID_client ,$ID_transporteur)  ;


                         
   
                          if(isset($_POST['type']) &&  $_POST['type'] ="trajetTrans") {
                            $_SESSION['msg'] = "Le trajet a été confirmé" ; 
                            $_SESSION['status'] = "Success" ; 
                            $this->userModel->readNotificationTrans($ID_annonce, $ID_client, $ID_transporteur) ; 

                            redirect("../routers/annonceDetailSug.php?id=$ID_annonce") ; 

                          }
                          redirect("../routers/responseDemande.php?idt=$ID_transporteur&ida=$ID_annonce") ; 
                      
   

        
    }

      
      

        public function addAnnonce() {
           /*  echo"<script> alert('addannonce function') ;</script>" ; 

            echo "<script> console.log('insiiiide addanonce') ;  </script>" ;
     */   /*      if (isset($_POST['addannonce'])) { */
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
                    $_SESSION['msg'] = "Le volume minimale ne peut pas être plus grand que le volume maximal" ; 
                    $_SESSION['status'] = "warning" ; 
    
                   /*  flash("addAnnonce", "le volume minimale ne peut pas etre plus grand que le volume maximal"); 
                    echo"<h1>le volume minimale ne peut pas etre plus grand que le volume maximal <h1>" ;
                    echo"<script> alert(' vol min > vol max') ;</script>" ; 
 */
                    redirect("../routers/annonces.php");


                }
                if(floatval($_POST['poidsmin']) > floatval($_POST['poidsmax']) ) {
                    $_SESSION['msg'] = "Le poids minimale ne peut pas être plus grand que le poids maximal" ; 
                    $_SESSION['status'] = "warning" ; 
    
                    /* flash("addAnnonce", "le poids minimale ne peut pas etre plus grand que le poids maximal"); 
                    echo"<h1>le poids minimale ne peut pas etre plus grand que le poids maximal <h1>" ;
                    echo"<script> alert('poids min > poids max ') ;</script>" ; 
 */
                    redirect("../routers/annonces.php");

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

                    <p align="center"><strong><a href="#"> '.$row['ID_User'].'</a></strong></p>
                     </div>
    
                </div>
                ';
            }
        }
        
        else
        {
            $output = '<h3 style="margin: 2rem ; text-align: center ; font-weight: 700; text-decoration: none ; font-size:2rem ;> <i class="far fa-meh" style="margin: 0 1rem ;"> </i> Aucune Suggestion  </h3>';
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


   public function updateContactPage() {
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
        $data = [  //Init data
            'adresse' => trim($_POST['adresse']) ,
            'numero' => trim($_POST['numero'])  ,
            'contenu' => trim($_POST['contenu']) ,
            'image' => trim($_POST['image']) ,
            'email' => trim($_POST['email']) ,

        ];

    return $this->userModel->updateContactPage($data) ; 


     
}


public function updateAnnonceUser() {
    

    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
       
        if(floatval($_POST['volumeMin']) > floatval($_POST['volumeMax']) ) {
            $_SESSION['msg'] = "Le volume minimale ne peut pas être plus grand que le volume maximal" ; 
            $_SESSION['status'] = "warning" ; 

           /*  flash("addAnnonce", "le volume minimale ne peut pas etre plus grand que le volume maximal"); 
            echo"<h1>le volume minimale ne peut pas etre plus grand que le volume maximal <h1>" ;
            echo"<script> alert(' vol min > vol max') ;</script>" ; 
*/
            redirect("../routers/annonces.php");


        }
        if(floatval($_POST['poidsMin']) > floatval($_POST['poidsMax']) ) {
            $_SESSION['msg'] = "Le poids minimale ne peut pas être plus grand que le poids maximal" ; 
            $_SESSION['status'] = "warning" ; 

            /* flash("addAnnonce", "le poids minimale ne peut pas etre plus grand que le poids maximal"); 
            echo"<h1>le poids minimale ne peut pas etre plus grand que le poids maximal <h1>" ;
            echo"<script> alert('poids min > poids max ') ;</script>" ; 
*/
redirect("../routers/updateAnnonce?modifan=".$_POST['ID_annonce']);


        }
        $data = [  //Init data
            'titreAnnonce' => trim($_POST['titreAnnonce']) ,
            'pointDepart' => trim($_POST['pointDepart'])  ,
            'pointArrivee' => trim($_POST['pointArrivee']) ,
            'volumeMin' => trim($_POST['volumeMin']) ,
            'volumeMax' => trim($_POST['volumeMax']) ,
            'poidsMin' => trim($_POST['poidsMin']),
            'poidsMax' => trim($_POST['poidsMax'])  ,
            'typeTransport' => trim($_POST['typeTransport']) , 
            'moyenTransport' => trim($_POST['moyenTransport']) , 
            'ID_annonce' => (int) $_POST['ID_annonce'] , 
            


        ];

    
  if($this->userModel->updateAnnonceUser($data)) {
    $_SESSION['msg'] = "Votre annonce a été modifiée" ; 
    $_SESSION['status'] = "success" ; 
    redirect("../routers/updateAnnonce?modifan=".$data['ID_annonce']);


  }   
}


        public function updateProfile() {
            
        
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
                    'newnumero' => trim($_POST['newnumero']) , 



                ];

                if(empty($_FILES['newprofileImage']['name'])){
                    $data['newphoto'] = $_SESSION['userPhoto'] ;

                }

                else {

                    $newprofileImage = time() . '_' . $_FILES['newprofileImage']['name'] ;
                    $target ="../usersImages/" . $newprofileImage ;
                
                        if( move_uploaded_file($_FILES['newprofileImage']['tmp_name'] , $target) ) {
                        echo"<h1> photoooooooooooo $newprofileImage afteeeeer <h1>" ;
                        $data['newphoto'] = $newprofileImage ;

            
                       }
                       
                       else {
                        $data['newphoto'] ='1640725304_standard.jpg' ;

                
                       }
                }

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
                    $_SESSION['msg'] = "Veuillez confirmer votre mot de passe" ; 
                    $_SESSION['status'] = "warning" ; 
                       redirect("../routers/profile.php");
                 }
                if(empty($_POST['newpassword'])){
                    $data['newpassword'] = $_SESSION['userPassword'] ;
                }
 
                if(empty($_POST['newpasswordrepeat'])){
                   $data['newpasswordrepeat'] = $_SESSION['userPassword'] ;

                }
                

                
               
/*                 echo"<h1> data email  ". $data['newemail'] ."  after  <h1>" ;
 */

                if(strlen($data['newpassword']) < 6){

                    $_SESSION['msg'] = "Choisissez un mot de passe plus long" ; 
                    $_SESSION['status'] = "warning" ; 
     
                /*  flash("register", "Choisissez un mot de passe plus long"); 
                echo"<h1> Choisissez un mot de passe plus long<h1>" ; */
                  redirect("../routers/updateProfileUser.php"); 
                } else if($data['newpassword'] !== $data['newpasswordrepeat']){
                    $_SESSION['msg'] = "Les mots de passe sont différents" ; 
                    $_SESSION['status'] = "warning" ; 
     
                 /* flash("register", "les mots de passe sont différents"); 
                echo"<h1> Choisissez un mot de passe plus long<h1>" ;
 */
                 redirect("../routers/updateProfileUser.php");  
                
                }  
                
            
                       
           if($this->userModel->updateProfile($data))  {
            $_SESSION['msg'] = "Votre profile a été modifié avec succés!" ; 
            $_SESSION['status'] = "success" ; 
            redirect("../routers/updateProfileUser.php"); 



           }
           else {
            $_SESSION['msg'] = "OOPS! ERREUR" ; 
            $_SESSION['status'] = "danger" ; 
            redirect("../routers/updateProfileUser.php"); 



           }
                
           
            


          /*   if( )  {
                echo"<h1> UPDATEED <h1>" ;
                
$_SESSION['msg'] = "Votre profile a été modifié avec succés!" ; 
$_SESSION['status'] = "success" ; 


                 redirect("../routers/profile.php");
             }else{
                die("Il y'a une erreur UPDATE...");
            }  */

         

        }
        
        public function register(){

            
            $typeuser = '' ;
            //Process form
            
            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if( (empty($_POST["transporteur"]) || empty($_POST['wilaya']) || empty($_POST['wilayaA'])  ) ) { 

                if(!empty($_POST["transporteur"] )) {
                    $_SESSION['msg'] = "Si vovus voulez etre un transporteur, veuillez remplir les wilayas s'il vous plait" ; 
                    $_SESSION['status'] = "warning" ; 

                }
                else { 
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
                $_SESSION['msg'] = "Email invalide" ; 
                $_SESSION['status'] = "danger" ; 
                redirect("../routers/signup.php");
               

            }

            if(strlen($data['password']) < 6){
                $_SESSION['msg'] = "Choisissez un mot de passe plus long" ; 
                $_SESSION['status'] = "warning" ; 
               
                redirect("../routers/signup.php");
            } else if($data['password'] !== $data['passwordrepeat']){
                $_SESSION['msg'] = "Les mots de passe sont différents" ; 
                $_SESSION['status'] = "warning" ; 
                /* flash("register", "les mots de passe sont différents"); */
                redirect("../routers/signup.php");
            }

            //User with the same email or password already exists
            if($this->userModel->findUserByEmail($data['email'])){
                $_SESSION['msg'] = "Cet email est déja utilisé" ; 
                $_SESSION['status'] = "warning" ; 
/*                 flash("register", "Cet email est déja utilisé");
 */                redirect("../routers/signup.php");
            }

            //Passed all validation checks.
            //Now going to hash password
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

            //Register User



            if($typeuser == 'client') {
                if($this->userModel->registerClient($data)){
                    $_SESSION['msg'] = "Merci pour votre inscription!" ; 
                    $_SESSION['status'] = "success" ; 
                    redirect("../routers/signup.php");
                }else{
                    die("Il y'a une erreur...");
                }

            }
            else {
                if($this->userModel->registerTransporteur($data)){ //return the id of the user
                    $_SESSION['msg'] = "Merci pour votre inscription!" ; 
                    $_SESSION['status'] = "success" ; 
                    if(!empty($_POST["certifie"] )) {
                        redirect("../routers/certifie.php?nom=".$_POST['nom']."&prenom=".$_POST['prenom']);
                    
                    }
                    redirect("../routers/signup.php");
                }else{
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
                $_SESSION['msg'] = "Veuillez remplir tous les champs" ; 
                $_SESSION['status'] = "warning" ; 

               
                header("location: ../routers/loginAdmin.php");
                exit();
            } 
    
            //Check for user/email
            if($this->userModel->findAdminByEmail($data['email'])){
              $loggedAdmin = $this->userModel->loginAdmin($data['email'], $data['password']);
                if($loggedAdmin){
                    //Create session
                    $this->createAdminSession($loggedAdmin);
/*                     echo "<script> alert('after createadminsession'); </>";
 */
/*                                        echo"<footer> inside createUserSession</footer>" ;
 */                                       redirect("../routers/adminProfile.php");

    
                }else{
                    $_SESSION['msg'] = "Mot de passe incorrect!" ; 
                    $_SESSION['status'] = "warning" ; 

/*                     echo "<script> alert('Password Incorrect'); </script>";
 */                    redirect("../routers/loginAdmin.php");
                }
            }else{
                $_SESSION['msg'] = "Cet utilisateur n'existe pas" ; 
                $_SESSION['status'] = "warning" ; 


                redirect("../routers/loginAdmin.php"); 
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
            header("location: ../routers/signup.php");
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
                redirect("../routers/signup.php");
            }
        }else{
/*             echo"<footer> outside finduserbyemail</footer>" ;
 */
             flash("login", "No user found");
            redirect("../routers/signup.php"); 
        }
    }
    

public function createAdminSession($admin) {
/*     session_start() ; 
 */
    $_SESSION['adminID'] = $admin['ID_admin'];
    $_SESSION['adminUsername'] = $admin['username'];
    $_SESSION['adminEmail'] = $admin['email'];
    redirect("../routers/adminProfile.php");

}
    
   
    public function createUserSession($user){

/*         session_start() ; 
 */
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
            redirect("../routers/accueil.php");

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
       /*  redirect("../routers/signup.php"); */
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
/*             echo "<h1> this iddnt woork !! </h1>" ;
 */            
        }

    }
   
   
    public function sendRate() {
/*         echo"<script> alert('Rate') ;  </script>" ;
 *//*         !empty($_POST['star'])  && 
 */        if(!empty($_POST['user'])  && !empty($_POST['trajet']) ) {
            $rate = $_POST['star'];
            $user = $_POST['user'];
            $trajet = $_POST['trajet'];
             $this->userModel->sendRate($rate, $user , $trajet) ;
             redirect("../routers/profile.php") ;




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

/*       redirect('../routers/adminProfile.php');
 */

      
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
/*             echo"<script> alert('addannonce function') ;</script>" ; 
 */
/*             echo "<script> console.log('insiiiide addanonce') ;  </script>" ;
 */       /*      if (isset($_POST['addannonce'])) { */
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
                    $_SESSION['msg'] = "Le volume minimale ne peut pas être plus grand que le volume maximal" ; 
                    $_SESSION['status'] = "warning" ; 
    
                   
                    /* flash("addAnnonce", "le volume minimale ne peut pas être plus grand que le volume maximal"); 
                    echo"<h1>le volume minimale ne peut pas être plus grand que le volume maximal <h1>" ;
                    echo"<script> alert(' vol min > vol max') ;</script>" ; 
 */
                    redirect("../routers/annonces.php");


                }
                if(floatval($_POST['poidsmin']) > floatval($_POST['poidsmax']) ) {
                    $_SESSION['msg'] = "Le poids minimale ne peut pas être plus grand que le poids maximal" ; 
                    $_SESSION['status'] = "warning" ; 
    
                   
                    redirect("../routers/annonces.php");

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
                        $ID_user = $value['ID_user']  ;

                        $nom = $value['nom']  ;
                        $adresse = $value['adresse']  ;
                       
                        $prenom = $value['prenom']  ;
                        $numero = $value['numero']  ;
                        $email = $value['email']  ;
                        $type = $value['type']  ;
                        $image = $value['photo']  ;
                        $certifie = $value['certifie']  ;
                        $note = $value['note']  ;
                        $viewersNumber = $value['viewersNumber']  ;





                   
                $output .= '
                <style> 
                .our-team {
                    padding: 30px 0 40px;
                    margin-bottom: 30px;
                    background-color: #f7f5ec;
                    text-align: center;
                    overflow: hidden;
                    position: relative;
                  }
                  
                  .our-team .picture {
                    display: inline-block;
                    height: 130px;
                    width: 130px;
                    margin-bottom: 50px;
                    z-index: 1;
                    position: relative;
                  }
                  
                  .our-team .picture::before {
                    content: "";
                    width: 100%;
                    height: 0;
                    border-radius: 50%;
                    background-color: #1369ce;
                    position: absolute;
                    bottom: 135%;
                    right: 0;
                    left: 0;
                    opacity: 0.9;
                    transform: scale(3);
                    transition: all 0.3s linear 0s;
                  }
                  
                  .our-team:hover .picture::before {
                    height: 100%;
                  }
                  
                  .our-team .picture::after {
                    content: "";
                    width: 100%;
                    height: 100%;
                    border-radius: 50%;
                    background-color: #1369ce;
                    position: absolute;
                    top: 0;
                    left: 0;
                    z-index: -1;
                  }
                  
                  .our-team .picture img {
                    width: 100%;
                    height: auto;
                    border-radius: 50%;
                    transform: scale(1);
                    transition: all 0.9s ease 0s;
                  }
                  
                  .our-team:hover .picture img {
                    box-shadow: 0 0 0 14px #f7f5ec;
                    transform: scale(0.7);
                  }
                  
                  .our-team .title {
                    display: block;
                    font-size: 15px;
                    color: #4e5052;
                    text-transform: capitalize;
                  }
                  
                  .our-team .social {
                    width: 100%;
                    padding: 0;
                    margin: 0;
                    background-color: #1369ce;
                    position: absolute;
                    bottom: -100px;
                    left: 0;
                    transition: all 0.5s ease 0s;
                  }
                  
                  .our-team:hover .social {
                    bottom: 0;
                  }
                  
                  .our-team .social li {
                    display: inline-block;
                  }
                  
                  .our-team .social li a {
                    display: block;
                    padding: 10px;
                    font-size: 17px;
                    color: white;
                    transition: all 0.3s ease 0s;
                    text-decoration: none;
                  }
                  
                  .our-team .social li a:hover {
                    color: #1369ce;
                    background-color: #f7f5ec;
                  }
                  </style>


               
    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
      <div class="our-team">
        <div class="picture">
          <img class="img-fluid" src="../usersImages/'.$image .'">
        </div>
        <div class="team-content">
          <h3 class="name">'.$nom.' '.$prenom.'</h3>
          '; 
          if($certifie =="0") {
              echo'<h4 class="title" style ="color: orange ;"> Non Certifié.e </h4>' ;

          }
          else {
            echo'<h3 class="name" style ="color: green ;"> Certifié.e</h3>' ;
          }
          echo'
          <h3 class="name">'.$adresse.'</h3>
          <h3 class="name">'.$numero.'</h3>
          <h3 class="name">'.$email.'</h3>
        </div>

       
        <form method="POST" action="../controllers/Users.php" > 
        <input type="hidden" name="type" value ="notifTrans">
        <input type="hidden" name="ID_transporteur" value ="'.$ID_user.'">
        
            <input type="hidden" name="ID_annonce" value ="'.$_SESSION['ID_annonce'].'">
            

        
        
      
        <input type="hidden" name="ID_client" value ="'.$_SESSION['userID'].'">
        <input type="submit" value="Demander">  </input>

        



        </form>
          
        <ul class="social">

        </ul>
      </div>
    </div>
    
       
       
   
                ';
            }
        }
           
            }
        }
        
        else
        {
            $output = '<h3 style="margin: 2rem ; text-align: center ; font-weight: 700; text-decoration: none ; font-size:2rem ;>Aucune Suggestion ! </h3>';
        }
        echo $output;
        }
    }
         
    



    //Ensure that user is sending a post request
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['type'])){
        switch($_POST['type']){
    
            case 'register':
                $init->register();
                break;
            case 'login':
                $init->login();
                break;
            case 'updateProfile':
/*                 echo "<script> alert('insiiiiide updateProfile') ; </script>" ;
 */                $init->updateProfile() ;
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
              
            case 'notifTrans' : 
                $init->insertDemandesTrans() ;  
                case 'trajetTrans' : 
                    $init->setTrajet() ; 

                
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
            case 'contactPage' : 
                $init->updateContactPage() ;
            case 'updateAnnonceUser' : 
                
                    $init->updateAnnonceUser() ;

                
                

           default : 
           $init->afficherSignup() ;
        }
        
    }/* else if ($_SERVER['REQUEST_METHOD'] == 'GET'){
        /* switch($_GET['q']){
            //we add cases for get here
            case 'logout':
                $init->logout();
                break;
             default:
            redirect("../routers/signup.php"); 
        } 
        
    } */


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
    