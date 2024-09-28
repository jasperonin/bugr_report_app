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
  <?php include './assets/front_end/nav/nav.php' ?>

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
              <input type="text" class="form-control" name="bug_report_id" id="bug_report_id" placeholder="Bug Report #">
              <label for="bug_report_id">Bug Report #</label>
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
            <input type="file" name="files[]" multiple class="form-control my-2">
            <button type="submit" class="btn btn-outline-primary mt-2" name="submit">Submit</button>
            <a href="/home_page" class="btn btn-outline-danger mt-2">Cancel</a>
          </form>

        </div>
      </div>
    </section>
  </main>

  <script>
    $(document).ready(function() {
      $('#uploadIncident').on('submit', function(event) {
        event.preventDefault();

        // Create a FormData object to handle form data and files
        const formData = new FormData(this); // 'this' refers to the form

        // Debugging line to check form data
        console.log([...formData]);

        $.ajax({
          type: "POST",
          url: "../../backend/controller/database/query.php",
          data: formData,
          processData: false, // Prevent jQuery from automatically transforming the data into a query string
          contentType: false, // Prevent jQuery from overriding the content type
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
  </script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>