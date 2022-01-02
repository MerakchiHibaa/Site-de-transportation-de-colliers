<?php
include_once 'inc/header.php';
/* Session::CheckSession(); */
/* $sId =  Session::get('type');
if ($sId === '1'
*/ 
/* if (isset($_SESSION)) {  */?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addUser'])) {

  $userAdd = $users->addNewUserByAdmin($_POST);
}

if (isset($userAdd)) {
  echo $userAdd;
}


 ?>


 <div class="card ">
   <div class="card-header">
          <h3 class='text-center'>Ajouter un utilisateur</h3>
        </div>
        <div class="cad-body">



            <div style="width:600px; margin:0px auto">

            <form class="" action="" method="post">
                <div class="form-group pt-3">
                  <label for="nom">Nom</label>
                  <input type="text" name="nom"  class="form-control">
                </div>
                <div class="form-group">
                  <label for="prenom">Prénom</label>
                  <input type="text" name="prenom"  class="form-control">
                </div>

                <div class="form-group pt-3">
                  <label for="adresse">Adresse</label>
                  <input type="text" name="adresse"  class="form-control">
                </div>

                <div class="form-group">
                  
                  <label for="email">Email </label>
                  <input type="email" name="email"  class="form-control">
                </div>
                <div class="form-group">
                  <label for="numero">Numéro</label>
                  <input type="text" name="numero"  class="form-control">
                </div>
                <div class="form-group">
                  <label for="password">Mot de passe</label>
                  <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                  <div class="form-group">
                    <label for="sel1"  >Type de l'utilisateur</label>
                    <select  onchange="selectType(this)" class="form-control" name="type" id="typeadd">
                      <option value="1">Client</option>
                      <option id="optTransporteur" value="2">Transporteur</option>

                    </select>
                  </div>
                </div>
                <div style="display: none;" class="form-group" id="wilayaSelect" >
                    <label for="sel1"  >Les wilayas</label>
                    
                <select class="form-control" multiple  name='wilaya[]'>

                <?php
                


include_once './controllers/affichControl.php';


$_controller = new affichControl();
$ARRAY = $_controller->affichWilaya(); 


foreach($ARRAY as $row){
  $ID_wilaya =  $row['ID_wilaya'];                     
  $roww = $row['wilaya'];
  echo ("<option value='$roww' > $roww </option> ");
  
               

   
 }

?> 

</select >
</div>
</div>
                <div class="form-group">
                  <button type="submit" name="addUser" class="btn btn-success">Register</button>
                </div>


            </form>
          </div>


        </div>
      </div>



  <?php
  include 'inc/footer.php';

  ?>
