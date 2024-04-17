<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>5 Pila - Login</title>
</head>
<body>
    <h2>Login</h2>

    @if (session()->has('success'))
    {{ session()->get('success') }} 
    @endif
        
    @error('error')
    <span>{{ $message }}</span>
    @enderror
    
    <form action="{{ route('login.auth') }}" method="post">
      @csrf
      <input type="text" name="user" value="">
      @error('user')
      <span>{{ $message }}</span>
      @enderror
    
      <input type="password" name="password" value="">
      @error('password')
      <span>{{ $message }}</span>
      @enderror
    
      <button type="submit">Login</button>
    </form>
    
</body>
</html>