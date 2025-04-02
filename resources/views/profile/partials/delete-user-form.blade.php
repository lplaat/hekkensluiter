<section>
    <header>
        <h3>
            {{ __('Account verwijderen') }}
        </h3>

        <p class="mt-1">
            {{ __('Zodra je account is verwijderd, worden alle bijbehorende bronnen en gegevens permanent verwijderd. Download voordat je je account verwijdert alle gegevens of informatie die je wilt behouden.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Account verwijderen') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2>
                {{ __('Weet je zeker dat je je account wilt verwijderen?') }}
            </h2>

            <p class="mt-1">
                {{ __('Zodra je account is verwijderd, worden alle bijbehorende bronnen en gegevens permanent verwijderd. Voer je wachtwoord in om te bevestigen dat je je account permanent wilt verwijderen.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Wachtwoord') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Wachtwoord') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Annuleren') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Account verwijderen') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
