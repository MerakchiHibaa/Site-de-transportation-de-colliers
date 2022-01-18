<?php

include_once '../inc/header.php';
/* Session::CheckSession(); */
/* $sId =  Session::get('type');
if ($sId === '1'
*/ 
/* if (isset($_SESSION)) {  */?>
 

      <div class="card ">
        <div class="card-header">
        
          <h3><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Signalements <span class="float-right">Welcome! <strong>
            <span class="badge badge-lg badge-secondary text-white">
<?php
/* $prenom = $_SESSION['userPrenom'];
if (isset($prenom)) {
  echo $prenom;
} */
 ?></span>

          </strong></span></h3>
        </div>
        <div class="card-body pr-2 pl-2">

          <table id="example" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr> 
                        <!--12 -->
                      <th  class="text-center">SL</th>
                      <th  class="text-center">Identifiant de l'utilisateur ayant émis le signalement</th>
                      <th  class="text-center">Nom de de l'utilisateur ayant émis le signalement</th>
                      <th  class="text-center">Type de l'utilisateur ayant émis le signalement</th>

                      <th  class="text-center">Identifiant de l'utilisateur signalé</th>

                      <th  class="text-center">Nom de de l'utilisateur signalé</th>
                      <th  class="text-center">Type de l'utilisateur signalé </th>
                      <th  class="text-center">Identifiant de l'annonce</th>

                      <th  class="text-center">Texte du signalement</th>

        

                    </tr>
                  </thead>
                  <tbody>

                 
 <?php 

include_once '../controllers/affichControl.php';


$_controller = new affichControl();
$allreports = $_controller->selectAllReports(); 
                   
                       if ($allreports) { 

                        $i = 0;
                        foreach ($allreports as  $value) {
                          $i++;

                     ?>

                      <tr class="text-center"
              
                      >

                        <td><?php echo $i; ?></td>

                        
                        <td> <a href="userProfileAdmin.php?id=<?php echo $value['ID_userS'] ;?>">  <?php 
                        


/*                         $user = $_controller->returnAttributeUser($value['ID_userS'] , 'ID_user') ;
 */            
/* $user = $_controller->getUserInfoById($value['ID_userS'])      ;
foreach($user as $user) {

}    */    
                         
echo $value['ID_userS'] ; ?> </a> </td>

<td> <a href="userProfileAdmin.php?id=<?php echo $value['ID_userS'] ;?>">  <?php 
                        
                        include_once '../controllers/affichControl.php';
                        
                        
                                                $user = $_controller->getUserInfoById($value['ID_userS']) ;
                                                foreach ($user as $user) {
                                                  $nom = $user['nom'];
                                                  $prenom = $user['prenom'];
                                                  echo $nom." ".$prenom ;
                                                  $type = $user['type'];

                                                }

                                                 
                                                ?></a> </td>


<td><?php echo $type; ?></td>



<td> <a href="userProfileAdmin.php?id=<?php echo $value['ID_userSD'] ;?>">  <?php  echo $value['ID_userSD'] ;
                        
                       
/*                                                 $user = $_controller->returnAttributeUser($value['ID_userSD'] , 'ID_user') ;
 */                                                                                           /*      $user2 = $_controller->getUserInfoById($ID_userSD) ; */
 /* foreach ($user2 as $user) {
   $nom = $user['nom'] ; 
   $prenom = $user['prenom'];
 }

                                                    echo $user ; */
                                                 
                                                ?></a> </td>
                        
                        <td> <a href="userProfileAdmin.php?id=<?php echo $value['ID_userSD'] ;?>">  <?php 
                         $user = $_controller->getUserInfoById($value['ID_userSD']) ;
                                                
                                                foreach ($user as $user) {
                                                  $nom = $user['nom'] ; 
                                                  $prenom = $user['prenom'];
                                                  $type2 = $user['type'] ;
                                                  echo $nom." ".$prenom ;

                                                }
                                                                         
                                                                        ?></a> </td>
                        
                        <td><?php echo $type2; ?></td>

                         <td> <a href="annonceDetailAdmin.php?id=<?php echo $value['ID_annonce'] ;?>"> <?php echo $value['ID_annonce']  ?> </a></td>
                       
                         <td> <a href="textSignal.php?id=<?php echo $value['textSignal'] ;?>">  Lien </a></td>

                        
                        


                          

                       
                  <?php 
                  } 
                }

                       
                   else { ?>
                      <tr class="text-center">
                      <td>Il n'ya pas de signalements !</td>
                    </tr>
                    <?php } ?>

                  </tbody>

              </table>









        </div>
      </div>

<!-- footer -->

 <div class="well card-footer">
  <p
      <span class="float-right"></span>
  </p>
</div>



  </body>


  <!-- Jquery script -->
  <script src="assetss/jquery.min.js"></script>
  <script src="assetss/bootstrap.min.js"></script>
  <script src="assetss/jquery.dataTables.min.js"></script>
  <script src="assetss/dataTables.bootstrap4.min.js"></script>
  <script>
      $(document).ready(function () {
          $("#flash-msg").delay(7000).fadeOut("slow");
      });
      $(document).ready(function() {
          $('#example').DataTable();
      } );
  </script>
</html>
