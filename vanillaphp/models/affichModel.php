<?php
require_once 'libraries/Database.php';

class affichModel {

    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    


    public function affichWilaya() {

        $this->db->query("SELECT * FROM wilaya ") ;
        /*          return $this->db->rowCount() ; ;
*/
         return  $this->db->resultSet() ; 
          


       /*  while()
    
    
      
            foreach( $this->db->resultSet() as $rows) {
                $row = $rows['wilaya'];
                echo $row ;
               echo ("<option value='$row' selected> $row </option> ");
     
                 //echo $rows['wilaya'] ;
                 //echo "inside while" ;
              }
    
    }  */
}

function selectAnnonce($offset) {
    $this->db->query("SELECT * FROM annonces ") ;
  
      $annonces =  $this->db->resultSet() ; 
     $depart =  $annonces[$offset]['pointDepart'] ; 
    $arrive =  $annonces[$offset]['pointArrivee'] ; 



}

public function selectAllUserData() {
    $this->db->query("SELECT * FROM users ORDER BY ID_user DESC");
    return  $this->db->resultSet() ; 
    

    
}

public function selectAllAnnouncements() {
    $this->db->query("SELECT * FROM annonces ORDER BY ID_user DESC");
    return  $this->db->resultSet() ; 

}

  
public function archiveAnnonce($deactive){
    $this->db->query("UPDATE annonces SET
    archive = '1'
    where ID_annonce = $deactive ;
    ");
    return  $this->db->execute() ; 
}

public function deleteAnnonceById($remove){
    $this->db->query("DELETE FROM annonces WHERE ID_annonce = :ID_annonce");
    $this->db->bind(':ID_annonce', $remove);
    return $this->db->execute() ;

 }

public  function userWilayaSelected($ID_user , $ID_wilaya) {
    $this->db->query("SELECT * FROM user_wilaya where ID_User = :ID_user and ID_wilaya = :ID_wilaya");
    $this->db->bind(':ID_user', $ID_user);
    $this->db->bind(':ID_wilaya', $ID_wilaya);

    if($this->db->execute()){
        return true;
    }else{
        return false;
    } 

}




public function getUserInfoById($ID_user) {
   $this->db->query("SELECT * FROM users WHERE ID_user = :ID_user LIMIT 1");

   $this->db->bind(':ID_user', $ID_user);
   return $this->db->resultSet() ; 
  
}
public function getTypeUtilisateur($ID_user) {
    $this->db->query("SELECT type FROM users WHERE ID_user = :ID_user LIMIT 1");

   $this->db->bind(':ID_user', $ID_user);
   return $this->db->resultSet() ; 

}

/* public function getAnnonceInfoById($ID_annonce) {
    $this->db->query("SELECT * FROM annonces WHERE ID_annonce = :ID_annonce LIMIT 1");

   $this->db->bind(':ID_annonce', $ID_annonce);
   return $this->db->resultSet() ; 

} */
public function updateUserByIdInfo($ID_user ,$data) {

    
    $ID_user = $data['ID_user'];

    $nom = $data['nom'];
    $prenom = $data['prenom'];
    $numero = $data['numero'];
    $adresse = $data['adresse'];
    $email = $data['email'];
    $type = $data['type'];
    $note = $data['note'];
    $photo = $data['photo'];
    $statut = $data['statut'];
    $password = $data['password'];





   /*  if ($nom == "" || $prenom == ""|| $email == "" || $numero == ""  ) {
      $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Input Fields must not be Empty !</div>';
        return $msg;
      }elseif (strlen($username) < 3) {
        $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Error !</strong> Username is too short, at least 3 Characters !</div>';
          return $msg;
      }elseif (filter_var($mobile,FILTER_SANITIZE_NUMBER_INT) == FALSE) {
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
 */

$this->db->query("UPDATE users SET
nom = :nom,
prenom = :prenom,
numero = :numero,
email = :email,
adresse = :adresse,
type = :type,
statut :statut,
note :note,

WHERE ID_user = :ID_user");

$this->db->bind(':ID_user', $ID_user);
$this->db->bind(':nom', $nom);
$this->db->bind(':prenom', $prenom);
$this->db->bind(':numero', $numero);
$this->db->bind(':email', $email);
$this->db->bind(':adresse', $adresse);
$this->db->bind(':type', $type);
$this->db->bind(':statut', $statut);

     

      if ($this->db->resultSet()) {
        echo "<script>location.href='index.php';</script>";
        $_SESSION['msg'] = '<div class="alert alert-success alert-dismissible mt-3" id="flash-msg">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success !</strong> Wow, Your Information updated Successfully !</div>';



      }else{
        echo "<script>location.href='index.php';</script>";
        $_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Error !</strong> Data not inserted !</div>';


      }   

}


public function deleteUserById($remove) {

    $this->db->query("DELETE FROM users WHERE ID_user = :ID_user");
    $this->db->bind(':ID_user', $remove);
    if ($this->db->resultSet())  {
    $msg = '<div class="alert alert-success alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Success !</strong> User account Deleted Successfully !</div>';
      return $msg;
  }else{
    $msg = '<div class="alert alert-danger alert-dismissible mt-3" id="flash-msg">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Error !</strong> Data not Deleted !</div>';
      return $msg;
  }
}





}

