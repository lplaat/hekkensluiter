<x-app-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <h4 class="mt-4">Welkom bij het arrestantencomplex</h4>
                <p class="text-muted">Log in met uw gegevens</p>
            </div>
            
            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <!-- Email Address -->
                <div class="mb-3">
                    <x-input-label for="email" :value="__('E-mail:')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                
                <!-- Password -->
                <div class="mb-3">
                    <x-input-label for="password" :value="__('Wachtwoord:')" />
                    <x-text-input id="password" class="block mt-1 w-full"
                        type="password"
                        name="password"
                        required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="mb-3 form-check custom-checkbox">
                    <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                    <label class="form-check-label" for="remember_me">{{ __('Onthoud mij') }}</label>
                </div>

                <div class="d-grid gap-2">
                    <x-primary-button class="btn-lg">
                        <i class="fas fa-sign-in-alt me-2"></i> {{ __('Inloggen') }}
                    </x-primary-button>
                </div>
                
                <div class="auth-footer">
                    <p>Arrestantencomplex Hekkensluiter &copy; 2025</p>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>