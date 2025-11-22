@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Project Header -->
    <section class="bg-gradient-to-br from-yellow-500 via-orange-500 to-red-600 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center space-x-4 mb-4">
                <a href="{{ route('projects.index') }}" class="text-white/80 hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </a>
                <h1 class="text-3xl lg:text-4xl font-bold">{{ $project->title }}</h1>
            </div>

            <!-- Project Meta -->
            <div class="flex flex-wrap items-center gap-4 text-white/90">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    Ολοκληρώθηκε {{ $project->created_at->format('d/m/Y') }}
                </div>

                @if($project->images->count() > 0)
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        {{ $project->images->count() }} {{ $project->images->count() === 1 ? 'φωτογραφία' : 'φωτογραφίες' }}
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Project Content -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Images Gallery -->
                @if($project->images && $project->images->count() > 0)
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                        <!-- Main Image -->
                        <div class="w-full h-96 lg:h-[600px] bg-gray-200">
                            <img
                                id="mainImage"
                                class="w-full h-full object-cover"
                                src="{{ asset('storage/app/public/' . $project->images->first()->url) }}"
                                alt="{{ $project->title }}"
                            >
                        </div>

                        <!-- Thumbnail Gallery -->
                        @if($project->images->count() > 1)
                            <div class="p-4 bg-gray-50 border-t border-gray-200">
                                <div class="grid grid-cols-4 md:grid-cols-6 gap-4">
                                    @foreach($project->images as $image)
                                        <button
                                            onclick="changeImage('{{  asset('storage/app/public/' . $image->url) }}')"
                                            class="aspect-square rounded-lg overflow-hidden hover:ring-4 hover:ring-orange-500 transition-all focus:ring-4 focus:ring-orange-500 focus:outline-none"
                                        >
                                            <img
                                                class="w-full h-full object-cover"
                                                src="{{  asset('storage/app/public/' . $image->url) }}"
                                                alt="{{ $project->title }}"
                                            >
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                @endif

                <!-- Description -->
                <div class="bg-white rounded-2xl shadow-lg p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center">
                        <svg class="w-6 h-6 mr-3 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Περιγραφή Έργου
                    </h2>
                    <div class="text-gray-700 leading-relaxed text-lg whitespace-pre-line">
                        {{ $project->description }}
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1 space-y-6">
                <!-- Worker Card -->
                <div class="bg-white rounded-2xl shadow-lg p-6 sticky top-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Επαγγελματίας</h3>

                    <div class="flex items-center space-x-4 mb-6">
                        @if($project->user->image)
                            <img
                                class="w-16 h-16 rounded-full object-cover border-2 border-orange-500"
                                src="{{  asset('storage/app/public/' . $project->user->image->url) }}"
                                alt="{{ $project->user->name }}"
                            >
                        @else
                            <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center border-2 border-orange-500">
                                <span class="text-orange-600 font-bold text-xl">
                                    {{ substr($project->user->name, 0, 1) }}
                                </span>
                            </div>
                        @endif

                        <div>
                            <h4 class="font-bold text-gray-900">{{ $project->user->name }}</h4>
                            @if($project->user->idikotita)
                                <p class="text-sm text-gray-600">{{ $project->user->idikotita }}</p>
                            @endif
                        </div>
                    </div>

                    @if($project->user->city)
                        <div class="flex items-center text-gray-600 mb-4">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span>{{ $project->user->city }}</span>
                        </div>
                    @endif

                    <!-- View Profile Button -->
                    <a
                        href="{{ route('find.show', $project->user) }}"
                        class="block w-full bg-gradient-to-r from-orange-500 to-red-600 text-white text-center font-semibold py-3 rounded-lg hover:from-orange-600 hover:to-red-700 transition-all duration-200 transform hover:scale-105 shadow-lg mb-3"
                    >
                        Δείτε το Προφίλ
                    </a>

                    <!-- Contact Buttons -->
                    @if($project->user->phone || $project->user->mobile)
                        <div class="space-y-2 border-t border-gray-200 pt-4">
                            @if($project->user->mobile)
                                <a
                                    href="tel:{{ $project->user->mobile }}"
                                    class="flex items-center justify-center w-full bg-green-600 text-white font-semibold py-3 rounded-lg hover:bg-green-700 transition-colors"
                                >
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                    </svg>
                                    Κλήση
                                </a>
                            @elseif($project->user->phone)
                                <a
                                    href="tel:{{ $project->user->phone }}"
                                    class="flex items-center justify-center w-full bg-blue-600 text-white font-semibold py-3 rounded-lg hover:bg-blue-700 transition-colors"
                                >
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                    Κλήση
                                </a>
                            @endif
                        </div>
                    @endif

                    <!-- User Stats -->
                    @if($project->user->projects && $project->user->projects->count() > 1)
                        <div class="border-t border-gray-200 pt-4 mt-4">
                            <div class="text-center">
                                <p class="text-2xl font-bold text-orange-600">{{ $project->user->projects->count() }}</p>
                                <p class="text-sm text-gray-600">Ολοκληρωμένα Έργα</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function changeImage(url) {
        document.getElementById('mainImage').src = url;
    }
</script>
@endsection
