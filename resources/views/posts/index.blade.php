@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 mt-10">
    <!-- Hero Section with Featured Post -->
    @if($posts->count() > 0)
    <div class="relative bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto">
            <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:pb-28 xl:pb-32">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="lg:grid lg:grid-cols-12 lg:gap-8">
                        <div class="sm:text-center md:max-w-2xl md:mx-auto lg:col-span-6 lg:text-left">
                            <h1 class="text-4xl font-bold text-gray-900 tracking-tight sm:text-5xl md:text-6xl">
                                Το Blog μας
                            </h1>
                            <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-xl lg:text-lg xl:text-xl">
                                Ανακαλύψτε ενδιαφέροντα άρθρα, συμβουλές και ιδέες από την ομάδα μας.
                            </p>
                        </div>
                        <div class="mt-16 sm:mt-24 lg:mt-0 lg:col-span-6">
                            <div class="bg-white sm:max-w-md sm:w-full sm:mx-auto sm:rounded-lg sm:overflow-hidden lg:max-w-none lg:w-full">
                                @php $featuredPost = $posts->first() @endphp
                                <div class="relative">
                                    <img
                                        src="{{ $featuredPost->images->first() ? asset($featuredPost->images->first()->url) : 'https://via.placeholder.com/600x400?text=No+Image' }}"
                                        alt="{{ $featuredPost->title }}"
                                        class="w-full h-64 lg:h-80 object-cover rounded-lg shadow-lg"
                                    >
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent rounded-lg"></div>
                                    <div class="absolute bottom-4 left-4 right-4">
                                        <h2 class="text-xl font-bold text-white mb-2 line-clamp-2">
                                            <a href="{{ route('posts.show', $featuredPost) }}" class="hover:text-blue-200 transition-colors">
                                                {{ $featuredPost->title }}
                                            </a>
                                        </h2>
                                        <p class="text-gray-200 text-sm line-clamp-2">{{ $featuredPost->description }}</p>
                                        <div class="flex items-center mt-2 text-xs text-gray-300">
                                            <span>{{ $featuredPost->author->name }}</span>
                                            <span class="mx-2">•</span>
                                            <span>{{ $featuredPost->created_at->format('d M Y') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Search and Filter Section -->
    <div class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <!-- Search -->
                <div class="flex-1 max-w-md">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input
                            type="text"
                            placeholder="Αναζήτηση άρθρων..."
                            class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        >
                    </div>
                </div>

                <!-- Stats -->
                <div class="flex items-center space-x-6 text-sm text-gray-500">
                    <span>{{ $posts->total() }} άρθρα</span>
                    @auth
                    <a
                        href="{{ route('posts.create') }}"
                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors"
                    >
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Νέο Άρθρο
                    </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <!-- Posts Grid -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        @if($posts->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($posts as $index => $post)
                    @if($index > 0) <!-- Skip the featured post -->
                    <article class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <!-- Image -->
                        <div class="relative">
                            <img
                                src="{{ $post->images->first() ? $post->images->first()->url : 'https://via.placeholder.com/400x250?text=No+Image' }}"
                                alt="{{ $post->title }}"
                                class="w-full h-48 object-cover"
                            >
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                        </div>

                        <!-- Content -->
                        <div class="p-6">
                            <!-- Meta -->
                            <div class="flex items-center text-xs text-gray-500 mb-3">
                                <span>{{ $post->author->name }}</span>
                                <span class="mx-2">•</span>
                                <time>{{ $post->created_at->format('d M Y') }}</time>
                            </div>

                            <!-- Title -->
                            <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2">
                                <a href="{{ route('posts.show', $post) }}" class="hover:text-blue-600 transition-colors">
                                    {{ $post->title }}
                                </a>
                            </h3>

                            <!-- Description -->
                            <p class="text-gray-600 text-sm line-clamp-3 mb-4">
                                {{ $post->description }}
                            </p>

                            <!-- Read More -->
                            <a
                                href="{{ route('posts.show', $post) }}"
                                class="inline-flex items-center text-sm font-medium text-blue-600 hover:text-blue-800 transition-colors"
                            >
                                Διαβάστε περισσότερα
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </article>
                    @endif
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12 flex justify-center">
                {{ $posts->links() }}
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-16">
                <svg class="mx-auto h-24 w-24 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <h3 class="mt-4 text-lg font-medium text-gray-900">Δεν υπάρχουν άρθρα ακόμα</h3>
                <p class="mt-2 text-gray-500">Θα δημοσιεύσουμε σύντομα νέο περιεχόμενο.</p>
                @auth
                <div class="mt-6">
                    <a
                        href="{{ route('posts.create') }}"
                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors"
                    >
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Δημιουργήστε το πρώτο άρθρο
                    </a>
                </div>
                @endauth
            </div>
        @endif
    </div>
</div>
@endsection
