<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publier une annonce</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/ads.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
</head>
<body>
    <div class="container">
        <a href="/" class="back-link">Retour à l'accueil</a>
        <h1>Publier une annonce</h1>

        <form method="POST" action="/ads" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Titre</label>
                <input type="text" name="title" value="{{ old('title') }}" placeholder="Ex: iPhone 13 Pro" required>
                @error('title') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label>Catégorie</label>
                <select name="category" required>
                    <option value="">-- Choisir une catégorie --</option>
                    <option value="Électronique" {{ old('category') == 'Électronique' ? 'selected' : '' }}>Électronique</option>
                    <option value="Vêtements" {{ old('category') == 'Vêtements' ? 'selected' : '' }}>Vêtements</option>
                    <option value="Immobilier" {{ old('category') == 'Immobilier' ? 'selected' : '' }}>Immobilier</option>
                    <option value="Véhicules" {{ old('category') == 'Véhicules' ? 'selected' : '' }}>Véhicules</option>
                    <option value="Emploi" {{ old('category') == 'Emploi' ? 'selected' : '' }}>Emploi</option>
                    <option value="Autre" {{ old('category') == 'Autre' ? 'selected' : '' }}>Autre</option>
                </select>
                @error('category') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" placeholder="Décrivez votre article en détail...">{{ old('description') }}</textarea>
                @error('description') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label>Photo</label>
                <input type="file" name="photo" accept="image/*" required>
                @error('photo') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label>Prix (Fcfa)</label>
                <input type="number" name="price" value="{{ old('price') }}" placeholder="Ex: 15000" required>
                @error('price') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label>Localisation</label>
                <input type="text" name="location" value="{{ old('location') }}" placeholder="Ex: Dakar, Abidjan..." required>
                @error('location') <span class="error">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn-submit">Publier l'annonce</button>
        </form>
    </div>
</body>
</html>