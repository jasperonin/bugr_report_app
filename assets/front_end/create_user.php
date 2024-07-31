<!doctype html>
<html lang="en">

   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Login page</title>
   <link href="./style.css" rel="stylesheet">
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
                   <img src="https://pbs.twimg.com/profile_images/1610445215902609408/8AocNFE6_400x400.jpg">  
                   <hr class="my-2 border-0">
                   Create your account
                   </div>
                       <div class="card-body">
                       <form action="" enctype="multipart/form-data" class="form-group w-100 mx-auto">

                          <div class="form-floating my-2"> 
                               <input type="email" class="form-control" id="emailField" placeholder="email@email.coms">
                               <label for="emailField" class="text-muted">
                                   Enter your e-mail
                               </label>
                           </div>
                           <div class="form-floating my-2"> 
                               <input type="text" class="form-control" id="usernameField" placeholder="username">
                               <label for="usernameField" class="text-muted">
                                   Enter your username
                               </label>
                           </div>
                           <div class="form-floating my-2">
                               <input type="password" class="form-control" id="passwordField" placeholder="">
                               <label for="passwordField" class="text-muted">
                                   Confirm your password
                               </label>
                           </div>
                           <div class="form-floating my-2">
                               <input type="password" class="form-control" id="passwordField" placeholder="">
                               <label for="passwordField" class="text-muted">
                                   Enter your password
                               </label>
                           </div>
                          
                           <div class="form-check text-left">
                               <div class="row">
                                   <div class="col-sm">
                                   <input type="checkbox" class="form-check-input" id="dropdownCheck">
                                   <label class="form-check-label" for="dropdownCheck">
                                   <small>I agree to the Picnic BugHotel </small>
                                   <a href=""><small>Terms </small></a>
                                   <small>and</small>
                                   <a href=""><small>Privacy Policy</small></a>
                                   </label>
                                   </div>
                               </div>
                           </div>
                      
                           <div class="text-center">
                               <button class="btn btn-primary btn-block mt-3">Create Account</button>
                           </div>

                           <div class="hr-style"></div>

                           <div class="text-center">
                           <small>or</small>
                           <hr>
                           </div>

                          
                          
                           <!--sign in with google-->  
                           <div class="text-center">
                               <div class="content-wrapper">
                                    <button class="btn btn-outline-secondary border border-0"><svg width="20px" height="20px" viewBox="-3 0 262 262" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.524"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M255.878,133.451 C255.878,122.717 255.007,114.884 253.122,106.761 L130.55,106.761 L130.55,155.209 L202.497,155.209 C201.047,167.249 193.214,185.381 175.807,197.565 L175.563,199.187 L214.318,229.21 L217.003,229.478 C241.662,206.704 255.878,173.196 255.878,133.451" fill="#4285F4"> </path> <path d="M130.55,261.1 C165.798,261.1 195.389,249.495 217.003,229.478 L175.807,197.565 C164.783,205.253 149.987,210.62 130.55,210.62 C96.027,210.62 66.726,187.847 56.281,156.37 L54.75,156.5 L14.452,187.687 L13.925,189.152 C35.393,231.798 79.49,261.1 130.55,261.1" fill="#34A853"> </path> <path d="M56.281,156.37 C53.525,148.247 51.93,139.543 51.93,130.55 C51.93,121.556 53.525,112.853 56.136,104.73 L56.063,103 L15.26,71.312 L13.925,71.947 C5.077,89.644 0,109.517 0,130.55 C0,151.583 5.077,171.455 13.925,189.152 L56.281,156.37" fill="#FBBC05"> </path> <path d="M130.55,50.479 C155.064,50.479 171.6,61.068 181.029,69.917 L217.873,33.943 C195.245,12.91 165.798,0 130.55,0 C79.49,0 35.393,29.301 13.925,71.947 L56.136,104.73 C66.726,73.253 96.027,50.479 130.55,50.479" fill="#EB4335"> </path> </g> </g></svg><span> Sign in with Google</span></button>
                               </div>
                           </div>
                        

                           <div class="text-center">
                           <small>Already have an account?</small>
                           <a href="/"><small>Sign in here</small></a>
                           </div>
                       </form>
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
