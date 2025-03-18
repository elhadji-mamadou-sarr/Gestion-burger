<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Spacer</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen bg-gray-100 flex items-center justify-center">

    <div class="flex w-full h-screen">
        <!-- Partie gauche -->
        <div class="w-1/2 bg-gradient flex flex-col items-center justify-center text-white p-10">
            <div class="text-center">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="mb-5 w-24 mx-auto">
                <h1 class="text-3xl font-bold">Welcome to Spacer</h1>
                <p class="mt-3 text-sm opacity-80">Your gateway to seamless project management.</p>
            </div>
        </div>

        <!-- Partie droite (Formulaire de connexion) -->
        <div class="w-1/2 flex items-center justify-center">
            <div class="custom-card w-96">
            <h2 class="text-2xl font-bold text-gray-700 mb-5">Créer un compte</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Nom -->
                <div>
                    <label for="nom" class="block font-medium text-gray-700">Nom</label>
                    <input id="nom" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="text" name="nom" value="{{ old('nom') }}" required autofocus autocomplete="nom" />
                    <x-input-error :messages="$errors->get('nom')" class="mt-2" />
                </div>

                <!-- Prénom -->
                <div class="mt-4">
                    <label for="prenom" class="block font-medium text-gray-700">Prénom</label>
                    <input id="prenom" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="text" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom" />
                    <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
                </div>

                <!-- Téléphone -->
                <div class="mt-4">
                    <label for="telephone" class="block font-medium text-gray-700">Téléphone</label>
                    <input id="telephone" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="number" name="telephone" value="{{ old('telephone') }}" required autocomplete="telephone" />
                    <x-input-error :messages="$errors->get('telephone')" class="mt-2" />
                </div>

                <!-- Adresse -->
                <div class="mt-4">
                    <label for="adresse" class="block font-medium text-gray-700">Adresse</label>
                    <input id="adresse" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="text" name="adresse" value="{{ old('adresse') }}" required autocomplete="adresse" />
                    <x-input-error :messages="$errors->get('adresse')" class="mt-2" />
                </div>

                <!-- Email -->
                <div class="mt-4">
                    <label for="email" class="block font-medium text-gray-700">Adresse e-mail</label>
                    <input id="email" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Mot de passe -->
                <div class="mt-4">
                    <label for="password" class="block font-medium text-gray-700">Mot de passe</label>
                    <input id="password" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirmation du mot de passe -->
                <div class="mt-4">
                    <label for="password_confirmation" class="block font-medium text-gray-700">Confirmer le mot de passe</label>
                    <input id="password_confirmation" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-between mt-4">
                    <a class="text-sm text-indigo-600 hover:underline" href="{{ route('login') }}">
                        Déjà inscrit ? Connectez-vous
                    </a>

                    <button type="submit" class="custom-btn">
                        S'inscrire
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
.bg-gradient {
    background: linear-gradient(to right, #1e3a8a, #3b82f6);
}

.custom-card {
    background: #fff;
    border-radius: 10px;
    padding: 2rem;
    box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
}

.custom-btn {
    background-color: #3b82f6;
    color: white;
    padding: 10px 12px;
    border-radius: 5px;
    transition: 0.3s ease-in-out;
    font-size: 14px;
}

.custom-btn:hover {
    background-color: #1e3a8a;
}
</style>

</body>
</html>
