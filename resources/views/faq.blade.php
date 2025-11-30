@extends('layouts.app')

@section('title', 'Συχνές Ερωτήσεις - Fixado')
@section('description', 'Βρείτε απαντήσεις στις πιο συχνές ερωτήσεις για την πλατφόρμα Fixado. Μάθετε πώς να εγγραφείτε ως επαγγελματίας, να βρείτε τεχνίτες και να χρησιμοποιήσετε τις υπηρεσίες μας.')
@section('keywords', 'FAQ, συχνές ερωτήσεις, βοήθεια, υποστήριξη, επαγγελματίες, τεχνίτες, εγγραφή, υπηρεσίες')
@section('robots', 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1')
@section('og_type', 'article')

@push('head')
@php
    $faqMainEntity = [
        [
            '@type' => 'Question',
            'name' => 'Τι είναι η πλατφόρμα Fixado;',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Το Fixado είναι μια διαδικτυακή πλατφόρμα που συνδέει πελάτες με επαγγελματίες τεχνίτες σε όλη την Ελλάδα. Μπορείτε να βρείτε υδραυλικούς, ηλεκτρολόγους, και άλλους ειδικευμένους επαγγελματίες για τις εργασίες σας.'
            ]
        ],
        [
            '@type' => 'Question',
            'name' => 'Πώς μπορώ να βρω έναν επαγγελματία;',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Χρησιμοποιήστε την αναζήτηση μας επιλέγοντας την ειδικότητα που χρειάζεστε και την πόλη σας. Θα δείτε όλους τους διαθέσιμους επαγγελματίες με κριτικές και τιμές.'
            ]
        ],
        [
            '@type' => 'Question',
            'name' => 'Είναι δωρεάν η χρήση της πλατφόρμας;',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Ναι, η αναζήτηση και η επικοινωνία με επαγγελματίες είναι εντελώς δωρεάν για τους πελάτες. Οι επαγγελματίες πληρώνουν μόνο για premium χαρακτηριστικά.'
            ]
        ],
        [
            '@type' => 'Question',
            'name' => 'Πώς μπορώ να εγγραφώ ως επαγγελματίας;',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Κάντε κλικ στο κουμπί Εγγραφή και επιλέξτε Επαγγελματίας. Συμπληρώστε τα στοιχεία σας, την ειδικότητά σας και τις περιοχές που εξυπηρετείτε. Θα εξετάσουμε την αίτησή σας και θα σας ενημερώσουμε εντός 24 ωρών.'
            ]
        ],
        [
            '@type' => 'Question',
            'name' => 'Πώς λειτουργεί η βαθμολόγηση των επαγγελματιών;',
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => 'Οι πελάτες μπορούν να αφήσουν κριτικές και βαθμολογίες μετά την ολοκλήρωση μιας εργασίας. Οι βαθμολογίες βασίζονται σε κριτήρια όπως η ποιότητα εργασίας, η έγκαιρη παράδοση και η επικοινωνία.'
            ]
        ]
    ];

    $faqSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => $faqMainEntity
    ];
