<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
    <div class="container">
        <x-application-logo class="navbar-brand mb-0"/>

        <?php if(Auth::check()) {?>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            <i class="fas fa-tachometer-alt me-1"></i> {{ __('Dashboard') }}
                        </x-nav-link>
                    </li>
                    
                    <li class="nav-item">
                        <x-nav-link :href="route('prisoners.index')" :active="request()->routeIs('prisoners')">
                            <i class="fas fa-users me-1"></i> {{ __('Gevangenen') }}
                        </x-nav-link>
                    </li>
                    
                    <li class="nav-item">
                        <x-nav-link :href="route('cells.index')" :active="request()->routeIs('cells')">
                            <i class="fas fa-door-closed me-1"></i> {{ __('Cellen') }}
                        </x-nav-link>
                    </li>

                    <li class="nav-item">
                        <x-nav-link :href="route('incidents.index')" :active="request()->routeIs('incidents')">
                            <i class="fas fa-exclamation-triangle me-1"></i> {{ __('Delicten') }}
                        </x-nav-link>
                    </li>

                    <li class="nav-item">
                        <x-nav-link :href="route('prisonerLogs.index')" :active="request()->routeIs('prisonerLogs')">
                            <i class="fas fa-clipboard-list me-1"></i> {{ __('Logs') }}
                        </x-nav-link>
                    </li>

                    <?php if(Auth::user()->role == 2) { ?>
                        <li class="nav-item">
                            <x-nav-link :href="route('users.index')" :active="request()->routeIs('users')">
                                <i class="fas fa-user-shield me-1"></i> {{ __('Gebruikers') }}
                            </x-nav-link>
                        </li>
                    <?php } ?>
                </ul>
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="btn dropdown-toggle border-0 py-0 text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-circle me-1"></i> {{ Auth::user()->name }}
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <li><form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                <i class="fas fa-sign-out-alt me-1"></i> {{ __('Uitloggen') }}
                            </x-dropdown-link>
                        </form></li>
                    </x-slot>
                </x-dropdown>
            </div>
        <?php } else { ?>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <x-nav-link :href="route('login')">
                        <i class="fas fa-sign-in-alt me-1"></i> {{ __('Inloggen') }}
                    </x-nav-link>
                </li>
            </ul>
        <?php } ?>
    </div>
</nav>