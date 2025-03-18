<section>
    <div class="card">
        <div class="card-header">
            <div class="card-title">{{ __('Supprimer le compte') }}</div>
        </div>
        <div class="card-body">
            <p class="text-sm text-gray-600">
                {{ __('Une fois votre compte supprimé, toutes ses ressources et données seront définitivement effacées. Avant de supprimer votre compte, veuillez télécharger toutes les données ou informations que vous souhaitez conserver.') }}
            </p>

            <button class="btn btn-danger mt-4" x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
                {{ __('Supprimer le compte') }}
            </button>

            <!-- Modal de confirmation -->
            <div x-data="{ open: false }" x-show="open" x-on:open-modal.window="open = true" x-on:close-modal.window="open = false" class="modal">
                <div class="modal-content">
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Êtes-vous sûr de vouloir supprimer votre compte ?') }}
                    </h2>
                    <p class="mt-1 text-sm text-gray-600">
                        {{ __('Une fois votre compte supprimé, toutes ses ressources et données seront définitivement effacées. Veuillez entrer votre mot de passe pour confirmer que vous souhaitez supprimer définitivement votre compte.') }}
                    </p>

                    <form method="post" action="{{ route('profile.destroy') }}" class="mt-4">
                        @csrf
                        @method('delete')

                        <!-- Mot de passe -->
                        <div class="form-group">
                            <label for="password" class="form-label">{{ __('Mot de passe') }}</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="{{ __('Mot de passe') }}" required>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Boutons -->
                        <div class="form-group mt-4 flex justify-end gap-4">
                            <button type="button" class="btn btn-secondary" x-on:click="$dispatch('close-modal')">
                                {{ __('Annuler') }}
                            </button>
                            <button type="submit" class="btn btn-danger">
                                {{ __('Supprimer le compte') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>