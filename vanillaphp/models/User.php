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


public function updateProfile() {
    GLOBAL $msg ;
    $msg = '' ;
    GLOBAL $css_class;
    $css_class = '';

   
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    if (isset($_POST['updateProfile'])) {
        $newnom = $_POST['newnom'] ;
        $newprenom = $_POST['newprenom'] ;
        $newemail = $_POST['newemail'] ;
        $newadresse = $_POST['newadresse'] ;
        $newnumero = $_POST['newnumero'] ;
        $newprofileImage = time() . '_' . $_FILES['newprofileImage']['name'] ;
        $newpassword = $_POST['newpassword'] ;
        $newrepeatpassword = $_POST['newpasswordrepeat'] ;
        $target ="./usersImages/" . $newprofileImage ;
        
       if( move_uploaded_file($_FILES['newprofileImage']['tmp_name'] , $target) ) {
        $msg ="Image téléchargée avec succés !" ; 
        $css_class = "alert-success" ; 
        
       }else {
           $msg ="OOPS, il y'avait un problème..." ; 
           $css_class = "alert-danger" ; 

       }



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