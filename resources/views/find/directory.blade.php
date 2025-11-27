@extends('layouts.app')

@section('title', 'Αναζήτηση Επαγγελματιών ανά Ειδικότητα και Πόλη')
@section('description', 'Δείτε όλους τους διαθέσιμους συνδυασμούς ειδικοτήτων και πόλεων για να βρείτε τον κατάλληλο επαγγελματία.')

@section('content')
<div class="min-h-screen bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">
                Αναζήτηση Επαγγελματιών
            </h1>
            <p class="text-xl text-gray-600">
                Επιλέξτε ειδικότητα και πόλη για να βρείτε τον κατάλληλο επαγγελματία
            </p>
        </div>

        @php
            $specialties = \App\Helpers\GreekSlugHelper::getSpecialties();
            $cities = \App\Helpers\GreekSlugHelper::getCities();
        @endphp

        <!-- Specialties Section -->
        <div class="bg-white rounded-lg shadow-md p-8 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Αναζήτηση ανά Ειδικότητα</h2>
            <div class="grid md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach($specialties as $slug => $specialty)
                    <a href="{{ route('find.specialty', ['specialty' => $slug]) }}"
                       class="block p-4 bg-blue-50 hover:bg-blue-100 rounded-lg transition-colors duration-200 text-center">
                        <span class="text-blue-700 font-medium">{{ $specialty }}</span>
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Popular Combinations Section -->
        <div class="bg-white rounded-lg shadow-md p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Δημοφιλείς Συνδυασμοί</h2>

            @foreach(['Υδραυλικός', 'Ηλεκτρολόγος', 'Τεχνικός Κλιματισμού'] as $specialty)
                @php
                    $specialtySlug = \App\Helpers\GreekSlugHelper::toSlug($specialty);
                @endphp

                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">{{ $specialty }}</h3>
                    <div class="grid md:grid-cols-3 lg:grid-cols-5 gap-3">
                        @foreach($cities as $citySlug => $city)
                            <a href="{{ route('find.specialty.city', ['specialty' => $specialtySlug, 'city' => $citySlug]) }}"
                               class="block p-3 bg-gray-50 hover:bg-gray-100 rounded-md transition-colors duration-200 text-sm text-center">
                                <span class="text-gray-700">{{ $city }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endforeach

            <div class="mt-8 p-4 bg-blue-50 rounded-lg">
                <p class="text-sm text-blue-800">
                    <strong>Tip:</strong> Μπορείτε να συνδυάσετε οποιαδήποτε ειδικότητα με οποιαδήποτε πόλη χρησιμοποιώντας
                    το URL pattern: <code class="bg-blue-100 px-2 py-1 rounded">/vrikes-mastora/{ειδικότητα}/{πόλη}</code>
                </p>
            </div>
        </div>

        <!-- SEO Info Box -->
        <div class="mt-8 bg-gradient-to-r from-green-50 to-blue-50 rounded-lg shadow-md p-8">
            <h3 class="text-xl font-bold text-gray-900 mb-4">🔍 SEO-Optimized URLs</h3>
            <p class="text-gray-700 mb-4">
                Κάθε σελίδα αναζήτησης έχει ένα μοναδικό, SEO-friendly URL που βοηθά στην ευρεσιμότητά της από τις μηχανές αναζήτησης.
            </p>
            <div class="grid md:grid-cols-2 gap-4 text-sm">
                <div class="bg-white p-4 rounded-lg">
                    <p class="font-semibold text-gray-900 mb-2">Παραδείγματα:</p>
                    <ul class="space-y-2 text-gray-600">
                        <li>• /vrikes-mastora/ydraulikos</li>
                        <li>• /vrikes-mastora/ydraulikos/larisa</li>
                        <li>• /vrikes-mastora/ilektrologos/athina</li>
                    </ul>
                </div>
                <div class="bg-white p-4 rounded-lg">
                    <p class="font-semibold text-gray-900 mb-2">Πλεονεκτήματα:</p>
                    <ul class="space-y-2 text-gray-600">
                        <li>✓ Καλύτερη κατάταξη στη Google</li>
                        <li>✓ Πιο φιλικά URLs</li>
                        <li>✓ Αυτόματο sitemap generation</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
