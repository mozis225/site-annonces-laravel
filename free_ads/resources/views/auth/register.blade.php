<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inscription</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/auth.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
</head>
<body class="auth-body">
    <div class="form-container">
        <h1>INSCRIPTION</h1>
        <a href="/" class="back-link">Retour a l'accueil</a>
        @if(session('success'))
            <div class="success">{{session('success')}}</div>
        @endif

        <form method="POST" action="/register">
            @csrf
            <div class="form-group">
                <label for="">login</label>
                <input type="text" name="login" value="{{old('login')}}" placeholder="Enter your login..." required>
                @error('login')
                    <span class="error">{{$message}}</span>
                @enderror
            </div>

             <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" value="{{old('email')}}" placeholder="Enter your email..." required>
                @error('email')
                    <span class="error">{{$message}}</span>
                @enderror
            </div>
            
             <div class="form-group">
                <label for="">Phone number</label>
                <input type="text" name="phone_number" value="{{old('phone_number')}}" placeholder="Enter your phone number..." required>
                @error('phone_number')
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
            
            <div class="form-group">
                <label for=""> Comfirm password</label>
                <input type="password" name="password_confirmation" placeholder="Comfirm your password..." required>
            </div>

            <button type="submit"> Register</button>

        </form>
        <div class="login-link">
            Already you have an account? <a href="/login">Log in</a>
        </div>
    </div>
            

    
</body>
</html>