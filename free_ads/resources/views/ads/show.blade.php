<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $ad->title }}</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/ads.css')}}">
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
</head>
<body>

    
    <nav>
        <a href="/" class="nav-logo">BabiAnnnonces</a>
        <div class="nav-links">
            @auth
                <a href="/profile">Mon profil</a>
                <form method="POST" action="/logout" style="display:inline">
                    @csrf
                    <button type="submit" class="btn btn-outline">Logout</button>
                </form>
            @else
                <a href="/login" class="btn btn-outline">Login</a>
                <a href="/register" class="btn btn-primary">Register</a>
            @endauth
        </div>
    </nav>

    
    <div class="container">

        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif


        <div class="ad-detail">
            <img src="{{ asset('storage/' . $ad->photo) }}" alt="{{ $ad->title }}">

            <div class="ad-detail-body">
                <span class="ad-category">{{ $ad->category }}</span>
                <div class="ad-title">{{ $ad->title }}</div>
                <div class="ad-price">{{ number_format($ad->price, 0, ',', ' ') }} Fcfa</div>
                <div class="ad-location">{{ $ad->location }}</div>

                <div class="ad-description">{{ $ad->description }}</div>

                <div class="ad-author">
                    Publié par <strong>{{ $ad->user->login }}</strong>
                    le {{ $ad->created_at->format('d/m/Y') }}
                </div>

                
                @auth
                    @if(Auth::id() === $ad->user_id)
                        <div class="ad-actions">
                            <a href="/ads/{{ $ad->id }}/edit" class="btn-edit">Modifier</a>

                            <form method="POST" action="/ads/{{ $ad->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-danger" onclick="return confirm('Supprimer cette annonce ?')">Supprimer</button>
                            </form>
                        </div>
                    @endif
                @endauth
            </div>
        </div>

    </div>

</body>
</html>