<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Admin - Login</title>
  </head>
  <body>
   
   <div class="global-container">
     <div class="card login-form">
       <div class="card-body">
       <form action="{{ route('login') }}" method="POST">
            @csrf
       </div>
       <div class="card-text">
        <h1 class="card-title text-center">LOGIN</h1>
        
              <div class="mb-3">
                <label for="email" class="form-label">Username</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
              </div>
              <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
              </div>
              <div class="d-grid gap-2">
               <button class="btn btn-primary" type="submit">Login</button>
              </div>              
        </form>
       </div>
     </div>
   </div>

   
  </body>
</html>