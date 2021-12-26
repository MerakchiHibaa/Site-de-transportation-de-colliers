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



 