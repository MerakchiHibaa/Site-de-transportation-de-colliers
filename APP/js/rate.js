const btn = document.getElementById('button-rate') ; 
const post = document.getElementById('post-rate') ; 
const widget = document.querySelector('.star-widget') ; 
const rateForm = document.getElementById('rateForm') ; 


btn.onclick = () => {
    widget.style.display = 'none' ; 
    post.style.display = 'block' ;
    rateForm.submit() ; 
    return false ;
}


