<?php



class Accueil_view {

    private $userController;
    private $affichController;

    public function __construct(){
       /*  $this->userController = new Users;
        $this->affichController = new affichControl; */

    }
    public function display() {

     /*    session_start() ;  */
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
             
           <link rel="stylesheet" href="../css/bootstrap.min.css">
             <link href = "../css/jquery-ui.css" rel = "stylesheet">
            <!-- Custom CSS -->
        <!--     <link href="../css/style.css" rel="stylesheet">
         --></head>
        <body> ' ; 
           if( !isset($_SESSION["userID"])) {
               echo'
            <div class="bar" style =" height: 5rem;
            background-color: #4481eb;" >
                <div class="logo"  >  <img style ="background-color: transparent; filter: invert(1); 
                
                width: 8rem; height: 10rem; float: left;
    transform: translateY(-2.5rem);
                " src="../assets/logo.png" alt="Logo"> </div>
               <div class="bar-buttons" style ="background-color: transparent;"> 
                <a href="signup.php" class="btn-up" style="text-decoration: none; "> Inscription</a>
                <a href="signup.php" class="btn-up" style="text-decoration: none;">Connexion </a>
            </div>
            </div> ' ;
           } else {
                echo'
               
                <nav class="navbar navbar-expand-lg navbar" style ="background-color : #4481eb ;">
                    <div class="container"> 
        
                
          <div class="container-fluid">
           <!--  <a class="navbar-brand" href="#">Navbar</a> -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>';
           /*  if( $_SESSION['userType'] == 'client') { */

            
       /*  <?php  */
        include_once "../controllers/affichControl.php"  ; 
        $_controller = new affichControl();
        $demandes = $_controller->getUnreadDemandes($_SESSION["userID"]) ; 
        if ($demandes) {
            $count = count($demandes);
        
        }
        else {
            $count = 0 ; 
        

        }
    
            
           /*  else {

                include_once "../controllers/affichControl.php"  ; 
                $_controller = new affichControl();
                $demandes = $_controller->getUnreadDemandes($_SESSION["userID"]) ; 
                if ($demandes) {
                    $count = count($demandes);
                
                }
                else {
                    $count = 0 ; 
                
        
                }



            } */
        
        
          echo'  <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">

             <a href="./profile.php">  <img
  src="../usersImages/'. $_SESSION['userPhoto'] .'"
  class="rounded-circle shadow-4"
  style="width: 2.7rem; height: 2.5rem;margin: 0 1.8rem ;"
  alt="Avatar"
/>
</a>
              <a style="color: white ;" class="navbar-brand" href="./profile.php">'. $_SESSION['userNom'].' '.  $_SESSION['userPrenom'].'</a>
              ' ;
              
              echo'
              

            </ul>

            <ul class="navbar-nav ml-auto">' ;
            
                echo'
                <a style="color: white ; font-size : 1rem;" class="navbar-brand" href="./annonces.php"> <i style="text-align: center ; font-size : 1.7rem; margin-top: 0.1rem ;  padding-top : 1remm ;" class="fas fa-plus"></i> </a>' ;
  

                            echo'
                <li class="nav-item dropdown" style="color : white ;">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i style ="color : white ; font-size : 1.8rem;" class="fas fa-envelope"></i>  <span class="badge bg-secondary" id="count" >'. $count.' </span>
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown"> ' ;
                     
                      if($count > 0 ) {
                          foreach($demandes as $demande) {
                             $transporteur= $_controller->getUserInfoById($demande["ID_transporteur"]);
                             foreach ($transporteur as $transporteur) { 
                            echo '<li><a class="dropdown-item text-primary " href="responseDemande.php?idt='.$demande["ID_transporteur"].'&ida='.$demande["ID_annonce"].'"> Le transporteur '.$transporteur["nom"].' '.$transporteur["prenom"].' a répondu à votre annonce. </a>
                            <li><hr class="dropdown-divider"></li>' ;
                            if( $_SESSION['userType'] =="transporteur") {
                                echo '<li><a class="dropdown-item text-primary " href="annonceDetail.php?id='.$demande["ID_annonce"].'"> Le client '.$transporteur["nom"].' '.$transporteur["prenom"].' a demandé votre service. </a>
                            <li><hr class="dropdown-divider"></li>' ;

                            }
                            
                           
                          }
                        }
        
                      }
                      else {
                          
                          echo '<li><a class="dropdown-item text-danger font-weight-bold" href="#"> <i class="fa fa-frown-o" aria-hidden="true"></i>
                          Oops! aucune notification.</a> </li>' ;
                          
        
                      }
                    } 
                   echo'
                   </ul>
                   
            </div>
          </div>
          </div>
        </nav> ' ;
                
            
           echo' <header style="margin-top: 10rem ;">
                <div class="slider">
                    <div class="slides"> 
                        <input type="radio" name="ratio-btn" id="radio1">
                        <input type="radio" name="ratio-btn" id="radio2">
                        <input type="radio" name="ratio-btn" id="radio3">
                        <input type="radio" name="ratio-btn" id="radio4">' ;
        
                        include_once "../controllers/affichControl.php"  ; 
                        $_controller = new affichControl();
                       $popularNews = $_controller->getPopoularNews() ; 
                       $i = 0 ; 
                       foreach($popularNews as $value) {
                           if($i==0) {
                               echo' <div class="slide first">
                               <a href="newsDetail?id='.$value['ID_news'].'">  <img class="slider-img" src="../assets/'.$value['image'].'" alt="" /> </a>
                            </div>' ;
                           }
                           else {
                               echo'
                                <div class="slide"> 
                               <a href="newsDetail?id='.$value['ID_news'].'">  <img class="slider-img" src="../assets/'.$value['image'].'" alt="" /> </a>
                            </div>
                            ' ;
                           }
                           $i ++ ;
      
                       }
                  echo'
                  
                  
                <!-------automatic naviation-->
                <div class="navigation-auto">
                    <div class="auto-btn1"> </div>
                    <div class="auto-btn2"> </div>
                    <div class="auto-btn3"> </div>
                    <div class="auto-btn4"> </div>
        
        
                </div>
        
                <!---- manual navigation-->
                <div class="navigation-manual" style="background-color: transparent;">
        
                    <label for="radio1" class="manual-btn"></label>
                    <label for="radio2" class="manual-btn"></label>
                    <label for="radio3" class="manual-btn"></label>
                    <label for="radio4" class="manual-btn"></label>
        
                </div>
            </div> <!--slider-->
        
            
            </div> <!--slider-->
            </header>  
            <footer style=" width: 100% ;"> 
            <div class="menu-bar" style="width: 100% ;"> 
            <ul style="background-color: #4481eb; height:5rem ; "> 
               <li style="background-color: transparent;" >  <a style="color: white; font-size:1.7rem;
               text-decoration: none ;
               background-color: transparent;" href="#"> Accueil </a> </li>
               <li style="background-color: transparent;">  <a style="color: white; font-size:1.7rem;
               text-decoration: none;
               background-color: transparent;"  href="presentation.php"> Présentation </a> </li>
               <li style="background-color: transparent;">  <a style="color: white; font-size:1.7rem;
               text-decoration: none;
               background-color: transparent;"  href="news.php"> News </a> </li>
             <!--   
             <li style="background-color: transparent;">  <a style="color: white; font-size:1.7rem;
               text-decoration: none;
               background-color: transparent;"  href="signup.php"> Inscription </a> </li>
               <li style="background-color: transparent;">  <a style="color: white; font-size:1.7rem;
               text-decoration: none;
               background-color: transparent;"  href="statistiques.php"> Statistiques </a> </li>
               <li style="background-color: transparent;">  <a style="color: white; font-size:1.7rem;
               text-decoration: none;
               background-color: transparent;"  href="contact.php"> Contact </a> </li>
             -->
               <li style="background-color: transparent;">  <a style="color: white; font-size:1.7rem;
               text-decoration: none;
               background-color: transparent;"  href="signup.php"> Inscription </a> </li>
               <li style="background-color: transparent;">  <a style="color: white; font-size:1.7rem;
               text-decoration: none;
               background-color: transparent;"  href="statistiques.php"> Statistiques </a> </li>
               <li style="background-color: transparent;">  <a style="color: white; font-size:1.7rem;
               text-decoration: none;
               background-color: transparent;"  href="contact.php"> Contact </a> </li>
            </ul>
            
            </div>
            </footer>
            
       
        
        
        
        
        <div class="container-annonce">  <!--container annonce-->
        <style> 
        .leftbox .content:hover {
            background: #4481eb;
        }
        
        </style>
        <!--begin section left box-->
        <div class="leftbox-section" style="margin: 6rem;
            margin-left: 2rem; margin-bottom:1.4rem ;"> 
            <div class="leftbox"> 
                <div class="content" style="width: 30rem;
            height: 16rem;">
                    <h1> Annonces </h1> 
                    <p> Vous pouvez rechercher, filtrer et consulter des annonces ! </br> 
                    Connectez-vous pour pouvoir répondre aux annonces ou publier des annonces ! 
                    </p>
        
        
                </div>
            </div>
        
        </div><!--end section left box-->
        </div>
        
        <!-- end of container-annonce-->
        
         <!--filters here points de départ, points d’arrivée, type de transport, poids, volume--->
         <div class="container-filter" style="margin-bottom: 4rem ;" > <!--container filtre + cards-->
          
         <div class="wrapper-filter" style="float:left ; margin: 30px ; width: 100%"> 
        
         <div  > <!-- id="form-search" class="form search" -->
            <form  method="post"  class="form-inline p-3" id="ajax-form" > <!--  ajax-form -->
           <div style="width:50% ; margin: 1.3rem 0 ;"> 
                <label> <!-- custom-field recherche depart -->
                    <input  type="text" class="form-control form-control-lg rounded-0 border-info" style="width:100% ; padding:0 ; margin:0.5rem;" placeholder="Emplacement de départ"   id="searchwilayadep" name="searchwilayadep" > 
        <!--             <span class="placeholder recherche"> Emplacement de départ </span>
         -->        </label>
            </div>
        
            <div style="width:50% ; margin: 1.3rem 0 ;"> 
        
            <label> 
                <input type="text" class="form-control form-control-lg rounded-0 border-info" value="" placeholder="Emplacement d\'arrivée"   style="width:100% ; padding:0 ; margin:0.5rem;" id="searchwilayaarriv" value="" name="searchwilayaarriv"> <!--  class="form__input"  -->
        <!--         <span class="placeholder recherche"> Emplacement d\'arriver </span>
         -->
            </label> 
        
            </div>
        
            <div  style="width: 100% ;" >
                <input  class="btn btn-primary "  style="width:100% ;margin:0.5rem; font-size:1.4rem; height:3rem ;  margin-bottom: 2rem ;" type="submit" value="Rechercher"> <!-- id="rechercher" -->
              </div>
            </form>
        </div>
        
         
        
        
         <div class="filter" style="display:flex ;" >    <!-- filtre float right-->
        
        
         <div class="filter-group" style="width:100%; display:flex ;">                    
            <div style="margin:0 3rem; width:25%" class="list-group">
             <h3 style="font-size:1.3rem ; margin-bottom:2rem; color: #4481eb">Poids</h3>
             <input type="hidden" id="hidden_minimum_poids" value="0" />
                            <input type="hidden" id="hidden_maximum_poids" value="1000" />
                            <p id="poids_show">10 - 20</p>
                            <div id="poids_range"></div>
                        </div>  
                        
             <div style="margin:0 3rem; width:25%" class="list-group">
             <h3 style="font-size:1.3rem ; margin-bottom:2rem; color: #4481eb" >Volume</h3>
             <input type="hidden" id="hidden_minimum_volume" value="0" />
                            <input type="hidden" id="hidden_maximum_volume" value="2000" />
                            <p id="volume_show">10 - 200</p>
                            <div id="volume_range"></div>
                        </div>  
        
            <div style="margin:0 3rem; width:25%" class="list-group">
             <h3 style="font-size:1.3rem ; margin-bottom:2rem; color: #4481eb">Type de transport </h3>
                            <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">' ;
            
             
        include_once '../controllers/affichControl.php';
        $_controller = new affichControl();
        
        $result = $_controller->selectTypeTransport() ;
                           
                            foreach($result as $row)
                            {
                           
                           
                           echo' <div  class="list-group-item checkbox">
                                <label><input type="checkbox" class="common_selector typeTransport" value="'.$row["typeTransport"].'" >' .$row["typeTransport"] .'</label>
                            </div> ' ;
                            
                            }
        
                           
                            echo'
                        </div>
                        </div>
                       
        
            <div style="margin:0 3rem; width:25%" class="list-group">
             <h3 style="font-size:1.3rem ; margin-bottom:2rem; color: #4481eb"> Moyen de transport</h3>
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
        
         
        
        
        
        
         <!-- class="col-md-9" -->
                           <div class="col-ms-9" style="float:left ;" > <!--float left-->
                        <br />
                        <div class="row filter_data">
        
                        </div>
                    </div>
                 
                        <!--end container filtre + cards-->
                        </div>
                     
                        
                        
                          
        <!--end filter-->
        <div style ="margin-bottom: 112rem ; position: relative;"> 
                        
                        </div>
        
        <div style ="margin : 0 36%  ;" class="buttons"> 
        <a href="./presentation.php" class="btn-up" style="text-decoration : none; position: relative ; margin-top: 20rem ;  " > Comment cela fonctionne </a>
        </div>
        
        <footer style="margin-top: 6rem;  width: 100% ;">
            <div class="menu-bar" style="height: 0 ;"> 
                <ul> 
               <li>  <a  style="text-decoration : none;" href="#"> Accueil </a></li>
               <li>  <a  style="text-decoration : none;" href="presentation.php"> Présentation </a> </li>
               <li>   <a  style="text-decoration : none;" href="news.php"> News</a> </li>
               <li>  <a  style="text-decoration : none;" href="signup.php"> Inscription</a> </li>
               <li>  <a  style="text-decoration : none;" href="statistiques.php"> Statistiques</a> </li>
               <li>  <a  style="text-decoration : none;" href="contact.php"> Contact</a> </li>
            </ul>
            
            </div>
             </footer> 
        
           
        
        
        <!-- </div> -->
        
        
        
        <!-- </section> -->
          
        
        
        
             <style>
        #loading
        {
         text-align:center; 
         background: url(\'../views/loader.gif\') no-repeat center; 
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
            <script src="../css/bootstrap.min.js"></script> -->
             <link rel="stylesheet" href="../css/bootstrap.min.css">  
        <!--       <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
         -->    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
           <script type="text/javascript" src="../js/vanilla-tilt.js"></script>
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
 