
<?php


include_once '../controllers/Users.php';
include_once '../controllers/affichControl.php';


class annoncesAdmin_view{

    public function display() {

if (isset($_GET['id'])) {
    session_start();
  $ID_annonce = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['id']);

} 


echo'

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> </title>
    <link rel="stylesheet" href="assetss/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="assetss/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assetss/style.css">
  </head>
  <body>' ;

 



include_once '../controllers/affichControl.php';


$_controller = new affichControl();

if (isset($_GET['action']) && $_GET['action'] == 'logout') {
  // Session::set('logout', '<div class="alert alert-success alert-dismissible mt-3" id="flash-msg">
  // <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  // <strong>Success !</strong> You are Logged Out Successfully !</div>');
 /*  Session::destroy(); */

 
}
if (isset($_GET['removea'])) {
    echo"<h1> insiiide remove </h1>" ;
    $remove = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['removea']);
    $_controller->deleteAnnonceById($remove);
}
  if (isset($_GET['archivea'])) {
    echo"<h1> insiiide archive </h1>" ;

    $archive = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['archivea']);
   $_controller->archiveAnnonce($archive);
  }

if (!empty($_SESSION['msg'])) {
  echo $_SESSION['msg'] ;
}

 echo'


      <div class="card ">
        <div class="card-header">
        
          <h3><i class="fa fa-bullhorn mr-2" aria-hidden="true" ></i> Annonces <span class="float-right">Welcome! <strong>
            <span class="badge badge-lg badge-secondary text-white">' ;

/* $prenom = $_SESSION['userPrenom'];
if (isset($prenom)) {
  echo $prenom;
} */
echo'
</span>

          </strong></span></h3>
        </div>
        <div class="card-body pr-2 pl-2">

          <table id="example" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr> 
                        <!--12 -->
                      <th  class="text-center" width="20%">SL</th>
                      <th  class="text-center">Utilisateur</th>
                      <th  class="text-center">Point de départ</th>
                      <th  class="text-center">Point d\'arrivée</th>
                      <th  class="text-center">Type de transport</th>
                      <th  class="text-center">Fourchette de poids</th>
                      <th  class="text-center">Fourchette de volume</th>
                      <th  class="text-center">Moyen de transport</th>
                      <th  class="text-center">Date de création</th>
                      <th  class="text-center">Nombre de vues</th>

                      <th  class="text-center">Tarif</th>

                      <th  class="text-center">Archivée?</th>

                      <th  class="text-center">Etat</th>
                      <th  class="text-center">Actions</th>


                    </tr>
                  </thead>
                  <tbody>' ;

                 

include_once '../controllers/affichControl.php';


