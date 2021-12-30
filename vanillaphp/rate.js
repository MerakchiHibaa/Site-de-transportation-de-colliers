const btn = document.getElementById('button-rate') ; 
const post = document.getElementById('post-rate') ; 
const widget = document.querySelector('.star-widget') ; 


btn.onclick = () => {
    widget.style.display = 'none' ; 
    post.style.display = 'block' ;
    return false ;
}

