
<?php 
include_once '../controllers/Users.php';

$_controllera = new affichControl();




class profile_view {



   
public function display() {
  include_once '../controllers/affichControl.php';
/*   session_start() ; 
 */  $_controllera = new affichControl();

 /*  $_controller = new affichControl(); */

 

    echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/index.css">
        <link rel="stylesheet" href="../assetss/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    
        <link
          rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
        />
        <!-- MDB -->
        <link rel="stylesheet" href="../bootstrapDesign/css/mdb.min.css" />
    <!--     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     --> 
     
        <title>Profile</title>
    </head>
    <body>
    
    <section class="vh-100" style="background-color: #f4f5f7;">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col col-lg-6 mb-4 mb-lg-0">
            <div class="card mb-3" style="border-radius: .5rem;">
              <div class="row g-0">
                <div class="col-md-4 gradient-custom text-center text-white" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                  <img
                    src= "../usersImages/'. $_SESSION['userPhoto'].'"
                    alt="Avatar"
                    class="img-fluid my-5"
                    style="width: 80px;"
                  />
                  <h5 style="color: black ; text-transform:uppercase; " >'. $_SESSION['userNom'].' '. $_SESSION['userPrenom'] .' </h5>
                  <p style="color: black ;">'. $_SESSION['userType'] .' </p> ' ;
                   if($_SESSION['userViewersNumber'] =='0') {  
                  echo'  <h5 style="color: black ;" > On ne vous a pas encore noté </h5>' ;
    
                  } else {  
             echo'   <p style="color: #ffff00 ; font-weight:800;">   <i class="fas fa-star"></i> '. $_SESSION['userNote']/$_SESSION['userViewersNumber'].'/5   </p>' ;
    
                }  
                   if(isset($_SESSION['userCertifie'])){
                    if($_SESSION['userCertifie'] == '0') { 
                    
                  echo'  <p class="badge badge-success rounded-pill"> Certifié.e </p> <br>' ;
    
                  } else { 
    
                  echo '<p class="badge badge-warning rounded-pill"> Non certifié.e <br></p>' ;
                 
                }} 
                echo'
            <a href="./updateProfileUser.php?id='. $_SESSION['userID'] .'">      <i style="color: black ; margin-top: 40px ; font-size: 2.5rem;" class="far fa-edit mb-5"></i>  </a> 
                </div>
                <div class="col-md-8">
                  <div class="card-body p-4">
                    <h6>Informations</h6>
                    <hr class="mt-0 mb-4">
                    <div class="row pt-1">
                      <div class="col-6 mb-3">
                        <h6>Email</h6>
                        <p class="text-muted">'. $_SESSION['userEmail'] .'</p>
                      </div>
                      <div class="col-6 mb-3">
                        <h6>Numéro de téléphone</h6>
                        <p class="text-muted">'. $_SESSION['userNumero'] .'</p>
                      </div>
                    </div>
                   <!--  <h6>Projects</h6> -->
                    <hr class="mt-0 mb-4">
                    <div class="row pt-1">
                      <div class="col-6 mb-3">
                        <h6>Wilayas de départ</h6>
                        <select class="form-control"> ' ;
                          foreach($_SESSION['userWilayaDep'] as $value) {
                            $namewilaya = $_controllera->getNameWilaya($value['ID_wilaya']) ; 
                            foreach($namewilaya as $name) {
                              $name =  $name['wilaya'] ; 
                            } 
                          echo'  <option value="'.$value['ID_wilaya'].'">'. $name.' </option>' ;
    
                         }
                         echo'
                           
    
                        </select>
    <!--                     <p class="text-muted">Lorem ipsum</p>
     -->                  </div>
                      <div class="col-6 mb-3">
                        <h6>Wilayas d\'arrivée</h6>
                        <select class="form-control"> ' ;
                           foreach($_SESSION['userWilayaArr'] as $value) {
                            $namewilaya = $_controllera->getNameWilaya($value['ID_wilaya']) ; 
                            foreach($namewilaya as $name) {
                              $name =  $name['wilaya'] ; 
                            } 
                            echo'<option value="'.$value['ID_wilaya'].' "> '. $name .' </option>' ;
    
                          } 
                           
    
                     echo'   </select>
                      
    <!--                     <p class="text-muted">Dolor sit amet</p>
     -->                  </div>
                    </div>
    ' ;
                     if($_SESSION['userType'] == 'transporteur' && $_SESSION['userDemande'] == '1' ) { 
    
                    echo'
                    <hr class="mt-0 mb-4">
                    <div class="row pt-1">
                      <div class ="border border-dark" style="padding: 10px ; padding-top:20px ; margin-bottom: 10px ;">
                        <h6 class="text-center"> Statut de votre demande :</h6>
                        <!-- statue possible : en attente, en cours de traitement, validée, refusée
    et certifiée) --> ' ;
     switch ( $_SESSION['userStatut']) {
      case "en attente" : 
                         echo' <p style=\'font-weight:600 ;\' class="text-center text-warning" > <i style="padding: 5px" class="fa fa-hourglass-end" aria-hidden="true"></i>
     En attente </p>' ;
     
    break ;
    case "en cours de traitement" : 
                         echo' <p  style=\'font-weight:600 ;\' class="text-center text-warning" > <i style="padding: 5px"  class="fas fa-recycle"></i> En cours de traitement... </p>
                           ';
                          break ;
    
    case "refuse" : 
                        echo'  <p style=\'font-weight:600 ;\' class="text-center text-danger" > <i style="padding: 5px" class="fas fa-times"></i>   Refusée </p>
                          <p style=\'font-size:1rem ;\' class="text-center " > ' ; 

                            $justificatif= $_controllera->getJustificatif($_SESSION['userNom'] , $_SESSION['userPrenom'])  ;
    
  
    if($justificatif) {
  
      foreach($justificatif as $value) {
        echo  $value['justificatif'].' </p>' ;
      }
    }
    
    
    break ;
    
     case "valide" : 
                       echo'   <p style=\'font-weight:600 ;\' class="text-center text-success" > <i style="padding: 5px"  class="fas fa-check"></i>Validée </p>
                          <p  style=\'font-weight:400 ;\'  > <strong>  Veuillez rapporter la liste de documents à 
    suivante au bureau de l’entreprise : </strong> <br> ' ;
    $papiers = $_controllera->getPapiers($_SESSION['userNom'] , $_SESSION['userPrenom']);
if($papiers) {
  
    foreach($papiers as $value) {
      echo  $value['papiers'].' </p>' ;
    }
  }
    echo'
    
    
    
    
    <!-- affichier les papiers
     -->' ;
    
   } 
                      echo '</div>
                    </div> ' ;
                } 
                  echo'  <div class="d-flex justify-content-start">
                      <a href="#" style="text-transform:uppercase; color:black ;"><i class="fas fa-map-marker-alt" style="cursor: pointer ; margin-right : 10px ;  "></i> <span class=""> ' .  $_SESSION['userAdresse'].' </span></a>
                      <!-- <a href="#!"><i class="fab fa-twitter fa-lg me-3"></i></a>
                      <a href="#!"><i class="fab fa-instagram fa-lg"></i></a> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    
    
     
      <div class="historique"> 
      <h1 style="margin-left: 7rem ; margin-top: 3.5rem ; font-size: 2.5rem ;"> <i  style="margin: 0 15px ;" class="fa fa-history" aria-hidden="true"></i>
     Mon historique d\'annonces : </h1>
    
