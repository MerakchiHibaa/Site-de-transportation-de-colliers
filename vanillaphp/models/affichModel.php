<?php
require_once 'libraries/Database.php';

class affichModel {

    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    


    public function affichWilaya() {

        $this->db->query("SELECT * FROM wilaya ") ;
        /*          return $this->db->rowCount() ; ;
*/
         return  $this->db->resultSet() ; 
          


       /*  while()
    
    
      
            foreach( $this->db->resultSet() as $rows) {
                $row = $rows['wilaya'];
                echo $row ;
               echo ("<option value='$row' selected> $row </option> ");
     
                 //echo $rows['wilaya'] ;
                 //echo "inside while" ;
              }
    
    }  */
}

function selectAnnonce($offset) {
    $this->db->query("SELECT * FROM annonces ") ;
  
      $annonces =  $this->db->resultSet() ; 
     $depart =  $annonces[$offset]['pointDepart'] ; 
    $arrive =  $annonces[$offset]['pointArrivee'] ; 



}

public function selectAllUserData() {
    $this->db->query("SELECT * FROM users ORDER BY ID_user DESC");
    return  $this->db->resultSet() ; 
    

    
}

}

