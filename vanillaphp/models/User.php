<?php
require_once '../libraries/Database.php';

class User {

    private $db;

    public function __construct(){
        $this->db = new Database;
        
    }

    
    //Find user by email or username
    public function findUserByEmail($email){
       
        $typeuser='' ;
        $this->db->query('SELECT * FROM clients WHERE email = :email');
        $this->db->bind(':email', $email);

        $user = $this->db->single();
      
        


        
        //Check row
        if($this->db->rowCount() > 0){ //user is client
            $typeuser = 'client' ;
/*             echo"<h1>content of row->user->email ".$row->user->email." and row->user->id".$row->user->ID_client." inside find by </h1>" ; 
 */      /*   $row =  ['user' => $user , 'typeuser' => $typeuser] ; */
 $row = new stdClass();

 $row->user =  $user ;
 $user = json_decode(json_encode($user), true) ;
 echo"<h1>content of row-> ".$user['email'] ." and user".$user['password']." inside find by </h1>" ; 


 $row->typeuser =  $typeuser ;
/*    $row =json_encode(['user' => $user , 'typeuser' => $typeuser]); */
 $row =json_decode(json_encode($row), true) ; 
 echo"<h1>content of row->user->email ".$row['typeuser'] ." and row->user->id".$row['user']['password']." inside find by </h1>" ; 

            return $row;
        }else{
            $this->db->query('SELECT * FROM transporteur WHERE email = :email');
            $this->db->bind(':email', $email);
            $row = $this->db->single();
            if($this->db->rowCount() > 0){ //user is transporteur
                $typeuser = 'transporteur' ;
                $row = new stdClass();

                $row->user =  $user ;
                $user = json_decode(json_encode($user), true) ;

                $row->typeuser =  $typeuser ;
                $row =json_decode(json_encode($row), true) ; 

            /*    $row =json_encode(['user' => $user , 'typeuser' => $typeuser]); */
            $row =json_encode($row , true ) ;
                return $row;
            }
            else{
            return false;
            }
        }
    }

    
    public function addAnnonce($data) {
        $this->db->query('INSERT INTO annonces (pointdepart,  pointarrivee, id_user, moyentransport, poidsmin, poidsmax, volumemin , volumemax , typetransport , latitudedepart , longitudedepart, latitudearrivee, longitudearrivee) 
        VALUES (:pointdepart, :pointarrivee, :id_user, :moyentransport, :poidsmin, :poidsmax, :volumemin , :volumemax , :typetransport, :latitudedepart, :longitudedepart, :latitudearrivee, :longitudearrivee)');
       

        $this->db->bind(':id_user', $_SESSION['userID']);
        $this->db->bind(':latitudedepart', $data['latitudedepart']);
        $this->db->bind(':longitudedepart', $data['longitudedepart']);
        $this->db->bind(':latitudearrivee', $data['latitudearrivee']);
        $this->db->bind(':longitudearrivee', $data['longitudearrivee']);
        $this->db->bind(':typetransport', $data['typetransport']);
        $this->db->bind(':volumemin', $data['volumemin']);
        $this->db->bind(':volumemax', $data['volumemax']);
        $this->db->bind(':poidsmin', $data['poidsmin']);
        $this->db->bind(':poidsmax', $data['poidsmax']);
        $this->db->bind(':moyentransport', $data['moyentransport']);
        $this->db->bind(':pointarrivee', $data['pointarrivee']);
        $this->db->bind(':pointdepart', $data['pointdepart']);




       

         //Bind values
      
        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
        
    }

    //Register client
    public function registerClient($data){
        $this->db->query('INSERT INTO clients (nom, prenom, numero, email, adresse, password) 
        VALUES (:nom, :prenom, :numero , :email, :adresse, :password)');
        //Bind values
        $this->db->bind(':nom', $data['nom']);
        $this->db->bind(':prenom', $data['prenom']);
        $this->db->bind(':numero', $data['numero']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':adresse', $data['adresse']);
        $this->db->bind(':password', $data['password']);

        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
//register transporteur


public function updateProfile($data) {
    GLOBAL $msg ;
    $msg = '' ;
    GLOBAL $css_class;
    $css_class = '';

    echo"<h1>data nom". $data['newnom']." after <h1>" ;
    echo"<h1>data prenom". $data['newprenom']." after <h1>" ;
    echo"<h1>data adresse". $data['newadresse']." after <h1>" ;
    echo"<h1>data numero". $data['newnumero']." after <h1>" ;
    echo"<h1>data email". $data['newemail']." after <h1>" ;
    echo"<h1>data password". $data['newpassword']."  after <h1>" ;
    echo"<h1>data repeat". $data['newpasswordrepeat']."  after <h1>" ;
    echo"<h1>data photo". $data['newphoto']." after <h1>" ;



    
    //Bind values

       if (isset($_POST['updateProfile'])) {
       /*  $newnom = $_POST['newnom'] ;
        $newprenom = $_POST['newprenom'] ;
        $newemail = $_POST['newemail'] ;
        $newadresse = $_POST['newadresse'] ;
        $newnumero = $_POST['newnumero'] ; */
        $newprofileImage = time() . '_' . $_FILES['newprofileImage']['name'] ;
      /*   $newpassword = $_POST['newpassword'] ; */

/*         $newrepeatpassword = $_POST['newpasswordrepeat'] ;
 */        $target ="../usersImages/" . $newprofileImage ;
        //Bind values
       /*  echo"<h1>data nom". $data['newnom']." after <h1>" ;
        echo"<h1>data prenom". $data['newprenom']." after <h1>" ;
        echo"<h1>data adresse". $data['newadresse']." after <h1>" ;
        echo"<h1>data numero". $data['newnumero']." after <h1>" ;
        echo"<h1>data email". $data['newemail']." after <h1>" ;
        echo"<h1>data password". $data['newpassword']."  after <h1>" ;
        echo"<h1>data repeat". $data['newpasswordrepeat']."  after <h1>" ;
        echo"<h1>data photo". $data['newphoto']." after <h1>" ;
    
     */
   
    echo"<h1>data photo". $data['newphoto']." after <h1>" ;

    if ($_SESSION['userType'] == "client") {
          
        $this->db->query('UPDATE `clients` SET `nom`=:nom,`prenom`=:prenom,
        `email`=:email,`numero`=:numero,`adresse`=:adresse,`password`=:password, `photo`=:photo where ID_client = '.$_SESSION['userID'].';' ) ;
        
       
    

    }
    else  {
        $this->db->query('UPDATE `transporteur` SET `nom`=:nom,`prenom`=:prenom,
        `email`=:email,`numero`=:numero,`adresse`=:adresse,`password`=:password, `photo`=:photo where ID_transporteur = '.$_SESSION['userID'].';' ) ;
        

    }

         $this->db->bind(':nom', $data['newnom']);
        $this->db->bind(':prenom', $data['newprenom']);
        $this->db->bind(':numero', $data['newnumero']);
        $this->db->bind(':email', $data['newemail']);
        $this->db->bind(':adresse', $data['newadresse']);
        $this->db->bind(':password', $data['newpassword']);
        $this->db->bind(':photo',  $data['newphoto'] );

          

       if( move_uploaded_file($_FILES['newprofileImage']['tmp_name'] , $target) ) {
        echo"<h1> photoooooooooooo $newprofileImage afteeeeer <h1>" ;

        $msg ="Image téléchargée avec succés !" ; 
        $css_class = "alert-success" ; 

       }
       
       else {
           $msg ="OOPS, il y'avait un problème avec le téléchargement de la photo..." ; 
           $css_class = "alert-danger" ; 
            
       }
       if(!$this->db->execute()){
        return false;
      } 




      
        $_SESSION['userEmail'] = $data['newemail'];
        $_SESSION['userNom'] =  $data['newnom'] ;;
        $_SESSION['userPrenom'] = $data['newprenom'];
        $_SESSION['userAdresse'] =  $data['newadresse'];
        $_SESSION['userNumero'] = $data['newnumero'];
        $_SESSION['userPassword'] = $data['newpassword'];
        $_SESSION['userPhoto'] =  $data['newphoto'];


    return true ;
  

         //Execute
         



    }


}

    public function registerTransporteur($data){
        $this->db->query('INSERT INTO transporteur (nom, prenom, numero, email, adresse, password) 
        VALUES (:nom, :prenom, :numero , :email, :adresse, :password)');
        //Bind values
        
        $this->db->bind(':nom', $data['nom']);
        $this->db->bind(':prenom', $data['prenom']);
        $this->db->bind(':numero', $data['numero']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':adresse', $data['adresse']);
        $this->db->bind(':password', $data['password']);

        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    //Login user
    public function login($email, $password){
        $row = $this->findUserByEmail($email);

        if($row == false) return false;

        $hashedPassword = $row['user']['password'];
        if(password_verify($password, $hashedPassword)){
            return $row;
        }else{
            return false;
        }
    }

    //Reset Password
    public function resetPassword($newPwdHash, $tokenEmail){
        $this->db->query('UPDATE clients SET password=:password WHERE email=:email');
        $this->db->bind(':password', $newPwdHash);
        $this->db->bind(':email', $tokenEmail);

        //Execute
        if($this->db->execute()){
            return true;
        }else{
            $this->db->query('UPDATE transporteur SET password=:password WHERE email=:email');
            $this->db->bind(':password', $newPwdHash);
            $this->db->bind(':email', $tokenEmail);
            if($this->db->execute()){
                return true;
            }else{

            return false;
            }
        }
    }
}