      <!--tryy begin-->
     
    
    
    
           
           
        
    <!--try end-->' ;
    
    
    
    $result = $_controllera->getHistoriqueAnnonce($_SESSION['userID']) ;
                  if ($result) {   
                       
   echo' <div class="container my-5">
      <div class="shadow-4 rounded-5 ">
        <table class="table align-middle mb-0 bg-white">
          <thead class="bg-light">
            <tr>
              <th>Titre  </th>
              <th>Point de départ et d\'arrivée</th>
              <th>Type de transport</th>
              <th>Poids entre </th> 
              <th>Volume entre </th>
              <th>Moyen de transport </th>
              <th>Etat </th>
              <th>Date de création </th>
              <th>Nombre des vues </th>
              <th> Statut </th>
              <th> Réponses </th>
              <th> Actions </th> ' ;
    
    
    
    
                    
                   foreach($result as $value) { 
                     echo'
     
    
    </tr>
          </thead>
          <tbody>
            <tr>
              <td>
              <p class="fw-bold mb-1"> '. $value['titreAnnonce'] .'</p>
              </td>
    
              <td>
                <p class="fw-bold mb-1"> '. "De ".$value['pointDepart']." à ".$value['pointArrivee'].'</p>
                
              </td>
              <td>
                <p class="fw-bold mb-1"> '. $value['typeTransport'] .'</p>
                
              </td>
    
              <td>
                <p class="fw-bold mb-1"> '. "De ".$value['poidsMin']." à ".$value['poidsMax'] .'</p>
                
              </td>
              <td>
                <p class="fw-bold mb-1"> '. "De ".$value['volumeMin']." à ".$value['volumeMax'] .'</p>
                
              </td>
              <td>
                <p class="fw-bold mb-1"> '. $value['moyenTransport'] .'</p>
                
              </td> ';
         if ($value['etat'] =="valide") {
            echo'  <td>
                <span class="badge badge-success rounded-pill"> '. $value['etat']  .'</span>
              </td>' ;
             } else {
              echo'  <td>
                <span class="badge badge-warning rounded-pill"> '. $value['etat'].' </span>
              </td>' ;
               } 
             echo'   <td>
                
                <div class="ms-3">
                    <p class="text-muted mb-0">  '. $value['creationDate'].' </p>
                  </div>
              </td>
              <td>
                  <div class="ms-3">
                    <p class="text-muted mb-0">  '. $value['viewsNumber'].' </p>
                  </div>
              </td> ' ;
    
               if ($value['statut'] =="1") {
                 echo'
              <td>
                <span class="badge badge-success rounded-pill"> confirmé </span>
              </td>' ;
               } else {
               echo' <td>
                <span class="badge badge-warning rounded-pill"> En attente </span>
              </td>' ;
                 } 
    
                    if($value['statut'] =="0") {
    
                     echo'
                     <td>
                     <div class="ms-3"> <a href="annonceResponders.php?ida='.$value['ID_annonce'].'"> Voir qui a répondu à votre annonce </a> </div>
                     </td>';
                    }
                     else {
                      echo'<td>
                      <div class="ms-3">  <a  class="text-muted mb-0" > Pas de réponse </a> </div>
                      </td> ';
                      }
                    echo'
                  
    
    
              <td>
    <!--             <a class="btn btn-success btn-sm" href="annonceDetailAdmin.php?id='. $value['ID_annonce'] .'"> Voir </a>
     --> ';
               if( $value['statut'] == '1' )  {
             echo'  

              <a  class="btn btn-success btn-sm disabled" href="?modifan='. $value['ID_annonce'].'"> <i class="fas fa-edit"></i>  </a>
              <a onclick="return confirm(\'Vous voulez vraiment supprimer cette annonce ?\')" class="btn btn-danger btn-sm " href="?suppriman='. $value['ID_annonce'].'"> <i class="fas fa-trash-alt"></i> </a>
              ';
    }
    else {
    
    echo'   <a  class="btn btn-success btn-sm" href="./updateAnnonce?modifan='. $value['ID_annonce'].'"> <i class="fas fa-edit"></i>  </a>
      <a onclick="return confirm(\'Vous voulez vraiment supprimer cette annonce ?\')" class="btn btn-danger btn-sm " href="?suppriman='. $value['ID_annonce'].'"> <i class="fas fa-trash-alt"></i> </a>' ;


    } 
  echo' </td>       
    
              
            </tr>' ;
    
      
           
    
     } echo' 
    </tbody>
        </table>
      </div>  
       
  ' ;
      }  
       else {
         echo'
      <div class="ms-3">
                    <p class="text-muted mb-0"> Vous n\'avez pas encore publier des annonces. </p>
                 ' ;
    
       }
        echo'

        
      
