<?php
require_once '../libraries/Database.php';
session_start()  ; 

class User {

    private $db;
    private $dbb;
    private $dbbb;
    private $dbbbb;



    public function __construct(){
        $this->db = new Database;
        $this->dbb = new Database;
        $this->dbbb = new Database;
        $this->dbbbb = new Database;



    }

    /* public function updateProfile($data) {
        
    } */
   public function informRefuse($ID_annonce, $ID_transporteur) {
       //inserer dans notif le transporteur accepté (0)

    $this->db->query('INSERT INTO notifications (ID_user, ID_annonce, text) 
    VALUES (:ID_transporteur, :ID_annonce , :text)'); 
     $this->db->bind(':ID_transporteur', $ID_transporteur);
     $this->db->bind(':ID_annonce', $ID_annonce);
     $this->db->bind(':text', "0");
     $this->db->execute() ;

       //selectionner les transporteurs refusés

     $this->db->query("SELECT * FROM demandes where ID_annonce = '$ID_annonce' and ID_transporteur != '$ID_transporteur' ") ; 
     $refus = $this->db->resultSet() ;
       //pour chaque transporteur refusé
     foreach ($refus as $ref) {
           //inserer dans notif le transporteur refusé (1)
        $this->db->query('INSERT INTO notifications (ID_user, ID_annonce, text) 
        VALUES (:ID_user, :ID_annonce , :text)'); 
         $this->db->bind(':ID_user', $ref['ID_transporteur']);
         $this->db->bind(':ID_annonce', $ID_annonce);

         $this->db->bind(':text', "1");
         $this->db->execute() ;
 
 
     }
     

   
   

    }
    
public function updateProfile($data) {
    /*  GLOBAL $msg ;
     $msg = '' ;
     GLOBAL $css_class;
     $css_class = ''; */
 
     
     //Bind values
 
       
        /*  $newnom = $_POST['newnom'] ;
         $newprenom = $_POST['newprenom'] ;
         $newemail = $_POST['newemail'] ;
         $newadresse = $_POST['newadresse'] ;
         $newnumero = $_POST['newnumero'] ; */
        
       /*   $newpassword = $_POST['newpassword'] ; */
 
 /*         $newrepeatpassword = $_POST['newpasswordrepeat'] ;
 
  */       
 /* $newprofileImage = time() . '_' . $_FILES['newprofileImage']['name'] ;
  $target ="../usersImages/" . $newprofileImage ; */
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
    
 /*     echo"<h1>data photo". $data['newphoto']." after <h1>" ;
  */
   
 
    /*  $newprofileImage = time() . '_' . $_FILES['newprofileImage']['name'] ;
     $target ="../usersImages/" . $newprofileImage ;
 
         if( move_uploaded_file($_FILES['newprofileImage']['tmp_name'] , $target) ) {
         echo"<h1> photoooooooooooo $newprofileImage afteeeeer <h1>" ;
         
 
         $msg ="Image téléchargée avec succés !" ; 
         $css_class = "alert-success" ; 
 
        }
        
        else {
         echo"<h1> photoooooooooooo $newprofileImage probleeeeme <h1>" ;
 
            $msg ="OOPS, il y'avait un problème avec le téléchargement de la photo..." ; 
            $css_class = "alert-danger" ; 
             
 
        } */
        /* echo"<h1>data nom". $data['newnom']." after <h1>" ;
        echo"<h1>data prenom". $data['newprenom']." after <h1>" ;
        echo"<h1>data adresse". $data['newadresse']." after <h1>" ;
        echo"<h1>data numero". $data['newnumero']." after <h1>" ;
        echo"<h1>data email". $data['newemail']." after <h1>" ;
        echo"<h1>data password". $data['newpassword']."  after <h1>" ;
        echo"<h1>data repeat". $data['newpasswordrepeat']."  after <h1>" ;
        echo"<h1>data photo". $data['newphoto']." after <h1>" ;
        echo"<h1> alert('before select') ; <h1>" ; */
 
        
   
        /* echo"<h1> alert('before binding') ; <h1>" ;
 */
 
        $this->dbb->query('UPDATE users SET nom=:nom , prenom=:prenom , email=:email , numero=:numero , adresse=:adresse , password=:password ,  photo=:photo where ID_user =:ID_user ;' ) ;
     
    
       /*  echo"<h1> alert('before binding') ; <h1>" ;
  */
        $this->dbb->bind(':ID_user', $_SESSION['userID']);
 
        $this->dbb->bind(':nom', $data['newnom']);
       $this->dbb->bind(':prenom', $data['newprenom']);
       $this->dbb->bind(':numero', $data['newnumero']);
       $this->dbb->bind(':email', $data['newemail']);
       $this->dbb->bind(':adresse', $data['newadresse']);
       $this->dbb->bind(':password',  password_hash($data['newpassword'], PASSWORD_DEFAULT) );
       $this->dbb->bind(':photo',  $data['newphoto'] );
       $this->dbb->execute();
      
 /* 
       $data['newpassword'] = password_hash($_POST['newpassword'], PASSWORD_DEFAULT) ;
       $data['newpasswordrepeat'] = password_hash($_POST['newpasswordrepeat'], PASSWORD_DEFAULT) ;
       
        */
        if(!empty($data['newWilayaDep'])) {
         echo"<h1> alert('wilayadep is  set') ; <h1>" ;
 
            $this->updateWilayaDep($data['newWilayaDep'] , $_SESSION['userID'] ) ; 
            $_SESSION['userWilayaDep'] = $this->getWilayaDep($_SESSION['userID']) ; 
    
         }
         else {
 
 
         }
 
     if(!empty($data['newWilayaArr'])) {
 
         $this->updateWilayaArr($data['newWilayaArr'] , $_SESSION['userID'] ) ; 

         $_SESSION['userWilayaArr'] = $this->getWilayaArr($_SESSION['userID']) ; 
 
 
  }
  /* else {
     
 
 
 } */
 
 
       
         $_SESSION['userEmail'] = $data['newemail'];
         $_SESSION['userNom'] =  $data['newnom'] ;;
         $_SESSION['userPrenom'] = $data['newprenom'];
         $_SESSION['userAdresse'] =  $data['newadresse'];
         $_SESSION['userNumero'] = $data['newnumero'];
         $_SESSION['userPassword'] =  password_hash($data['newpassword'], PASSWORD_DEFAULT) ;
         $_SESSION['userPhoto'] =  $data['newphoto'];
 
 
     return true ;
   
 
          //Execute
          
 
 
 
     
 
 
 }
 
 
    public function setJustificatif($data) {
        $this->db->query('UPDATE demande_certifie set justificatif=:justificatif where nom=:nom and prenom=:prenom') ;
        $this->db->bind(':justificatif', $data['justificatif']);
        $this->db->bind(':nom', $data['nom']);
        $this->db->bind(':prenom', $data['prenom']);
 return $this->db->execute() ;}

    

    public function updateContactPage($data) {
        $this->db->query('UPDATE contact set adresse=:adresse, numero=:numero, email=:email, contenu=:contenu, image=:image') ;
        $this->db->bind(':adresse', $data['adresse']);
        $this->db->bind(':numero', $data['numero']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':contenu', $data['contenu']);
        $this->db->bind(':image', $data['image']);
        return $this->db->execute() ;

        
    }

    public function addNewUserByAdmin() {
        
    }
    public function sendDemandeCertifie($data) {
        $this->db->query('INSERT INTO demande_certifie (nom, prenom, email, demande ) 
            VALUES (:nom, :prenom, :email , :demande )'); 
              $this->db->bind(':nom', $data['nom']);
              $this->db->bind(':prenom', $data['prenom']);
              $this->db->bind(':email', $data['email']);
              $this->db->bind(':demande', $data['demande']);
             try{ 
              $this->db->execute() ;
            }
            catch(PDOException $e) {
                $_SESSION['msg'] = "Votre demande a été envoyée, on vous mettra à jour dés qu'elle sera traitée" ; 
             $_SESSION['status'] = "success" ; 
             return ; 
              
            }
              $this->db->query('UPDATE users set demande="1" where nom=:nom and prenom=:prenom') ;
              $this->db->bind(':nom', $data['nom']);
              $this->db->bind(':prenom', $data['prenom']);
              $_SESSION['msg'] = "Votre demande a été envoyée, on vous mettra à jour dés qu'elle sera traitée" ; 
             $_SESSION['status'] = "success" ;

       return $this->db->execute() ;


    }

    public function getWilayaArr($ID_user) {
        $this->db->query('SELECT * FROM user_wilaya where ID_User=:ID_user and type=:type') ;
        $this->db->bind(':ID_user', $ID_user);
        $this->db->bind(':type', "arrivee");
      return $this->db->resultSet() ;
        
        
    }
    
    
    public function getWilayaDep($ID_user) {
        $this->db->query('SELECT * FROM user_wilaya where ID_User=:ID_user and type=:type') ;
        $this->db->bind(':ID_user', $ID_user);
        $this->db->bind(':type', "depart");
        return  $this->db->resultSet() ;
    
        
    }

    public function sendRate($rate , $user , $trajet) {
        echo"<script> alert('inside rate model') ;  </h>" ;

        $this->db->query('UPDATE trajets SET
        note=:note
        WHERE ID_trajet = :ID_trajet');
             $this->db->bind(':note', $rate);
             $this->db->bind(':ID_trajet', $trajet);
            if( $this->db->execute() ){
                echo"<script> alert('first execute') ;  </h>" ;
            }
            else {
                echo"<script> alert('first execute didnt work') ;  </script>" ;
     }
            $this->dbb->query('UPDATE users SET
            note=note+:note, viewersNumber=viewersNumber+1 
            WHERE ID_user = :ID_user');
            $this->dbb->bind(':note', $rate);
            $this->dbb->bind(':ID_user', $user);
        if( $this->dbb->execute()) {
            echo"<script> alert('second execute') ;  </script>" ;

            return true ; 
        }
        return false ; 



    }

    public function getAnnonceInfoById($ID_annonce) {
        $this->db->query("SELECT * FROM annonces WHERE ID_annonce = :ID_annonce LIMIT 1");
    
       $this->db->bind(':ID_annonce', $ID_annonce);
       return $this->db->resultSet() ; 
    
    } 
public function setParameters($ID_annonce, $p, $q ) {
    $this->db->query('UPDATE annonces SET p=:p, q=:q where ID_annonce = :ID_annonce'); 
    $this->db->bind(':p', $p);
    $this->db->bind(':q', $q);
    $this->db->bind(':ID_annonce', $ID_annonce);
   return $this->db->execute() ;


}

    public function setTrajet($ID_annonce, $ID_client ,$ID_transporteur) {
       $price = 0 ; 
       $annonce = $this->getAnnonceInfoById($ID_annonce) ; 
       foreach($annonce as $value) {
           $price = $value['price'];
       }
//set trajet
            $this->db->query('INSERT INTO trajets (ID_annonce, ID_client, ID_transporteur, creationDate , price) 
            VALUES (:ID_annonce, :ID_client, :ID_transporteur , :date , :price)'); 
             $this->db->bind(':ID_annonce', $ID_annonce);
             $this->db->bind(':ID_client', $ID_client);
             $this->db->bind(':ID_transporteur', $ID_transporteur);
             $this->db->bind(':price', $price);
             $this->db->bind(':date',  date('Y-m-d H:i:s') );
             try { 
             $this->db->execute() ;
             }
             catch (Exception $e) {
                $_SESSION['msg'] = ' Ce trajet a été déja confirmé.
                                ' ; }

//push noification
            

$this->informRefuse($ID_annonce, $ID_transporteur) ;

            
//delete from demandes        
             $this->db->query('delete from demandes where ID_client=:ID_client and ID_annonce =:ID_annonce');
             $this->db->bind(':ID_annonce', $ID_annonce);
             $this->db->bind(':ID_client', $ID_client);
             $this->db->execute() ;

             $this->db->query("UPDATE annonces SET
             statut= 1
             WHERE ID_annonce = :ID_annonce");

            $this->db->bind(':ID_annonce', $ID_annonce);
            $this->db->execute() ;



             //informer les autres transporteurs que leurs demandes ont été annulées et inforer le transporteur choisi que sa demaned est cnfirmée


             $_SESSION['msg'] = ' Le trajet a été confirmé.
                             ';
                             $_SESSION['status'] = "success" ;
                             
        
       
            
        
        
         
    }

    public function getUserInfoById($ID_user) {
        $this->db->query("SELECT * FROM users WHERE ID_user = :ID_user LIMIT 1");
     
        $this->db->bind(':ID_user', $ID_user);
        return $this->db->resultSet() ; 
       
     }

    public function setReport($ID_trajet, $reportText ){
        $this->db->query('SELECT * FROM trajets WHERE ID_trajet = :ID_trajet LIMIT 1');
        $this->db->bind(':ID_trajet', $ID_trajet);
        $trajet = $this->db->resultSet();
        foreach ($trajet as $trajet) {
            $ID_annonce = $trajet['ID_annonce'];
            $ID_userS = $trajet['ID_client'];
            $ID_userSD = $trajet['ID_transporteur'];

        }
        $this->db->query('INSERT INTO reports (ID_annonce,  ID_userS, ID_userSD, textSignal) 
        VALUES (:ID_annonce , :ID_userS , :ID_userSD , :textSignal ) ') ; 
        $this->db->bind(':ID_annonce', $ID_annonce);
        $this->db->bind(':ID_userS', $ID_userS);
        $this->db->bind(':ID_userSD', $ID_userSD);
        $this->db->bind(':textSignal', $reportText);
        return $this->db->execute(); 



 

    }
public function findAdminByEmail($email) {
    $this->db->query('SELECT * FROM admins WHERE email = :email LIMIT 1');
    $this->db->bind(':email', $email);
/*         $result =$this->db->resultSet() ;
*/        /* if($result) {
        foreach($result as $value) {

        }
    } */

    $admin = $this->db->single();
    if($this->db->rowCount() > 0){
  
        $admin =json_decode(json_encode($admin), true) ; 
        return $admin;

    } else {
        return false ;
    }

}

    //Find user by email or username
    public function findUserByEmail($email){
       
        $this->db->query('SELECT * FROM users WHERE email = :email AND banni="0" LIMIT 1');
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
   /*  public function returnAnnonceID( $titreAnnonce , $pointDepart , $pointArrivee , $ID_User ) {
        $this->db->query('SELECT * FROM annonces where titreAnnonce=:titreAnnonce and pointDepart=:pointDepart and pointArrivee=:pointArrivee and ID_User=:ID_User LIMIT 1' );
        $this->db->bind(':titreAnnonce', $titreAnnonce);
        $this->db->bind(':pointDepart', $pointDepart);
        $this->db->bind(':pointArrivee', $pointArrivee);
        $this->db->bind(':ID_User', $ID_User);

        $LastAnnonce = $this->db->resultSet()  ;
        foreach($LastAnnonce as $value) {
            $_SESSION['ID_annonce'] =$value['ID_annonce'];
        }

    } */
    public function addAnnonce($data) {
        $this->db->query('INSERT INTO annonces ( titreAnnonce, pointDepart,  pointArrivee, ID_User, moyenTransport, poidsMin, poidsMax, volumeMin , volumeMax , typeTransport , latitudedepart , longitudedepart, latitudearrivee, longitudearrivee , creationDate ) 
        VALUES ( :titreAnnonce, :pointdepart, :pointarrivee, :id_user, :moyentransport, :poidsmin, :poidsmax, :volumemin , :volumemax , :typetransport, :latitudedepart, :longitudedepart, :latitudearrivee, :longitudearrivee , now())');
       
       $this->db->bind(':titreAnnonce', $data['titreAnnonce']);
        $this->db->bind(':id_user', $data['id_user']);
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

        


$titre= $data['titreAnnonce'] ; 

$id_user= $data['id_user'] ; 
        $pointdepart = $data['pointdepart'] ; 
        $pointarrivee = $data['pointarrivee'] ; 
        $this->db->execute() ; 

        //recuper lID de lannonce
/*         $this->dbbb->query('SELECT * FROM annonces where titreAnnonce= :titreAnnonce and pointDepart= :pointDepart and pointArrivee= :pointArrivee and ID_User= :ID_user LIMIT 1' );
 */        $this->dbbb->query('SELECT * FROM annonces where titreAnnonce= :titreAnnonce AND pointDepart= :pointDepart AND pointArrivee= :pointArrivee AND ID_User= :ID_User LIMIT 1' );

        $this->dbbb->bind(':titreAnnonce', $titre);
        $this->dbbb->bind(':pointDepart', $pointdepart);
         $this->dbbb->bind(':pointArrivee', $pointarrivee); 
         $this->dbbb->bind(':ID_User', $id_user);

        $LastAnnonce = $this->dbbb->resultSet()  ;
        foreach($LastAnnonce as $value) {
            $_SESSION['ID_annonce'] = $value['ID_annonce'];
        }
    
                //recuper lID de lannonce


        



        $wilayad = $this->getCodeWilaya($pointdepart) ; 
                foreach ($wilayad as $value){
                        $wilayadep = $value['numwilaya'] ;

                }
        $wilayaa = $this->getCodeWilaya( $pointarrivee) ; 
                foreach ($wilayaa as $value){
                        $wilayarrivee = $value['numwilaya'] ;
                }

                $suggestions = $this->annonceSuggestion($wilayadep , $wilayarrivee) ; 
            

       

         //Bind values

        //Execute
           return $suggestions ; 
        
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




public function insertDemandesTrans($ID_annonce, $ID_client ,$ID_transporteur ) {
    try { 
    $this->db->query('INSERT INTO demandestrans (ID_annonce, ID_client, ID_transporteur, date) 
    VALUES (:ID_annonce, :ID_client, :ID_transporteur , :date)'); 
     $this->db->bind(':ID_annonce', $ID_annonce);
     $this->db->bind(':ID_transporteur', $ID_transporteur);
     $this->db->bind(':ID_client', $ID_client);
     $this->db->bind(':date',  date('Y-m-d H:i:s') );
     $this->db->execute() ;
    }

    /*  session_start() ;  */
  



    catch (Exception $e) {
        $_SESSION['msg'] = ' Vous avez déja répondu à cette annonce.
                        ' ;
    }

}

public function insertDemandes($ID_annonce , $ID_client , $ID_transporteur , $price) {
try {
    $this->db->query('INSERT INTO demandes (ID_annonce, ID_client, ID_transporteur, date) 
    VALUES (:ID_annonce, :ID_client, :ID_transporteur , :date)'); 
     $this->db->bind(':ID_annonce', $ID_annonce);
     $this->db->bind(':ID_client', $ID_client);
     $this->db->bind(':ID_transporteur', $ID_transporteur);
     $this->db->bind(':date',  date('Y-m-d H:i:s') );
     $this->db->execute() ;
    /*  session_start() ;  */
    $this->db->query('UPDATE annonces SET price=:price where ID_annonce=:ID_annonce') ; 
    $this->db->bind(':ID_annonce', $ID_annonce);
     $this->db->bind(':price', $price);
     $this->db->execute() ;



     $_SESSION['msg'] = 'Votre demande a été envoyée.
                     ';
/*                      echo "<script> alert(' Votre demande a été envoyée. ') ;</script>" ;
 */
}catch (Exception $e) {
     $_SESSION['msg'] = ' Vous avez déja répondu à cette annonce.
                     ' ;
/*                      echo "<script> alert(' Vous avez déja répondu à cette annonce.. ') ;</script>" ;
 */

  }
}
public function insertWilaya( $wilayasDep , $wilayasAr , $data) {
     //get the ID_user
     $this->db->query('SELECT * FROM users where nom=:nom and email=:email and prenom=:prenom');
     $this->db->bind(':nom', $data['nom']);
     $this->db->bind(':email', $data['email']);
     $this->db->bind(':prenom', $data['prenom']);
     $users = $this->db->resultSet() ;
     foreach ($users as $user){
       /*   echo "<script> alert('insiiiide foreach1 ) ; </script>" ;  */
         $ID_user = $user['ID_user'];
     }   



    
     //INsert wilaya depart



     //Execute
     
         foreach ($wilayasDep as $wilDep) {
            /*  echo "<script> alert('insiiiide foreach wilayadep' ) ; </script>" ; 
             echo $wilDep ; */

             $this->db->query('INSERT INTO user_wilaya (ID_User, ID_wilaya , type) 
             VALUES (:ID_User, :ID_wilaya , :type)');
 //faire une boucle pour chaque element du tableau de wilaya
            $this->db->bind(':ID_User', $ID_user);
            $this->db->bind(':ID_wilaya', $wilDep);
            $this->db->bind(':type', 'depart');
            $this->db->execute()  ; 


         }
         foreach ($wilayasAr as $wilAr) {
             /* echo "<script> alert('insiiiide wilayaarriv' ) ; </script>" ; 
             echo $wilAr ;  */

             $this->db->query('INSERT INTO user_wilaya (ID_User, ID_wilaya , type) 
             VALUES (:ID_User, :ID_wilaya , :type)');
 //faire une boucle pour chaque element du tableau de wilaya
            $this->db->bind(':ID_User', $ID_user);
            $this->db->bind(':ID_wilaya', $wilAr);
            $this->db->bind(':type', 'arrivee');
            $this->db->execute()    ; 


         }   
         
         return true; 

}

public function updateWilayaDep( $wilayasDep , $ID_user) {
    //get the ID_user
    $this->db->query('DELETE FROM user_wilaya where ID_User=:ID_user and type=:type ') ;
    $this->db->bind(':ID_user', $ID_user);
    $this->db->bind(':type', 'depart');

    $this->db->execute()  ;

    foreach ($wilayasDep as $wilDep) {
       /*  echo "<script> alert('insiiiide foreach wilayadep' ) ; </script>" ; 
        echo $wilDep ; */

        $this->db->query('INSERT INTO user_wilaya (ID_User, ID_wilaya , type) 
        VALUES (:ID_User, :ID_wilaya , :type)');
//faire une boucle pour chaque element du tableau de wilaya
       $this->db->bind(':ID_User', $ID_user);
       $this->db->bind(':ID_wilaya', $wilDep);
       $this->db->bind(':type', 'depart');
       $this->db->execute()  ;}
    
    return true; 
    }  
    
    
    public function updateWilayaArr( $wilayasAr , $ID_user) {
        //get the ID_user
        $this->db->query('DELETE FROM user_wilaya where ID_User=:ID_user and type=:type') ;
        $this->db->bind(':ID_user', $ID_user);
        $this->db->bind(':type', 'arrivee');

        $this->db->execute()  ;

        foreach ($wilayasAr as $wilAr) {
           /*  echo "<script> alert('insiiiide wilayaarriv' ) ; </script>" ; 
            echo $wilAr ;  */
    
            $this->db->query('INSERT INTO user_wilaya (ID_User, ID_wilaya , type) 
            VALUES (:ID_User, :ID_wilaya , :type)');
    //faire une boucle pour chaque element du tableau de wilaya
           $this->db->bind(':ID_User', $ID_user);
           $this->db->bind(':ID_wilaya', $wilAr);
           $this->db->bind(':type', 'arrivee');
           $this->db->execute()    ; 
    
    
        }   
        
        return true; 
        }  



    
    public function registerTransporteur($data){
        $this->db->query('INSERT INTO users (nom, prenom, numero, email, adresse, type, password) 
        VALUES (:nom, :prenom, :numero , :email, :adresse, :type, :password)');
        //Bind values
        
        $this->db->bind(':nom', $data['nom']);
        $this->db->bind(':prenom', $data['prenom']);
        $this->db->bind(':numero', $data['numero']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':adresse', $data['adresse']);
        $this->db->bind(':type', 'transporteur');
        $this->db->bind(':password', $data['password']);
        
        $wilayasDep = $data['wilaya'] ; 
        $wilayasAr = $data['wilayaA'] ; 
       /*  echo "<script> alert('avant execuuute' ) ; </script>" ; 
 */
        $this->db->execute()  ; 
       if($this->insertWilaya($wilayasDep , $wilayasAr , $data))  {
/*         echo "<script> alert('insiiiide insertwilayatrue' ) ; </script>" ; 
 */
           return true ; 
       }


          
/*        echo "<script> alert('insiiiide return false' ) ; </script>" ; 
 */
            return false;
        
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

    public function loginAdmin($email , $password) {
        $row = $this->findAdminByEmail($email);
         
        if($row == false) return false;  
         $hashedPassword = $row['password'];
        
        
                
        
        
        /*         $hashedPassword = $row['user']['password'];
         */        if(password_verify($password, $hashedPassword)){
/*           echo"<script> console.log('this iis inside password_verify  after')</script>";
 */           /*  echo"<script> this iis row".$row['password']."  after</script>";
            echo"<script> this iis row".$row['ID_user']."  after</script>" ;
            echo"<script> this iis row".$row['email']."  after</script>";
         */
                    return $row;
                }else{
                    return false;
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
   
            return $row;
        }else{
            return false;
        }
    }


   
    public function getCodeWilaya($wilaya) {
        $this->db->query("SELECT * from wilaya where wilaya=:wilaya");
        $this->db->bind(':wilaya' , $wilaya) ; 
        return $this->db->resultSet() ;





    }

    public function annonceSuggestion($depart , $arrivee ){
        $this->db->query(" 
        SELECT TAB_1.ID_User FROM 
      (SELECT * from user_wilaya
  where ID_wilaya=:depart and type= 'depart' 
   ) AS TAB_1, 
      (SELECT 
       * from user_wilaya
  where ID_wilaya=:arrivee and type='arrivee') AS TAB_2
      WHERE TAB_1.ID_User = TAB_2.ID_User
  ") ;
  $this->db->bind(':depart' , $depart) ; 
  $this->db->bind(':arrivee' , $arrivee) ; 
  return $this->db->resultSet() ;


    

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

/* 
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
    


]; */
public function updateAnnonceUser($data) {
    $this->db->query('UPDATE annonces SET titreAnnonce=:titreAnnonce ,pointDepart=:pointDepart, pointArrivee=:pointArrivee, volumeMin=:volumeMin, volumeMax=:volumeMax, poidsMin=:poidsMin , poidsMax=:poidsMax, typeTransport=:typeTransport , moyenTransport=:moyenTransport WHERE ID_annonce=:ID_annonce');
    $this->db->bind(':titreAnnonce', $data['titreAnnonce']);
    $this->db->bind(':pointDepart', $data['pointDepart']);
    $this->db->bind(':pointArrivee', $data['pointArrivee']);

    $this->db->bind(':volumeMin', $data['volumeMin']);
    $this->db->bind(':volumeMax', $data['volumeMax']);
    $this->db->bind(':poidsMin', $data['poidsMin']);

    $this->db->bind(':poidsMax', $data['poidsMax']);
    $this->db->bind(':typeTransport', $data['typeTransport']);
    $this->db->bind(':moyenTransport', $data['moyenTransport']);
    $this->db->bind(':ID_annonce', $data['ID_annonce']);

    if($this->db->execute()) {
        return true ; 
    }
    else {
        return false ;
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

