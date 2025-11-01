@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <section class="bg-gradient-to-br from-yellow-500 via-orange-500 to-red-600 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl lg:text-5xl font-bold mb-4">Ολοκληρωμένα Έργα</h1>
                <p class="text-xl text-white/90">Δείτε τα έργα που έχουν ολοκληρώσει οι επαγγελματίες μας</p>
            </div>
        </div>
    </section>

    <!-- Projects Grid -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($projects->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($projects as $project)
                        <a href="{{ route('projects.show', $project) }}"
                           class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                            <!-- Project Image -->
                            @if($project->images && $project->images->count() > 0)
                                <div class="h-64 overflow-hidden bg-gray-200">
                                    <img
                                        class="w-full h-full object-cover"
                                        src="{{ Storage::url($project->images->first()->url) }}"
                                        alt="{{ $project->title }}"
                                    >
                                </div>
                            @else
                                <div class="h-64 bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center">
                                    <svg class="w-24 h-24 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                    </svg>
                                </div>
                            @endif

                            <!-- Project Info -->
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-gray-900 mb-2 line-clamp-2">{{ $project->title }}</h3>
                                <p class="text-gray-600 mb-4 line-clamp-3">{{ Str::limit($project->description, 120) }}</p>

                                <!-- User Info -->
                                <div class="flex items-center justify-between border-t border-gray-200 pt-4">
                                    <div class="flex items-center space-x-3">
                                        @if($project->user->image)
                                            <img
                                                class="w-10 h-10 rounded-full object-cover"
                                                src="{{ Storage::url($project->user->image->url) }}"
                                                alt="{{ $project->user->name }}"
                                            >
                                        @else
                                            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                                <span class="text-blue-600 font-semibold text-sm">
                                                    {{ substr($project->user->name, 0, 1) }}
                                                </span>
                                            </div>
                                        @endif
                                        <div>
                                            <p class="text-sm font-semibold text-gray-900">{{ $project->user->name }}</p>
                                            @if($project->user->idikotita)
                                                <p class="text-xs text-gray-500">{{ $project->user->idikotita }}</p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="text-right">
                                        <p class="text-xs text-gray-500">{{ $project->created_at->diffForHumans() }}</p>
                                        @if($project->images->count() > 1)
                                            <p class="text-xs text-blue-600 font-medium">+{{ $project->images->count() - 1 }} φωτογραφίες</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-12">
                    {{ $projects->links() }}
                </div>
            @else
                <div class="text-center py-16">
                    <svg class="mx-auto h-24 w-24 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                    <h3 class="mt-4 text-xl font-medium text-gray-900">Δεν υπάρχουν έργα ακόμα</h3>
                    <p class="mt-2 text-gray-500">Τα έργα θα εμφανιστούν εδώ όταν προστεθούν από τους επαγγελματίες.</p>
                </div>
            @endif
        </div>
    </section>
</div>
@endsection
