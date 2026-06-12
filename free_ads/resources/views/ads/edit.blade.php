<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'annonce</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/ads.css')}}">
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
        <a href="/ads/{{ $ad->id }}" class="back-link"> Retour à l'annonce</a>
        <h1>Modifier l'annonce</h1>

        <form method="POST" action="/ads/{{ $ad->id }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Titre</label>
                <input type="text" name="title" value="{{ old('title', $ad->title) }}" required>
                @error('title') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label>Catégorie</label>
                <select name="category" required>
                    <option value="">-- Choisir une catégorie --</option>
                    <option value="Électronique" {{ old('category', $ad->category) == 'Électronique' ? 'selected' : '' }}>Électronique</option>
                    <option value="Vêtements" {{ old('category', $ad->category) == 'Vêtements' ? 'selected' : '' }}>Vêtements</option>
                    <option value="Immobilier" {{ old('category', $ad->category) == 'Immobilier' ? 'selected' : '' }}>Immobilier</option>
                    <option value="Véhicules" {{ old('category', $ad->category) == 'Véhicules' ? 'selected' : '' }}>Véhicules</option>
                    <option value="Emploi" {{ old('category', $ad->category) == 'Emploi' ? 'selected' : '' }}>Emploi</option>
                    <option value="Autre" {{ old('category', $ad->category) == 'Autre' ? 'selected' : '' }}>Autre</option>
                </select>
                @error('category') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description">{{ old('description', $ad->description) }}</textarea>
                @error('description') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label>Photo</label>
                
                <div class="current-photo">
                    <img src="{{ asset('storage/' . $ad->photo) }}" alt="Photo actuelle">
                    <p>Photo actuelle — laissez vide pour la garder</p>
                </div>
                <input type="file" name="photo" accept="image/*">
                @error('photo') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label>Prix (Fcfa)</label>
                <input type="number" name="price" value="{{ old('price', $ad->price) }}" required>
                @error('price') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label>Localisation</label>
                <input type="text" name="location" value="{{ old('location', $ad->location) }}" required>
                @error('location') <span class="error">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn-edit">Sauvegarder les modifications</button>
        </form>
    </div>

</body>
</html>