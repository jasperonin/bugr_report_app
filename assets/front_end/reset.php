<!doctype html>
<html lang="en">

   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Login page</title>

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
   <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
   <?php
        include './assets/styles/style.php'
    ?>
 <!--main container-->

<main>
  
   <div class="container mt-5">
       <div class="row justify-content-md-center">

           <div class="col-md-5">
               <div class="card w-100 border-0">
                   <div class="card-header bg-transparent text-center fs-2 fw-bold" style="letter-spacing:1px; color:rgb(48, 119, 189);">
                   <img src="https://pbs.twimg.com/profile_images/1610445215902609408/8AocNFE6_400x400.jpg" class="custom-img h-5">  
                   <hr class="my-2 border-0">
                   Reset Password
                   </div>
                       <div class="card-body">
                       <form action="" enctype="multipart/form-data" class="form-group w-100 mx-auto">

                          <div class="form-floating my-2"> 
                               <input type="email" class="form-control" id="emailField" placeholder="email@email.coms">
                               <label for="emailField" class="text-muted">
                                   Enter your e-mail
                               </label>
                           </div>
                        
                           <div class="text-center">
                               <button class="btn btn-primary btn-block mt-3">Reset Password</button>
                           </div>

                           <div class="text-center">
                           <small>New here?</small>
                           <a href="/account"><small>Create account</small></a>
                           </div>

                           <div class="text-center">
                           <small>Already have an account?</small>
                           <a href="/"><small>Sign in</small></a>
                           </div>
                          
               </div>
           </div>

       </div>
   </div>

</main>

 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 
 <script src="script.js"></script>

</body>
</html>
