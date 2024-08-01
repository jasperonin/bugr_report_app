<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Engineering Support - Tickets</title>
    <link rel="stylesheet" href="./style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        #header {
            color: rgb(48, 119, 189);
            letter-spacing: 1px;
            font-weight: 600;
        }
    </style>
</head>

<body class="vh-100">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top mb-5">
        <div class="container-lg">
            <!-- Logo -->
            <a class="navbar-brand fs-1" href="/home_page" id="header">Engineering Helpdesk</a>
            <!-- Toggle Button -->
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/home_page">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Solutions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/new_ticket">Tickets</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Profile -->
            <div class="lead">Welcome User</div>
        </div>
    </nav>

    <section>
        <!-- Ticket Dropdown -->
        <div class="container-lg">
            <div class="row justify-content-start">
                <div class="dropdown">
                    <a class="link link-secondary link-underline-opacity-0 link-underline-opacity-75-hover dropdown-toggle" id="dropdownMenuButton" aria-haspopup="true" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        All Tickets
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="#" onclick="changeDropdownLabel('All Tickets')">All Tickets</a></li>
                        <li><a class="dropdown-item" href="#" onclick="changeDropdownLabel('Open or Pending')">Open or Pending</a></li>
                        <li><a class="dropdown-item" href="#" onclick="changeDropdownLabel('Resolved or Closed')">Resolved or Closed</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="container-lg mt-5">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Bug Report #</th>
                        <th>Title</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Rows will be dynamically inserted here by JavaScript -->
                </tbody>
            </table>
        </div>
    </section>

    <!-- Bottom -->
    <script src="/assets/scripts/fetch_tickets.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
   
</body>

</html>
