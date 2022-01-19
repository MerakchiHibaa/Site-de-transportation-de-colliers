<?php


include_once '../controllers/Users.php';
include_once '../controllers/affichControl.php';


class Accueil_view {

    private $userController;
    private $affichController;

    public function __construct(){
       /*  $this->userController = new Users;
        $this->affichController = new affichControl; */

    }
    public function display() {

        session_start() ; 
            echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../css/index.css">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/notification.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
        
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">            
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
        
        
            <title>Accueil</title>
            <script src="../js/jquery-1.10.2.min.js"></script>
            <script src="../js/jquery-ui.js"></script>
             <script src="../js/bootstrap.min.js"></script>
             
           <link rel="stylesheet" href="./css/bootstrap.min.css">
             <link href = "../css/jquery-ui.css" rel = "stylesheet">
            <!-- Custom CSS -->
        <!--     <link href="../css/style.css" rel="stylesheet">
         --></head>
        <body> ' ; 
           if( !isset($_SESSION["userID"])) {
               echo'
            <div class="bar" >
                <div class="logo">  <img src="../assets/logo.png" alt="Logo"> </div>
               <div class="bar-buttons"> 
                <a  class="btn-up" > Inscription</a>
                <a class="btn-up" >Connexion </a>
            </div>
            </div> ' ;
           } else {
                echo'
               
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container"> 
        
                
          <div class="container-fluid">
           <!--  <a class="navbar-brand" href="#">Navbar</a> -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>';
       /*  <?php  */
        include_once "../controllers/affichControl.php"  ; 
        $_controller = new affichControl();
        $_SESSION["userID"] ="5" ;
        $demandes = $_controller->getUnreadDemandes($_SESSION["userID"]) ; 
        if ($demandes) {
            $count = count($demandes);
        
        }
        else {
            $count = 0 ; 
        

        } 
    
        
        
          echo'  <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <!-- <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li> -->
                
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fas fa-envelope"></i>  <span class="badge bg-secondary" id="count" >'. $count.' </span>
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown"> ' ;
                     
                      if($count > 0 ) {
                          foreach($demandes as $demande) {
                             $transporteur= $_controller->getUserInfoById($demande["ID_transporteur"]);
                             foreach ($transporteur as $transporteur) { 
                            echo '<li><a class="dropdown-item text-primary " href="reponseDemande.php?idt='.$demande["ID_transporteur"].'&ida='.$demande["ID_annonce"].'"> Le transporteur '.$transporteur["nom"].' '.$transporteur["prenom"].' a répondu à votre annonce. </a>
                            <li><hr class="dropdown-divider"></li>' ;
                            
                           
                          }
                        }
        
                      }
                      else {
                          
                          echo '<li><a class="dropdown-item text-danger font-weight-bold" href="#"> <i class="fa fa-frown-o" aria-hidden="true"></i>
                          Oops! aucune notification.</a> </li>' ;
                          
        
                      }
                       
                   echo'
            </div>
          </div>
          </div>
        </nav> ' ;
                 } 
            
           echo' <header>
                <div class="slider">
                    <div class="slides"> 
                        <input type="radio" name="ratio-btn" id="radio1">
                        <input type="radio" name="ratio-btn" id="radio2">
                        <input type="radio" name="ratio-btn" id="radio3">
                        <input type="radio" name="ratio-btn" id="radio4">
        
        
                  
                    <div class="slide first">
                   <a>  <img class="slider-img" src="../assets/slider1.jpg" alt="" /> </a>
                </div>
                <div class="slide"> 
                   <a>  <img class="slider-img" src="../assets/slider2.jpeg" alt="" /> </a>
                </div>
                <div class="slide"> 
                   <a>  <img class="slider-img" src="../assets/slider3.jpg" alt="" /> </a>
                </div>
                <div class="slide"> 
                   <a>  <img class="slider-img" src="../assets/slider4.jpg" alt="" /> </a>
                </div>
                <!-------automatic naviation-->
                <div class="navigation-auto">
                    <div class="auto-btn1"> </div>
                    <div class="auto-btn2"> </div>
                    <div class="auto-btn3"> </div>
                    <div class="auto-btn4"> </div>
        
        
                </div>
        
                <!---- manual navigation-->
                <div class="navigation-manual">
        
                    <label for="radio1" class="manual-btn"></label>
                    <label for="radio2" class="manual-btn"></label>
                    <label for="radio3" class="manual-btn"></label>
                    <label for="radio4" class="manual-btn"></label>
        
                </div>
            </div> <!--slider-->
        
            
            </div> <!--slider-->
            </header>  
        
            
        <div class="menu-bar"> 
        <ul> 
           <li>  <a href="#"> Page d\'accueil </a> </li>
           <li>  <a href="presentation.php"> Présentation </a> </li>
           <li>  <a href="news.php"> News </a> </li>
         <!--   
         <li>  <a href="signup.php"> Inscription </a> </li>
           <li>  <a href="statistiques.php"> Statistiques </a> </li>
           <li>  <a href="contact.php"> Contact </a> </li>
         -->
           <li>  <a href="signup.php"> Inscription </a> </li>
           <li>  <a href="statistiques.php"> Statistiques </a> </li>
           <li>  <a href="contact.php"> Contact </a> </li>
        </ul>
        
        </div>
        <section class="container"> 
        
        <!-- <div id="mainButton"> -->
        
        
        
            
            <!-- <div onclick="openForm()" class="btn-text"  >
                <i class="fas fa-search"> </i>
            </div>
        
            <div class="modal"> 
        
            <div onclick="closeForm()" class="cancel-btn">
                <i class="fas fa-times"> </i>
            </div> -->
        
        
        
        <!-- </div> -->
        
        
        </section>
        
        
        
        <div class="container-annonce">  <!--container annonce-->
        
        <!--begin section left box-->
        <div class="leftbox-section" style="margin:70px;"> 
            <div class="leftbox"> 
                <div class="content" style="width: 30rem;
            height: 10rem;">
                    <h1> Annonces </h1> 
                    <p> Cette artie explique ce qui existe dans cette partie :p</p>
        
        
                </div>
            </div>
        
        </div><!--end section left box-->
        </div>
        
        <!-- end of container-annonce-->
        
         <!--filters here points de départ, points d’arrivée, type de transport, poids, volume--->
         <div class="container-filter" > <!--container filtre + cards-->
          
         <div class="wrapper-filter" style="float:left ; margin: 30px ; width: 20%"> 
        
         <div  > <!-- id="form-search"class="form search" -->
            <form  method="post"  class="form-inline p-3" id="ajax-form" > <!--  ajax-form -->
           <div> 
                <label> <!-- custom-field recherche depart -->
                    <input  type="text" class="form-control form-control-lg rounded-0 border-info" placeholder="Emplacement de départ"   id="searchwilayadep" name="searchwilayadep" > 
        <!--             <span class="placeholder recherche"> Emplacement de départ </span>
         -->        </label>
            </div>
        
            <div> 
        
            <label> 
                <input type="text" class="form-control" value="" placeholder="Emplacement d\'arriver"   id="searchwilayaarriv" value="" name="searchwilayaarriv"> <!--  class="form__input"  -->
        <!--         <span class="placeholder recherche"> Emplacement d\'arriver </span>
         -->
            </label> 
        
            </div>
        
            <div>
                <input  class="btn btn btn-info "  type="submit" value=""> <!-- id="rechercher" -->
              </div>
            </form>
        </div>
        
         
        
        
         <div class="filter" >    <!-- filtre float right-->
        
        
         <div class="filter-group">                    
            <div class="list-group">
             <h3>Poids</h3>
             <input type="hidden" id="hidden_minimum_poids" value="0" />
                            <input type="hidden" id="hidden_maximum_poids" value="1000" />
                            <p id="poids_show">10 - 20</p>
                            <div id="poids_range"></div>
                        </div>  
                        
             <div class="list-group">
             <h3>Volume</h3>
             <input type="hidden" id="hidden_minimum_volume" value="0" />
                            <input type="hidden" id="hidden_maximum_volume" value="2000" />
                            <p id="volume_show">10 - 200</p>
                            <div id="volume_range"></div>
                        </div>  
        
            <div class="list-group">
             <h3>Type de transport </h3>
                            <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">' ;
            
             
        include_once '../controllers/affichControl.php';
        $_controller = new affichControl();
        
        $result = $_controller->selectTypeTransport() ;
                           
                            foreach($result as $row)
                            {
                           
                           
                           echo' <div class="list-group-item checkbox">
                                <label><input type="checkbox" class="common_selector typeTransport" value="'.$row["typeTransport"].'" >' .$row["typeTransport"] .'</label>
                            </div> ' ;
                            
                            }
        
                           
                            echo'
                        </div>
                        </div>
                       
        
            <div class="list-group">
             <h3>Moyen de transport</h3>
             <div > <!-- style="height: 180px; overflow-y: auto; overflow-x: hidden;" -->' ;
            
            
              
         include_once '../controllers/affichControl.php';
         
        
        $result = $_controller->selectMoyenTransport() ;
                           
                            foreach($result as $row)
                            {
                            echo'
                           
                            <div class="list-group-item checkbox">
                                <label><input type="checkbox" class="common_selector moyenTransport" value="'.$row["moyenTransport"].'"  >'.$row["moyenTransport"] .' </label>
                            </div>  ';
                            
                            }
        
                          
                           echo'
                           </div>
        
                          </div> 
                          </div>
                           </div>
        
                           </div>
          <!-- filtre-->
        
          </div>
        
        
        
        
         <!-- class="col-md-9" -->
                           <div class="col-ms-9" style="float:left ;" > <!--float left-->
                        <br />
                        <div class="row filter_data">
        
                        </div>
                    </div>
                    </div>
                        <!--end container filtre + cards-->
                          
        <!--end filter-->
        
        
           
        
        
        <!-- </div> -->
        
        
        
        
        
        <div class="buttons"> 
        <a href="./presentation.php" class="btn-up"  > Comment cela fonctionne </a>
        </div>
        
        <!-- </section> -->
        <footer>
            <div class="menu-bar" style="height: 0 ;"> 
                <ul> 
               <li>  <a href="#"> Page d\'accueil </a></li>
               <li>  <a href="presentation.php"> Présentation </a> </li>
               <li>   <a href="news.php"> News</a> </li>
               <li>  <a href="signup.php"> Inscription</a> </li>
               <li>  <a href="statistiques.php"> Statistiques</a> </li>
               <li>  <a href="contact.php"> Contact</a> </li>
            </ul>
            
            </div>
             </footer>
        
             <style>
        #loading
        {
         text-align:center; 
         background: url(\'./loader.gif\') no-repeat center; 
         height: 150px;
        }
        </style>
        
        <script>
        $(document).ready(function(){
            console.log("je suis dans script") ;
        
            filter_data();
        
            function filter_data()
            {
        /*         console.log("je suis dans filterdata") ;
         */
                $(\'.filter_data\').html(\'<div id="loading" style="" ></div>\');
                var action = "fetch_data";
                var wilayadep ;
                var wilayaarriv ;
                var minimum_poids = $(\'#hidden_minimum_poids\').val();
                var maximum_poids = $(\'#hidden_maximum_poids\').val();
                
                var minimum_volume = $(\'#hidden_minimum_volume\').val();
                var maximum_volume = $(\'#hidden_maximum_volume\').val();
        
                var typeTransport = get_filter(\'typeTransport\');
                var moyenTransport = get_filter(\'moyenTransport\');
                
        
        /*     console.log("je suis dans default") ; 
         */
                $.ajax({
                    url:"../controllers/fetch_data.php",
                    method:"POST",
                    data:{action:action, minimum_poids:minimum_poids,  maximum_poids:maximum_poids, minimum_volume:minimum_volume, maximum_volume:maximum_volume, typeTransport:typeTransport, moyenTransport:moyenTransport},
                    success:function(data){
                        $(\'.filter_data\').html(data);
                    }
                });
        
                $(\'#ajax-form\').on(\'submit\', function() {
        
           wilayadep = $(\'#searchwilayadep\').val() ;
            wilayaarriv = $(\'#searchwilayaarriv\').val() ; 
        
        /*     console.log("je suis dans submit") ; 
         */   /*  $.ajax({
                    url:"../controllers/fetch_data.php",
                    method:"POST",
                    data:{action:action, wilayadep:wilayadep, wilayaarriv:wilayaarriv, minimum_poids:minimum_poids,  maximum_poids:maximum_poids, minimum_volume:minimum_volume, maximum_volume:maximum_volume, typeTransport:typeTransport, moyenTransport:moyenTransport},
                    success:function(data){
                        $(\'.filter_data\').html(data);
                    }
                }); */
        
        
         if(wilayadep != "" ) {
        
        
            if(wilayaarriv != "") {
        
                console.log("je suis dans wilayadep wilayaarriv") ; 
                console.log(wilayaarriv) ; 
        
                $.ajax({
                    url:"./controllers/fetch_data.php",
                    method:"POST",
                    data:{action:action, wilayadep:wilayadep, wilayaarriv:wilayaarriv, minimum_poids:minimum_poids,  maximum_poids:maximum_poids, minimum_volume:minimum_volume, maximum_volume:maximum_volume, typeTransport:typeTransport, moyenTransport:moyenTransport},
                    success:function(data){
                        $(\'.filter_data\').html(data);
                    }
                });
            }
        
            $.ajax({
        
                    url:"../controllers/fetch_data.php",
                    method:"POST",
                    data:{action:action, wilayadep:wilayadep, minimum_poids:minimum_poids,  maximum_poids:maximum_poids, minimum_volume:minimum_volume, maximum_volume:maximum_volume, typeTransport:typeTransport, moyenTransport:moyenTransport},
                    success:function(data){
                        $(\'.filter_data\').html(data);
                    }
                });
            }
        
        
            else if(wilayaarriv != "") {
                console.log("je suis dans wilayarriv wilayadep") ; 
        
                if(wilayadep != "") { 
                $.ajax({
                    url:"../controllers/fetch_data.php",
                    method:"POST",
                    data:{action:action, wilayadep:wilayadep, wilayaarriv:wilayaarriv, minimum_poids:minimum_poids,  maximum_poids:maximum_poids, minimum_volume:minimum_volume, maximum_volume:maximum_volume, typeTransport:typeTransport, moyenTransport:moyenTransport},
                    success:function(data){
                        $(\'.filter_data\').html(data);
                    }
                });
            }
        
            $.ajax({
                    url:"../controllers/fetch_data.php",
                    method:"POST",
                    data:{action:action,  wilayaarriv:wilayadep, minimum_poids:minimum_poids,  maximum_poids:maximum_poids, minimum_volume:minimum_volume, maximum_volume:maximum_volume, typeTransport:typeTransport, moyenTransport:moyenTransport},
                    success:function(data){
                        $(\'.filter_data\').html(data);
                    }
                });
        
            /* } ); */
        
        }
        
        
        
        
        return false; 
        
        });
            
        /* 
        else {  
        
            console.log("je suis dans default") ;  */
        
        
        
        
            } 
          /*   
         }  */
        
        
            function get_filter(class_name)
            {
                var filter = [];
                $(\'.\'+class_name+\':checked\').each(function(){
                    filter.push($(this).val());
                });
                return filter;
            }
        
            $(\'.common_selector\').click(function(){
                filter_data();
            });
        
            $(\'#poids_range\').slider({
                range:true,
                min:0,
                max:1000,
                values:[0, 1000],
                step:1,
                stop:function(event, ui)
                {
                    $(\'#poids_show\').html(ui.values[0] + \' - \' + ui.values[1]);
                    $(\'#hidden_minimum_poids\').val(ui.values[0]);
                    $(\'#hidden_maximum_poids\').val(ui.values[1]);
                    filter_data();
                }
            });
            $(\'#volume_range\').slider({
                range:true,
                min:0,
                max:1000,
                values:[0, 1000],
                step:1,
                stop:function(event, ui)
                {
                    $(\'#volume_show\').html(ui.values[0] + \' - \' + ui.values[1]);
                    $(\'#hidden_minimum_volume\').val(ui.values[0]);
                    $(\'#hidden_maximum_volume\').val(ui.values[1]);
                    filter_data();
                }
            });
        
        });
        </script>
        
        <script type="text/javascript"> 
        $(document).ready(function(){
            
        
        })
        </script>
        <script  src="../js/index.js"> </script>
           <!--  <script  src="index.js"> </script>
            <script src="jquery-1.10.2.min.js"></script>
            <script src="jquery-ui.js"></script>
            <script src="bootstrap.min.js"></script> -->
             <link rel="stylesheet" href="./css/bootstrap.min.css">  
        <!--       <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
         -->    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
           <script type="text/javascript" src="vanilla-tilt.js"></script>
            <script type="text/javascript">
               VanillaTilt.init(document.querySelectorAll(".card"), {
                   max: 25,
                   speed: 400 ,
                  /*  glare:true , 
                   "max-glare" : 1 */
               });
            </script>
        
        </body>
        </html> ' ;

    
    }
}




 /* if (!isset($_SESSION["userID"]) or !isset($_SESSION["userEmail"])) {
    / */

    /* if(isset($_POST["searchwilayadep"]) || isset($_POST["searchwilayaarriv"])) {
        echo filter_data();
        return;
    } */
 ?>
 