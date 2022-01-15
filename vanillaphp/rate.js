const btn = document.getElementById('button-rate') ; 
const post = document.getElementById('post-rate') ; 
const widget = document.querySelector('.star-widget') ; 
const rateForm = document.getElementById('rateForm') ; 
let star = document.getElementById('star') ; 
let rate1 = document.getElementById('star1') ; 
let rate2 = document.getElementById('star2') ; 
let rate3 = document.getElementById('star3') ; 
let rate4 = document.getElementById('star4') ; 
let rate5 = document.getElementById('star5') ; 

function changeRate(this) {

    console.log('insiiiiidee rate ') ;


}
rate1.onclick = () => {
    star.value = "1" ; 
    console.log('insiiiiidee rate 1 ') ;
    console.log(star.value) ; 

}

rate2.onclick = () => {
    star.value = "2" ; 
    console.log(star.value) ; 


}
rate3.onclick = () => {
    star.value = "3" ; 
    console.log(star.value) ; 


}
rate4.onclick = () => {
    star.value = "4" ; 
    console.log(star.value) ; 


}
rate5.onclick = () => {
    console.log('insiiiiidee rate 5') ;
    star.value = "5" ; 
    console.log(star.value) ; 


}


btn.onclick = () => {
    widget.style.display = 'none' ; 
    post.style.display = 'block' ;
    rateForm.submit() ; 
    return false ;
}


