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



 