@extends('layouts.app')

@section('description', 'Συνδέστε με έμπειρους επαγγελματίες σε όλη την Ελλάδα. Βρείτε υδραυλικούς, ηλεκτρολόγους, ψυκτικούς και άλλους ειδικευμένους τεχνίτες για τις εργασίες σας. Δωρεάν αναζήτηση και άμεση επικοινωνία.')
@section('keywords', 'επαγγελματίες, υδραυλικοί, ηλεκτρολόγοι, τεχνίτες, Ελλάδα, υπηρεσίες, εργασίες, σπίτι, επισκευές, κατασκευές')
@section('og_type', 'website')

@section('content')
<div class="min-h-screen">
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-800 text-white overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 bg-black bg-opacity-20">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 lg:py-32">
            <div class="text-center hero-content">
                <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-6 leading-tight">
                    Βρείτε τον <span class="text-yellow-400">Ιδανικό</span><br>
                    Επαγγελματία για το Σπίτι Σας
                </h1>
                <p class="text-xl md:text-2xl text-blue-100 mb-12 max-w-3xl mx-auto leading-relaxed">
                    Συνδέστε με έμπειρους επαγγελματίες σε όλη την Ελλάδα.
                    Από υδραυλικούς μέχρι ηλεκτρολόγους - όλα σε ένα μέρος.
                </p>

                <!-- Search Form -->
                <div class="max-w-4xl mx-auto mb-12">
                    <form method="get" action="{{ route('find') }}" class="bg-white rounded-2xl shadow-2xl p-8 transform hover:scale-105 transition-transform duration-300">
                        <div class="grid md:grid-cols-3 gap-6">
                            <div class="relative">
                                <label for="idikotita" class="block text-sm font-medium text-gray-700 mb-2">Ειδικότητα</label>
                                <select name="idikotita" id="idikotita"
                                    class="w-full px-4 py-3 pr-10 bg-gray-50 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 text-gray-900">
                                    <option value="">Όλες οι ειδικότητες</option>
                                    @foreach (config('services.idikothtes') as $idikotita)
                                        <option value="{{ $idikotita }}">{{ $idikotita }}</option>
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
                                        <option value="{{ $city }}">{{ $city }}</option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none mt-6">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </div>

                            <div class="flex items-end">
                                <button type="submit"
                                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl">
                                    <span class="flex items-center justify-center">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                        </svg>
                                        Αναζήτηση
                                    </span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Stats -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 max-w-4xl mx-auto hero-stats">
                    <div class="text-center">
                        <div class="text-3xl md:text-4xl font-bold text-yellow-400 mb-2">500+</div>
                        <div class="text-blue-100">Επαγγελματίες</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl md:text-4xl font-bold text-yellow-400 mb-2">10K+</div>
                        <div class="text-blue-100">Ολοκληρωμένες Εργασίες</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl md:text-4xl font-bold text-yellow-400 mb-2">4.8★</div>
                        <div class="text-blue-100">Μέση Βαθμολογία</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl md:text-4xl font-bold text-yellow-400 mb-2">24/7</div>
                        <div class="text-blue-100">Υποστήριξη</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Wave Separator -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 120" class="w-full h-auto">
                <path fill="#ffffff" d="M0,64L48,69.3C96,75,192,85,288,80C384,75,480,53,576,48C672,43,768,53,864,64C960,75,1056,85,1152,80C1248,75,1344,53,1392,42.7L1440,32L1440,120L1392,120C1344,120,1248,120,1152,120C1056,120,960,120,864,120C768,120,672,120,576,120C480,120,384,120,288,120C192,120,96,120,48,120L0,120Z"></path>
            </svg>
        </div>
    </section>

    <!-- Service Categories -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Επαγγελματικές Υπηρεσίες
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Βρείτε τον κατάλληλο επαγγελματία για κάθε εργασία στο σπίτι σας
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @php
                    $services = [
                        ['name' => 'Υδραυλικός', 'icon' => '🔧', 'color' => 'bg-blue-500'],
                        ['name' => 'Ηλεκτρολόγος', 'icon' => '⚡', 'color' => 'bg-yellow-500'],
                        ['name' => 'Μηχανικός', 'icon' => '🏗️', 'color' => 'bg-gray-600'],
                        ['name' => 'Ξυλουργός', 'icon' => '🪚', 'color' => 'bg-amber-600'],
                        ['name' => 'Κηπουρός', 'icon' => '🌱', 'color' => 'bg-green-500'],
                        ['name' => 'Ελαιοχρωματιστής', 'icon' => '🎨', 'color' => 'bg-purple-500'],
                        ['name' => 'Γυψοσανιδάς', 'icon' => '🏠', 'color' => 'bg-indigo-500'],
                        ['name' => 'Μονωτής', 'icon' => '🛡️', 'color' => 'bg-red-500'],
                        ['name' => 'Σιδεράς', 'icon' => '🔨', 'color' => 'bg-orange-500'],
                        ['name' => 'Τεχνικός Θέρμανσης', 'icon' => '🔥', 'color' => 'bg-red-600'],
                        ['name' => 'Τεχνικός Κλιματισμού', 'icon' => '❄️', 'color' => 'bg-cyan-500'],
                        ['name' => 'Τεχνικός Αποφράξεων', 'icon' => '🚰', 'color' => 'bg-blue-600'],
                    ];
                @endphp

                @foreach($services as $service)
                <div class="group bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100 service-card">
                    <a href="{{ route('find', ['idikotita' => $service['name']]) }}" class="block p-6 text-center">
                        <div class="w-16 h-16 {{ $service['color'] }} rounded-full flex items-center justify-center mx-auto mb-4 text-2xl group-hover:scale-110 transition-transform duration-300">
                            {{ $service['icon'] }}
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 group-hover:text-blue-600 transition-colors duration-300">
                            {{ $service['name'] }}
                        </h3>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Πώς Λειτουργεί
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Απλή διαδικασία σε 3 βήματα για να βρείτε τον ιδανικό επαγγελματία
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center group step-card">
                    <div class="w-20 h-20 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-6 text-white text-2xl font-bold group-hover:bg-blue-700 transition-colors duration-300">
                        1
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Αναζήτηση</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Επιλέξτε την ειδικότητα και την περιοχή σας. Χρησιμοποιήστε τα φίλτρα για να βρείτε τους καταλληλότερους επαγγελματίες.
                    </p>
                </div>

                <div class="text-center group step-card">
                    <div class="w-20 h-20 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-6 text-white text-2xl font-bold group-hover:bg-blue-700 transition-colors duration-300">
                        2
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Σύγκριση</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Δείτε τα προφίλ των επαγγελματιών, τις κριτικές τους, και τις τιμές τους. Επικοινωνήστε μαζί τους για περισσότερες πληροφορίες.
                    </p>
                </div>

                <div class="text-center group step-card">
                    <div class="w-20 h-20 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-6 text-white text-2xl font-bold group-hover:bg-blue-700 transition-colors duration-300">
                        3
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Συνεργασία</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Επιλέξτε τον επαγγελματία που ταιριάζει καλύτερα στις ανάγκες σας και ξεκινήστε την εργασία με ασφάλεια και εμπιστοσύνη.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Γιατί να μας Επιλέξετε
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Η πλατφόρμα μας προσφέρει μοναδικά πλεονεκτήματα για πελάτες και επαγγελματίες
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 p-8 rounded-xl border border-blue-100 group hover:shadow-lg transition-all duration-300 benefit-card">
                    <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center mb-6 text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0114 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Επαληθευμένοι Επαγγελματίες</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Όλοι οι επαγγελματίες στην πλατφόρμα μας είναι πλήρως ελεγμένοι και πιστοποιημένοι.
                    </p>
                </div>

                <div class="bg-gradient-to-br from-green-50 to-emerald-50 p-8 rounded-xl border border-green-100 group hover:shadow-lg transition-all duration-300">
                    <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center mb-6 text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Γρήγορη Εξυπηρέτηση</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Βρείτε τον κατάλληλο επαγγελματία μέσα σε λίγα λεπτά και ξεκινήστε την εργασία άμεσα.
                    </p>
                </div>

                <div class="bg-gradient-to-br from-purple-50 to-pink-50 p-8 rounded-xl border border-purple-100 group hover:shadow-lg transition-all duration-300">
                    <div class="w-12 h-12 bg-purple-600 rounded-lg flex items-center justify-center mb-6 text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Εγγυημένη Ποιότητα</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Με εκατοντάδες θετικές κριτικές και υψηλές βαθμολογίες, εγγυόμαστε ποιοτική εργασία.
                    </p>
                </div>

                <div class="bg-gradient-to-br from-yellow-50 to-orange-50 p-8 rounded-xl border border-yellow-100 group hover:shadow-lg transition-all duration-300">
                    <div class="w-12 h-12 bg-yellow-600 rounded-lg flex items-center justify-center mb-6 text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Διαφανείς Τιμές</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Ξεκάθαρες τιμές χωρίς κρυφές χρεώσεις. Συγκρίνετε και επιλέξτε με βάση τον προϋπολογισμό σας.
                    </p>
                </div>

                <div class="bg-gradient-to-br from-red-50 to-rose-50 p-8 rounded-xl border border-red-100 group hover:shadow-lg transition-all duration-300">
                    <div class="w-12 h-12 bg-red-600 rounded-lg flex items-center justify-center mb-6 text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">24/7 Υποστήριξη</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Η ομάδα υποστήριξής μας είναι διαθέσιμη όλο το 24ωρο για οποιαδήποτε απορία ή πρόβλημα.
                    </p>
                </div>

                <div class="bg-gradient-to-br from-indigo-50 to-blue-50 p-8 rounded-xl border border-indigo-100 group hover:shadow-lg transition-all duration-300">
                    <div class="w-12 h-12 bg-indigo-600 rounded-lg flex items-center justify-center mb-6 text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Ασφαλής Πλατφόρμα</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Προστατεύουμε τα δεδομένα σας με προηγμένη κρυπτογράφηση και ασφαλείς συναλλαγές.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    {{-- <section class="py-20 bg-gradient-to-br from-gray-900 to-gray-800 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">
                    Τι Λένε οι Πελάτες Μας
                </h2>
                <p class="text-xl text-gray-300 max-w-2xl mx-auto">
                    Διαβάστε τις εμπειρίες πραγματικών πελατών που βρήκαν τους ιδανικούς επαγγελματίες
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-8 border border-white border-opacity-20 testimonial-card">
                    <div class="flex items-center mb-4">
                        <div class="flex text-yellow-400">
                            ★★★★★
                        </div>
                    </div>
                    <p class="text-gray-200 mb-6 leading-relaxed">
                        "Βρήκα εξαιρετικό υδραυλικό μέσα σε λίγα λεπτά. Η εργασία ολοκληρώθηκε άψογα και σε πολύ καλύτερη τιμή από ότι περίμενα."
                    </p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold mr-4">
                            Μ.Κ.
                        </div>
                        <div>
                            <div class="font-semibold">Μαρία Κωνσταντίνου</div>
                            <div class="text-gray-400 text-sm">Αθήνα</div>
                        </div>
                    </div>
                </div>

                <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-8 border border-white border-opacity-20 testimonial-card">
                    <div class="flex items-center mb-4">
                        <div class="flex text-yellow-400">
                            ★★★★★
                        </div>
                    </div>
                    <p class="text-gray-200 mb-6 leading-relaxed">
                        "Ο ηλεκτρολόγος που βρήκα ήταν επαγγελματίας και πολύ αξιόπιστος. Θα τον ξαναχρησιμοποιήσω σίγουρα."
                    </p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center text-white font-bold mr-4">
                            Γ.Π.
                        </div>
                        <div>
                            <div class="font-semibold">Γιώργος Παπαδόπουλος</div>
                            <div class="text-gray-400 text-sm">Θεσσαλονίκη</div>
                        </div>
                    </div>
                </div>

                <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-xl p-8 border border-white border-opacity-20 testimonial-card">
                    <div class="flex items-center mb-4">
                        <div class="flex text-yellow-400">
                            ★★★★★
                        </div>
                    </div>
                    <p class="text-gray-200 mb-6 leading-relaxed">
                        "Τέλεια εμπειρία! Ο κηπουρός έκανε καταπληκτική δουλειά στον κήπο μου. Η πλατφόρμα είναι πολύ εύκολη στη χρήση."
                    </p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-purple-600 rounded-full flex items-center justify-center text-white font-bold mr-4">
                            Ε.Μ.
                        </div>
                        <div>
                            <div class="font-semibold">Ελένη Μιχαηλίδου</div>
                            <div class="text-gray-400 text-sm">Πάτρα</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Final CTA -->
    <section class="py-20 bg-gradient-to-r from-blue-600 to-indigo-700 text-white cta-section">
        <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">
                Έτοιμοι να Ξεκινήσετε;
            </h2>
            <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">
                Μην περιμένετε άλλο! Βρείτε τον κατάλληλο επαγγελματία για τις εργασίες του σπιτιού σας σήμερα.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('find') }}"
                    class="inline-flex items-center px-8 py-4 bg-white text-blue-600 font-semibold rounded-lg hover:bg-gray-100 transition-colors duration-200 transform hover:scale-105 shadow-lg btn-primary">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    Αναζήτηση Επαγγελματιών
                </a>

                @guest
                <a href="{{ route('register') }}"
                    class="inline-flex items-center px-8 py-4 bg-yellow-500 text-gray-900 font-semibold rounded-lg hover:bg-yellow-400 transition-colors duration-200 transform hover:scale-105 shadow-lg btn-primary">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                    </svg>
                    Εγγραφή ως Επαγγελματίας
                </a>
                @endguest
            </div>
        </div>
    </section>
</div>
@endsection
