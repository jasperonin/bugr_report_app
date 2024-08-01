<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create New Ticket</title>
    <link rel="stylesheet" href="./style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
      #nav_header {
      color: rgb(48, 119, 189);
      letter-spacing: 1px;
      font-weight: 600;
      }
    </style>
  </head>
<body>
<!---Navigation-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-lg">
        <a href="/home_page" class="navbar-brand fs-2" id="nav_header">Engineering Helpdesk</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMenu" aria-controls="collapseMenu" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav" id="collapseMenu">
          <a href="/home_page" class="nav-link fs-5">Home</a>
          <a href="#" class="nav-link fs-5">Solutions</a>
          <a href="/ticket" class="nav-link fs-5">Tickets</a>
        </div>
      </div>
  </nav>
  
<!--main-->
  <main>
    <section class="container">
      <div class="card mt-2 bg-transparent border-0">
        <div class="card-header bg-transparent text-center fs-2 fw-bold" style="letter-spacing:1px; color:rgb(48, 119, 189);">
          Submit a Ticket
        </div>
        <div class="card-body">
        <form id="uploadIncident" method="POST" enctype="multipart/form-data" action="backend/controller/database/query.php" class="form-group w-50 mx-auto">
    <div class="form-floating my-2">
        <input type="text" class="form-control" name="bug_report_id" id="floatingBuglInput" placeholder="Bug Report #" required>
        <label for="floatingBuglInput">Bug Report #</label>
    </div>
    <div class="form-floating my-2">
        <input type="email" class="form-control" name="floatingEmailInput" id="floatingEmailInput" placeholder="email@email.com" value="email@email.com" disabled>
        <label for="floatingEmailInput">Email</label>
    </div>
    <div class="form-floating my-2">
        <input type="text" class="form-control" name="textTitle" id="textTitle" placeholder="Bug Title" required>
        <label for="textTitle">Title</label>
    </div>
    <div class="form-floating my-2">
        <select name="label" id="formLabelSelect" class="form-select">
            <option selected></option>
            <option value="custom_structuress">Custom Structures</option>
            <option value="Document_Labelling">Document Labelling</option>
            <option value="Retrieval">Retrieval</option>
            <option value="Patient_Ops">Patient Ops</option>
            <option value="Work_Force_Management">Work Force Management</option>
            <option value="Quality_Control">Quality Control</option>
            <option value="Escalations">Escalations</option>
        </select>
        <label for="formLabelSelect">Select label</label>
    </div>
    <div class="form-floating">
        <textarea name="description" id="descriptionLabel" placeholder="leave a description" class="form-control" style="height: 100px; resize:none;"></textarea>
        <label for="descriptionLabel">Can you tell us what happen?</label>
    </div>
    <button type="submit" class="btn btn-outline-primary mt-2" name="submit">Submit</button>
    <a href="/home_page" class="btn btn-outline-danger mt-2">Cancel</a>
</form>

        </div>
      </div>
    </section>
  </main>

  <script src="/assets/scripts/api_call.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
