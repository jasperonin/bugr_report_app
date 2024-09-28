$(document).ready(function() {
    $('#search-query').on('input', function() {
      var query = $(this).val();
      if (query !== '') {
        $.ajax({
          url: '../../backend/controller/database/live-search.php',
          method: 'GET',
          data: {
            query: query
          },
          success: function(data) {
            $('#result').html(data); // Output the returned HTML
          },
          error: function(xhr, status, error) {
            console.log("Error: " + error); // Handle errors
          }
        });
      } else {
        $('#result').html(''); // Clear results if search is empty
      }
    });
  });