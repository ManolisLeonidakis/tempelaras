@extends('layouts.app')

@section('title', $user->name . ' - ' . ($user->idikotita ?? 'Επαγγελματίας') . ' | Vres Mastora')
@section('description', 'Επικοινωνήστε με τον ' . $user->name . ', ' . ($user->idikotita ?? 'επαγγελματία') . ' στην περιοχή ' . ($user->city ?? 'Ελλάδα') . '. Δείτε τις υπηρεσίες, τα έργα και τις κριτικές του.')
@section('keywords', 'επαγγελματίας, ' . ($user->idikotita ?? '') . ', ' . ($user->city ?? '') . ', υπηρεσίες, έργα, κριτικές, επικοινωνία')
@section('robots', 'index, follow, max-snippet:-1, max-image-preview:large')
@section('og_type', 'profile')
@section('og_title', $user->name . ' - ' . ($user->idikotita ?? 'Επαγγελματίας'))
@section('og_description', 'Επικοινωνήστε με τον ' . $user->name . ' για τις εργασίες σας. ' . ($user->idikotita ?? 'Επαγγελματίας') . ' με εμπειρία στην περιοχή ' . ($user->city ?? 'Ελλάδα'))

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Profile Header -->
    <section class="bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-800 text-white py-16 profile-header">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row items-center lg:items-start space-y-8 lg:space-y-0 lg:space-x-12">
                <!-- Profile Image -->
                <div class="relative">
                    <div class="w-48 h-48 rounded-full overflow-hidden border-4 border-white shadow-2xl">
                        @if($user->image)
                            <img
                                class="w-full h-full object-cover"
                                src="{{ asset('storage/' . $user->image->url) }}"
                                alt="{{ $user->name }}"
                            >
                        @else
                            <div class="w-full h-full bg-gray-300 flex items-center justify-center">
                                <svg class="w-24 h-24 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                        @endif
                    </div>
                    <!-- Verified Badge -->
                    <div class="absolute -bottom-2 -right-2 w-12 h-12 bg-green-500 rounded-full flex items-center justify-center border-4 border-white">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>

                <!-- Profile Info -->
                <div class="flex-1 text-center lg:text-left">
                    <h1 class="text-4xl lg:text-5xl font-bold mb-4">{{ $user->name }}</h1>

                    @if($user->idikotita)
                        <div class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-full text-lg font-semibold mb-4">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m8 0V8a2 2 0 01-2 2H8a2 2 0 01-2-2V6m8 0H8m0 0V4"></path>
                            </svg>
                            {{ $user->idikotita }}
                        </div>
                    @endif

                    <!-- Rating -->
                    {{-- <div class="flex items-center justify-center lg:justify-start mb-6">
                        <div class="flex text-yellow-400 text-2xl mr-3">
                            ★★★★☆
                        </div>
                        <span class="text-xl font-semibold text-white">4.8</span>
                        <span class="text-blue-200 ml-2">(127 κριτικές)</span>
                    </div> --}}

                    <!-- Location -->
                    @if($user->user_address)
                        <div class="flex items-center justify-center lg:justify-start text-blue-100 mb-6">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span class="text-lg">
                                {{ $user->user_address['street'] ? $user->user_address['street'] . ', ' : '' }}
                                {{ $user->city ?? '' }}
                                {{ $user->user_address['postal_code'] ? ', ' . $user->user_address['postal_code'] : '' }}
                            </span>
                        </div>
                    @endif

                    <!-- Contact Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        @if ($user->phone)
                            <a href="tel:{{ $user->phone }}"
                                class="inline-flex items-center px-8 py-4 bg-white text-blue-600 font-semibold rounded-lg hover:bg-gray-100 transition-all duration-200 transform hover:scale-105 shadow-lg profile-contact-btn">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                Κλήση
                            </a>
                        @endif
                        @if ($user->mobile)
                            <a href="tel:{{ $user->mobile }}"
                                class="inline-flex items-center px-8 py-4 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition-all duration-200 transform hover:scale-105 shadow-lg profile-contact-btn">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                </svg>
                                Κινητό
                            </a>
                        @endif
                        @if (!$user->phone && !$user->mobile)
                            <!-- Contact Form Modal Trigger -->
                            <button type="button"
                                onclick="openContactModal()"
                                class="inline-flex items-center px-8 py-4 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-all duration-200 transform hover:scale-105 shadow-lg profile-contact-btn">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                Επικοινωνία μέσω Email
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    {{-- <section class="py-12 bg-white border-b profile-stats">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="text-3xl font-bold text-blue-600 mb-2 profile-stat-number">127</div>
                    <div class="text-gray-600">Ολοκληρωμένες Εργασίες</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-green-600 mb-2 profile-stat-number">5</div>
                    <div class="text-gray-600">Χρόνια Εμπειρίας</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-purple-600 mb-2 profile-stat-number">98%</div>
                    <div class="text-gray-600">Ικανοποίηση Πελατών</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-yellow-600 mb-2 profile-stat-number">4.8</div>
                    <div class="text-gray-600">Μέση Βαθμολογία</div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-12 profile-content">
                <!-- About Section -->
                <div class="bg-white rounded-2xl shadow-lg p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                        <svg class="w-6 h-6 mr-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Σχετικά με τον {{ $user->name }}
                    </h2>

                    @if($user->description)
                        <p class="text-gray-700 leading-relaxed text-lg mb-6">{{ $user->description }}</p>
                    @else
                        <p class="text-gray-500 italic">Δεν υπάρχει διαθέσιμη περιγραφή αυτή τη στιγμή.</p>
                    @endif

                    <!-- Skills -->
                    @if($user->abilities && $user->abilities->count() > 0)
                        <div class="mt-8">
                            <h3 class="text-xl font-semibold text-gray-900 mb-4">Δεξιότητες & Εξειδικεύσεις</h3>
                            <div class="flex flex-wrap gap-3">
                                @foreach($user->abilities as $ability)
                                    <span class="inline-flex items-center px-4 py-2 bg-blue-100 text-blue-800 rounded-full text-sm font-medium skill-badge">
                                        {{ $ability->name }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Services Section -->
                @if($user->services && $user->services->count() > 0)
                    <div class="bg-white rounded-2xl shadow-lg p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                            <svg class="w-6 h-6 mr-3 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                            Υπηρεσίες & Τιμές
                        </h2>

                        <div class="space-y-3">
                            @foreach($user->services as $service)
                                <div class="bg-white rounded-lg border border-gray-200 hover:shadow-md transition-all duration-200 p-4">
                                    <div class="flex items-center justify-between">
                                        <div class="flex-1">
                                            <div class="flex items-center space-x-4">
                                                <div class="flex-1">
                                                    <h3 class="text-base font-semibold text-gray-900">{{ $service->name }}</h3>
                                                    @if($service->description)
                                                        <p class="text-gray-600 text-sm mt-1">{{ Str::limit($service->description, 100) }}</p>
                                                    @endif
                                                </div>
                                                <div class="bg-emerald-50 rounded-lg px-3 py-2 border border-emerald-200">
                                                    <div class="text-sm font-semibold text-emerald-700">{{ $service->formatted_rate }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Projects Section -->
                @if($user->projects && $user->projects->count() > 0)
                    <div class="bg-white rounded-2xl shadow-lg p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                            <svg class="w-6 h-6 mr-3 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                            Ολοκληρωμένα Έργα ({{ $user->projects->count() }})
                        </h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @foreach($user->projects as $project)
                                <a href="{{ route('projects.show', $project) }}" class="bg-gray-50 rounded-xl p-6 border border-gray-200 hover:shadow-md hover:border-green-500 transition-all duration-200 project-card block">
                                    <div class="flex items-start space-x-4">
                                        @if($project->images && $project->images->count() > 0)
                                            <div class="w-20 h-20 rounded-lg overflow-hidden flex-shrink-0">
                                                <img
                                                    class="w-full h-full object-cover"
                                                    src="{{ asset('storage/' . $project->images->first()->url) }}"
                                                    alt="{{ $project->title }}"
                                                >
                                            </div>
                                        @else
                                            <div class="w-20 h-20 bg-gray-200 rounded-lg flex items-center justify-center flex-shrink-0">
                                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                                </svg>
                                            </div>
                                        @endif

                                        <div class="flex-1 min-w-0">
                                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $project->title }}</h3>
                                            @if($project->description)
                                                <p class="text-gray-600 text-sm line-clamp-3">{{ Str::limit($project->description, 120) }}</p>
                                            @endif
                                            <div class="mt-3 flex items-center justify-between">
                                                <div class="flex items-center text-sm text-gray-500">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                    </svg>
                                                    {{ $project->created_at->format('M Y') }}
                                                </div>
                                                <span class="text-green-600 text-sm font-medium">Δείτε περισσότερα →</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Reviews Section -->
                {{-- <div class="bg-white rounded-2xl shadow-lg p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                        <svg class="w-6 h-6 mr-3 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                        </svg>
                        Κριτικές Πελατών (127)
                    </h2>

                    <div class="space-y-6">
                        <!-- Sample Reviews -->
                        <div class="border-b border-gray-200 pb-6 last:border-b-0 review-card">
                            <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                                    <span class="text-blue-600 font-semibold">Μ.Κ.</span>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center justify-between mb-2">
                                        <div class="flex items-center">
                                            <div class="flex text-yellow-400 mr-2">
                                                ★★★★★
                                            </div>
                                            <span class="font-semibold text-gray-900">Μαρία Κωνσταντίνου</span>
                                        </div>
                                        <span class="text-sm text-gray-500">πριν 2 εβδομάδες</span>
                                    </div>
                                    <p class="text-gray-700">"Εξαιρετική δουλειά! Ο {{ $user->name }} έκανε όλες τις ηλεκτρολογικές εργασίες στο σπίτι μου με επαγγελματισμό και ταχύτητα. Σίγουρα θα τον ξαναχρησιμοποιήσω."</p>
                                </div>
                            </div>
                        </div>

                        <div class="border-b border-gray-200 pb-6 last:border-b-0 review-card">
                            <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                                    <span class="text-green-600 font-semibold">Γ.Π.</span>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center justify-between mb-2">
                                        <div class="flex items-center">
                                            <div class="flex text-yellow-400 mr-2">
                                                ★★★★★
                                            </div>
                                            <span class="font-semibold text-gray-900">Γιώργος Παπαδόπουλος</span>
                                        </div>
                                        <span class="text-sm text-gray-500">πριν 1 μήνα</span>
                                    </div>
                                    <p class="text-gray-700">"Πολύ ικανοποιημένος με την υπηρεσία. Η επικοινωνία ήταν άριστη και η τιμή λογική. Συνιστώ ανεπιφύλακτα!"</p>
                                </div>
                            </div>
                        </div>

                        <div class="border-b border-gray-200 pb-6 last:border-b-0 review-card">
                            <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0">
                                    <span class="text-purple-600 font-semibold">Ε.Μ.</span>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center justify-between mb-2">
                                        <div class="flex items-center">
                                            <div class="flex text-yellow-400 mr-2">
                                                ★★★★☆
                                            </div>
                                            <span class="font-semibold text-gray-900">Ελένη Μιχαηλίδου</span>
                                        </div>
                                        <span class="text-sm text-gray-500">πριν 2 μήνες</span>
                                    </div>
                                    <p class="text-gray-700">"Καλή δουλειά γενικά. Μικρή καθυστέρηση στην παράδοση αλλά το αποτέλεσμα ήταν καλό."</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>

            <!-- Sidebar -->
            <div class="space-y-8 profile-sidebar">
                <!-- Quick Info Card -->
                <div class="bg-white rounded-2xl shadow-lg p-6 sticky top-8 quick-info-card z-20">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Γρήγορες Πληροφορίες</h3>

                    <div class="space-y-4">
                        <div class="flex items-center justify-between py-2 border-b border-gray-100">
                            <span class="text-gray-600">Ειδικότητα</span>
                            <span class="font-medium text-gray-900">{{ $user->idikotita ?? 'N/A' }}</span>
                        </div>

                        <div class="flex items-center justify-between py-2 border-b border-gray-100">
                            <span class="text-gray-600">Πόλη</span>
                            <span class="font-medium text-gray-900">{{ $user->user_address['city'] ?? $user->city ?? 'N/A' }}</span>
                        </div>

                        <div class="flex items-center justify-between py-2 border-b border-gray-100">
                            <span class="text-gray-600">Υπηρεσίες</span>
                            <span class="font-medium text-gray-900">
                                @if($user->services && $user->services->count() > 0)
                                    {{ $user->services->count() }} υπηρεσι{{ $user->services->count() === 1 ? 'α' : 'ες' }}
                                @else
                                    Δεν έχουν οριστεί
                                @endif
                            </span>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="mt-6 space-y-3">
                        <a href="tel:{{ $user->phone ?? $user->mobile }}"
                            class="w-full inline-flex items-center justify-center px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors duration-200">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            Επικοινωνία
                        </a>

                        @if (!$user->phone && !$user->mobile)
                            <!-- Contact Form Modal Trigger -->
                            <button type="button"
                                onclick="openContactModal()"
                                class="w-full inline-flex items-center justify-center px-8 py-4 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-all duration-200 transform hover:scale-105 shadow-lg profile-contact-btn">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                Επικοινωνία μέσω Email
                            </button>
                        @endif

                        <!-- Wishlist Button -->
                        <div class="mt-6 flex justify-center w-full">
                            <button
                                type="button"
                                id="wishlist-btn"
                                data-user-id="{{ $user->id }}"
                                data-route="{{ route('wishlist.toggle', $user) }}"
                                data-csrf="{{ csrf_token() }}"
                                class="w-full inline-flex items-center justify-center px-6 py-3 rounded-lg font-semibold transition-all duration-200 transform hover:scale-105 shadow-lg wishlist-btn {{ in_array($user->id, session('wishlist', [])) ? 'bg-red-500 hover:bg-red-600 text-white' : 'bg-gray-100 hover:bg-gray-200 text-gray-700' }}"
                            >
                                <svg class="w-5 h-5 mr-2 {{ in_array($user->id, session('wishlist', [])) ? 'text-white' : 'text-red-500' }}" fill="{{ in_array($user->id, session('wishlist', [])) ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                                <span id="wishlist-text">
                                    {{ in_array($user->id, session('wishlist', [])) ? 'Αφαίρεση από Αγαπημένα' : 'Προσθήκη στα Αγαπημένα' }}
                                </span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Similar Workers -->
                {{-- <div class="bg-white rounded-2xl shadow-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Παρόμοιοι Επαγγελματίες</h3>

                    <div class="space-y-4">
                        <!-- Sample similar workers -->
                        <div class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-50 transition-colors duration-200 cursor-pointer similar-worker">
                            <div class="w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center">
                                <span class="text-gray-600 font-semibold">Ν.Π.</span>
                            </div>
                            <div class="flex-1">
                                <div class="font-medium text-gray-900">Νίκος Παπαδόπουλος</div>
                                <div class="text-sm text-gray-600">Ηλεκτρολόγος</div>
                                <div class="flex text-yellow-400 text-sm">
                                    ★★★★☆
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-50 transition-colors duration-200 cursor-pointer">
                            <div class="w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center">
                                <span class="text-gray-600 font-semibold">Δ.Μ.</span>
                            </div>
                            <div class="flex-1">
                                <div class="font-medium text-gray-900">Δημήτρης Μιχαηλίδης</div>
                                <div class="text-sm text-gray-600">Υδραυλικός</div>
                                <div class="flex text-yellow-400 text-sm">
                                    ★★★★★
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>

<!-- Contact Modal -->
<div id="contactModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-900">Επικοινωνία με {{ $user->name }}</h3>
                <button onclick="closeContactModal()" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <form method="POST" action="{{ route('contact.professional', $user) }}" class="space-y-4">
                @csrf
                <div>
                    <label for="contact_name" class="block text-sm font-medium text-gray-700 mb-1">Όνομα *</label>
                    <input type="text" id="contact_name" name="name" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="contact_email" class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
                    <input type="email" id="contact_email" name="email" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="contact_phone" class="block text-sm font-medium text-gray-700 mb-1">Τηλέφωνο</label>
                    <input type="tel" id="contact_phone" name="phone"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('phone')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="contact_message" class="block text-sm font-medium text-gray-700 mb-1">Μήνυμα *</label>
                    <textarea id="contact_message" name="message" rows="4" required
                              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                              placeholder="Περιγράψτε την εργασία που χρειάζεστε..."></textarea>
                    @error('message')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end space-x-3 pt-4">
                    <button type="button" onclick="closeContactModal()"
                            class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition-colors">
                        Ακύρωση
                    </button>
                    <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
                        Αποστολή Μηνύματος
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    @vite(['resources/js/worker.js'])

    <script>
        function openContactModal() {
            document.getElementById('contactModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeContactModal() {
            document.getElementById('contactModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Close modal when clicking outside
        document.getElementById('contactModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeContactModal();
            }
        });

        // Close modal on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !document.getElementById('contactModal').classList.contains('hidden')) {
                closeContactModal();
            }
        });
    </script>
@endpush
