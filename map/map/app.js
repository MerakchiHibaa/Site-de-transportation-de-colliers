function mapInit(){
    let mylatlng = {lat:38.3460 , lng: -0.4907 } ;
let mapOptions = {
    center: mylatlng ,
    zoom: 7 , 
    mapTypeId: google.maps.MapTypeId.ROADMAP
} ;

google.maps.event.addDomListener(window, 'load', initialize);


let map = new google.maps.Map(document.getElementById('googleMap'), mapOptions) ;

}