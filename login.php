
<!-- 

if (isset($_POST['username'])){
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username);
  $_SESSION['username'] = $username;
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM `users` WHERE username='$username' 
  and password='".hash('sha256', $password)."'";
  
  $result = mysqli_query($conn,$query) or die(mysql_error());
  
  if (mysqli_num_rows($result) == 1) {
    $user = mysqli_fetch_assoc($result);
    // vérifier si l'utilisateur est un administrateur ou un utilisateur
    if ($user['type'] == 'admin') {
      header('location: admin/home.php');    /* la page des admins*/   
    }else{
      header('location: index.php'); /*la page principale du site*/ 
    }
  }else{
    $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
  }
}
?> -->

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
<?php


require('connection.php');

session_start();


if (isset($_POST['username'])){
 
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username);
  $_SESSION['username'] = $username;
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM `users` WHERE username='$username' 
  and password='".hash('sha256', $password)."'";

$passwordhash = hash('sha256', $password) ; 

  $result = mysqli_query($conn,$query) or die(mysqli_error());
  
  if (mysqli_num_rows($result) == 1) {
 header('location: adminhome.php');


  }
   
<!-- 

if (isset($_POST['username'])){
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username);
  $_SESSION['username'] = $username;
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM `users` WHERE username='$username' 
  and password='".hash('sha256', $password)."'";
  
  $result = mysqli_query($conn,$query) or die(mysql_error());
  
  if (mysqli_num_rows($result) == 1) {
    $user = mysqli_fetch_assoc($result);
    // vérifier si l'utilisateur est un administrateur ou un utilisateur
    if ($user['type'] == 'admin') {
      header('location: admin/home.php');    /* la page des admins*/   
    }else{
      header('location: index.php'); /*la page principale du site*/ 
    }
  }else{
    $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
  }
}
?> -->

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
<?php


require('connection.php');

session_start();


if (isset($_POST['username'])){
 
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username);
  $_SESSION['username'] = $username;
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
    $query = "SELECT * FROM `users` WHERE username='$username' 
  and password='".hash('sha256', $password)."'";

$passwordhash = hash('sha256', $password) ; 

  $result = mysqli_query($conn,$query) or die(mysqli_error());
  
  if (mysqli_num_rows($result) == 1) {
 header('location: adminhome.php');


  }
   
  else{
    $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
 
  } 
}
?>
<form class="box" action="" method="post" name="login">
<h1 class="box-logo box-title">
</h1>
<h1 class="box-title">Connexion</h1>
<input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur">
<input type="password" class="box-input" name="password" placeholder="Mot de passe">
<input type="submit" value="Connexion " name="submit" class="box-button">
<p class="box-register">Vous êtes nouveau ici? 
  <a href="register.php">S'inscrire</a>
</p>
<?php if (! empty($message)) { ?>
    <p class="errorMessage"><?php echo $message; ?></p>
<?php } ?>
</form>
</body>
</html>




  else{
    $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
 
  } 
}
?>
<form class="box" action="" method="post" name="login">
<h1 class="box-logo box-title">
</h1>
<h1 class="box-title">Connexion</h1>
<input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur">
<input type="password" class="box-input" name="password" placeholder="Mot de passe">
<input type="submit" value="Connexion " name="submit" class="box-button">
<p class="box-register">Vous êtes nouveau ici? 
  <a href="register.php">S'inscrire</a>
</p>
<?php if (! empty($message)) { ?>
    <p class="errorMessage"><?php echo $message; ?></p>
<?php } ?>
</form>
</body>
</html>



