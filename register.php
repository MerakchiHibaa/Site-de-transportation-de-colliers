<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
require('database.php');

  

 

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

else{
?>
<form class="box" action="./controllers/clients.php" method="POST">
  
<h1 class="box-logo box-title">
  </h1>
    <h1 class="box-title">S'inscrire</h1>
    <input type="hidden" name="type" value ="register">
  <input type="text" class="box-input" name="nom" 
  placeholder="Nom" required />
  <input type="text" class="box-input" name="prenom" 
  placeholder="Prénom" required />
  <input type="email" class="box-input" name="email" 
  placeholder="Email" required />
  <input type="text" class="box-input" name="numero" 
  placeholder="Numéro de téléphone" required />
  <input type="text" class="box-input" name="adresse" 
  placeholder="Adresse" required />
  

   <input type="checkbox" class="box-input" name="transporteur" 
  placeholder="Transporteur"  />
  

  
  
  
 <?php 
 
 $sql = "SELECT * FROM wilaya ";
 $options ="" ; 


 if($result = mysqli_query($conn , $sql))   {
  echo "<select  multiple name='wilaya[]'>" ;
     if(mysqli_num_rows($result) > 0 ) {

       
        
         while($rows  = mysqli_fetch_array($result)) {
           $row = $rows['wilaya'];

           echo $row ;




          echo ("<option value='$row' selected> $row </option> ");

            //echo $rows['wilaya'] ;
            //echo "inside while" ;
         }

     }
     echo "</select>" ;
    
 }

 

  {
  

					
 }

 
 

 
 
 
 ?>  
  
  
    
  
  <input type="password" class="box-input" name="password" 
  placeholder="Mot de passe" required />
  
    <input type="submit" name="submit" 
  value="S'inscrire" class="box-button" />
   
    <p class="box-register">Déjà inscrit? 
  <a href="login.php">Connectez-vous ici</a></p>
</form>
<?php } ?>
</body>
</html>