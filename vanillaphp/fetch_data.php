<?php
require_once 'libraries/Database.php';


/*     require_once 'fetch_data_model.php';
 *//*     require_once 'helpers/session_helper.php';
 */
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

    if(isset($_POST["action"]))
    {
        $query = "
            SELECT * FROM annonces WHERE archive = '0'
        ";
        if(isset($_POST["minimum_poids"], $_POST["maximum_poids"]) && !empty($_POST["minimum_poids"]) && !empty($_POST["maximum_poids"]))
        {
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
       /*  if(isset($_POST["storage"]))
        {
            $storage_filter = implode("','", $_POST["storage"]);
            $query .= "
             AND product_storage IN('".$storage_filter."')
            ";
        } */
       
/*         <img src="image/'. $row['product_image'] .'" alt="" class="img-responsive" >
 */

include_once 'fetch_data_model.php';


$_controller = new fetch_data_model() ;  

        
        $result =  $_controller->filter($query) ;
        $output = '';
        if($result)
        {
            foreach($result as $row)
            {
                $output .= '
                <div class="col-sm-4 col-lg-3 col-md-3">
                    <div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:450px;">

                    <p align="center"><strong><a href="#">'. $row['titreAnnonce'] .'</a></strong></p>
                    Type de transport : '. $row['typeTransport'] .' <br />
                    <p>Point de départ : '. $row['pointDepart'].' <br />
                        Point darrivée : '. $row['pointArrivee'] .' <br />
                        <p style="text-align:center;" class="text-danger" > Poids entre: '. $row['poidsMin'] .' - '. $row['poidsMax'] .' KG</p>
                        <p style="text-align:center;" class="text-danger" > Poids entre: '. $row['volumeMin'] .' - '. $row['volumeMax'] .'L</p>

                        <a href="annonceDetail.php?id='.$row['ID_annonce'].'"> Lire a suite </a>
                    </div>
    
                </div>
                ';
            }
        }
        
        else
        {
            $output = '<h3>No Data Found</h3>';
        }
        echo $output;
     } 


    }