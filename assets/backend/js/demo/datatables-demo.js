// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable();
  
  
  $("#leadTable").DataTable({
  responsive: true,
    dom: 'Bfrtip',
    buttons: [
    {
      extend: 'excel',
      text: 'Export excel',
      className: 'exportExcel',
      filename: 'Export excel',
      exportOptions: {
        modifier: {
          page: 'all'
        }
      }
    }, 
    ]
});
  
  
    
    
    
    
});
