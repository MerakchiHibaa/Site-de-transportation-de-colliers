<div class="well card-footer">
  <p
      <span class="float-right"></span>
  </p>
</div>
 

<script> 
const optTransporteur = document.getElementById('optTransporteur') ; 
function selectType(nameselect) { 
  if(nameselect) {
    const optTransporteur = document.getElementById('optTransporteur').value ;
    if(optTransporteur == nameselect.value) {
  wilayaSelect.style.display = 'block' ; 
    }
    else{
      wilayaSelect.style.display = 'none' ; 


    }
   

  }
  else {
    wilayaSelect.style.display = 'none' ; 


  }
  
}
  </script>

  </body>




  <!-- Jquery script -->
  <script src="assets/jquery.min.js"></script>
  <script src="assets/bootstrap.min.js"></script>
  <script src="assets/jquery.dataTables.min.js"></script>
  <script src="assets/dataTables.bootstrap4.min.js"></script>
  <script>
      $(document).ready(function () {
          $("#flash-msg").delay(7000).fadeOut("slow");
      });
      $(document).ready(function() {
          $('#example').DataTable();
      } );
  </script>
</html>
