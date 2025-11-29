@extends('layouts.app')

@section('title', 'Σχετικά με Εμάς - Fixado')
@section('description', 'Μάθετε περισσότερα για την πλατφόρμα Fixado. Η αποστολή μας είναι να συνδέουμε πελάτες με τους καλύτερους επαγγελματίες σε όλη την Ελλάδα.')
@section('keywords', 'Fixado, σχετικά, αποστολή, ομάδα, πλατφόρμα, επαγγελματίες, πελάτες, Ελλάδα')
@section('robots', 'index, follow, max-snippet:-1, max-image-preview:large')
@section('og_type', 'about')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50">
    <!-- Hero -->
    <section class="relative overflow-hidden">
        <div class="absolute inset-0 pointer-events-none" aria-hidden="true"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 leading-tight">
                        Σχετικά με εμάς
                    </h1>
                    <p class="mt-6 text-lg text-gray-600 leading-relaxed">
                        Το Fixado φέρνει κοντά επαγγελματίες και πελάτες με τον πιο απλό και αξιόπιστο τρόπο.
                        Στόχος μας είναι να κάνουμε την εύρεση του κατάλληλου επαγγελματία γρήγορη, διαφανή και ευχάριστη,
                        με έμφαση στην ποιότητα, την ασφάλεια και την εμπιστοσύνη.
                    </p>
                    <div class="mt-8 flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('find') }}" class="inline-flex items-center px-6 py-3 rounded-lg bg-blue-600 text-white font-semibold hover:bg-blue-700 transition-colors shadow">
                            Βρες Επαγγελματία
                        </a>
                        <a href="{{ route('home') }}" class="inline-flex items-center px-6 py-3 rounded-lg bg-white text-gray-800 font-semibold border border-gray-200 hover:bg-gray-50 transition-colors shadow">
                            Επιστροφή στην αρχική
                        </a>
                    </div>
                </div>
                <div class="relative">
                    <div class="bg-white rounded-3xl shadow-2xl p-8 lg:p-10 border border-gray-100">
                        <div class="grid sm:grid-cols-2 gap-6">
                            <div class="p-5 rounded-xl bg-gradient-to-br from-blue-50 to-indigo-50 border border-blue-100">
                                <div class="w-10 h-10 rounded-lg bg-blue-600 text-white flex items-center justify-center mb-3">✓</div>
                                <h3 class="font-semibold text-gray-900">Αξιόπιστοι επαγγελματίες</h3>
                                <p class="mt-2 text-sm text-gray-600">Δομημένα προφίλ, έργα και δεξιότητες για διαφάνεια.</p>
                            </div>
                            <div class="p-5 rounded-xl bg-gradient-to-br from-yellow-50 to-amber-50 border border-yellow-100">
                                <div class="w-10 h-10 rounded-lg bg-yellow-500 text-gray-900 flex items-center justify-center mb-3">★</div>
                                <h3 class="font-semibold text-gray-900">Έμπνευση & έργα</h3>
                                <p class="mt-2 text-sm text-gray-600">Δες πραγματικά έργα για να εμπνευστείς και να αξιολογήσεις.</p>
                            </div>
                            <div class="p-5 rounded-xl bg-gradient-to-br from-emerald-50 to-teal-50 border border-emerald-100">
                                <div class="w-10 h-10 rounded-lg bg-emerald-600 text-white flex items-center justify-center mb-3">↔</div>
                                <h3 class="font-semibold text-gray-900">Άμεση επικοινωνία</h3>
                                <p class="mt-2 text-sm text-gray-600">Γρήγορη σύνδεση με τους κατάλληλους επαγγελματίες.</p>
                            </div>
                            <div class="p-5 rounded-xl bg-gradient-to-br from-purple-50 to-fuchsia-50 border border-purple-100">
                                <div class="w-10 h-10 rounded-lg bg-purple-600 text-white flex items-center justify-center mb-3">🔒</div>
                                <h3 class="font-semibold text-gray-900">Ασφάλεια & ιδιωτικότητα</h3>
                                <p class="mt-2 text-sm text-gray-600">Σεβασμός στα δεδομένα και ασφαλείς ροές.</p>
                            </div>
                        </div>

                        <div class="mt-8 grid grid-cols-2 sm:grid-cols-4 gap-6 text-center">
                            <div>
                                <div class="text-3xl font-extrabold text-gray-900">10k+</div>
                                <div class="text-xs text-gray-500">Επισκέπτες/μήνα</div>
                            </div>
                            <div>
                                <div class="text-3xl font-extrabold text-gray-900">2k+</div>
                                <div class="text-xs text-gray-500">Επαγγελματίες</div>
                            </div>
                            <div>
                                <div class="text-3xl font-extrabold text-gray-900">5k+</div>
                                <div class="text-xs text-gray-500">Επικοινωνίες</div>
                            </div>
                            <div>
                                <div class="text-3xl font-extrabold text-gray-900">4.8/5</div>
                                <div class="text-xs text-gray-500">Ικανοποίηση</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-3xl shadow-xl p-8 md:p-12 border border-gray-100">
                <div class="grid lg:grid-cols-3 gap-10 items-start">
                    <div class="lg:col-span-1">
                        <h2 class="text-2xl font-bold text-gray-900">Η αποστολή μας</h2>
                        <p class="mt-3 text-gray-600">Να κάνουμε εύκολη και αξιόπιστη την επιλογή επαγγελματιών.</p>
                    </div>
                    <div class="lg:col-span-2 grid sm:grid-cols-2 gap-6">
                        <div class="p-6 rounded-xl bg-gray-50 border border-gray-100">
                            <h3 class="font-semibold text-gray-900">Ποιότητα</h3>
                            <p class="mt-2 text-sm text-gray-600">Δίνουμε έμφαση στην ποιότητα προφίλ και έργων.</p>
                        </div>
                        <div class="p-6 rounded-xl bg-gray-50 border border-gray-100">
                            <h3 class="font-semibold text-gray-900">Ταχύτητα</h3>
                            <p class="mt-2 text-sm text-gray-600">Γρήγορες αναζητήσεις και άμεσες επαφές.</p>
                        </div>
                        <div class="p-6 rounded-xl bg-gray-50 border border-gray-100">
                            <h3 class="font-semibold text-gray-900">Εμπιστοσύνη</h3>
                            <p class="mt-2 text-sm text-gray-600">Διαφάνεια στις πληροφορίες και τα στοιχεία.</p>
                        </div>
                        <div class="p-6 rounded-xl bg-gray-50 border border-gray-100">
                            <h3 class="font-semibold text-gray-900">Κοινότητα</h3>
                            <p class="mt-2 text-sm text-gray-600">Χτίζουμε ένα οικοσύστημα που ωφελεί όλους.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-3xl p-10 text-white shadow-2xl">
                <h3 class="text-2xl md:text-3xl font-bold">Έτοιμοι να ξεκινήσετε;</h3>
                <p class="mt-3 text-blue-100">Δείτε επαγγελματίες στον χώρο σας και επικοινωνήστε άμεσα.</p>
                <div class="mt-6">
                    <a href="{{ route('find') }}" class="inline-flex items-center px-6 py-3 bg-white text-blue-700 font-semibold rounded-lg hover:bg-blue-50 transition-colors">
                        Αναζήτηση επαγγελματία
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

