<?php 
session_start() ; 

if (!isset($_SESSION["userID"]) or !isset($_SESSION["userEmail"])) {
    header("Location: ./login.php");
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="style.css" href="style.css" >
</head>
<body>


<form class="box" action="./controllers/Users.php" method="POST">
  
  <h1 class="box-logo box-title">
    </h1>
      <h1 class="box-title">Modifier votre profile</h1>
      <input type="hidden" name="type" value ="update">
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
    <input type="password" class="box-input" name="password" 
    placeholder="Mot de passe" required />
    <input type="password" class="box-input" name="passwordrepeat" 
    placeholder="Confirmez le mot de passe" required />  
      <input type="submit" name="submit" 
    value="Modifier" class="box-button" />

  </form>
</body>
</html>