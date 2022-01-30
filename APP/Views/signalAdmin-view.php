
<?php

/*  *//* Session::CheckSession(); */
/* $sId =  Session::get('type');
if ($sId === '1'
*/ 
/* if (isset($_SESSION)) {  */
 


class signalAdmin_view {

    private $userController;
    private $affichController;

    public function __construct(){
       /*  $this->userController = new Users;
        $this->affichController = new affichControl; */

    }
    public function display() {
      include_once '../inc/header.php';

      echo '
    
      <div class="card ">
        <div class="card-header">
        
          <h3><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Signalements <span class="float-right">Welcome! <strong>
            <span class="badge badge-lg badge-secondary text-white">' ;

/* $prenom = $_SESSION['userPrenom'];
if (isset($prenom)) {
  echo $prenom;
} */
 echo' </span>

          </strong></span></h3>
        </div>
        <div class="card-body pr-2 pl-2">

          <table id="example" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr> 
                        <!--12 -->
                      <th  class="text-center">SL</th>
                      <th  class="text-center">Identifiant de l\'utilisateur ayant émis le signalement</th>
                      <th  class="text-center">Nom de de l\'utilisateur ayant émis le signalement</th>
                      <th  class="text-center">Type de l\'utilisateur ayant émis le signalement</th>

                      <th  class="text-center">Identifiant de l\'utilisateur signalé</th>

                      <th  class="text-center">Nom de de l\'utilisateur signalé</th>
                      <th  class="text-center">Type de l\'utilisateur signalé </th>
                      <th  class="text-center">Identifiant de l\'annonce</th>

                      <th  class="text-center">Texte du signalement</th>

        

                    </tr>
                  </thead>
                  <tbody> ';

                 
 

include_once '../controllers/affichControl.php';


$_controller = new affichControl();
$allreports = $_controller->selectAllReports(); 
                   
                       if ($allreports) { 

                        $i = 0;
                        foreach ($allreports as  $value) {
                          $i++;

                    echo'

                      <tr class="text-center" >

                        <td>'. $i.'</td>

                        
                        <td> <a href="userProfileAdmin.php?id='. $value['ID_userS'] .'">  

  
                         
'. $value['ID_userS'] .' </a> </td>

<td> <a href="userProfileAdmin.php?id='. $value['ID_userS'].'">  ' ;
                        
                        include_once '../controllers/affichControl.php';
                        
                        
                                                $user = $_controller->getUserInfoById($value['ID_userS']) ;
                                                foreach ($user as $user) {
                                                  $nom = $user['nom'];
                                                  $prenom = $user['prenom'];
                                                  echo $nom." ".$prenom ;
                                                  $type = $user['type'];

                                                }

                                                 
                                              echo'</a> </td>


<td>'. $type .'</td>



<td> <a href="userProfileAdmin.php?id='. $value['ID_userSD'] .'">'. $value['ID_userSD'] .'
                        
                       

                                                 
                                                </a> </td>
                        
                        <td> <a href="userProfileAdmin.php?id='.$value['ID_userSD'] .'"> ' ;
                         $user = $_controller->getUserInfoById($value['ID_userSD']) ;
                                                
                                                foreach ($user as $user) {
                                                  $nom = $user['nom'] ; 
                                                  $prenom = $user['prenom'];
                                                  $type2 = $user['type'] ;
                                                  echo $nom." ".$prenom ;

                                                }
                                                                         
                                                                      '  /a> </td>' ;
                        
                      echo'  <td>'. $type2.' </td>

                         <td> <a href="annonceDetailAdmin.php?id='. $value['ID_annonce'] .'"> '. $value['ID_annonce'] .'  </a></td>
                       
                         <td> <a href="textSignal.php?id='. $value['ID_report'] .'">  Lien </a></td>
</tr>
                       
                 ' ; 
                 
                  } }     
                   else { echo'
                      <tr class="text-center">
                      <td> Il n\'ya pas de signalements !</td>
                    </tr>' ;
                     } 

                  echo'</tbody>

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
  <script src="../assetss/jquery.min.js"></script>
  <script src="../assetss/bootstrap.min.js"></script>
  <script src="../assetss/jquery.dataTables.min.js"></script>
  <script src="../assetss/dataTables.bootstrap4.min.js"></script>
  <script>
      $(document).ready(function () {
          $("#flash-msg").delay(7000).fadeOut("slow");
      });
      $(document).ready(function() {
          $(\'#example\').DataTable();
      } );
  </script>
</html>
' ;
    }
  
  }


