let counter = 1 ;
let droite = true ; 



setInterval(function() {
    let radio =  document.getElementById('radio' + counter)  ; //
    if (radio != NULL) { 

        radio.checked = true ; 
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



function getCoordinatesDepart(){
    let adresseDepart = document.getElementById('pointdepart').value ; 


    let latitudedepart = document.getElementById('latitudedepart') ;
    let longitudedepart = document.getElementById('longitudedepart') ;

   
    let URL = "https://geocoder.ls.hereapi.com/6.2/geocode.json?searchtext="+adresseDepart+"&apiKey=iK_k5qbfo9wdhfxz0rJp3NSn485xuHeAnLMckU190Qk&gen=9";

    let xmlHttp = new XMLHttpRequest() ; 

    if (!xmlHttp) {  
                alert(' Cannot create an XMLHTTP instance');  
                return false;  
            }  
            xmlHttp.onreadystatechange = function () {        // ready state event, will be executed once the server send back the data   
                if (xmlHttp.readyState === XMLHttpRequest.DONE) {  
                    if (xmlHttp.status === 200) {  
                        console.log(xmlHttp.responseText);  
                    } else {  
                        alert('There was a problem with the request.');  
                    }  
                }  
            };  
        

            xmlHttp.open("GET" , URL , false) ; 
 
            xmlHttp.send(null) ;

            let json = JSON.parse(xmlHttp.responseText) ; 

            latitudedepart.value =  json.Response.View[0].Result[0].Location.DisplayPosition.Latitude ; ;
            longitudedepart.value =json.Response.View[0].Result[0].Location.DisplayPosition.Longitude ;
        
                


            
   // document.getElementById()

}


function getCoordinatesArrivee(){

    let adresseArrivee = document.getElementById('pointarrivee').value ;

   
    let latitudearrivee = document.getElementById('latitudearrivee') ;
    let longitudearrivee = document.getElementById('longitudearrivee') ;

    let URL2 = "https://geocoder.ls.hereapi.com/6.2/geocode.json?searchtext="+adresseArrivee+"&apiKey=iK_k5qbfo9wdhfxz0rJp3NSn485xuHeAnLMckU190Qk&gen=9";

    let xmlHttp2 = new XMLHttpRequest() ; 
    if (!xmlHttp2) {  
                alert(' Cannot create an XMLHTTP instance');  
                return false;  
            }  


            xmlHttp2.onreadystatechange = function () {        // ready state event, will be executed once the server send back the data   
                if (xmlHttp2.readyState === XMLHttpRequest.DONE) {  
                    if (xmlHttp2.status === 200) {  
                        console.log(xmlHttp2.responseText);  
                    } else {  
                        alert('There was a problem with the request.');  
                    }  
                }  
            };  
        

            
            xmlHttp2.open("GET" , URL2 , false) ; 
 
            xmlHttp2.send(null) ;

            let json2 = JSON.parse(xmlHttp2.responseText) ; 


            latitudearrivee.value = json2.Response.View[0].Result[0].Location.DisplayPosition.Latitude ;
            longitudearrivee.value = json2.Response.View[0].Result[0].Location.DisplayPosition.Longitude ;

        



  
   // document.getElementById()

}

 