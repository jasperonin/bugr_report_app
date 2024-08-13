<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Engineering Support</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.0/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://code.jquery.com/ui/1.14.0/jquery-ui.js"></script>

    <style>
      #header{
        color: rgb(48, 119, 189);
        letter-spacing: 1px;
        font-weight: 600;
      }
      .ui-widget-header {
        border: none;
        margin: 2px;
        background: white;
        color: white;
        font-weight: bold;
      }
      .ui-widget.ui-widget-content {
        border: none;
      }
      .ui-tabs .ui-tabs-nav {
        margin: .3em 4em;
        padding: .1em .1em 0;
      }
    </style>
  </head>
  <body>
   <nav><?php include_once 'assets\front_end\nav\nav.php'; ?></nav>
    
  <div class="card border border-0">
    <div class="card-body">
        <div id="tabs">
          <ul>
            <li><a href="#intro">Homepage</a></li>
            <li><a href="/new_ticket">New Ticket</a></li>
            <li><a href="/ticket">Ticket Status</a></li>
          </ul>
          <section id="intro">
            <div class="container-lg">
              <div class="row justify-content-start">

                <div class="col-md-5 text-center text-md-start">

                  <!-- text -->
                  <h1>
                    <h6>How can we help you today?</h6>
                  </h1>

                  <!-- search bar-->
                  
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Enter your search term here">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="bi bi-search"></i></button>
                  </div>

                  
                  <!-- button -->

                  <div class="container -lg  my-1 text-start">
                    <div class="row">
                      <div class="col">

                        <div class="input-group">
                          <button class="btn btn-link px-0" type="button" id="button-addon2"><i class="bi bi-plus-square-fill"></i></button>
                          <a href="/new_ticket" class="btn btn-link link-underline link-underline-opacity-0 link-underline-opacity-75-hover">Create New Ticket</a>
                        </div>

                      </div>
                      <div class="col">

                        <div class="input-group">
                          <button class="btn btn-link px-0" type="button" id="button-addon2"><i class="bi bi-plus-square-fill"></i></button>
                          <a href="/ticket" class="btn btn-link link-underline link-underline-opacity-0 link-underline-opacity-75-hover">Check Ticket Status</a>
                        </div>

                      </div>
                  </div>

                </div>
              </div>
            </div>
          </section>
        </div>
    </div>
  </div>
 
 <script src='/assets/scripts/tabs.js'></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>

</html>