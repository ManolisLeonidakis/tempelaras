@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Article Header -->
    <div class="bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <!-- Breadcrumb -->
            <nav class="flex mb-8" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-4">
                    <li>
                        <div>
                            <a href="{{ route('home') }}" class="text-gray-400 hover:text-gray-500">
                                <svg class="flex-shrink-0 h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-5.5 5.5A1 1 0 004.5 9H5v7a1 1 0 001 1h3a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1h3a1 1 0 001-1V9h.5a1 1 0 00.707-1.707l-5.5-5.5z"/>
                                </svg>
                                <span class="sr-only">Αρχική</span>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="flex-shrink-0 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <a href="{{ route('posts.index') }}" class="ml-4 text-gray-500 hover:text-gray-700">Blog</a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="flex-shrink-0 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span class="ml-4 text-gray-500">{{ Str::limit($post->title, 30) }}</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Title -->
            <h1 class="text-4xl font-bold text-gray-900 tracking-tight sm:text-5xl lg:text-6xl mb-6">
                {{ $post->title }}
            </h1>

            <!-- Meta Information -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between border-b border-gray-200 pb-8 mb-8">
                <div class="flex items-center space-x-4 mb-4 sm:mb-0">
                    <!-- Author Avatar -->
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-semibold text-lg">
                            {{ substr($post->author->name, 0, 1) }}
                        </div>
                    </div>

                    <!-- Author Info -->
                    <div>
                        <div class="text-lg font-semibold text-gray-900">
                            <a href="{{ route('author', $post->author) }}" class="hover:text-blue-600 transition-colors">
                                {{ $post->author->name }}
                            </a>
                        </div>
                        <div class="flex items-center space-x-4 text-sm text-gray-500">
                            <time datetime="{{ $post->created_at->format('Y-m-d') }}">
                                {{ $post->created_at->format('d M Y') }}
                            </time>
                            <span>•</span>
                            <span>{{ ceil(str_word_count($post->body) / 200) }} λεπτά ανάγνωσης</span>
                        </div>
                    </div>
                </div>

                <!-- Social Share & Actions -->
                <div class="flex items-center space-x-3">
                    <!-- Share Buttons -->
                    <div class="flex space-x-2">
                        <button
                            onclick="shareOnFacebook()"
                            class="inline-flex items-center p-2 border border-gray-300 rounded-lg text-gray-400 hover:text-blue-600 hover:border-blue-300 transition-colors"
                            title="Κοινοποίηση στο Facebook"
                        >
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </button>
                        <button
                            onclick="shareOnTwitter()"
                            class="inline-flex items-center p-2 border border-gray-300 rounded-lg text-gray-400 hover:text-blue-400 hover:border-blue-300 transition-colors"
                            title="Κοινοποίηση στο Twitter"
                        >
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                        </button>
                        <button
                            onclick="copyLink()"
                            class="inline-flex items-center p-2 border border-gray-300 rounded-lg text-gray-400 hover:text-gray-600 hover:border-gray-400 transition-colors"
                            title="Αντιγραφή συνδέσμου"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                            </svg>
                        </button>
                    </div>

                    @auth
                        @can('update', $post)
                        <a
                            href="{{ route('posts.edit', $post) }}"
                            class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors"
                        >
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Επεξεργασία
                        </a>
                        @endcan
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <!-- Article Content -->
    <article class="bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <!-- Featured Image -->
            @if($post->images->first())
            <div class="mb-12">
                <img
                    src="{{ asset($post->images->first()->url) }}"
                    alt="{{ $post->title }}"
                    class="w-full h-64 md:h-96 object-cover rounded-2xl shadow-lg"
                >
            </div>
            @endif

            <!-- Description -->
            <div class="prose prose-lg prose-gray max-w-none mb-12">
                <p class="text-xl text-gray-600 font-medium leading-relaxed border-l-4 border-blue-500 pl-6">
                    {{ $post->description }}
                </p>
            </div>

            <!-- Article Body -->
            <div class="prose prose-lg prose-gray max-w-none">
                {!! nl2br(e($post->body)) !!}
            </div>

            <!-- Article Footer -->
            <div class="mt-16 pt-8 border-t border-gray-200">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                    <div class="flex items-center space-x-4 mb-4 sm:mb-0">
                        <div class="flex-shrink-0">
                            <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-xl">
                                {{ substr($post->author->name, 0, 1) }}
                            </div>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">
                                <a href="{{ route('author', $post->author) }}" class="hover:text-blue-600 transition-colors">
                                    {{ $post->author->name }}
                                </a>
                            </h3>
                            <p class="text-gray-600">Συγγραφέας</p>
                        </div>
                    </div>

                    <div class="flex space-x-3">
                        <a
                            href="{{ route('posts.index') }}"
                            class="inline-flex items-center px-6 py-3 border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition-colors"
                        >
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Όλα τα Άρθρα
                        </a>

                        @auth
                        <a
                            href="{{ route('posts.create') }}"
                            class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors"
                        >
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Νέο Άρθρο
                        </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </article>

    <!-- Related Posts Section -->
    <div class="bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <h2 class="text-3xl font-bold text-gray-900 text-center mb-12">Σχετικά Άρθρα</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @php
                    $relatedPosts = \App\Models\Post::where('id', '!=', $post->id)
                        ->where('user_id', $post->user_id)
                        ->latest()
                        ->take(3)
                        ->get();
                @endphp

                @forelse($relatedPosts as $relatedPost)
                <article class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <div class="relative">
                        <img
                            src="{{ $relatedPost->image ? asset($relatedPost->image) : 'https://via.placeholder.com/400x250?text=No+Image' }}"
                            alt="{{ $relatedPost->title }}"
                            class="w-full h-48 object-cover"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2 line-clamp-2">
                            <a href="{{ route('posts.show', $relatedPost) }}" class="hover:text-blue-600 transition-colors">
                                {{ $relatedPost->title }}
                            </a>
                        </h3>
                        <p class="text-gray-600 text-sm line-clamp-2 mb-3">{{ $relatedPost->description }}</p>
                        <div class="flex items-center text-xs text-gray-500">
                            <span>{{ $relatedPost->created_at->format('d M Y') }}</span>
                        </div>
                    </div>
                </article>
                @empty
                <div class="col-span-full text-center py-8">
                    <p class="text-gray-500">Δεν υπάρχουν σχετικά άρθρα ακόμα.</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

