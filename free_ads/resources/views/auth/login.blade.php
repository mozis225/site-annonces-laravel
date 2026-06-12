<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connexion</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/auth.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
</head>
<body class="auth-body">
    <div class="form-container">
        <h1>CONNEXION</h1>
        <a href="/" class="back-link">Retour a l'accueil</a>
        @if(session('success'))
            <div class="success">{{session('success')}}</div>
        @endif

        <form method="POST" action="/login">
            @csrf
            

             <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" value="{{old('email')}}" placeholder="Enter your email..." required>
                @error('email')
                    <span class="error">{{$message}}</span>
                @enderror
            </div>
            
            

            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" placeholder="Enter your password..." required>
                @error('password')
                    <span class="error">{{$message}}</span>
                @enderror
            </div> 
            
            

            <button type="submit">Log in</button>

        </form>
        <div class="register-link">
            You don't have an account? <a href="/register">Register</a>
        </div>
    </div>
            

    
</body>
</html>