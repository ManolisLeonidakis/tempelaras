@props(['position' => 'bottom'])

@php
    $consent = session('cookie_consent', null);
    $showBanner = !$consent;
@endphp

@if($showBanner)
<div
    id="cookie-banner"
    class="fixed {{ $position === 'top' ? 'top-0' : 'bottom-0' }} left-0 right-0 z-50 bg-white border-t border-gray-200 shadow-lg transform transition-transform duration-300"
    x-data="cookieBanner()"
    x-show="show"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="transform translate-y-full"
    x-transition:enter-end="transform translate-y-0"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="transform translate-y-0"
    x-transition:leave-end="transform translate-y-full"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between space-y-4 md:space-y-0">
            <!-- Cookie Message -->
            <div class="flex-1 pr-4">
                <div class="flex items-start space-x-3">
                    <div class="flex-shrink-0">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-lg font-semibold text-gray-900 mb-1">
                            Χρησιμοποιούμε Cookies
                        </h3>
                        <p class="text-sm text-gray-600 leading-relaxed">
                            Χρησιμοποιούμε μόνο τα απαραίτητα cookies για τη λειτουργία της ιστοσελίδας μας και τη βελτίωση της εμπειρίας σας. Δεν χρησιμοποιούμε cookies marketing ή παρακολούθησης.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Cookie Options -->
            <div class="flex flex-col sm:flex-row items-stretch sm:items-center space-y-2 sm:space-y-0 sm:space-x-3">
                <!-- Necessary Cookies Info -->
                <div class="text-xs text-gray-500 bg-gray-50 px-3 py-2 rounded-lg">
                    <div class="font-medium text-gray-700 mb-1">Απαραίτητα Cookies</div>
                    <div>Ενεργοποιημένα - Αυτά είναι απαραίτητα για τη λειτουργία της ιστοσελίδας</div>
                </div>

                <!-- Accept Button -->
                <button
                    @click="acceptAll()"
                    class="inline-flex items-center px-6 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200"
                >
                    Αποδοχή
                </button>

                <!-- Reject Button -->
                <button
                    @click="rejectAll()"
                    class="inline-flex items-center px-6 py-2 bg-gray-200 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors duration-200"
                >
                    Απόρριψη
                </button>

                <!-- Settings Button -->
                <button
                    @click="showSettings = !showSettings"
                    class="inline-flex items-center px-4 py-2 text-gray-600 text-sm font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors duration-200"
                >
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    Ρυθμίσεις
                </button>
            </div>
        </div>

        <!-- Detailed Settings (Collapsible) -->
        <div
            x-show="showSettings"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 max-h-0"
            x-transition:enter-end="opacity-100 max-h-96"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 max-h-96"
            x-transition:leave-end="opacity-0 max-h-0"
            class="mt-4 pt-4 border-t border-gray-200 overflow-hidden"
        >
            <div class="space-y-4">
                <h4 class="text-sm font-semibold text-gray-900">Τύποι Cookies</h4>

                <!-- Necessary Cookies -->
                <div class="flex items-start space-x-3">
                    <div class="flex-shrink-0 mt-0.5">
                        <input
                            type="checkbox"
                            checked
                            disabled
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500"
                        >
                    </div>
                    <div class="flex-1">
                        <h5 class="text-sm font-medium text-gray-900">Απαραίτητα Cookies</h5>
                        <p class="text-xs text-gray-600 mt-1">
                            Αυτά τα cookies είναι απαραίτητα για τη λειτουργία της ιστοσελίδας και δεν μπορούν να απενεργοποιηθούν. Περιλαμβάνουν cookies για τη διατήρηση της σύνδεσής σας και την ασφάλεια.
                        </p>
                    </div>
                </div>

                <!-- Analytics Cookies (Disabled) -->
                <div class="flex items-start space-x-3 opacity-50">
                    <div class="flex-shrink-0 mt-0.5">
                        <input
                            type="checkbox"
                            disabled
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500"
                        >
                    </div>
                    <div class="flex-1">
                        <h5 class="text-sm font-medium text-gray-900">Analytics Cookies</h5>
                        <p class="text-xs text-gray-600 mt-1">
                            Αυτά τα cookies μας βοηθούν να κατανοήσουμε πώς χρησιμοποιείτε την ιστοσελίδα μας. (Μη διαθέσιμο)
                        </p>
                    </div>
                </div>

                <!-- Marketing Cookies (Disabled) -->
                <div class="flex items-start space-x-3 opacity-50">
                    <div class="flex-shrink-0 mt-0.5">
                        <input
                            type="checkbox"
                            disabled
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500"
                        >
                    </div>
                    <div class="flex-1">
                        <h5 class="text-sm font-medium text-gray-900">Marketing Cookies</h5>
                        <p class="text-xs text-gray-600 mt-1">
                            Αυτά τα cookies χρησιμοποιούνται για την προβολή σχετικών διαφημίσεων. (Μη διαθέσιμο)
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function cookieBanner() {
    return {
        show: true,
        showSettings: false,

        acceptAll() {
            this.setConsent('accepted');
            this.show = false;
        },

        rejectAll() {
            this.setConsent('rejected');
            this.show = false;
        },

        setConsent(status) {
            // Send consent to server
            fetch('/cookie-consent', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}',
                    'Accept': 'application/json',
                },
                body: JSON.stringify({
                    consent: status,
                    necessary: true,
                    analytics: false,
                    marketing: false
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Store in localStorage as backup
                    localStorage.setItem('cookie_consent', status);
                    localStorage.setItem('cookie_consent_date', new Date().toISOString());

                    // Dispatch custom event
                    window.dispatchEvent(new CustomEvent('cookieConsentChanged', {
                        detail: { consent: status }
                    }));
                }
            })
            .catch(error => {
                console.error('Error saving cookie consent:', error);
                // Still hide banner even if request fails
                localStorage.setItem('cookie_consent', status);
            });
        }
    }
}
</script>
@endif
