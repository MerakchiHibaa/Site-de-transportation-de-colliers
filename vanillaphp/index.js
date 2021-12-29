let counter = 1 ;
let droite = true ; 



setInterval(function() {

    document.getElementById('radio' + counter).checked = true ; 
    if(!droite && counter ==1) {
        droite =true ;
    }

    if(droite) {

  
    counter++ ; 
    if(counter> 4) {
        counter=3 ; 
        droite =false ;}
    }
    else{
        counter -- ; 
        if(counter <0 ) {
            counter=1 ; 
            droite= true ; 
        }
    }

   
} , 3000) ; 


//**************************Search button*********************************************** *//

const searchBtn= document.querySelector(".search-btn") ;

const cancelBtn = document.querySelector(".cancel-btn") ;

const searchForm = document.querySelector(".form.search") ;

function search() {
searchForm.classList.add("active") ; 
searchForm.style.display= "block" ;
searchBtn.classList.add("active") ; 
}




//*******************************************************************Form********************************** */


var button = document.getElementById('mainButton');

var openForm = function() {
	button.className = 'active';
};

var checkInput = function(input) {
	if (input.value.length > 0) {
		input.className = 'active';
	} else {
		input.className = '';
	}
};

var closeForm = function() {
	button.className = '';
};

document.addEventListener("keyup", function(e) {
	if (e.keyCode == 27 || e.keyCode == 13) {
		closeForm();
	}
});


function triggerClick() {
    document.getElementById('profileImage').click() ; 

}

function displayImage(e) {
    if (e.files[0]) {
        let reader = new FileReader() ; 

        reader.onload = function(e) {
            document.getElementById('profileDisplay').setAttribute('src' ,  e.target.result) ; 
         

        }
        reader.readAsDataURL(e.files[0]);
    }
}



function getCoordinates(){
    let adresseDepart = document.getElementById('pointdepart').value ; 

    let adresseArrivee = document.getElementById('pointarrivee').value ;

    let latitudedepart = document.getElementById('latitudedepart') ;
    let longitudedepart = document.getElementById('longitudearrivee') ;

    let latitudearrivee = document.getElementById('latitudearrivee') ;
    let longitudearrivee = document.getElementById('latitudearrivee') ;

    let URL = "https://geocoder.ls.hereapi.com/6.2/geocode.json?searchtext="+adresseDepart+"&apiKey=iK_k5qbfo9wdhfxz0rJp3NSn485xuHeAnLMckU190Qk&gen=9";
    let URL2 = "https://geocoder.ls.hereapi.com/6.2/geocode.json?searchtext="+adresseArrivee+"&apiKey=iK_k5qbfo9wdhfxz0rJp3NSn485xuHeAnLMckU190Qk&gen=9";

    let xmlHttp = new XMLHttpRequest() ; 
    let xmlHttp2 = new XMLHttpRequest() ; 

    xmlHttp.open("GET" , URL , false) ; 
    xmlHttp2.open("GET" , URL2 , false) ; 
 
    xmlHttp.send(null) ;
    xmlHttp2.send(null) ;

    let json = JSON.parse(xmlHttp.responseText) ; 
    let json2 = JSON.parse(xmlHttp2.responseText) ; 

     latitudeDepart.value =  json.Response.View[0].Result[0].Location.DisplayPosition.Latitude ; ;
     longitudeDepart.value =json.Response.View[0].Result[0].Location.DisplayPosition.Longitude ;
    
     latitudeArrivee.value = json2.Response.View[0].Result[0].Location.DisplayPosition.Latitude ;
     longitudeArrivee.value = json2.Response.View[0].Result[0].Location.DisplayPosition.Longitude ;

   // document.getElementById()

}

 