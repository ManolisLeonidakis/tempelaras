<header class="bg-white shadow-lg sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" x-data="{ mobileMenu: false }">
        <div class="flex justify-between items-center py-4">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="{{ route('home') }}" class="flex items-center">
                    <img
                        src="{{ asset('images/logo.svg') }}"
                        alt="Fixado Logo"
                        class="h-10 sm:h-20 w-auto"
                    />
                </a>
            </div>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex space-x-8">
                <a href="{{ route('find') }}"
                   class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium transition-colors duration-200 {{ request()->routeIs('find') ? 'text-blue-600 border-b-2 border-blue-600' : '' }}">
                    Βρείτε Επαγγελματία
                </a>
                <a href="{{ route('projects.index') }}"
                   class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium transition-colors duration-200 {{ request()->routeIs('projects.*') ? 'text-blue-600 border-b-2 border-blue-600' : '' }}">
                    Projects
                </a>
                <a href="{{ route('posts.index') }}"
                   class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium transition-colors duration-200 {{ request()->routeIs('posts.*') ? 'text-blue-600 border-b-2 border-blue-600' : '' }}">
                    Blog
                </a>
            </nav>

            <!-- User Menu -->
            <div class="flex items-center space-x-4">
                <!-- Wishlist Icon -->
                <a href="{{ route('wishlist.index') }}"
                   class="relative text-gray-700 hover:text-red-600 transition-colors duration-200 p-2 rounded-full hover:bg-gray-100">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                    <span x-data="{ count: {{ count(session('wishlist', [])) }} }"
                          x-show="count > 0"
                          x-text="count"
                          class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center font-bold">
                    </span>
                </a>

                @auth
                    <!-- Profile Dropdown -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center space-x-2 text-gray-700 hover:text-gray-900 focus:outline-none">
                            <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                <span class="text-sm font-medium text-blue-600">
                                    {{ substr(auth()->user()->name, 0, 1) }}
                                </span>
                            </div>
                            <span class="hidden sm:block text-sm font-medium">{{ auth()->user()->name }}</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <div x-show="open" @click.away="open = false"
                             class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 border border-gray-200"
                             x-transition:enter="transition ease-out duration-100"
                             x-transition:enter-start="transform opacity-0 scale-95"
                             x-transition:enter-end="transform opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="transform opacity-100 scale-100"
                             x-transition:leave-end="transform opacity-0 scale-95">

                            <a href="{{ route('profile.edit') }}"
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Το Προφίλ Μου
                            </a>

                            <div class="border-t border-gray-100"></div>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                        class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                                    <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                    </svg>
                                    Αποσύνδεση
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}"
                       class="text-gray-700 hover:text-blue-600 px-4 py-2 text-sm font-medium transition-colors duration-200">
                        Σύνδεση
                    </a>
                    <a href="{{ route('register') }}"
                       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200">
                        Εγγραφή
                    </a>
                @endauth

                <!-- Mobile menu button -->
                <button @click="mobileMenu = !mobileMenu"
                        class="md:hidden p-2 rounded-md text-gray-700 hover:text-gray-900 hover:bg-gray-100 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!mobileMenu" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        <path x-show="mobileMenu" x-cloak stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div x-show="mobileMenu" x-cloak
             class="md:hidden border-t border-gray-200 py-4"
             x-transition:enter="transition ease-out duration-100"
             x-transition:enter-start="transform opacity-0 scale-95"
             x-transition:enter-end="transform opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-75"
             x-transition:leave-start="transform opacity-100 scale-100"
             x-transition:leave-end="transform opacity-0 scale-95">

            <nav class="flex flex-col space-y-2">
                <a href="{{ route('find') }}"
                   class="text-gray-700 hover:text-blue-600 px-3 py-2 text-base font-medium rounded-md hover:bg-gray-50 transition-colors duration-200 {{ request()->routeIs('find') ? 'text-blue-600 bg-blue-50' : '' }}">
                    Βρείτε Επαγγελματία
                </a>
                <a href="{{ route('projects.index') }}"
                   class="text-gray-700 hover:text-blue-600 px-3 py-2 text-base font-medium rounded-md hover:bg-gray-50 transition-colors duration-200 {{ request()->routeIs('find') ? 'text-blue-600 bg-blue-50' : '' }}">
                    Projects
                </a>
                <a href="{{ route('posts.index') }}"
                   class="text-gray-700 hover:text-blue-600 px-3 py-2 text-base font-medium rounded-md hover:bg-gray-50 transition-colors duration-200 {{ request()->routeIs('posts.*') ? 'text-blue-600 bg-blue-50' : '' }}">
                    Blog
                </a>
                <a href="{{ route('wishlist.index') }}"
                   class="text-gray-700 hover:text-red-600 px-3 py-2 text-base font-medium rounded-md hover:bg-gray-50 transition-colors duration-200 flex items-center justify-between {{ request()->routeIs('wishlist.*') ? 'text-red-600 bg-red-50' : '' }}">
                    <span>Αγαπημένα</span>
                    @if(count(session('wishlist', [])) > 0)
                        <span class="bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center font-bold">
                            {{ count(session('wishlist', [])) }}
                        </span>
                    @endif
                </a>

                @auth
                    <div class="border-t border-gray-200 pt-4 mt-4">
                        <div class="px-3 py-2">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                    <span class="text-sm font-medium text-blue-600">
                                        {{ substr(auth()->user()->name, 0, 1) }}
                                    </span>
                                </div>
                                <div>
                                    <div class="text-base font-medium text-gray-900">{{ auth()->user()->name }}</div>
                                    <div class="text-sm text-gray-500">{{ auth()->user()->email }}</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('profile.edit') }}"
                           class="block text-gray-700 hover:text-blue-600 px-3 py-2 text-base font-medium rounded-md hover:bg-gray-50 transition-colors duration-200">
                            Το Προφίλ Μου
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                    class="block w-full text-left text-gray-700 hover:text-blue-600 px-3 py-2 text-base font-medium rounded-md hover:bg-gray-50 transition-colors duration-200">
                                Αποσύνδεση
                            </button>
                        </form>
                    </div>
                @endauth
            </nav>
        </div>
    </div>
</header>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu state
    window.mobileMenu = false;
});
</script>
