$(document).ready(function() {
    $.ajax({
        type: "GET",
        url: "../../backend/controller/database/query.php", // Adjust the path as needed
        dataType: "json",
        success: function(data) {
            console.log('Data fetched:', data); // Debugging line to check fetched data
            const tableBody = $('table tbody');
            tableBody.empty(); // Clear existing table rows

            data.forEach(row => {
                tableBody.append(`
                    <tr>
                        <td>${row.bug_report_id} <div class="small">Ticket created: ${row.created_at}</div></td>
                        <td>${row.title}</td>
                        <td>${row.description}</td>
                    </tr>
                `);
            });
        },
        error: function(xhr, status, error) {
            console.error('Failed to fetch tickets:', status, error);
            alert('Failed to fetch tickets!');
        }
    });
});
