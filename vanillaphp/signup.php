<?php 
    include_once 'header.php';
    include_once './helpers/session_helper.php';

?>
    <h1 class="header">Please Signup</h1>

    <?php flash('register') ?>

    <form class="box" action="./controllers/Users.php" method="POST">
  
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
  

  
  
 
  
  
    
  
  <input type="password" class="box-input" name="password" 
  placeholder="Mot de passe" required />
  <input type="password" class="box-input" name="passwordrepeat" 
  placeholder="Confirmez le mot de passe" required />


  
 <?php 

include_once './controllers/affichControl.php';


$_controller = new affichControl();
$ARRAY = $_controller->affichWilaya(); 

/* $rows = implode ("SEPARATOR", $ARRAY);
 */

/* $array = json_decode(json_encode($ARRAY), true); */


 

echo "<select  multiple name='wilaya[]'>" ;

foreach($ARRAY as $row){
  $row = $row['wilaya'];
  echo $row ;
 echo ("<option value='$row' selected> $row </option> ");

   //echo $rows['wilaya'] ;
   //echo "inside while" ;
 }


echo "</select>" ; 


 /* $this->db = new Database;
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
   echo "</select>" ;} */
 
 

 
 
 
 ?> 
  
    <input type="submit" name="submit" 
  value="S'inscrire" class="box-button" />
   
    <p class="box-register">Déjà inscrit? 
  <a href="login.php">Connectez-vous ici</a></p>
</form>
    
<?php 
    include_once 'footer.php'
?>