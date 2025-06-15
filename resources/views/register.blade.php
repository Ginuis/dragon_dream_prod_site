<!-- resources/views/register.blade.php -->
@extends('layouts.app')

@section('title', 'Inscription')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
    <form method="POST" action="/inscription" class="bg-dark p-4 rounded w-100 needs-validation" style="max-width: 500px;" novalidate>
        @csrf
        <h2 class="text-center mb-4">Inscription</h2>

        <!-- Champ Nom -->
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" id="nom" name="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom') }}" placeholder="Votre nom de famille" title="Lettres, apostrophes et espaces uniquement" pattern="^[A-Za-z\s'À-ÿ-]{2,}$" required>
            <div class="invalid-feedback">@error('nom') {{ $message }} @else Le nom ne doit contenir que des lettres, espaces ou apostrophes. @enderror</div>
            <div class="text-danger small" id="error-nom"></div>
        </div>

        <!-- Champ Prénom -->
        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" id="prenom" name="prenom" class="form-control @error('prenom') is-invalid @enderror" value="{{ old('prenom') }}" placeholder="Votre prénom ou prénom composé" title="Lettres, espaces, apostrophes et tirets" pattern="^[A-Za-z\s'À-ÿ-]{2,}$" required>
            <div class="invalid-feedback">@error('prenom') {{ $message }} @else Le prénom doit être composé uniquement de lettres, espaces, apostrophes ou tirets. @enderror</div>
            <div class="text-danger small" id="error-prenom"></div>
        </div>

        <!-- Champ Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Adresse e-mail</label>
            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="exemple@mail.com" required>
            <div class="invalid-feedback">@error('email') {{ $message }} @else Veuillez entrer une adresse e-mail valide. @enderror</div>
            <div class="text-danger small" id="error-email"></div>
        </div>

        <!-- Champ Téléphone avec indicatif -->
        <div class="mb-3">
            <label for="telephone" class="form-label">Téléphone</label>
            <div class="input-group">
                <select name="indicatif" class="form-select" style="max-width: 120px;">
                    <option value="+33" {{ old('indicatif') == '+33' ? 'selected' : '' }}>France (+33)</option>
                    <option value="+32" {{ old('indicatif') == '+32' ? 'selected' : '' }}>Belgique (+32)</option>
                    <option value="+41" {{ old('indicatif') == '+41' ? 'selected' : '' }}>Suisse (+41)</option>
                    <option value="+352" {{ old('indicatif') == '+352' ? 'selected' : '' }}>Luxembourg (+352)</option>
                </select>
                <input type="text" id="telephone" name="telephone" class="form-control @error('telephone') is-invalid @enderror" value="{{ old('telephone') }}" placeholder="Numéro sans indicatif" pattern="^[0-9]{6,15}$" required>
            </div>
            <div class="invalid-feedback">@error('telephone') {{ $message }} @else Numéro incorrect (uniquement chiffres, entre 6 et 15). @enderror</div>
            <div class="text-danger small" id="error-telephone"></div>
        </div>

        <!-- Champ Code postal -->
        <div class="mb-3">
            <label for="code_postal" class="form-label">Code postal</label>
            <input type="text" name="code_postal" id="code_postal" class="form-control @error('code_postal') is-invalid @enderror" value="{{ old('code_postal') }}" list="liste_postale" placeholder="Ex : 75000" required>
            <datalist id="liste_postale">
                <option value="75000">Paris</option>
                <option value="1000">Bruxelles</option>
                <option value="1200">Genève</option>
                <option value="L-1009">Luxembourg</option>
            </datalist>
            <div class="invalid-feedback">@error('code_postal') {{ $message }} @else Entrez un code postal valide. @enderror</div>
            <div class="text-danger small" id="error-code_postal"></div>
        </div>

        <!-- Champ Ville -->
        <div class="mb-3">
            <label for="ville" class="form-label">Ville</label>
            <input type="text" name="ville" id="ville" class="form-control @error('ville') is-invalid @enderror" value="{{ old('ville') }}" list="liste_villes" placeholder="Ex : Paris" required>
            <datalist id="liste_villes">
                <option value="Paris">
                <option value="Bruxelles">
                <option value="Genève">
                <option value="Luxembourg">
            </datalist>
            <div class="invalid-feedback">@error('ville') {{ $message }} @else Entrez une ville valide. @enderror</div>
            <div class="text-danger small" id="error-ville"></div>
        </div>

        <!-- Champ Pays -->
        <div class="mb-3">
            <label for="pays" class="form-label">Pays</label>
            <select name="pays" id="pays" class="form-select @error('pays') is-invalid @enderror" required>
                <option value="France" {{ old('pays') == 'France' ? 'selected' : '' }}>France</option>
                <option value="Belgique" {{ old('pays') == 'Belgique' ? 'selected' : '' }}>Belgique</option>
                <option value="Suisse" {{ old('pays') == 'Suisse' ? 'selected' : '' }}>Suisse</option>
                <option value="Luxembourg" {{ old('pays') == 'Luxembourg' ? 'selected' : '' }}>Luxembourg</option>
            </select>
            <div class="invalid-feedback">@error('pays') {{ $message }} @enderror</div>
        </div>

        <!-- Bouton valider -->
        <div class="text-center">
            <button type="submit" class="btn btn-outline-light">Valider mon inscription</button>
        </div>
    </form>
</div>

<script>
// Validation Bootstrap
(function () {
    'use strict';
    window.addEventListener('load', function () {
        var forms = document.getElementsByClassName('needs-validation');
        Array.prototype.filter.call(forms, function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();

// Auto-remplissage pays basé sur code postal ou ville
const codePostalInput = document.getElementById('code_postal');
const villeInput = document.getElementById('ville');
const paysSelect = document.getElementById('pays');

function remplirDepuisCodePostal(cp) {
    const mapping = {
        '75000': { ville: 'Paris', pays: 'France' },
        '1000': { ville: 'Bruxelles', pays: 'Belgique' },
        '1200': { ville: 'Genève', pays: 'Suisse' },
        'L-1009': { ville: 'Luxembourg', pays: 'Luxembourg' }
    };
    if (mapping[cp]) {
        villeInput.value = mapping[cp].ville;
        paysSelect.value = mapping[cp].pays;
    }
}

function remplirDepuisVille(ville) {
    const reverse = {
        'paris': { code: '75000', pays: 'France' },
        'bruxelles': { code: '1000', pays: 'Belgique' },
        'genève': { code: '1200', pays: 'Suisse' },
        'luxembourg': { code: 'L-1009', pays: 'Luxembourg' }
    };
    const cle = ville.toLowerCase();
    if (reverse[cle]) {
        codePostalInput.value = reverse[cle].code;
        paysSelect.value = reverse[cle].pays;
    }
}

codePostalInput.addEventListener('change', e => remplirDepuisCodePostal(e.target.value));
villeInput.addEventListener('change', e => remplirDepuisVille(e.target.value));

// Affichage d'erreurs personnalisées live
const champs = ["nom", "prenom", "email", "telephone", "code_postal", "ville"];
champs.forEach(field => {
    const input = document.getElementById(field);
    const errorDiv = document.getElementById("error-" + field);

    if (input) {
        input.addEventListener('blur', () => {
            if (!input.checkValidity()) {
                errorDiv.textContent = "⚠ Veuillez corriger ce champ correctement.";
                input.classList.add("is-invalid");
            } else {
                errorDiv.textContent = "";
                input.classList.remove("is-invalid");
            }
        });
    }
});
</script>
@endsection