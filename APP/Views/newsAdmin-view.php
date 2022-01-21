<?php


include_once '../controllers/Users.php';
include_once '../controllers/affichControl.php';
/* include_once '../inc/header.php';
 */include_once '../controllers/affichControl.php';
      
      
$_controller = new affichControl();

if (isset($_GET['action']) && $_GET['action'] == 'logout') {


 
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

/* if (!empty($_SESSION['msg'])) {
  echo $_SESSION['msg'] ;
} */



class newsAdmin_view {

   
    public function display() {
     
     
      echo'
            <div class="card ">
              <div class="card-header">
              
                <h3><i class="fa fa-bullhorn mr-2" aria-hidden="true" ></i> News <span class="float-right">Welcome! <strong>
                  <span class="badge badge-lg badge-secondary text-white">
     ' ;
      
      if (isset($_SESSION['userPrenom'])) {
        $prenom = $_SESSION['userPrenom'] ;
        echo $prenom;
      } 
      echo'
       </span>
      
                </strong></span></h3>
              </div>
              <div class="card-body pr-2 pl-2">
      
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                          <tr> 
                              <!--12 -->
                            <th  class="text-center">SL</th>
                            <th  class="text-center">Article</th>
                            <th  class="text-center">Contenu</th>
                            <th  class="text-center">Date de création</th>
                            <th  class="text-center">Nombre de vues</th>
                            <th  class="text-center">Actions</th>
      
      
                          </tr>
                        </thead>
                        <tbody>' ;
      
                       
    
      
      include_once '../controllers/affichControl.php';
      
      
      $_controller = new affichControl();
      $allNews = $_controller->selectAllNews(); 
                         
                            if ($allNews) {
                              $i = 0;
                              foreach ($allNews as  $value) {
                                $i++;
      
                           
      echo'
                            <tr class="text-center"
                    
                            >
      
                              <td>'. $i .' </td>
                              <td> <a href="newsDetailAdmin.php?id='. $value['ID_news'].'">  
                              
        
      
                               <td>'. $value['article'] .' </td>
                               <td>'. $value['contenu'] .'  </td>
                               <td>'. $value['creationDate'] .' </td>
      
                              <td>
                              '. $value['viewsNumber']  .' 
                              </td>
      
                            
      
                              <td>
                              <a class="btn btn-success btn-sm" href="newsDetail.php?id='.$value['ID_news'].'">Voir</a>
      
                                <a   onclick="return confirm(\'Vous voulez vraiment archiver cette publicité? \')" class="btn btn-danger btn-sm" href="?deleteN='. $value['ID_news'] .'">Supprimer </a>
                          
                                  
                              </td>
                            </tr>
                       ' ;
                        } 
                      }
      
                         else{ 
                           echo'
                            <tr class="text-center">
                            <td>No user availabe now !</td>
                          </tr> ' ;
                          } 
      
                       echo' </tbody>
      
                    </table>
      
      
      
      
      
      
      
      
      
              </div>
            </div>
      
      <!-- footer -->
      
       <div class="well card-footer">
        <p
            <span class="float-right"></span>
        </p>
      </div>
      
      
      <script> 
      
      const closebtn = document.getElementById(\'closebtn-justificatif\') ;
      const containerjust = document.getElementById(\'container-justificatif\') ;
      closebtn.onclick = () => {
        containerjust.style.display = \'none\' ; 
      
      }
      function selectRefuse(nameselect) {
        if(nameselect) {
          const refus = document.getElementById(\'refus\').value ;
          if(refus == nameselect.value) {
            console.log(\'inside selectrefuse function \') ;
        containerjust.style.display = \'block\' ; 
          }
          else{
            containerjust.style.display = \'none\' ; 
      
      
          }
         
      
        }
        else {
          containerjust.style.display = \'none\' ; 
      
      
        }
        
      
      
      }
      
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
      </html>
      ' ;

      


    }
  }