        <div>
        <h1 style="margin-left: 7rem ; margin-top: 3.5rem ; font-size: 2.5rem ;"> <i style="margin: 0 15px ;"  class="fa fa-history" aria-hidden="true"></i>
        Mon historique de transactions : </h1>
         
         
        </div>
     
       
     
    ' ;
     
     $result = $_controllera->getHistoriqueTrajet($_SESSION['userID']) ;
                   if ($result) {   
                        echo'
     <div class="container my-5">
       <div class="shadow-4 rounded-5">
         <table class="table align-middle mb-0 bg-white">
           <thead class="bg-light">
             <tr>
               <th width="2%">Numéro  </th>
               <th width="15%">Transporteur</th>
               <th width="7%">Titre  </th>
               <th width="15%">Date </th>
               <th width="15%">Note </th>  ' ;
                if($_SESSION['userType'] == 'transporteur') { 
                  echo'
                 <th>Gains </th> ' ;
    
               } 
               echo'
               <th width="20%">Actions </th> 
               </tr>
               </thead>
               <tbody>' ;
    
               
                    
                        
                        $i = 0 ;
                        foreach($result as $value) {
                          $i ++ ;  
      
     
  echo'
             <tr>
               <td>
                 <div class="d-flex align-items-center">
                   
                   <div class="ms-3">
                     <p class="fw-primary mb-1"> ' .  $i .' </p>
                   </div>
                 </div>
               </td>
               <td>
                 <p class="fw-primary mb-1"> ';  
                 $user = $_controllera->getUserInfoById($value['ID_transporteur'] ) ;
                 foreach ($user as $user) {
                   $nom = $user['nom'] ;
                   $prenom = $user['prenom'];
                 }
                  echo $nom.' '.$prenom .'
                 </p>
                 </p>
                 
               </td>
               <td>';
                 
                 $annonces = $_controllera->getAnnonceInfoById($value['ID_annonce']) ; 
                 foreach ($annonces as $annonce) {
                   $titre = $annonce['titreAnnonce'] ; 
                 
                  
                echo' <p class="fw-primary mb-1">'.  $titre .' </p>' ;
                  } 
              echo' </td>
     
               <td>
                 <div class="ms-3">
                     <p class="text-muted mb-0">'.   $value['creationDate'].' </p>
                   </div>
                        </td>
    
    
    
                        <td>
                 <div class="d-flex align-items-center">
                   
                   <div class="ms-3">';
                      if ($value['note']== '0' ) { 
                    echo'  <p class="fw-primary mb-1"> "Vous n\'avez pas encore noté ce trajet." </p>' ;
    
                     } else { 
                       echo'
                      <p class="fw-primary mb-1">'. $value['note'].'/5 </p>' ;
    
                     } 
                  echo' </div>
                 </div>
               </td>
    <!---Gains--->' ;
    
    if($_SESSION['userType'] == 'transporteur') { 
     echo' <td>
                 <div class="d-flex align-items-center">
                   
                   <div class="ms-3">
                   <p class="fw-primary mb-1"> "Prix : '. $value['price'] .' DA</p>
                   <p class="fw-primary mb-1"> "Gain net : ' . $value['price']*(1-$value['pourcentage']) .'DA</p>
                   <p class="fw-primary mb-1"> "Le site prend '. $value['pourcentage']*100 .'% : '.  $value['price']*$value['pourcentage'] .'DA</p>
    
    
                   </div>
                 </div>
               </td>' ;
    
    
     }
                      echo'  <!---actions---->
    
                        <td>' ;
                           if($value['termine'] == '0') {  
                             echo'
                            <a class="btn btn-success btn-sm" href="?signalFinished=' . $value['ID_trajet'] .'" > <i class="fas fa-check"> </i> Signaler comme terminé </a>
    
    ';
                           } else { 
                           echo' <a class="btn btn-success btn-sm disabled"  onclick="">  <i class="fas fa-check"></i> Terminé </a>' ;
    
                            } 
                            if ($value['note']== '0' ) {
                              echo'  <a href="./rate.php?id='. $value['ID_transporteur'] .'&idtr='. $value['ID_trajet'] .'" class="btn btn-warning btn-sm "  > <i class="fas fa-star"> </i> Noter </a> ';

                            }
                            else {
                              echo'  <a disabled class="btn btn-warning btn-sm "  > <i class="fas fa-star"> </i> Noter </a> ';

                            }
       echo'
          <a href="report.php?id='. $value['ID_trajet'] .'&idsd='. $value['ID_transporteur'] .'&ids='. $_SESSION['userID'] .'" class="btn btn-danger btn-sm ">       <i class="fas fa-exclamation-triangle"></i> 
      Signaler cet utilisateur </a>
    
     
     </td>    
    
         
             </tr>' ;
     
       
             
     
      } 
      echo'
     </tbody>
         </table>
       </div>
     </div>
  ' ;
      }   else {
        echo'
       <div class="ms-3">
                     <p class="text-muted mb-0"> Vous n\'avez pas encore des transactions. </p>
                   </div>' ;
     
        } 
     echo'
       </div>
       </div>
       </div>
       <script type="text/javascript" src="../bootstrapDesign/js/mdb.min.js"></script>
        <!-- Custom scripts -->
        <script type="text/javascript"></script>
      <script src="../js/index.js"> </script>
    </body>
    </html>';

      }
    }


