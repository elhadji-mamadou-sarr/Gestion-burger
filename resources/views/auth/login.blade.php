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
                <h2 class="text-2xl font-bold text-gray-700 mb-5">Login to your account</h2>

                <!-- Session Status -->
                @if (session('status'))
                    <div class="mb-4 text-green-500">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                            class="block w-full mt-1 px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Mot de passe -->
                    <div class="mt-4">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input id="password" type="password" name="password" required
                            class="block w-full mt-1 px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        @error('password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" name="remember"
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                            <span class="ml-2 text-sm text-gray-600">Remember me</span>
                        </label>
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center justify-between mt-4">
                        @if (Route::has('password.request'))
                            <a class="text-sm text-indigo-600 hover:underline" href="{{ route('password.request') }}">
                                Forgot password?
                            </a>
                        @endif

                        <button type="submit" class="custom-btn">Log in</button>
                    </div>

                    <div class="mt-4 text-center">
                        <p class="text-gray-600 text-sm">Don't have an account? 
                            <a href="{{ route('register') }}" class="text-indigo-600 hover:underline">Sign Up</a>
                        </p>
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
