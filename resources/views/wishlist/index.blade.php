@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <section class="bg-gradient-to-br from-red-500 via-pink-500 to-red-600 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl lg:text-5xl font-bold mb-4">Τα Αγαπημένα Μου</h1>
                <p class="text-xl text-white/90">Οι επαγγελματίες που έχετε αποθηκεύσει</p>
            </div>
        </div>
    </section>

    <!-- Workers Grid -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($workers->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($workers as $worker)
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300">
                            <!-- Worker Image -->
                            <div class="h-48 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                                @if($worker->image)
                                    <img
                                        class="w-full h-full object-cover"
                                        src="{{ Storage::url($worker->image->url) }}"
                                        alt="{{ $worker->name }}"
                                    >
                                @else
                                    <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center">
                                        <span class="text-blue-600 font-bold text-2xl">
                                            {{ substr($worker->name, 0, 1) }}
                                        </span>
                                    </div>
                                @endif
                            </div>

                            <!-- Worker Info -->
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $worker->name }}</h3>

                                @if($worker->idikotita)
                                    <div class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-medium mb-3">
                                        {{ $worker->idikotita }}
                                    </div>
                                @endif

                                @if($worker->description)
                                    <p class="text-gray-600 mb-4 line-clamp-3">{{ Str::limit($worker->description, 120) }}</p>
                                @endif

                                <!-- Stats -->
                                <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                                    @if($worker->projects && $worker->projects->count() > 0)
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                            </svg>
                                            {{ $worker->projects->count() }} έργα
                                        </div>
                                    @endif

                                    @if($worker->city)
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                            {{ $worker->city }}
                                        </div>
                                    @endif
                                </div>

                                <!-- Actions -->
                                <div class="flex space-x-3">
                                    <a
                                        href="{{ route('find.show', $worker) }}"
                                        class="flex-1 bg-blue-600 hover:bg-blue-700 text-white text-center font-semibold py-2 px-4 rounded-lg transition-colors duration-200"
                                    >
                                        Προβολή
                                    </a>

                                    <form method="POST" action="{{ route('wishlist.remove', $worker) }}" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            type="submit"
                                            class="p-2 text-red-500 hover:text-red-700 hover:bg-red-50 rounded-lg transition-colors duration-200"
                                            title="Αφαίρεση από αγαπημένα"
                                        >
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-16">
                    <svg class="mx-auto h-24 w-24 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                    <h3 class="mt-4 text-xl font-medium text-gray-900">Δεν έχετε αγαπημένους επαγγελματίες</h3>
                    <p class="mt-2 text-gray-500">Αναζητήστε επαγγελματίες και προσθέστε τους στα αγαπημένα σας.</p>
                    <a
                        href="{{ route('find') }}"
                        class="mt-6 inline-flex items-center px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors duration-200"
                    >
                        Αναζήτηση Επαγγελματιών
                    </a>
                </div>
            @endif
        </div>
    </section>
</div>
@endsection
