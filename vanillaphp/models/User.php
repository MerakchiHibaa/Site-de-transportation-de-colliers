<?php
require_once '../libraries/Database.php';

class User {

    private $db;

    public function __construct(){
        $this->db = new Database;
        
    }

    
    //Find user by email or username
    public function findUserByEmail($email){
       
        $this->db->query('SELECT * FROM users WHERE email = :email LIMIT 1');
        $this->db->bind(':email', $email);
/*         $result =$this->db->resultSet() ;
 */        /* if($result) {
            foreach($result as $value) {

            }
        } */

        $user = $this->db->single();
        if($this->db->rowCount() > 0){
      
            $user =json_decode(json_encode($user), true) ; 
            return $user;

        } else {
            return false ;
        }
        /* 


        
        //Check row
        if($this->db->rowCount() > 0){ //user is client
            $typeuser = 'client' ;
/*             echo"<h1>content of row->user->email ".$row->user->email." and row->user->id".$row->user->ID_client." inside find by </h1>" ; 
      /*   $row =  ['user' => $user , 'typeuser' => $typeuser] ; 
 $row = new stdClass();

 $row->user =  $user ;
 $user = json_decode(json_encode($user), true) ;
 echo"<h1>content of row-> ".$user['email'] ." and user".$user['password']." inside find by </h1>" ; 


 $row->typeuser =  $user['type'] ;
/*    $row =json_encode(['user' => $user , 'typeuser' => $typeuser]); 
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

            /*    $row =json_encode(['user' => $user , 'typeuser' => $typeuser]); 
            $row =json_encode($row , true ) ;
                return $row;
            }
            else{
            return false;
            }
        } */
    }


  

