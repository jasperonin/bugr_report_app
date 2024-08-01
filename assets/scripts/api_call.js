$(document).ready(function() {
    $('#uploadIncident').on('submit', function(event) {
        event.preventDefault();

        const formData = {
            bug_report_id: $('#floatingBuglInput').val(),
            textTitle: $('#textTitle').val(),
            description: $('#descriptionLabel').val(),
        };

        console.log(formData); // Debugging line to check form data

        $.ajax({
            type: "POST",
            url: "../../backend/controller/database/query.php",
            data: formData,
            dataType: "json",
            success: function(response) {
                console.log('Success:', response);
                alert('Data inserted successfully!');
                // Clear form fields
                $('#uploadIncident')[0].reset();
            },
            error: function(xhr, status, error) {
                console.error('Failed to insert data:', status, error);
                alert('Failed to insert data!');
            }
        });
    });
});
