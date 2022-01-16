
<?php 
    include_once 'header.php';
    include_once './helpers/session_helper.php';
?>
    <h1 class="header">Please Login</h1>

    <?php flash('login') ?>




    <!-- <form method="post" action="./controllers/Users.php">
    <input type="hidden" name="type" value="login">
        <input type="text" name="name/email"  
        placeholder="Username/Email...">
        <input type="password" name="usersPwd" 
        placeholder="Password...">
        <button type="submit" name="submit">Log In</button>
    </form>
 -->



    <form class="box" action="./controllers/Users.php" method="post" name="login">
<h1 class="box-logo box-title">
</h1>
<h1 class="box-title">Connexion</h1>
<input type="hidden" name="type" value="login">

<input type="email" class="box-input" name="email" required placeholder="Email">
<input type="password" class="box-input" name="password" required placeholder="Mot de passe">
<input type="submit" value="Connexion " name="submit" class="box-button">
<p class="box-register">Vous êtes nouveau ici? 
  <a href="./signup.php">S'inscrire</a>
  
</p>
</form>




    <div class="form-sub-msg"><a href="./reset-password.php">Forgotten Password?</a></div>
    
<?php 
    include_once 'footer.php'
?>