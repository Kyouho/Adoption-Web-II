<nav x-data="{ open: false }" style="background:#fff; border-bottom:.5px solid #e5e7eb; position:sticky; top:0; z-index:50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between" style="height:60px">

            {{-- Logo + Links --}}
            <div class="flex items-center gap-6">
                <a href="{{ route('home') }}" class="flex items-center gap-2 brand-font font-semibold"
                   style="color:#2d6a4f; font-size:1.15rem">
                    <span style="font-size:1.35rem">🐾</span>
                    Pata<span style="color:#4a3728">Hogar</span>
                </a>
                <div class="hidden sm:flex items-center gap-0.5">
                    @php
                        $navLinks = [
                            ['route' => 'home',         'label' => 'Inicio'],
                            ['route' => 'animals.index','label' => 'Animales'],
                            ['route' => 'about',        'label' => 'Nosotros'],
                        ];
                    @endphp
                    @foreach($navLinks as $link)
                        <a href="{{ route($link['route']) }}"
                           class="px-3 py-2 rounded-lg text-sm font-medium transition-colors
                           {{ request()->routeIs($link['route'])
                               ? 'background:#d8f3dc; color:#2d6a4f'
                               : 'color:#6b7280' }}">
                            {{ $link['label'] }}
                        </a>
                    @endforeach
                    @auth
                        @if(auth()->user()->role === 'admin')
                            <a href="{{ route('admin.dashboard') }}"
                               class="px-3 py-2 rounded-lg text-sm font-medium transition-colors
                               {{ request()->routeIs('admin.*') ? 'background:#d8f3dc;color:#2d6a4f' : 'color:#6b7280' }}">
                                Panel Admin
                            </a>
                        @else
                            <a href="{{ route('dashboard') }}"
                               class="px-3 py-2 rounded-lg text-sm font-medium transition-colors
                               {{ request()->routeIs('dashboard') ? 'background:#d8f3dc;color:#2d6a4f' : 'color:#6b7280' }}">
                                Mi panel
                            </a>
                            <a href="{{ route('applications.index') }}"
                               class="px-3 py-2 rounded-lg text-sm font-medium transition-colors
                               {{ request()->routeIs('applications.*') ? 'background:#d8f3dc;color:#2d6a4f' : 'color:#6b7280' }}">
                                Mis solicitudes
                            </a>
                        @endif
                    @endauth
                </div>
            </div>

            {{-- Auth Buttons --}}
            <div class="hidden sm:flex items-center gap-2">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center gap-2 px-3 py-2 rounded-xl text-sm transition-colors hover:bg-gray-50"
                                    style="color:#6b7280">
                                <div class="flex items-center justify-center rounded-full text-xs font-semibold"
                                     style="width:30px;height:30px;background:#d8f3dc;color:#2d6a4f">
                                    {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                                </div>
                                <span style="font-weight:500">{{ auth()->user()->name }}</span>
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                </svg>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">Mi perfil</x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    Cerrar sesión
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <a href="{{ route('login') }}"
                       class="px-4 py-2 rounded-lg text-sm font-medium transition-colors"
                       style="color:#6b7280; border:.5px solid #e5e7eb">
                        Iniciar sesión
                    </a>
                    <a href="{{ route('register') }}"
                       class="px-4 py-2 rounded-lg text-sm font-medium text-white transition-colors"
                       style="background:#2d6a4f">
                        Registrarse
                    </a>
                @endauth
            </div>

            {{-- Mobile toggle --}}
            <div class="flex items-center sm:hidden">
                <button @click="open = !open" class="p-2 rounded-lg text-gray-400 hover:bg-gray-50">
                    <svg class="h-5 w-5" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile menu --}}
    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden"
         style="border-top:.5px solid #e5e7eb">
        <div class="px-4 py-3 space-y-1">
            <a href="{{ route('home') }}" class="block px-3 py-2 rounded-lg text-sm text-gray-700 hover:bg-gray-50">Inicio</a>
            <a href="{{ route('animals.index') }}" class="block px-3 py-2 rounded-lg text-sm text-gray-700 hover:bg-gray-50">Animales</a>
            <a href="{{ route('about') }}" class="block px-3 py-2 rounded-lg text-sm text-gray-700 hover:bg-gray-50">Nosotros</a>
            @auth
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 rounded-lg text-sm text-gray-700 hover:bg-gray-50">Panel Admin</a>
                @else
                    <a href="{{ route('dashboard') }}" class="block px-3 py-2 rounded-lg text-sm text-gray-700 hover:bg-gray-50">Mi panel</a>
                    <a href="{{ route('applications.index') }}" class="block px-3 py-2 rounded-lg text-sm text-gray-700 hover:bg-gray-50">Mis solicitudes</a>
                @endif
            @endauth
        </div>
        @auth
            <div class="px-4 py-3" style="border-top:.5px solid #e5e7eb">
                <p class="text-sm font-medium text-gray-800">{{ auth()->user()->name }}</p>
                <p class="text-xs" style="color:#6b7280">{{ auth()->user()->email }}</p>
                <div class="mt-2 space-y-1">
                    <a href="{{ route('profile.edit') }}" class="block px-3 py-2 text-sm text-gray-700 hover:bg-gray-50 rounded-lg">Mi perfil</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left px-3 py-2 text-sm text-gray-700 hover:bg-gray-50 rounded-lg">
                            Cerrar sesión
                        </button>
                    </form>
                </div>
            </div>
        @else
            <div class="px-4 py-3 flex gap-3" style="border-top:.5px solid #e5e7eb">
                <a href="{{ route('login') }}" class="flex-1 text-center px-4 py-2 text-sm rounded-lg"
                   style="border:.5px solid #e5e7eb; color:#374151">Iniciar sesión</a>
                <a href="{{ route('register') }}" class="flex-1 text-center px-4 py-2 text-sm text-white rounded-lg"
                   style="background:#2d6a4f">Registrarse</a>
            </div>
        @endauth
    </div>
</nav>
