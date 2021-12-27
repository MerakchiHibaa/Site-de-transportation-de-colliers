<?php
/* 
Class Databse {
  private $host = 'localhost' ; 
    private $user = 'root' ;
    private $password = '' ; 
    private $dbname = 'projet' ;
    private $dbh ; 
    private $stmt ; 
    private $error ; 
    public function __construct() {
      $ds, = 'mysql:host='.$this->host.';dbname='.$this->dbname ; 
      $options = array (
        PDO::ATTR_PERSISTENT => true ; 
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      ) ;
      try {
        $this -> dbh = new
      }
    }

}
 */
 

    // Informations d'identification
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'projet');
 
// Connexion à la base de données MySQL 
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Vérifier la connexion
if($conn === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}



?>