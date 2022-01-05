<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">            

    <title>Accueil</title>
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery-ui.js"></script>
<!--     <script src="js/bootstrap.min.js"></script>
 -->    
<!--   <link rel="stylesheet" href="css/bootstrap.min.css">
 -->    <link href = "css/jquery-ui.css" rel = "stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <div class="bar" >
        <div class="logo">  <img src="assets/logo.png" alt="Logo"> </div>
       <div class="bar-buttons"> 
        <a  class="btn-up" > Inscription</a>
        <a class="btn-up" >Connexion </a>
    </div>
    </div>

    
    <header>
        <div class="slider">
            <div class="slides"> 
                <input type="radio" name="ratio-btn" id="radio1">
                <input type="radio" name="ratio-btn" id="radio2">
                <input type="radio" name="ratio-btn" id="radio3">
                <input type="radio" name="ratio-btn" id="radio4">


          
            <div class="slide first">
           <a>  <img class="slider-img" src="assets/slider1.jpg" alt="" /> </a>
        </div>
        <div class="slide"> 
           <a>  <img class="slider-img" src="assets/slider2.jpeg" alt="" /> </a>
        </div>
        <div class="slide"> 
           <a>  <img class="slider-img" src="assets/slider3.jpg" alt="" /> </a>
        </div>
        <div class="slide"> 
           <a>  <img class="slider-img" src="assets/slider4.jpg" alt="" /> </a>
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
   <li>  <a href="#"> Page d'accueil </a></li>
   <li>  <a href="#"> Présentation </a> </li>
   <li>   <a href="#"> News</a> </li>
   <li>  <a href="#"> Inscription</a> </li>
   <li>  <a href="#"> Statistiques</a> </li>
   <li>  <a href="#"> Contact</a> </li>
</ul>

</div>
<section class="container"> 

<div id="mainButton">



    
    <div onclick="openForm()" class="btn-text"  >
        <i class="fas fa-search"> </i>
    </div>

    <div class="modal"> 

    <div onclick="closeForm()" class="cancel-btn">
        <i class="fas fa-times"> </i>
    </div>



<div id="form-search" class="form search"> 
    <form  action="POST" class=""> 
   <div> 
        <label class="custom-field recherche depart"> 
            <input class="form__input" type="text"  required>
            <span class="placeholder recherche"> Emplacement de départ </span>
        </label>
    </div>

    <div> 

    <label class="custom-field recherche arriver"> 
        <input  class="form__input" type="text"  required>
        <span class="placeholder recherche"> Emplacement d'arriver </span>

    </label> 

    </div>

    <div>
        <input id="rechercher" class="form__input" onclick="" type="submit" value="Rechercher">
      </div>
    </form>
</div>
</div>


</section>

<div class="container-annonce">  <!--container annonce-->

<!--begin section left box-->
<div class="leftbox-section"> 
    <div class="leftbox"> 
        <div class="content">
            <h1> Annonces </h1> 
            <p> Cette artie explique ce qui existe dans cette partie :p</p>


        </div>
    </div>

</div><!--end section left box-->
</div> <!-- end of container-annonce-->


 <!--filters here points de départ, points d’arrivée, type de transport, poids, volume--->
 <div class="container-filter"> <!--container filtre + cards-->

 <div class="filter" style="float:left;">    <!-- filtre -->


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
                    <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
     <?php
     
include './controllers/affichControl.php';


$_controller = new affichControl();
$result = $_controller->selectTypeTransport() ;
                   
                    foreach($result as $row)
                    {
                    ?>
                   
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector typeTransport" value="<?php echo $row['typeTransport']; ?>"  > <?php echo $row['typeTransport']; ?></label>
                    </div>
                    <?php
                    }

                    ?>
                    <!-- </div>
                </div> -->
                </div>
                </div>
               

    <div class="list-group">
     <h3>Moyen de transport</h3>
     <div > <!-- style="height: 180px; overflow-y: auto; overflow-x: hidden;" -->
    
    <?php
      
 include_once './controllers/affichControl.php';
 

$_controller = new affichControl(); 
$result = $_controller->selectMoyenTransport() ;
                   
                    foreach($result as $row)
                    {
                    ?>
                   
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector moyenTransport" value="<?php echo $row['moyenTransport']; ?>"  > <?php echo $row['moyenTransport']; ?></label>
                    </div>
                    <?php
                    }

                    ?>
                   
                   </div>

                  </div> 
                   </div>

                   
 </div> <!-- filtre-->



 <!-- class="col-md-9" -->
                   <div  style="float:right; overflow: auto;">
            	<br />
                <div class="row filter_data">

                </div>
            </div>
        </div>
                </div> <!--end container filtre + cards-->
                  
<!--end filter-->


   


</div>





<div class="buttons"> 
<a href="#" class="btn-up"  > Comment ça fonctionne </a>
</div>

<!-- </section> -->
<footer>
    <div class="menu-bar" style="height: 0 ;"> 
        <ul> 
       <li>  <a href="#"> Page d'accueil </a></li>
       <li>  <a href="#"> Présentation </a> </li>
       <li>   <a href="#"> News</a> </li>
       <li>  <a href="#"> Inscription</a> </li>
       <li>  <a href="#"> Statistiques</a> </li>
       <li>  <a href="#"> Contact</a> </li>
    </ul>
    
    </div>
     </footer>

     <style>
#loading
{
 text-align:center; 
 background: url('loader.gif') no-repeat center; 
 height: 150px;
}
</style>

<script>
$(document).ready(function(){
    console.log("je suis dans script") ;

    filter_data();

    function filter_data()
    {
        console.log("je suis dans filterdata") ;

        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        var minimum_poids = $('#hidden_minimum_poids').val();
        var maximum_poids = $('#hidden_maximum_poids').val();
        
        var minimum_volume = $('#hidden_minimum_volume').val();
        var maximum_volume = $('#hidden_maximum_volume').val();

        var typeTransport = get_filter('typeTransport');
        var moyenTransport = get_filter('moyenTransport');

       
        $.ajax({
            url:"fetch_data.php",
            method:"POST",
            data:{action:action, minimum_poids:minimum_poids,  maximum_poids:maximum_poids, minimum_volume:minimum_volume, maximum_volume:maximum_volume, typeTransport:typeTransport, moyenTransport:moyenTransport},
            success:function(data){
                $('.filter_data').html(data);
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });

    $('#poids_range').slider({
        range:true,
        min:0,
        max:1000,
        values:[0, 1000],
        step:1,
        stop:function(event, ui)
        {
            $('#poids_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_poids').val(ui.values[0]);
            $('#hidden_maximum_poids').val(ui.values[1]);
            filter_data();
        }
    });
    $('#volume_range').slider({
        range:true,
        min:0,
        max:1000,
        values:[0, 1000],
        step:1,
        stop:function(event, ui)
        {
            $('#volume_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_volume').val(ui.values[0]);
            $('#hidden_maximum_volume').val(ui.values[1]);
            filter_data();
        }
    });

});
</script>

   <!--  <script  src="index.js"> </script>
    <script src="jquery-1.10.2.min.js"></script>
    <script src="jquery-ui.js"></script>
    <script src="bootstrap.min.js"></script> -->
<!--     <link rel="stylesheet" href="./css/bootstrap.min.css">  
 -->      <script type="text/javascript" src="vanilla-tilt.js"></script>
    <script type="text/javascript">
       VanillaTilt.init(document.querySelectorAll(".card"), {
           max: 25,
           speed: 400 ,
          /*  glare:true , 
           "max-glare" : 1 */
       });
    </script>

</body>
</html>