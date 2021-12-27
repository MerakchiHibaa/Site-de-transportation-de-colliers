<?php
require_once '../libraries/Database.php';

class User {

    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    //Find user by email or username
    public function findUserByEmail($email){
        $this->db->query('SELECT * FROM clients WHERE email = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        //Check row
        if($this->db->rowCount() > 0){
            return $row;
        }else{
            $this->db->query('SELECT * FROM transporteur WHERE email = :email');
            $this->db->bind(':email', $email);
            $row = $this->db->single();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
            return false;
            }
        }
    }

    
 

public function affichWilaya() {
    flash("", "Email invalide");

    $this->db->query("SELECT * FROM wilaya ") ;
 $options ="" ; 
 if($this->db->execute()){
    echo "<select  multiple name='wilaya[]'>" ;

    if($this->db->rowCount() > 0) {
        while($rows  = $this->db->resultSet()) {
            $row = $rows['wilaya'];
            echo $row ;
           echo ("<option value='$row' selected> $row </option> ");
 
             //echo $rows['wilaya'] ;
             //echo "inside while" ;
          }
    }
    echo "</select>" ;}
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
    public function login($nameOrEmail, $password){
        $row = $this->findUserByEmailOrUsername($nameOrEmail, $nameOrEmail);

        if($row == false) return false;

        $hashedPassword = $row->usersPwd;
        if(password_verify($password, $hashedPassword)){
            return $row;
        }else{
            return false;
        }
    }

    //Reset Password
    public function resetPassword($newPwdHash, $tokenEmail){
        $this->db->query('UPDATE users SET usersPwd=:pwd WHERE usersEmail=:email');
        $this->db->bind(':pwd', $newPwdHash);
        $this->db->bind(':email', $tokenEmail);

        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
}