 public function AnnonceChangeEtat($data) {
    $this->db->query("UPDATE annonces SET
  
    etat=:etat
    WHERE ID_annonce = :ID_annonce");

    $this->db->bind(':ID_annonce', $data['ID_annonce']);
    $this->db->bind(':etat', $data['etat']);

    if ($this->db->execute())  {
       echo "<script>location.href='index.php';</script>";
       $_SESSION['msg'] = '<div class="alert alert-success alert-dismissible mt-3" id="flash-msg">
       <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
       <strong>Success !</strong> User account Diactivated Successfully !</div>';

     }else{
       echo "<script>location.href='index.php';</script>";
       $_SESSION['msg'] =  '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
 <strong>Error !</strong> Data not Diactivated !</div>';

         return $_SESSION['msg'] ;
     }

 }
    
    public function addAnnonce($data) {
        $this->db->query('INSERT INTO annonces (pointdepart,  pointarrivee, id_user, moyentransport, poidsmin, poidsmax, volumemin , volumemax , typetransport , latitudedepart , longitudedepart, latitudearrivee, longitudearrivee , creationDate ) 
        VALUES (:pointdepart, :pointarrivee, :id_user, :moyentransport, :poidsmin, :poidsmax, :volumemin , :volumemax , :typetransport, :latitudedepart, :longitudedepart, :latitudearrivee, :longitudearrivee , now())');
       

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
        $this->db->query('INSERT INTO users (nom, prenom, numero, email, adresse, type, password) 
        VALUES (:nom, :prenom, :numero , :email, :adresse, :type, :password)');
        //Bind values
        $this->db->bind(':nom', $data['nom']);
        $this->db->bind(':prenom', $data['prenom']);
        $this->db->bind(':numero', $data['numero']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':adresse', $data['adresse']);
        $this->db->bind(':type', 'client');

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

    $this->db->query('UPDATE `users` SET `nom`=:nom,`prenom`=:prenom,
    `email`=:email,`numero`=:numero,`adresse`=:adresse,`password`=:password, `photo`=:photo where ID_user = '.$_SESSION['userID'].';' ) ;
    
   
/* 
    if ($_SESSION['userType'] == "client") {
          
        $this->db->query('UPDATE `clients` SET `nom`=:nom,`prenom`=:prenom,
        `email`=:email,`numero`=:numero,`adresse`=:adresse,`password`=:password, `photo`=:photo where ID_client = '.$_SESSION['userID'].';' ) ;
        
       
    

    }
    else  {
        $this->db->query('UPDATE `transporteur` SET `nom`=:nom,`prenom`=:prenom,
        `email`=:email,`numero`=:numero,`adresse`=:adresse,`password`=:password, `photo`=:photo where ID_transporteur = '.$_SESSION['userID'].';' ) ;
        

    } */

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




public function insertDemandes($ID_annonce , $ID_client , $ID_transporteur) {
try {
    $this->db->query('INSERT INTO demandes (ID_annonce, ID_client, ID_transporteur, date) 
    VALUES (:ID_annonce, :ID_client, :ID_transporteur , :date)'); 
     $this->db->bind(':ID_annonce', $ID_annonce);
     $this->db->bind(':ID_client', $ID_client);
     $this->db->bind(':ID_transporteur', $ID_transporteur);
     $this->db->bind(':date',  date('Y-m-d H:i:s') );
     $this->db->execute() ;
    /*  session_start() ;  */

     $_SESSION['msg'] = '<div class="alert alert-success">
                       <strong>Success!</strong> Votre demande a été envoyée.
                     </div>';
                     echo "<script> alert(' Votre demande a été envoyée. ') ;</script>" ;

}catch (Exception $e) {
     $_SESSION['msg'] = '<div class="alert alert-warning">
                       <strong>Warning!</strong> Vous avez déja répondu à cette annonce.
                     </div>' ;
                     echo "<script> alert(' Vous avez déja répondu à cette annonce.. ') ;</script>" ;


  }
}

public function getUnreadDemandes($ID_user) {
    $this->db->query("SELECT * FROM demandes where ID_client = '$ID_user' and status = 'unread'") ; 
    return $this->db->resultSet() ;


}

    public function registerTransporteur($data){
        $this->db->query('INSERT INTO users (nom, prenom, numero, email, adresse, type, password) 
        VALUES (:nom, :prenom, :numero , :email, :adresse, type, :password)');
        //Bind values
        
        $this->db->bind(':nom', $data['nom']);
        $this->db->bind(':prenom', $data['prenom']);
        $this->db->bind(':numero', $data['numero']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':adresse', $data['adresse']);
        $this->db->bind(':type', 'transporteur');

        $this->db->bind(':password', $data['password']);

        //Execute
        if($this->db->execute()){
            //find the user in the users table and then insert the ID in user_wilaya table
            $this->db->query('INSERT INTO user_wilaya (ID_User, ID_wilaya) 
            VALUES (:ID_User, :ID_wilaya)');
//faire une boucle pour chaque element du tableau de wilaya
           $this->db->bind(':ID_User', $data['nom']);
           $this->db->bind(':ID_wilaya', $data['wilaya']);
            return true;
        }else{
            return false;
        }
    }

    public function updateUserAdmin($ID_user , $data) {
        $sql = "UPDATE users SET
                nom = :nom,
                prenom = :prenom,
                email = :email,
                adresse = :adresse,
                type = :type ,
                numero = :numero,
                WHERE ID_user = :ID_user";
                $this->db->bind(':ID_user', $ID_user);

                $this->db->bind(':nom',  $data['nom']);
                $this->db->bind(':prenom',  $data['prenom']);
                $this->db->bind(':email', $data['email']);
                $this->db->bind(':numero',  $data['numero']);
                $this->db->bind(':type',  $data['type']);
                $this->db->bind(':adresse',  $data['adresse']);
              if ($this->db->execute()) {
                echo "<script>location.href='index.php';</script>";
                $msg ='<div class="alert alert-success alert-dismissible mt-3" id="flash-msg">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success !</strong> Wow, Your Information updated Successfully !</div>';
      return $msg ;
              }else{
                echo "<script>location.href='index.php';</script>";
                $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Error !</strong> Data not inserted !</div>';
      
      
              }
    }
    //Login user
    public function login($email, $password){
        $row = $this->findUserByEmail($email);
/* echo"<h1> this iis row".$row['password']."  after</h1>" ;
 *//*         if($row == false) return false;
 */     
if($row == false) return false;  
 $hashedPassword = $row['password'];


        


/*         $hashedPassword = $row['user']['password'];
 */        if(password_verify($password, $hashedPassword)){
   /*  echo"<h1> this iis inside password_verify  after</h1>";
    echo"<h1> this iis row".$row['password']."  after</h1>";
    echo"<h1> this iis row".$row['ID_user']."  after</h1>" ;
    echo"<h1> this iis row".$row['email']."  after</h1>"; */

            return $row;
        }else{
            return false;
        }
    }



    //changer statut par admin


    
public function userAttente($ID_user) {
    $this->db->query("UPDATE users SET
  
    statut='en attente'
    WHERE ID_user = :ID_user");

    $this->db->bind(':ID_user', $ID_user);
    if ($this->db->execute())  {
       echo "<script>location.href='index.php';</script>";
       $_SESSION['msg'] = '<div class="alert alert-success alert-dismissible mt-3" id="flash-msg">
       <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
       <strong>Success !</strong> User account Diactivated Successfully !</div>';

     }else{
       echo "<script>location.href='index.php';</script>";
       $_SESSION['msg'] =  '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
 <strong>Error !</strong> Data not Diactivated !</div>';

         return $_SESSION['msg'] ;
     }
}
 public function userTraitement($ID_user) {
    $this->db->query("UPDATE users SET
  
    statut='en cours de traitement'
    WHERE ID_user = :ID_user");

    $this->db->bind(':ID_user', $ID_user);
    if ($this->db->execute())  {
       echo "<script>location.href='index.php';</script>";
       $_SESSION['msg'] = '<div class="alert alert-success alert-dismissible mt-3" id="flash-msg">
       <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
       <strong>Success !</strong> User account Diactivated Successfully !</div>';

     }else{
       echo "<script>location.href='index.php';</script>";
       $_SESSION['msg'] =  '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
 <strong>Error !</strong> Data not Diactivated !</div>';

         return $_SESSION['msg'] ;
     }

 }

 public function userValider($ID_user) {
    $this->db->query("UPDATE users SET
  
    statut='valide'
    WHERE ID_user = :ID_user");

    $this->db->bind(':ID_user', $ID_user);
    if ($this->db->execute())  {
       echo "<script>location.href='index.php';</script>";
       $_SESSION['msg'] = '<div class="alert alert-success alert-dismissible mt-3" id="flash-msg">
       <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
       <strong>Success !</strong> User account Diactivated Successfully !</div>';

     }else{
       echo "<script>location.href='index.php';</script>";
       $_SESSION['msg'] =  '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
 <strong>Error !</strong> Data not Diactivated !</div>';

         return $_SESSION['msg'] ;
     }

 }

 public function userRefuser($ID_user) {
    $this->db->query("UPDATE users SET
  
    statut='refuse'
    WHERE ID_user = :ID_user");

    $this->db->bind(':ID_user', $ID_user);
    if ($this->db->execute())  {
       echo "<script>location.href='../adminProfile.php';</script>";
       $_SESSION['msg'] = '<div class="alert alert-success alert-dismissible mt-3" id="flash-msg">
       <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
       <strong>Success !</strong> User account Diactivated Successfully !</div>';
       return $_SESSION['msg'] ;
     }else{
       echo "<script>location.href='../adminProfile.php';</script>";
       $_SESSION['msg'] =  '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
 <strong>Error !</strong> Data not Diactivated !</div>';

         return $_SESSION['msg'] ;
     }

 }

 public function userCertifier($ID_user) {
    $this->db->query("UPDATE users SET
    statut='certifie'
    WHERE ID_user = :ID_user");

    $this->db->bind(':ID_user', $ID_user);
    if ($this->db->execute())  {
       echo "<script>location.href='index.php';</script>";
       $_SESSION['msg'] = '<div class="alert alert-success alert-dismissible mt-3" id="flash-msg">
       <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
       <strong>Success !</strong> User account Diactivated Successfully !</div>';

     }else{
       echo "<script>location.href='index.php';</script>";
       $_SESSION['msg'] =  '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
 <strong>Error !</strong> Data not Diactivated !</div>';

         return $_SESSION['msg'] ;
     }

 }




    //Reset Password
    public function resetPassword($newPwdHash, $tokenEmail){
        $this->db->query('UPDATE users SET password=:password WHERE email=:email');
        $this->db->bind(':password', $newPwdHash);
        $this->db->bind(':email', $tokenEmail);

        //Execute
        if($this->db->execute()){
            return true;
        }else{
            

            return false;
            }
        }
    }

