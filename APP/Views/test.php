<?php 
/*     include_once 'header.php';
 *//*     include_once './helpers/session_helper.php';
 */
?>


<?php 

include_once './controllers/affichControl.php';


$_controller = new affichControl();
$ARRAY = $_controller->affichWilaya(); 

/* $rows = implode ("SEPARATOR", $ARRAY);
 */

/* $array = json_decode(json_encode($ARRAY), true); */


 foreach($ARRAY as $ele){
 
/*     $roww = var_dump($row) ; */
     
/*      $roww = var_dump($row) ;
$data[0]['field_name']
 */    echo("<h1>  before   ".$ele['wilaya']." after </h1>") ;
/*     echo("<h1>  before wilaya ". $roww['wilaya']." after wilaya</h1>") ;
 */

 } 
/* 
$this->db->query("SELECT * FROM wilaya ") ;
        return  $this->db->resultSet() ;  */


/* oreach($rows as $row) {
    $row2 = $row['wilaya'] ; */ 
  /*   echo("<h1>  this is rows ".$rows." rooooows </h1>") ; */
  

/* } */

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
$rows = $_controller->affichWilaya(); 


/*$_controller -> affichWilaya(); */


echo "<select  multiple name='wilaya[]'>" ;

$i = 0 ;
  
    while($i < 10) {
        echo($i);

        echo ("<option value='$i' selected> $i </option> ");
        $i = $i + 1  ; 



    }
    
      /* 
            foreach ($rows as $row) {
                $row2 = $row['wilaya'];
              
                echo $row2 ;
               echo ("<option value='$row2' selected> $row2 </option> ");
     
                 //echo $rows['wilaya'] ;
                 //echo "inside while" ;
              }
  
 */
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