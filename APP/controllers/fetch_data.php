<?php
require_once '../libraries/Database.php';


    class fetch_data {

        private $model;
        
        public function __construct(){
            $this->model = new fetch_data;
        }



}
/* 
     
$init = new affichControl;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  switch($_POST['type']){

      case 'updateAdmin':
          $init->updateUserByIdInfo($ID_user , $data);
          break;
      case 'loginAdmin':
          $init->loginAdmin();
          break;
        
     /*  default:
      redirect("./index.php");
  } 
}
  
else{
switch($_SERVER['QUERY_STRING']) {
  case 'logout':
    $init->logout();
    break;
 case 'ID_user':
  $ID_user = $_GET['ID_user'];
  break ; 
case 'remove' :
  $remove = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['remove']);
  $init->deleteUserById($remove) ;

}
 */

 

if(isset($_POST["action"]))
{
/*     echo "<script> alert('insiiide action') ;</script>";
 */
    if(isset($_POST["action"]))
    {
/*         echo "<script> alert('just above query') ;</script>";
 */
$query = "
            SELECT * FROM annonces WHERE archive = '0' AND etat='valide' LIMIT 8
        ";

        if((isset($_POST["minimum_poids"], $_POST["maximum_poids"]) && !empty($_POST["minimum_poids"]) && !empty($_POST["maximum_poids"]))|| (isset($_POST["minimum_volume"], $_POST["maximum_volume"]) && !empty($_POST["minimum_volume"]) && !empty($_POST["maximum_volume"]) ) || isset($_POST["typeTransport"]) || isset($_POST["moyenTransport"])
        
        || (isset($_POST["wilayadep"]) && !empty($_POST["wilayadep"] )) || (isset($_POST["wilayaarriv"]) && !empty($_POST["wilayaarriv"] ))  )
        {
            $query = "
            SELECT * FROM annonces WHERE archive = '0' AND etat='valide'
        ";

        
        
        if(isset($_POST["minimum_poids"], $_POST["maximum_poids"]) && !empty($_POST["minimum_poids"]) && !empty($_POST["maximum_poids"]))
        {
           
           
            echo "<script> console.log('indife poidmax') ;</script>";

            $query .= "
             AND poidsMin >= '".$_POST["minimum_poids"]."' AND poidsMax <='".$_POST["maximum_poids"]."'
            ";
        }
        if(isset($_POST["minimum_volume"], $_POST["maximum_volume"]) && !empty($_POST["minimum_volume"]) && !empty($_POST["maximum_volume"]))
        {
          
            $query .= "
             AND volumeMin >= '".$_POST["minimum_volume"]."' AND volumeMax <='".$_POST["maximum_volume"]."'
            ";
        }
        if(isset($_POST["typeTransport"]))
        {
            
            $typeTransport_filter = implode("','", $_POST["typeTransport"]);
            $query .= "
             AND typeTransport IN('".$typeTransport_filter."')
            ";
        }
        if(isset($_POST["moyenTransport"]))
        {
          
            $moyenTransport_filter = implode("','", $_POST["moyenTransport"]);
            $query .= "
             AND moyenTransport IN('".$moyenTransport_filter."')
            ";
        }

        if(isset($_POST["wilayadep"]) && !empty($_POST["wilayadep"] ) ) 
        {
            echo "<script> console.log('indife wilayadep') ;</script>";
            $wilayadep_filter = trim($_POST["wilayadep"]);
            $_POST['wilayadep'] = '' ;

/*             $wilayadep_filter = implode("','", $_POST["searchwilayadep"]);
 */            $query .= "
             AND pointDepart IN('".$wilayadep_filter."')
            ";
        }

        if(isset($_POST["wilayaarriv"]) && !empty($_POST["wilayaarriv"] ) ) 
        {
            echo "<script> console.log('indife wilayaarriv') ;</script>";
            $wilayadep_filter = trim($_POST["wilayaarriv"]);
            $_POST['wilayaarriv'] = '' ;


/*             $wilayadep_filter = implode("','", $_POST["searchwilayaarriv"]);
 */            $query .= "
             AND pointArrivee IN('".$wilayadep_filter."')
            ";
        }
    }
        
        
       /*  if(isset($_POST["storage"]))
        {
            $storage_filter = implode("','", $_POST["storage"]);
            $query .= "
             AND product_storage IN('".$storage_filter."')
            ";
        } */
       
/*         <img src="image/'. $row['product_image'] .'" alt="" class="img-responsive" >
 */

include_once '../models/fetch_data_model.php';


$_controller = new fetch_data_model() ;  

        
        $result =  $_controller->filter($query) ;
        $output = '';
        if($result)
        {
            foreach($result as $row)
            {
                $output .= '
                <div class="col-sm-4 col-lg-3 col-md-3" >
                    <div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:500px;">

                    <p align="center"><strong><a style="text-decoration:none; font-size:1.5rem; color:#4481eb ;">'. $row['titreAnnonce'] .'</a></strong></p>
                    <img src="../assets/'.$row['image'].'" alt="image" style="margin: 20px 0 ;" width="100%" height="40%"> 
                    Type de transport : '. $row['typeTransport'] .' <br />
                    <p>Point de départ : '. $row['pointDepart'].' <br />
                        Point darrivée : '. $row['pointArrivee'] .' <br />
                        <p > Poids entre: '. $row['poidsMin'] .' - '. $row['poidsMax'] .' KG</p>
                        <p > Volume entre: '. $row['volumeMin'] .' - '. $row['volumeMax'] .'L</p>

                        <a style="text-decoration: none;" href="./annonceDetail.php?id='.$row['ID_annonce'].'"> <p align="center" style="font-weight:700;"> Lire la suite </p> </a>
                    </div>
    
                </div>
                ';
            }
        }
        
        else
        {
            $output = '<a style="margin: 2rem ; text-align: center ; font-weight: 700; text-decoration: none ; font-size:2rem ;"> <i class="far fa-meh"></i> Aucune annonce ne correspond à ces critères ! </a>';
        }
        echo $output;
     } 


    }
    