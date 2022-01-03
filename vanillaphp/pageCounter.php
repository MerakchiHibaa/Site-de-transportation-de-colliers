<?php 
session_start() ; 
if(isset($_SESSION['view'])) {
    $_SESSION['view'] = $_SESSION['view'] + 1 ; 

}else {
    $_SESSION['view'] = 1 ; 
}

echo "Page View Is ".$_SESSION['view'] ; 

function getVisitor($ID_annonce) {
    $IP =$_SERVER['REMOTE_ADDR'] ; //the IP adress
    if(!empty($IP)) {
        //call this method flapage  annonces be3d matb3th the id
        /*query select viewsNumber from annonces where ID_annonce = $ID_annonce  
        $result = $bd->resultSet()  ;
        foreach($result as $res)
         { $views = $res['viewsNumber'] ; 
             $newView = ++ $views ; 
              query update annonces set viewsNumber = '$newViews'where ID_annonce = $ID_annonce
              db->execute() ; 

        }
         */

    }

}
?>