@extends('layouts.app')

@section('title', 'Όροι Χρήσης - Vres Mastora')
@section('description', 'Διαβάστε τους όρους χρήσης της πλατφόρμας Vres Mastora. Μάθετε για τα δικαιώματα και τις υποχρεώσεις σας κατά τη χρήση των υπηρεσιών μας.')
@section('keywords', 'όροι χρήσης, νομικοί όροι, δικαιώματα, υποχρεώσεις, Vres Mastora, πολιτική')
@section('robots', 'index, follow, max-snippet:-1, max-image-preview:large')
@section('og_type', 'article')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50">
    <!-- Header -->
    <section class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900">Όροι Χρήσης</h1>
                    <p class="mt-2 text-gray-600">Τελευταία ενημέρωση: {{ now()->format('d/m/Y') }}</p>
                </div>
                <a href="{{ route('home') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg transition-colors">
                    Αρχική
                </a>
            </div>
        </div>
    </section>

    <!-- Content -->
    <section class="py-12">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                <div class="p-8 md:p-12 space-y-10 leading-relaxed text-gray-700">
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">1. Αποδοχή Όρων</h2>
                        <p class="mt-2">Με την πρόσβαση ή/και χρήση της πλατφόρμας Fixado, αποδέχεστε πλήρως τους παρόντες όρους χρήσης. Αν δεν συμφωνείτε, παρακαλούμε μην χρησιμοποιείτε την υπηρεσία.</p>
                    </div>

                    <div>
                        <h2 class="text-xl font-bold text-gray-900">2. Περιγραφή Υπηρεσίας</h2>
                        <p class="mt-2">Η πλατφόρμα επιτρέπει σε χρήστες να αναζητούν και να επικοινωνούν με επαγγελματίες. Δεν είμαστε μέρος καμίας συμφωνίας μεταξύ χρηστών και επαγγελματιών και δεν παρέχουμε εγγυήσεις για την απόδοση ή την ποιότητα των υπηρεσιών τους.</p>
                    </div>

                    <div>
                        <h2 class="text-xl font-bold text-gray-900">3. Λογαριασμοί Χρηστών</h2>
                        <ul class="mt-2 list-disc list-inside space-y-1">
                            <li>Ο χρήστης ευθύνεται για την ακρίβεια των στοιχείων του.</li>
                            <li>Ο χρήστης οφείλει να προστατεύει τα στοιχεία σύνδεσης.</li>
                            <li>Διατηρούμε το δικαίωμα αναστολής/διαγραφής λογαριασμών σε περίπτωση παραβίασης όρων.</li>
                        </ul>
                    </div>

                    <div>
                        <h2 class="text-xl font-bold text-gray-900">4. Περιεχόμενο Χρηστών</h2>
                        <p class="mt-2">Το περιεχόμενο που ανεβάζετε (π.χ. κείμενα, εικόνες, έργα) πρέπει να είναι δικό σας ή να έχετε δικαίωμα χρήσης. Απαγορεύεται παράνομο, παραπλανητικό ή προσβλητικό περιεχόμενο.</p>
                    </div>

                    <div>
                        <h2 class="text-xl font-bold text-gray-900">5. Απαγορευμένες Χρήσεις</h2>
                        <ul class="mt-2 list-disc list-inside space-y-1">
                            <li>Απόπειρα παραβίασης της ασφάλειας του συστήματος.</li>
                            <li>Ανεπιθύμητη εμπορική επικοινωνία (spam).</li>
                            <li>Παραβίαση δικαιωμάτων πνευματικής ιδιοκτησίας τρίτων.</li>
                        </ul>
                    </div>

                    <div>
                        <h2 class="text-xl font-bold text-gray-900">6. Περιορισμός Ευθύνης</h2>
                        <p class="mt-2">Η πλατφόρμα παρέχεται «ως έχει». Δεν φέρουμε ευθύνη για τυχόν ζημίες που προκύπτουν από τη χρήση της, στο μέγιστο επιτρεπτό από το νόμο βαθμό.</p>
                    </div>

                    <div>
                        <h2 class="text-xl font-bold text-gray-900">7. Τροποποιήσεις</h2>
                        <p class="mt-2">Οι όροι ενδέχεται να ενημερώνονται ανά διαστήματα. Η συνέχιση χρήσης της πλατφόρμας μετά από αλλαγές συνεπάγεται αποδοχή των νέων όρων.</p>
                    </div>

                    <div>
                        <h2 class="text-xl font-bold text-gray-900">8. Επικοινωνία</h2>
                        <p class="mt-2">Για ερωτήσεις σχετικά με τους όρους, επικοινωνήστε μαζί μας στην ηλεκτρονική διεύθυνση υποστήριξης που αναφέρεται στην ιστοσελίδα.</p>
                    </div>
                </div>
            </div>

            <div class="mt-8 text-center">
                <a href="{{ route('about') }}" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors shadow">
                    Μάθετε περισσότερα για εμάς
                </a>
            </div>
        </div>
    </section>
</div>
@endsection

