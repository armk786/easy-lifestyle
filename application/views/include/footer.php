<!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Best Investments Plan 2024</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <!-- Datatable JS -->
   
    <script src="<?php echo base_url(); ?>assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url(); ?>assets/backend/js/sb-admin-2.min.js"></script>
  
  <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.dataTables.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.print.min.js"></script>
  
  

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Log Out?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Are you sure to log out?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-info" href="<?php echo base_url().'login/logout'; ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

   
   
   <script type="text/javascript" rel="stylesheet"> 
  $('document').ready(function(){
   $(".alert").fadeIn(1000).fadeOut(5000);
   });
 </script> 

  <!-- Page level plugins -->
  
    
  
  
  
    <!-- Script -->
  <script type="text/javascript">
    $( function() {
       $( "#from_datepicker" ).datepicker();
        $( "#to_datepicker" ).datepicker();
       } );
 
  $(document).ready(function(){
    
      var userDataTable = $('#leadTable').DataTable({
          'processing': true,
          'serverSide': true,
          'serverMethod': 'post',
      'pageLength': 25,
      
      layout: {
        topStart: {
          buttons: ['excel', 'pdf']
        }
       },
       
          //'searching': false, // Remove default Search Control
          'ajax': {
            'url':'<?=base_url()?>dashboard/get_leads',
            'data': function(data){
                data.searchFrom_datepicker = $('#from_datepicker').val();
                data.searchTo_datepicker = $('#to_datepicker').val();
              
            }
          },
          'columns': [
            { data: 'id'},
            { data: 'name'},
            { data: 'email'},
            { data: 'mobile'},
            { data: 'visiting'},   
            { data: 'message'},           
            { data: 'cdate'},
          ]
      });

      $('#datefilter').click(function(){
        userDataTable.draw();
      });
     
  });
  
  
  
  </script>
  
  
  
  
</body>

</html>