@endphp
<script type="application/ld+json">
{!! json_encode($faqSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endpush

@section('content')
<div class="min-h-screen">
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-800 text-white overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 bg-black bg-opacity-20">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 lg:py-32">
            <div class="text-center">
                <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-6 leading-tight">
                    Συχνές <span class="text-yellow-400">Ερωτήσεις</span>
                </h1>
                <p class="text-xl md:text-2xl text-blue-100 mb-12 max-w-3xl mx-auto leading-relaxed">
                    Βρείτε απαντήσεις στις πιο συχνές ερωτήσεις για την πλατφόρμα μας
                </p>
            </div>
        </div>

        <!-- Wave Separator -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 120" class="w-full h-auto">
                <path fill="#ffffff" d="M0,64L48,69.3C96,75,192,85,288,80C384,75,480,53,576,48C672,43,768,53,864,64C960,75,1056,85,1152,80C1248,75,1344,53,1392,42.7L1440,32L1440,120L1392,120C1344,120,1248,120,1152,120C1056,120,960,120,864,120C768,120,672,120,576,120C480,120,384,120,288,120C192,120,96,120,48,120L0,120Z"></path>
            </svg>
        </div>
    </section>

    <!-- FAQ Content -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="space-y-6">
                <!-- FAQ Item 1 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <button class="w-full px-8 py-6 text-left focus:outline-none focus:ring-2 focus:ring-blue-500 faq-toggle"
                            onclick="toggleFaq(this)">
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl font-semibold text-gray-900">
                                Τι είναι η πλατφόρμα "Fixado";
                            </h3>
                            <svg class="w-6 h-6 text-blue-600 transform transition-transform duration-200 faq-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </button>
                    <div class="px-8 pb-6 faq-content hidden">
                        <p class="text-gray-600 leading-relaxed">
                            Η πλατφόρμα "Fixado" είναι μια διαδικτυακή υπηρεσία που συνδέει πελάτες με έμπειρους επαγγελματίες σε όλη την Ελλάδα.
                            Μπορείτε να βρείτε και να επικοινωνήσετε με υδραυλικούς, ηλεκτρολόγους, ψυκτικούς, ξυλουργούς και άλλους επαγγελματίες για τις εργασίες σας.
                        </p>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <button class="w-full px-8 py-6 text-left focus:outline-none focus:ring-2 focus:ring-blue-500 faq-toggle"
                            onclick="toggleFaq(this)">
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl font-semibold text-gray-900">
                                Πώς μπορώ να εγγραφώ ως επαγγελματίας;
                            </h3>
                            <svg class="w-6 h-6 text-blue-600 transform transition-transform duration-200 faq-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </button>
                    <div class="px-8 pb-6 faq-content hidden">
                        <p class="text-gray-600 leading-relaxed mb-4">
                            Για να εγγραφείτε ως επαγγελματίας στην πλατφόρμα μας:
                        </p>
                        <ol class="list-decimal list-inside text-gray-600 leading-relaxed space-y-2">
                            <li>Κάντε κλικ στο κουμπί "Εγγραφή" και επιλέξτε "Ως Επαγγελματίας"</li>
                            <li>Συμπληρώστε τα στοιχεία σας και τα στοιχεία της επιχείρησής σας</li>
                            <li>Επιλέξτε την ειδικότητά σας και την περιοχή εξυπηρέτησης</li>
                            <li>Προσθέστε τις υπηρεσίες που προσφέρετε με τις αντίστοιχες τιμές</li>
                            <li>Ανεβάστε φωτογραφίες από τις εργασίες σας</li>
                            <li>Δημιουργήστε το προφίλ σας με πληροφορίες για την εμπειρία σας</li>
                        </ol>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <button class="w-full px-8 py-6 text-left focus:outline-none focus:ring-2 focus:ring-blue-500 faq-toggle"
                            onclick="toggleFaq(this)">
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl font-semibold text-gray-900">
                                Πώς μπορώ να βρω τον κατάλληλο επαγγελματία για την εργασία μου;
                            </h3>
                            <svg class="w-6 h-6 text-blue-600 transform transition-transform duration-200 faq-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </button>
                    <div class="px-8 pb-6 faq-content hidden">
                        <p class="text-gray-600 leading-relaxed mb-4">
                            Χρησιμοποιήστε το σύστημα αναζήτησης στην αρχική σελίδα:
                        </p>
                        <ul class="list-disc list-inside text-gray-600 leading-relaxed space-y-2">
                            <li>Επιλέξτε την ειδικότητα που χρειάζεστε (π.χ. υδραυλικός, ηλεκτρολόγος)</li>
                            <li>Επιλέξτε την πόλη ή περιοχή σας</li>
                            <li>Κάντε κλικ στο "Αναζήτηση" για να δείτε διαθέσιμους επαγγελματίες</li>
                            <li>Διαβάστε τα προφίλ των επαγγελματιών, τις κριτικές και τις τιμές τους</li>
                            <li>Επικοινωνήστε απευθείας με τους επαγγελματίες που σας ενδιαφέρουν</li>
                        </ul>
                    </div>
                </div>

                <!-- FAQ Item 4 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <button class="w-full px-8 py-6 text-left focus:outline-none focus:ring-2 focus:ring-blue-500 faq-toggle"
                            onclick="toggleFaq(this)">
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl font-semibold text-gray-900">
                                Είναι ασφαλής η πλατφόρμα για τις συναλλαγές μου;
                            </h3>
                            <svg class="w-6 h-6 text-blue-600 transform transition-transform duration-200 faq-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </button>
                    <div class="px-8 pb-6 faq-content hidden">
                        <p class="text-gray-600 leading-relaxed">
                            Ναι, η ασφάλεια είναι προτεραιότητά μας. Όλες οι επικοινωνίες γίνονται απευθείας μεταξύ πελατών και επαγγελματιών,
                            ενώ η πλατφόρμα μας παρέχει ένα ασφαλές περιβάλλον για την αναζήτηση και επικοινωνία. Συνιστούμε πάντα να ελέγχετε
                            τις κριτικές και τις συστάσεις πριν από οποιαδήποτε συναλλαγή, και να χρησιμοποιείτε ασφαλείς μεθόδους πληρωμής.
                        </p>
                    </div>
                </div>

                <!-- FAQ Item 5 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <button class="w-full px-8 py-6 text-left focus:outline-none focus:ring-2 focus:ring-blue-500 faq-toggle"
                            onclick="toggleFaq(this)">
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl font-semibold text-gray-900">
                                Πώς μπορώ να προσθέσω υπηρεσίες και τιμές στο προφίλ μου;
                            </h3>
                            <svg class="w-6 h-6 text-blue-600 transform transition-transform duration-200 faq-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </button>
                    <div class="px-8 pb-6 faq-content hidden">
                        <p class="text-gray-600 leading-relaxed mb-4">
                            Ως επαγγελματίας μπορείτε να διαχειρίζεστε τις υπηρεσίες σας από το προφίλ σας:
                        </p>
                        <ol class="list-decimal list-inside text-gray-600 leading-relaxed space-y-2">
                            <li>Συνδεθείτε στον λογαριασμό σας</li>
                            <li>Μεταβείτε στην ενότητα "Υπηρεσίες" στο προφίλ σας</li>
                            <li>Κάντε κλικ στο "Προσθήκη Υπηρεσίας"</li>
                            <li>Συμπληρώστε το όνομα της υπηρεσίας, την περιγραφή και την τιμή</li>
                            <li>Αποθηκεύστε τις αλλαγές</li>
                            <li>Οι υπηρεσίες σας θα εμφανίζονται στο δημόσιο προφίλ σας</li>
                        </ol>
                    </div>
                </div>

                <!-- FAQ Item 6 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <button class="w-full px-8 py-6 text-left focus:outline-none focus:ring-2 focus:ring-blue-500 faq-toggle"
                            onclick="toggleFaq(this)">
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl font-semibold text-gray-900">
                                Μπορώ να δω παραδείγματα εργασιών των επαγγελματιών;
                            </h3>
                            <svg class="w-6 h-6 text-blue-600 transform transition-transform duration-200 faq-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </button>
                    <div class="px-8 pb-6 faq-content hidden">
                        <p class="text-gray-600 leading-relaxed">
                            Ναι! Κάθε επαγγελματίας μπορεί να ανεβάσει φωτογραφίες από τις εργασίες του στο προφίλ του.
                            Επιπλέον, πολλοί επαγγελματίες δημιουργούν άρθρα και αναρτήσεις στο blog της πλατφόρμας
                            όπου παρουσιάζουν τις εργασίες τους και τις εμπειρίες τους. Μπορείτε να δείτε όλα αυτά
                            στο προφίλ κάθε επαγγελματία ή στην ενότητα blog της πλατφόρμας.
                        </p>
                    </div>
                </div>

                <!-- FAQ Item 7 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <button class="w-full px-8 py-6 text-left focus:outline-none focus:ring-2 focus:ring-blue-500 faq-toggle"
                            onclick="toggleFaq(this)">
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl font-semibold text-gray-900">
                                Υπάρχει κόστος για τη χρήση της πλατφόρμας;
                            </h3>
                            <svg class="w-6 h-6 text-blue-600 transform transition-transform duration-200 faq-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </button>
                    <div class="px-8 pb-6 faq-content hidden">
                        <p class="text-gray-600 leading-relaxed">
                            Η πλατφόρμα είναι δωρεάν για τους πελάτες. Οι επαγγελματίες μπορούν να χρησιμοποιήσουν
                            τη βασική έκδοση δωρεάν, ενώ υπάρχουν προαιρετικές αναβαθμίσεις για πρόσθετες λειτουργίες
                            όπως προωθημένη προβολή προφίλ, στατιστικά στοιχεία, και άλλα εργαλεία marketing.
                        </p>
                    </div>
                </div>

                <!-- FAQ Item 8 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <button class="w-full px-8 py-6 text-left focus:outline-none focus:ring-2 focus:ring-blue-500 faq-toggle"
                            onclick="toggleFaq(this)">
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl font-semibold text-gray-900">
                                Πώς μπορώ να επικοινωνήσω με την υποστήριξη;
                            </h3>
                            <svg class="w-6 h-6 text-blue-600 transform transition-transform duration-200 faq-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </button>
                    <div class="px-8 pb-6 faq-content hidden">
                        <p class="text-gray-600 leading-relaxed">
                            Μπορείτε να επικοινωνήσετε μαζί μας μέσω email στο support@vresmastora.gr ή χρησιμοποιώντας
                            τη φόρμα επικοινωνίας στην ιστοσελίδα μας. Η ομάδα υποστήριξής μας είναι διαθέσιμη
                            για να σας βοηθήσει με οποιαδήποτε ερώτηση ή πρόβλημα.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Contact Section -->
            <div class="mt-16 text-center">
                <div class="bg-gradient-to-r from-blue-600 to-indigo-600 rounded-2xl p-8 text-white">
                    <h3 class="text-2xl font-bold mb-4">Δεν βρήκατε την απάντηση που ψάχνετε;</h3>
                    <p class="text-blue-100 mb-6">
                        Η ομάδα υποστήριξής μας είναι εδώ για να σας βοηθήσει
                    </p>
                    <a href="mailto:support@vresmastora.gr"
                       class="inline-flex items-center px-6 py-3 bg-white text-blue-600 font-semibold rounded-lg hover:bg-gray-50 transition-colors duration-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        Επικοινωνήστε Μαζί μας
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
function toggleFaq(button) {
    const content = button.nextElementSibling;
    const icon = button.querySelector('.faq-icon');

    if (content.classList.contains('hidden')) {
        content.classList.remove('hidden');
        content.classList.add('animate-fade-in');
        icon.classList.add('rotate-180');
    } else {
        content.classList.add('hidden');
        content.classList.remove('animate-fade-in');
        icon.classList.remove('rotate-180');
    }
}

// Add fade-in animation
const style = document.createElement('style');
style.textContent = `
    .animate-fade-in {
        animation: fadeIn 0.3s ease-in-out;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
`;
document.head.appendChild(style);
</script>
@endsection
