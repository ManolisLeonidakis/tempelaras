@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-green-600 to-emerald-600 px-6 py-4">
                <h1 class="text-2xl font-bold text-white flex items-center">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Νέα Υπηρεσία
                </h1>
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('services.store') }}" class="p-6">
                @csrf

                <div class="space-y-6">
                    <!-- Service Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                            Όνομα Υπηρεσίας <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 @error('name') border-red-500 @enderror"
                               placeholder="π.χ. Ταπετσαρίες, Βαψίματα τοίχων, Εγκατάσταση πλακιδίων">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                            Περιγραφή
                        </label>
                        <textarea id="description" name="description" rows="4"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 @error('description') border-red-500 @enderror"
                                  placeholder="Περιγράψτε λεπτομερώς την υπηρεσία σας...">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Rate Type -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-3">Τύπος Τιμολόγησης</label>
                        <div class="space-y-3">
                            <div class="flex items-center">
                                <input type="radio" id="none" name="rate_type" value="none"
                                       {{ old('rate_type', 'none') === 'none' ? 'checked' : '' }}
                                       class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300">
                                <label for="none" class="ml-3 block text-sm font-medium text-gray-700">
                                    Να μην εμφανίζετε τιμή
                                </label>
                            </div>

                            <div class="flex items-center">
                                <input type="radio" id="fixed" name="rate_type" value="fixed"
                                       {{ old('rate_type') === 'fixed' ? 'checked' : '' }}
                                       class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300">
                                <label for="fixed" class="ml-3 block text-sm font-medium text-gray-700">
                                    Σταθερή Τιμή
                                    <span class="block text-sm text-gray-500">Προσδιορίστε μια σταθερή τιμή για την υπηρεσία</span>
                                </label>
                            </div>

                            <div class="flex items-center">
                                <input type="radio" id="per_hour" name="rate_type" value="per_hour"
                                       {{ old('rate_type') === 'per_hour' ? 'checked' : '' }}
                                       class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300">
                                <label for="per_hour" class="ml-3 block text-sm font-medium text-gray-700">
                                    Ανά Ώρα
                                    <span class="block text-sm text-gray-500">Προσδιορίστε το κόστος ανά ώρα εργασίας</span>
                                </label>
                            </div>

                            <div class="flex items-center">
                                <input type="radio" id="per_square_meter" name="rate_type" value="per_square_meter"
                                       {{ old('rate_type') === 'per_square_meter' ? 'checked' : '' }}
                                       class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300">
                                <label for="per_square_meter" class="ml-3 block text-sm font-medium text-gray-700">
                                    Ανά Τετραγωνικό Μέτρο
                                    <span class="block text-sm text-gray-500">Προσδιορίστε το κόστος ανά τ.μ.</span>
                                </label>
                            </div>
                        </div>
                        @error('rate_type')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Rate Amount -->
                    <div id="rate_amount_section">
                        <label for="rate_amount" class="block text-sm font-medium text-gray-700 mb-2">
                            Ποσό <span class="text-red-500">*</span>
                        </label>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div class="relative">
                                <input type="number" id="rate_amount" name="rate_amount"
                                       value="{{ old('rate_amount') }}"
                                       step="0.01" min="0"
                                       class="w-full pl-4 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 @error('rate_amount') border-red-500 @enderror"
                                       placeholder="0.00">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">€</span>
                                </div>
                            </div>

                            <select id="rate_currency" name="rate_currency"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 @error('rate_currency') border-red-500 @enderror">
                                <option value="EUR" {{ old('rate_currency', 'EUR') === 'EUR' ? 'selected' : '' }}>Ευρώ (€)</option>
                                <option value="USD" {{ old('rate_currency', 'EUR') === 'USD' ? 'selected' : '' }}>Δολάριο ($)</option>
                            </select>
                        </div>
                        @error('rate_amount')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        @error('rate_currency')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror

                        <!-- Preview -->
                        <div class="mt-4 bg-green-50 border border-green-200 rounded-lg p-4">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div>
                                    <div class="text-sm font-medium text-green-800">Προεπισκόπηση τιμής</div>
                                    <div id="rate_preview" class="text-sm text-green-700">Προσδιορίστε ποσό</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
                        <a href="{{ route('services.index') }}"
                           class="px-6 py-3 bg-gray-100 text-gray-700 font-medium rounded-lg hover:bg-gray-200 transition-colors duration-200">
                            Ακύρωση
                        </a>
                        <button type="submit"
                                class="px-6 py-3 bg-green-600 text-white font-medium rounded-lg hover:bg-green-700 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            Δημιουργία Υπηρεσίας
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const rateTypeRadios = document.querySelectorAll('input[name="rate_type"]');
    const rateAmountSection = document.getElementById('rate_amount_section');
    const rateAmountInput = document.getElementById('rate_amount');
    const rateCurrencySelect = document.getElementById('rate_currency');
    const ratePreview = document.getElementById('rate_preview');

    function updateRateSection() {
        const selectedRateType = document.querySelector('input[name="rate_type"]:checked').value;

        if (selectedRateType === 'none') {
            rateAmountSection.style.display = 'none';
            rateAmountInput.required = false;
            rateAmountInput.value = '';
        } else if (selectedRateType === 'fixed' || selectedRateType === 'per_hour' || selectedRateType === 'per_square_meter') {
            rateAmountSection.style.display = 'block';
            rateAmountInput.required = true;
        }

        updateRatePreview();
    }

    function updateRatePreview() {
        const selectedRateType = document.querySelector('input[name="rate_type"]:checked').value;
        const amount = parseFloat(rateAmountInput.value) || 0;
        const currency = rateCurrencySelect.value;

        let previewText = '';

        if (selectedRateType === 'none') {
            previewText = 'Επικοινωνήστε για πληροφορίες';
        } else if (amount > 0) {
            const unit = selectedRateType === 'per_hour' ? 'ανά ώρα' :
                        selectedRateType === 'per_square_meter' ? 'ανά τ.μ.' : '';
            previewText = `${amount.toFixed(2)} € ${unit}`.trim();
        } else {
            previewText = 'Προσδιορίστε ποσό';
        }

        ratePreview.textContent = previewText;
    }

    // Add event listeners
    rateTypeRadios.forEach(radio => {
        radio.addEventListener('change', updateRateSection);
    });

    rateAmountInput.addEventListener('input', updateRatePreview);
    rateCurrencySelect.addEventListener('change', updateRatePreview);

    // Initialize on page load
    updateRateSection();
});
</script>
@endsection
