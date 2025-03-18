<section>
    <div class="card">
        <div class="card-header">
            <div class="card-title">{{ __('Informations du profil') }}</div>
        </div>
        <div class="card-body">
            <p class="text-sm text-gray-600">
                {{ __('Mettez à jour les informations de votre profil et votre adresse e-mail.') }}
            </p>

            <form method="post" action="{{ route('profile.update') }}" class="mt-4">
                @csrf
                @method('patch')

                <!-- Nom -->
                <div class="form-group">
                    <label for="name" class="form-label">{{ __('Nom') }}</label>
                    <input type="text" id="name" name="nom" class="form-control" value="{{ old('nom', $user->nom) }}" required autofocus>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Prenom -->
                <div class="form-group">
                    <label for="name" class="form-label">{{ __('Prenom') }}</label>
                    <input type="text" id="name" name="prenom" class="form-control" value="{{ old('name', $user->prenom) }}" required autofocus>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email" class="form-label">{{ __('Adresse e-mail') }}</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Vérification de l'e-mail -->
                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="form-group">
                        <p class="text-sm text-gray-800">
                            {{ __('Votre adresse e-mail n\'est pas vérifiée.') }}
                            <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900">
                                {{ __('Cliquez ici pour renvoyer l\'e-mail de vérification.') }}
                            </button>
                        </p>
                        @if (session('status') === 'verification-link-sent')
                            <p class="text-sm text-green-600 mt-2">
                                {{ __('Un nouveau lien de vérification a été envoyé à votre adresse e-mail.') }}
                            </p>
                        @endif
                    </div>
                @endif

                <!-- Bouton Enregistrer -->
                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-success">{{ __('Enregistrer') }}</button>

                    @if (session('status') === 'profile-updated')
                        <p class="text-sm text-green-600 mt-2">
                            {{ __('Enregistré.') }}
                        </p>
                    @endif
                </div>
            </form>
        </div>
    </div>
</section>