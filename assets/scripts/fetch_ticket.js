


// $(document).ready(function(){
//     var dataTable = $('#tickets').DataTable({
//          'processing': true,
//          'serverSide': true,
//          'serverMethod': 'GET',
//          //'searching': false, // Remove default Search Control
//          'ajax': {
//               'url':'../../backend/controller/database/query.php',
//               'data': function(data){
//                     // Read values
//                     var ticket_filter = $('#filter_ticket').val();
//                     // Append to data
//                     data.ticket_filter = ticket_filter;
//               }
//          },
//          'columns': [
//               { data: 'bug_report_id' }, 
//               { data: 'title' },
//               { data: 'description' },
//               { data: 'status' }
//          ]
//     });
//     $('#filter_ticket').change(function(){
//          dataTable.draw();
//     });
// });