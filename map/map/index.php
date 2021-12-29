<?php
	/* Database connection settings */
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'projet';
	$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

 	$coordinates = array();
 	$latitudes = array();
 	$longitudes = array();

	// Select all the rows in the markers table
	$query = "SELECT  `latitudedepart`, `longitudedepart`, `latitudearrivee`, `longitudearrivee` FROM `annonces` where ID_annonce=14 ";
	echo"<h1> $query <h1>" ;
	$result = $mysqli->query($query) or die('data selection for google map failed: ' . $mysqli->error);

 	while ($row = mysqli_fetch_array($result)) {

		$latitudes[0] = $row['latitudedepart'];
		$latitudes[1] = $row['latitudearrivee'];
		$longitudes[0] = $row['longitudedepart'];
		$longitudes[1] = $row['longitudearrivee'];

		$coordinates[0] = 'new google.maps.LatLng(' . $row['latitudedepart'] .','. $row['longitudedepart'] .') ,';
		$coordinates[1] = 'new google.maps.LatLng(' . $row['latitudearrivee'] .','. $row['longitudearrivee'] .')';

	}

	//remove the comaa ',' from last coordinate
/* 	$lastcount = count($coordinates)-1;
 */	/* $coordinates[$lastcount] = trim($coordinates[$lastcount], ",");	 */
?>

<!DOCTYPE html>
<html>
	<head>
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="style.css">
		    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">            

		<title>Map | View</title>
	</head>

	<body>
	    <nav>  
			<ul> 
				<li class="active"><a href="#"><img src="img/map.png"></a></li>
				<li><a href="#"><img src="img/logout.png"></a></li>
			</ul> 
		</nav>

		 <div class="outer-scontainer">
	        <div class="row">
	            <form class="form-horizontal" action="" method="post" name="frmCSVImport" id="frmCSVImport" enctype="multipart/form-data">
	            	<div class="form-area">	      
    					<button type="submit" id="submit" name="import" class="btn-submit">RELOAD DATA</button><br />
					</div>
	            </form>
	        </div>

		<div id="map" style="width: 100%; height: 80vh;"></div>

		<script>
			function initMap() {
			  var mapOptions = {
			    zoom: 18,
			    center: {<?php echo'lat:'. $latitudes[0] .', lng:'. $longitudes[0] ;?>}, //{lat: --- , lng: ....}
			    mapTypeId: google.maps.MapTypeId.SATELITE
			  };

			  var map = new google.maps.Map(document.getElementById('map'),mapOptions);
			  var RouteCoordinates = [
			  	<?php
			  		$i = 0;
					while ($i < 2) {
						echo $coordinates[$i];
						$i++;
					}
			  	?>
			  ];

			 /*  var RouteCoordinates = [0] = coordinates[0]; //depart
			   RouteCoordinates = [1] = coordinates[1]; //arrivee
 */
			 
			  var RoutePath = new google.maps.Polyline({
			    path: RouteCoordinates,
			    geodesic: true,
			    strokeColor: '#1100FF',
			    strokeOpacity: 1.0,
			    strokeWeight: 10
			  });

			  mark = 'img/mark.png';
			  flag = 'img/flag.png';

			  startPoint = {<?php echo'lat:'. $latitudes[0] .', lng:'. $longitudes[0] ;?>};
			  endPoint = {<?php echo'lat:'.$latitudes[1] .', lng:'. $longitudes[1] ;?>};

			  var marker = new google.maps.Marker({
			  	position: startPoint,
			  	map: map,
			  	icon: mark,
			  	title:"Start point!",
			  	animation: google.maps.Animation.BOUNCE
			  });

			  var marker = new google.maps.Marker({
			  position: endPoint,
			   map: map,
			   icon: flag,
			   title:"End point!",
			   animation: google.maps.Animation.DROP
			});

			  RoutePath.setMap(map);
			}

			google.maps.event.addDomListener(window, 'load', initialize);
    	</script>

    	<!--remenber to put your google map key-->
<!-- 		<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
 -->     <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9j4ulOm4Iw2U76rtSDNam10oWOhy0TEU&callback=initMap"></script>

	</body>
</html>