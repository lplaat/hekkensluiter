<nav class="navbar navbar-expand-lg bg-light-subtle">
    <div class="container-fluid">
        <x-application-logo class="navbar-brand mb-0"/>
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-nav-link>
            </li>
            <li class="nav-item">
                <x-nav-link :href="route('prisoners.index')" :active="request()->routeIs('prisoners')">
                    {{ __('Gevangenen') }}
                </x-nav-link>
            </li>
            <li class="nav-item">
                <x-nav-link :href="route('cells.index')" :active="request()->routeIs('cells')">
                    {{ __('Cellen') }}
                </x-nav-link>
            </li>
        </ul>
        <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="btn dropdown-toggle border-0 py-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </button>
                </x-slot>

                <x-slot name="content">
                    <li><x-dropdown-link :href="route('profile.edit')">
                        {{ __('Profiel') }}
                    </x-dropdown-link></li>

                    <!-- Authentication -->
                    <li><form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Uitloggen') }}
                        </x-dropdown-link>
                    </form></li>
                </x-slot>
            </x-dropdown>
    </div>
</nav>