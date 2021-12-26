<?php
require_once './database.php';

class ClientModel 
{
    
    public function __construct() {
        
    }
}



  

 

if (isset( $_REQUEST['nom'] , $_REQUEST['prenom'] , $_REQUEST['email'] , $_REQUEST['numero'] , $_REQUEST['adresse'] , $_REQUEST['password'] )){
// récupérer les info de l'utilisateur 
$nom = stripslashes($_REQUEST['nom']);
$nom = mysqli_real_escape_string($conn, $nom); 

$prenom = stripslashes($_REQUEST['prenom']);
$prenom = mysqli_real_escape_string($conn, $prenom); 

$email = stripslashes($_REQUEST['email']);
$email = mysqli_real_escape_string($conn, $email); 

$numero = stripslashes($_REQUEST['numero']);
$numero = mysqli_real_escape_string($conn, $numero); 

$adresse = stripslashes($_REQUEST['adresse']);
$adresse = mysqli_real_escape_string($conn, $adresse); 

// récupérer le mot de passe 
$password = stripslashes($_REQUEST['password']);
$password = mysqli_real_escape_string($conn, $password);

//  echo ($POST["wilaya"]) ;




if( (empty($_POST["transporteur"]) && ($_POST['wilaya']< 1) ) ) { 
  echo("cheeeeckkkked") ;
  $query = "INSERT into `clients` (nom, prenom, email, numero, adresse, password)
  VALUES ('$nom' , '$prenom' , '$email' , '$numero' ,  '$adresse' ,   '".hash('sha256', $password)."')";

$res = mysqli_query($conn, $query);

  

}
else {

 


  $transporteur = stripslashes($_REQUEST['transporteur']);
  $transporteur = mysqli_real_escape_string($conn, $transporteur); 

  $wilaya = stripslashes($_REQUEST['wilaya']);
  $wilaya = mysqli_real_escape_string($conn, $wilaya); 

  $query = "INSERT into `transporteur` (nom, prenom, email, numero, adresse, password )
  VALUES ('$nom' , '$prenom' , '$email' , '$numero' ,  '$adresse' ,   '".hash('sha256', $password)."')";

  $res = mysqli_query($conn, $query);


 
}







/* echo($query); 
echo($res) ;
echo('resulttt22');  */



  if($res){
     echo "<div class='sucess'>
           <h3>Vous êtes inscrit avec succès.</h3>
           <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
     </div>";
  }
}

else{ }


?>