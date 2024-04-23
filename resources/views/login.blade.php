<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>5 Pila - Login</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

</head>
<body class="d-flex justify-content-center align-items-center py-4 bg-body-tertiary" style="height: 100vh">
  @if (session()->has('success'))
  {{ session()->get('success') }} 
  @endif

  <div class="card">
    <article class="card-body">
      <h4 class="card-title text-center mb-4 mt-1">Login</h4>
      <hr>
       @error('error')
       <p class="text-danger text-center">{{ $message }}</p>
    @enderror
      <form action="{{ route('login.auth') }}" method="post">
      <div class="form-group">
      <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
         </div>
         @csrf
      <input type="text" class="form-control" name="user" value="" placeholder="Usuario:">
           </div>
           @error('user')
           <span class="text-danger text-center">{{ $message }}</span>
           @enderror <!-- input-group.// -->
      </div> <!-- form-group// -->
      <div class="form-group">
      <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
         </div>
         <input type="password" class="form-control"  placeholder="Senha:" name="password" value="">
      </div> <!-- input-group.// -->
      @error('password')
      <span class="text-danger text-center">{{ $message }}</span>
      @enderror
      </div> <!-- form-group// -->
      <div class="form-group">
      <button type="submit" class="btn btn-primary btn-block"> Login  </button>
      </div> <!-- form-group// -->
      </form>
    </article>
    </div>   
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>