<section>
    <div class="card">
        <div class="card-header">
            <div class="card-title">{{ __('Mettre à jour le mot de passe') }}</div>
        </div>
        <div class="card-body">
            <p class="text-sm text-gray-600">
                {{ __('Assurez-vous que votre compte utilise un mot de passe long et aléatoire pour rester sécurisé.') }}
            </p>

            <form method="post" action="{{ route('password.update') }}" class="mt-4">
                @csrf
                @method('put')

                <!-- Mot de passe actuel -->
                <div class="form-group">
                    <label for="update_password_current_password" class="form-label">{{ __('Mot de passe actuel') }}</label>
                    <input type="password" id="update_password_current_password" name="current_password" class="form-control" autocomplete="current-password" required>
                    @error('current_password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Nouveau mot de passe -->
                <div class="form-group">
                    <label for="update_password_password" class="form-label">{{ __('Nouveau mot de passe') }}</label>
                    <input type="password" id="update_password_password" name="password" class="form-control" autocomplete="new-password" required>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Confirmation du mot de passe -->
                <div class="form-group">
                    <label for="update_password_password_confirmation" class="form-label">{{ __('Confirmer le mot de passe') }}</label>
                    <input type="password" id="update_password_password_confirmation" name="password_confirmation" class="form-control" autocomplete="new-password" required>
                    @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Bouton Enregistrer -->
                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-success">{{ __('Enregistrer') }}</button>

                    @if (session('status') === 'password-updated')
                        <p class="text-sm text-green-600 mt-2">
                            {{ __('Enregistré.') }}
                        </p>
                    @endif
                </div>
            </form>
        </div>
    </div>
</section>