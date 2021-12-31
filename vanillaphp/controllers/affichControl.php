<?php

    require_once 'models/affichModel.php';
    require_once 'helpers/session_helper.php';

    class affichControl {

        private $model;
        
        public function __construct(){
            $this->model = new affichModel;
        }

        function affichWilaya() {

            return $this->model->affichWilaya() ; 

                }



                public function selectAllUserDat(){
                   
                  }
                
        function selectAllUserData() {
            
           return $this->model->selectAllUserData() ; 
            
        }



         function getUserInfoById($ID_user){
            return $this-> model-> getUserInfoById($ID_user) ; 
           
      
      
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

     
      public function userChangeStatut( $ID_user,$etat){
        if($etat == 'en attente') {
          return $this->model->userAttente( $ID_user) ;

        }
        if($etat == 'en cours de traitement') {
          
          return $this->model->userTraitement( $ID_user) ;

        }
        if($etat == 'valide') {
          return $this->model->userValider( $ID_user) ;

          
        }

        if($etat == 'refuse') {
          return $this->model->userRefuser($ID_user) ;   
        }
      }

   
  

     
  public function loginAdmin() {

  }
  public function logout() {

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
    case 'changeStatut': 
      $ID_user = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['changeStatut']);
      $init->userChangeStatut( $ID_user,$etat) ;

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
  
  

            

            


 