@extends('layouts.app')

@section('title', 'Βρείτε Επαγγελματίες - Vres Mastora')
@section('description', 'Αναζητήστε και βρείτε τους καλύτερους επαγγελματίες στην περιοχή σας. Φιλτράρετε ανά ειδικότητα και πόλη για να βρείτε τον ιδανικό τεχνίτη για τις εργασίες σας.')
@section('keywords', 'επαγγελματίες, αναζήτηση, υδραυλικοί, ηλεκτρολόγοι, τεχνίτες, Ελλάδα, πόλεις, ειδικότητες')
@section('robots', 'index, follow, max-snippet:-1, max-image-preview:large')
@section('og_type', 'website')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Search Header -->
    <section class="bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-800 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">
                    Βρείτε Επαγγελματίες
                </h1>
                <p class="text-xl text-blue-100 max-w-2xl mx-auto">
                    Αναζητήστε και βρείτε τους καλύτερους επαγγελματίες στην περιοχή σας
                </p>
            </div>

            <!-- Search Form -->
            <form method="get" action="{{ route('find') }}" class="max-w-5xl mx-auto">
                <div class="bg-white rounded-2xl shadow-2xl p-8 transform hover:scale-105 transition-transform duration-300">
                    <div class="grid md:grid-cols-4 gap-6">
                        <div class="relative">
                            <label for="idikotita" class="block text-sm font-medium text-gray-700 mb-2">Ειδικότητα</label>
                            <select name="idikotita" id="idikotita"
                                class="w-full px-4 py-3 pr-10 bg-gray-50 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 text-gray-900">
                                <option value="">Όλες οι ειδικότητες</option>
                                @foreach (config('services.idikothtes') as $idikotita)
                                    <option value="{{ $idikotita }}" {{ request('idikotita') == $idikotita ? 'selected' : '' }}>
                                        {{ $idikotita }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none mt-6">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>

                        <div class="relative">
                            <label for="city" class="block text-sm font-medium text-gray-700 mb-2">Πόλη</label>
                            <select name="city" id="city"
                                class="w-full px-4 py-3 pr-10 bg-gray-50 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 text-gray-900">
                                <option value="">Όλες οι πόλεις</option>
                                @foreach (config('services.cities') as $city)
                                    <option value="{{ $city }}" {{ request('city') == $city ? 'selected' : '' }}>
                                        {{ $city }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none mt-6">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>

                        <div class="relative">
                            <label for="sort" class="block text-sm font-medium text-gray-700 mb-2">Ταξινόμηση</label>
                            <select name="sort" id="sort"
                                class="w-full px-4 py-3 pr-10 bg-gray-50 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 text-gray-900">
                                <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Αλφαβητικά</option>
                                <option value="created_at" {{ request('sort') == 'created_at' ? 'selected' : '' }}>Πρόσφατοι</option>
                                <option value="rating" {{ request('sort') == 'rating' ? 'selected' : '' }}>Βαθμολογία</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none mt-6">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                </svg>
                            </div>
                        </div>

                        <div class="flex items-end space-x-3">
                            <button type="submit"
                                class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition-all duration-200 transform hover:scale-105 shadow-lg">
                                <span class="flex items-center justify-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                    Αναζήτηση
                                </span>
                            </button>
                            <a href="{{ route('find') }}"
                                class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-3 px-4 rounded-lg transition-all duration-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Results Summary -->
            <div class="text-center mt-8">
                <p class="text-blue-100">
                    @if($users->total() > 0)
                        Βρέθηκαν <span class="font-bold text-yellow-400">{{ $users->total() }}</span> επαγγελματίες
                        @if(request('idikotita'))
                            για <span class="font-bold text-yellow-400">{{ request('idikotita') }}</span>
                        @endif
                        @if(request('city'))
                            στην <span class="font-bold text-yellow-400">{{ request('city') }}</span>
                        @endif
                    @else
                        Δεν βρέθηκαν επαγγελματίες με τα κριτήρια αναζήτησης
                    @endif
                </p>
            </div>
        </div>
    </section>

    <!-- Workers Grid -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($users->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($users as $user)
                        <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100 overflow-hidden worker-card">
                            <!-- Profile Image -->
                            <div class="relative h-48 bg-gradient-to-br from-blue-100 to-indigo-100">
                                @if($user->image)
                                    <a href="{{ route('find.show', $user) }}">
                                        <img
                                            class="w-full h-full object-cover"
                                            src="{{ asset('storage/app/public/' . $user->image->url) }}"
                                            alt="{{ $user->name }}"
                                        >
                                    </a>
                                @else
                                    <a href="{{ route('find.show', $user) }}" class="w-full h-full flex items-center justify-center">
                                        <div class="w-20 h-20 bg-gray-300 rounded-full flex items-center justify-center">
                                            <svg class="w-10 h-10 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                        </div>
                                    </a>
                                @endif

                                <!-- Rating Badge -->
                                {{-- <div class="absolute top-4 right-4 bg-white bg-opacity-90 backdrop-blur-sm rounded-lg px-3 py-1 flex items-center">
                                    <div class="flex text-yellow-400 mr-1">
                                        ★★★★☆
                                    </div>
                                    <span class="text-sm font-semibold text-gray-900">4.5</span>
                                </div> --}}

                                <!-- Specialty Badge -->
                                @if($user->idikotita)
                                    <div class="absolute bottom-4 left-4 bg-blue-600 text-white text-xs font-semibold px-3 py-1 rounded-full">
                                        {{ $user->idikotita }}
                                    </div>
                                @endif
                            </div>

                            <!-- Content -->
                            <div class="p-6 flex-1">
                                <div class="flex items-start justify-between mb-4">
                                    <a href="{{ route('find.show', $user) }}" >
                                        <h3 class="text-xl font-bold text-gray-900 mb-1">{{ $user->name }}</h3>
                                        @if($user->city)
                                            <p class="text-sm text-gray-600 flex items-center">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                </svg>
                                                {{ $user->city ?? 'N/A' }}
                                            </p>
                                        @endif
                                    </a>
                                </div>

                                @if($user->description)
                                    <p class="text-gray-700 text-sm mb-4 line-clamp-3">{{ Str::limit($user->description, 120) }}</p>
                                @endif

                                <!-- Contact Buttons -->
                                <div class="flex space-x-3">
                                    @if ($user->phone)
                                        <a href="tel:{{ $user->phone }}"
                                            class="flex-1 bg-blue-600 hover:bg-blue-700 text-white text-center py-3 px-4 rounded-lg transition-all duration-200 transform hover:scale-105 flex items-center justify-center contact-btn">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                            </svg>
                                            Κλήση
                                        </a>
                                    @endif
                                    @if ($user->mobile)
                                        <a href="tel:{{ $user->mobile }}"
                                            class="flex-1 bg-green-600 hover:bg-green-700 text-white text-center py-3 px-4 rounded-lg transition-all duration-200 transform hover:scale-105 flex items-center justify-center contact-btn">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                            </svg>
                                            Κινητό
                                        </a>
                                    @endif
                                    @if (!$user->phone && !$user->mobile)
                                        <!-- Contact Form Modal Trigger -->
                                        <a href="{{ route('find.show', $user) }}"
                                            class="w-full justify-center inline-flex items-center px-8 py-4 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-all duration-200 transform hover:scale-105 shadow-lg profile-contact-btn">
                                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                            </svg>
                                            Mέσω Email
                                        </a>
                                    @endif
                                </div>

                                <!-- Additional Info -->
                                <div class="mt-4 pt-4 border-t border-gray-100">
                                    <div class="flex items-center justify-between text-sm text-gray-600">
                                        <span class="flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            Διαθέσιμος
                                        </span>
                                        <span class="flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            Επαληθευμένος
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-16 flex justify-center">
                    {{ $users->appends(request()->query())->links() }}
                </div>
            @else
                <!-- No Results -->
                <div class="text-center py-16">
                    <div class="w-24 h-24 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Δεν βρέθηκαν αποτελέσματα</h3>
                    <p class="text-gray-600 mb-8 max-w-md mx-auto">
                        Δοκιμάστε να αλλάξετε τα κριτήρια αναζήτησης ή να επεκτείνετε την περιοχή σας.
                    </p>
                    <a href="{{ route('find') }}"
                        class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition-colors duration-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                        </svg>
                        Νέα Αναζήτηση
                    </a>
                </div>
            @endif
        </div>
    </section>
</div>
@endsection
