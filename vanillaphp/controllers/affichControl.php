<?php

    require_once 'models/affichModel.php';
    require_once 'helpers/session_helper.php';

    class affichControl {

        private $model;
        
        public function __construct(){
            $this->model = new affichModel;
        }
        public function setViews($views ,  $ID_annonce) {
          return $this->model->setViews($views ,  $ID_annonce) ; 

        }
        public function getHistoriqueAnnonce($userID) {

          return $this->model->getHistoriqueAnnonce($userID) ;
    
    
        }
    
    
        public function getHistoriqueTrajet($userID) {
          return $this->model->getHistoriqueTrajet($userID) ;
    
    
        }

        public function selectMoyenTransport() {

          return $this->model->selectMoyenTransport() ;
   }
  

        public function selectTypeTransport() {
        
        

          return $this->model->selectTypeTransport() ;
  
      }

      
      public function selectViews() {
        
        

        return $this->model->selectViews() ;

    }

    


      
  
        function affichWilaya() {

            return $this->model->affichWilaya() ; 

                }

        public function userWilayaSelected($ID_user , $ID_wilaya) {
          return $this->model->userWilayaSelected($ID_user , $ID_wilaya) ; 


        }
        public function deleteAnnonceById($remove){
          return $this->model->deleteAnnonceById($remove) ;
  
  
      } 
      public function archiveAnnonce($deactive) {
          return $this->model->archiveAnnonce($deactive) ;
  
  
      }
        public function getTypeUtilisateur($ID_user) {
          return $this->model->getTypeUtilisateur($ID_user ) ; 


        }
        /* public function selectAllReports2() {
          return $this->model->selectAllReports2() ; 

        } */

         public function getAnnonceInfoById($ID_annonce) {
          return $this->model->getAnnonceInfoById($ID_annonce) ; 


        }

        public function returnAttributeUser($ID_user , $attribut) {
          return $this->model->returnAttributeUser($ID_user , $attribut) ; 


        }

        

        public function selectAllReports() {
          return $this->model->selectAllReports() ; 


        }



                 function selectAllAnnouncements(){
                  return $this->model->selectAllAnnouncements() ; 

                   
                  }
                
        function selectAllUserData() {
            
           return $this->model->selectAllUserData() ; 
            
        }



         function getUserInfoById($ID_user){
            return $this->model->getUserInfoById($ID_user) ; 
           
      
      
          }

  
  
  
    //
    //   Get Single User Information By Id Method

    
       function updateUserByIdInfo($ID_user, $data){

       /* $data=[
          'ID_user' => trim($_POST['ID_user']),
          'nom' => trim($_POST['nom']),
          'prenom' => trim($_POST['prenom']),
          'numero' => trim($_POST['numero']),
          'adresse' => trim($_POST['adresse']),
          'email' => trim($_POST['email']),
          'type' => trim($_POST['type']),
          'note' => trim($_POST['note']),
          'photo' => trim($_POST['photo']),
          'statut' => trim($_POST['statut']),
          'password' => trim($_POST['password'])
      ]; */
      if (isset($updateUser)) {
        echo $updateUser;
        return $this->model->updateUserByIdInfo($ID_user, $data) ;

      }
      
  
      }
  
  
  
  
      // Delete User by Id Method
      public function deleteUserById($remove){
        if (isset($removeUser)) {
          echo $removeUser;
        

        return $this->model->deleteUserById($remove) ;
      }


        
      }

     
      

   
  

     
  public function loginAdmin() {

  }
  public function logout() {

  }


  //**********************statistiques*************************** */

  public function getUsersNumber(){
    return $this->model->getUsersNumber() ;



  }

  public function getTransporteursNumber(){
    return $this->model->getTransporteursNumber() ;


    
  }
  public function getClientsNumber(){
    return $this->model->getClientsNumber() ;


    
  }
  public function getAnnncesNumber(){
    return $this->model->getAnnncesNumber() ;

  }

  public function getTopAnnonces(){
    return $this->model->getTopAnnonces() ;

  }
  public function getTrajetsNumber(){
    return $this->model->getTrajetsNumber() ;

  }


  
  
      
    }


     
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
          redirect("./index.php");*/
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

    /*   switch($_GET['q']){
          //we add cases for get here
          case 'logout':
              $init->logout();
              break;
           case 'ID_user':
            $ID_user = $_GET['ID_user'];
            break ; 
          case 'remove' :
            $remove = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['remove']);
            $init->deleteUserById($remove) ;
          case 'changeStatut': 
            $ID_user = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['changeStatut']);
            $init->userChangeStatut( $ID_user,$etat) ;
 */


        /*   default:
          redirect("./index.php");  }*/
      
  }
  
  

            

            


 