<script>
function shareOnFacebook() {
    const url = encodeURIComponent(window.location.href);
    const text = encodeURIComponent("{{ $post->title }}");
    window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}&quote=${text}`, '_blank', 'width=600,height=400');
}

function shareOnTwitter() {
    const url = encodeURIComponent(window.location.href);
    const text = encodeURIComponent("{{ $post->title }} - ");
    window.open(`https://twitter.com/intent/tweet?url=${url}&text=${text}`, '_blank', 'width=600,height=400');
}

function copyLink() {
    navigator.clipboard.writeText(window.location.href).then(() => {
        // Show success message
        showNotification('Ο σύνδεσμος αντιγράφηκε!', 'success');
    });
}

function showNotification(message, type = 'success') {
    const notification = document.createElement('div');
    notification.className = `fixed top-4 right-4 z-50 px-6 py-3 rounded-lg font-semibold shadow-lg ${
        type === 'success' ? 'bg-green-500 text-white' : 'bg-red-500 text-white'
    }`;
    notification.textContent = message;

    document.body.appendChild(notification);

    setTimeout(() => {
        notification.classList.remove('translate-x-full');
    }, 100);

    setTimeout(() => {
        notification.classList.add('translate-x-full');
        setTimeout(() => {
            document.body.removeChild(notification);
        }, 300);
    }, 3000);
}
</script>
@endsection
