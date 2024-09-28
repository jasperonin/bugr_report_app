<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Engineering Support - Tickets</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/jquery.dataTables.min.css"
        integrity="sha512-1k7mWiTNoyx2XtmI96o+hdjP8nn0f3Z2N4oF/9ZZRgijyV4omsKOXEnqL1gKQNPy2MTSP9rIEWGcH/CInulptA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />

    <!-- ✅ load jQuery ✅ -->
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>

    <!-- ✅ load DataTables ✅ -->
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"
        integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"></script>
    <style>
        #header {
            color: rgb(48, 119, 189);
            letter-spacing: 1px;
            font-weight: 600;
        }

        th {
            border: none;
        }

        table.dataTable{
            word-break: break-word;
            vertical-align: top;
            width: 100%;
        }

        .modal-content {
            overflow: hidden;
        }
    </style>
</head>

<body class="container-fluid">
    <section>
        <div class="form-group">
            <select name="filter_ticket" id="filter_ticket" class="form-control" style="width: 10em; margin-left:5em;">
                <option value="" selected hidden>Select Status</option>
                <option value="Open">Open</option>
                <option value="Close">Close</option>
                <option value="Working">Working</option>
                <option value="">All</option>
            </select>
            <!-- Add a button to filter open tickets -->
        </div>

        <!-- Table -->
        <div class="container-lg">
            <table class="table table-hover table-borderless" id="tickets" cellspacing="0">
                <thead>
                    <tr>
                        <th rowspan="0">Bug Report #</th>
                        <th>Title</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Bottom -->
    <script>
        $(document).ready(function() {
            var dataTable = $('#tickets').DataTable({
                'processing': true,
                'serverSide': true,
                'serverMethod': 'GET', // Continue using GET method as per your setup
                //'searching': false, // Remove default Search Control
                dom: 'frtip',
                searching: false,
                paging: true,
                pageLength: 10,
                autoWidth: false,
                'ajax': {
                    'url': '../../backend/controller/database/query.php',
                    'data': function(data) {
                        // Read values
                        var ticket_filter = $('#filter_ticket').val();
                        // Append to data
                        data.ticket_filter = ticket_filter;
                    },
                },
                'dataSrc': function(json) {
                    console.log(json); // Inspect the JSON object returned
                    return json.aaData; // Return the actual data to DataTables
                },
                'columns': [{
                        data: 'bug_report_id',
                        render: function(data, type, row) {
                            return data + '<br><small>' + row.created_at + '</small>';
                        }
                    },
                    {
                        data: 'title'
                    },
                    {
                        data: 'status'
                    }
                ]
            });

            // Handle changes in the select box to filter the DataTable
            $('#filter_ticket').change(function() {
                dataTable.draw(); // Redraw the table when the filter changes
            });
        });
    </script>
    <!-- <script src="/assets/scripts/fetch_tickets.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>