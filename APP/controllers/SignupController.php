

    <?php
    require_once '../models/User.php';
    include_once '../views/signup-view.php';


class SignupController {
    private $userModel ;
    private $signup ;

    public function __construct(){
/*         $this->userModel = new User;
 */        $this->signup = new signup_view() ; 



    }

    public function afficherSignup() {
        $this->signup->display() ; 
    }
    


    

}
