<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
</head>
<body>

    
    <nav>
        <a href="/" class="nav-logo">BabiAnnonces</a>
        <div class="nav-links">
            @auth
                <a href="">Mon profil</a>
                <form method="POST" action="/logout" style="display:inline">
                    @csrf
                    <button type="submit" class="btn btn-outline">Logout</button>
                </form>
            @else
                <a href="/login" class="btn btn-outline">Log in</a>
                <a href="/register" class="btn btn-primary">Register</a>
            @endauth
        </div>
    </nav>

    
    <div class="search-section">
        <h1>Trouvez ce que vous cherchez</h1>
        <form method="GET" action="/" class="search-bar">
            <input type="text" name="search" placeholder="Rechercher une annonce..." value="{{ request('search') }}">
            <button type="submit">Rechercher</button>
        </form>
    </div>

    
    @auth
        <div class="post-ad">
            <a href="/ads/create">+ Poster une annonce</a>
        </div>
    @endauth

    
    <div class="ads-section">
        <h2>Annonces récentes</h2>
        <div class="ads-grid">
            
        @if($ads->isEmpty())
            <p class="empty-message">Aucune annonce pour le moment.</p>
        @else
            @foreach($ads as $ad)
                <a href="/ads/{{$ad->id}}" class="ad-card">
                    <img src="{{asset('storage/' . $ad->photo)}}" alt="{{$ad->title}}">
                    <div class="ad-card-body">
                        <span class="ad-card-category">{{$ad->category}}</span>
                        <div class="ad-card-title">{{$ad->title}}</div>
                        <div class="ad-card-price">{{number_format($ad->price)}} Fcfa</div>
                        <div class="ad-card-location">{{$ad->location}}</div>
                    </div>
                </a>
            @endforeach
        @endif
        </div>
    </div>

</body>
</html>       