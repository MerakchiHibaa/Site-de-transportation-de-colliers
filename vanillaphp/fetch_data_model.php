<?php
require_once 'libraries/Database.php';

    require_once 'fetch_data.php';
/*     require_once 'helpers/session_helper.php';
 */
    class fetch_data_model {

        private $model;
        
        public function __construct(){
            $this->db = new Database;        }

        public function filter($queryy) {
            $this->db->query($queryy);
            return  $this->db->resultSet() ; 

        }
        /* public function filterpoids($poidsMin){
            $this->db->query("SELECT * FROM annonces WHERE archive = :archive");
            $this->db->bind(':archive', "0");
            return  $this->db->resultSet() ; 

        }
 */

    }