$_controller = new affichControl();
$allannonces = $_controller->selectAllAnnouncements(); 
                   
                      if ($allannonces) {
                        $i = 0;
                        foreach ($allannonces as  $value) {
                          $i++;

                   echo'

                      <tr class="text-center" >

                        <td>'. $i.'</td>';
                        
include_once '../controllers/affichControl.php';


$_controller = new affichControl();
                        $user = $_controller->getTypeUtilisateur($value['ID_User']) ;
                        if($user) {

                        
                        foreach($user as $user) { 
                       echo'   <td> <a href="userProfileAdmin.php?id='. $value['ID_User'].'"> </a>  
                       <span class="badge badge-lg badge-secondary text-white">'. $user['type'] .'</span> </td>';  

                          
                        } 
                      }
                        else {
                          echo' <td> <a href="userProfileAdmin.php?id='. $value['ID_User'].'"> Utilisateur </a> </td> ' ;
                          
                        } 
                        echo'

                        <td>'. $value['pointDepart'].' </td>
                        


                        <td>'. $value['pointArrivee'].'  </td>
                       
            
                          

                         <td>'. $value['typeTransport'] .' </td>
                        <td>'. $value['poidsMin']."-".$value['poidsMax'] .' </td>
                        <td>'.  $value['volumeMin']."-".$value['volumeMax'].' </td>
                        <td>'. $value['moyenTransport'] .' </td>

                        <td>
                        '. $value['creationDate'] .' 
                        </td>

                        <td>
                        '. $value['viewsNumber'] .'
                        </td>

                        <td>
                        tarif = distance*p+q </br>
                        p= '. $value['p'] .' </br>
                        q='. $value['q'] .' </br>
                        </td>

                        <td>' ;
                         if($value['archive'] == '0') { 
                        echo' <a class="btn btn-success btn-sm" href="">Non</a>' ;

                          

                        } else { 
                        

                      echo'  <a class="btn btn-warning btn-sm" href="">Oui</a>' ;


                        

                        } 
                      echo'  </td>

                        <td>' ;
                         if($value['etat'] == 'invalide') { 
                       echo'  <a class="btn btn-danger btn-sm" href=""> '.  $value['etat'] .' </a>' ;

                          

                        } else {  
                           echo' <a class="btn btn-danger btn-sm" href="">'. $value['etat'] .'  </a>' ;

                            

                        } 
                      echo'  <div class="card-body">


                            <form action="./controllers/Users.php" method="POST" > 
                            <input type="hidden" name="type" value ="changeetat">

                           <select   class=\'form-control inputstl\' name="selectetat" id="selectetat"> 
                           <option disabled selected value> -- Changer l\'état -- </option>

                           <option value=\'1\' > Invalide </option>
                             <option value=\'2\'> Valide </option>
                            

                           </select>



                           <div class="from-group mb-3"> 
                              <input type="hidden" name="ID_annonce" value="'. $value['ID_annonce'].'">
  
                           <input type="submit" value="Changer"  >
                           </div>

                           </form>
                            </div>
                        </td>

                        <td>
                        <a class="btn btn-success btn-sm" href="annonceDetailAdmin.php?id='. $value['ID_annonce'].'">Voir</a>
                        ' ;
                        if( $value['archive'] == '1' )  {
                          echo '  <a onclick="return confirm(\'Vous voulez vraiment archiver cette annonce? \')" class="btn btn-warning btn-sm disabled" href="?archivea='. $value['ID_annonce'].'">Archiver </a>' ;

                        }
                        else {
                          echo '  <a onclick="return confirm(\'Vous voulez vraiment archiver cette annonce? \')" class="btn btn-warning btn-sm" href="?archivea='. $value['ID_annonce'].'">Archiver </a>' ;

                        }

                          echo'
                           <a onclick="return confirm(\'Vous voulez vraiment supprimer cette annonce ?\')" class="btn btn-danger btn-sm " href="?removea='. $value['ID_annonce'].'">Supprimer</a>
                            
                         
<!--                                <a onclick="return confirm(\'Vous voulez changer le statut à <En cours de traitement> ?\')" class="btn btn-secondary btn-sm " href="?deactive='. $value['ID_User'].'">Changer le statut</a>
 -->                                                     <a class="btn btn-primary btn-sm" onclick="SetTarif()"> <i class="far fa-edit"></i> Tarif</a>
 <div id="container-parameters" class="container-parameters" style=" 

position:relative;
display:none ;" > 

  <label onclick="closeform()" for="" id="closebtn-parameters" class="closer-btn fas fa-times" style="
  position: absolute;
 
  right: 1rem;
  top: 1rem;

"></label>

<form action="./controllers/Users.php" method="POST" style="margin: 2rem;" > 

<div class="text"  style="margin: 2rem;
padding-top: 2rem ; 
font-size: 1rem ;
width: 120%;
font-weight: 600;
transform: translateX(-60px);
"> Changer les paramètres </div>
<input type="hidden" name="type" value ="setParameters" >
<input type="hidden" name="ID_annonce" value ="'. $value['ID_annonce'].'" >


<div class="from-group mb-3"> 
  <input type="text" style="margin: .8rem 2rem; width:6rem; height: 1.5rem ; " name="p" placeholder="p">
  <input type="text" style="margin: .8rem 2rem; width:6rem; height: 1.5rem ; "name="q" placeholder="q">

  </div> 
  <input type="submit" value="Changer"  style="margin: 2rem; " >


</form> 
</div>


                        </td>
                      </tr> ';
                 
                  } 
                }

                   else{ 
                     echo'
                      <tr class="text-center">
                      <td>No user availabe now !</td>
                    </tr>' ;
                    } 

                echo'  </tbody>

              </table>









        </div>
      </div>

<!-- footer -->

 <div class="well card-footer">
  <p
      <span class="float-right"></span>
  </p>
</div>


<script type="text/javascript"> 
/* $(document).ready(function (  */

const closebtn = document.getElementById(\'closebtn-parameters\') ;
const containerjust = document.getElementById(\'container-parameters\') ;
function closeform() {
  containerjust.style.display = \'none\' ; 


}
/* closebtn.onclick = () => {
  containerjust.style.display = \'none\' ; 

} */
function SetTarif() {
 
  containerjust.style.display = \'block\' ; 
    
   

  }
  


  



/* )) */

</script>

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
</html>' ;



  
}
}
