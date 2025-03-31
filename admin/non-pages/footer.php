
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Bibloteka 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  

  <!-- Bootstrap core JavaScript-->
  <script src="../../template/vendor/jquery/jquery.min.js"></script>
  <script src="../../template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../template/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../template/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../../template/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../../template/js/demo/chart-area-demo.js"></script>
  <script src="../../template/js/demo/chart-pie-demo.js"></script>

  
<!-- Bootbox -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script>

<script src="../pages/template/vendor/jquery/jquery.min.js"></script>
<script src="../pages/template/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../pages/template/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="../pages/template/vendor/datatables/dataTables.bootstrap4.min.css"></script>
<!-- <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.js"></script> -->

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>


<script>

$(document).ready( function () {
    $('#example1').DataTable({
      "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
      if (aData[6] == "e kthyer") {
        $('th', nRow).css('color', 'Green');
      } else if (aData[6] == "e marr") {
        $('th', nRow).css('color', 'Red');
      }
    }
    });
} );


</script>


<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
 

</script>


<script>
  $(document).ready(function(){

$("#email").keyup(function(){

   var email = $(this).val().trim();

   if(email != ''){

      $.ajax({
         url: 'ajaxfile.php',
         type: 'post',
         data: {email: email},
         success: 
         function(response){
             $('#uname_response').html(response);
          }          
      });
   }else{
      $("#uname_response").html("");
   }

 });

});
</script>
</body>

</html>