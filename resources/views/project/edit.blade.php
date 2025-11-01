@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50">
    <!-- Header -->
    <div class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Προσθήκη Έργου</h1>
                    <p class="text-gray-600 mt-1">Προσθέστε ένα νέο έργο στο χαρτοφυλάκιό σας</p>
                </div>
                <a href="{{ route('profile.edit') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg transition-colors duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Επιστροφή στο Προφίλ
                </a>
            </div>
        </div>
    </div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <form method="post" action="{{ route('projects.store') }}" enctype="multipart/form-data" class="space-y-8">
            @csrf

            <!-- Project Information -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden transform hover:shadow-2xl transition-shadow duration-300">
                <div class="bg-gradient-to-r from-green-600 to-teal-600 px-6 py-4">
                    <h2 class="text-xl font-semibold text-white flex items-center">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                        Πληροφορίες Έργου
                    </h2>
                </div>
                <div class="p-6 space-y-6">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Τίτλος Έργου *</label>
                        <input type="text" id="title" name="title" value="{{ old('title') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 @error('title') border-red-500 @enderror"
                               placeholder="π.χ. Ανακαίνιση Κουζίνας"
                               required>
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Περιγραφή Έργου *</label>
                        <textarea id="description" name="description" rows="6"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 resize-none @error('description') border-red-500 @enderror"
                                  placeholder="Περιγράψτε το έργο, τις εργασίες που εκτελέστηκαν, τα υλικά που χρησιμοποιήθηκαν..."
                                  required>{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Project Images -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden transform hover:shadow-2xl transition-shadow duration-300">
                <div class="bg-gradient-to-r from-purple-600 to-pink-600 px-6 py-4">
                    <h2 class="text-xl font-semibold text-white flex items-center">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        Φωτογραφίες Έργου
                    </h2>
                </div>
                <div class="p-6">
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center hover:border-purple-500 transition-colors duration-200">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                        </svg>
                        <label for="images" class="mt-4 block cursor-pointer">
                            <span class="mt-2 block text-sm font-medium text-gray-900">
                                Ανεβάστε φωτογραφίες του έργου
                            </span>
                            <span class="mt-1 block text-sm text-gray-500">
                                PNG, JPG, GIF έως 5MB (πολλαπλές φωτογραφίες)
                            </span>
                        </label>
                        <input type="file" id="images" name="images[]" accept="image/*" multiple
                               class="hidden"
                               onchange="previewImages(event)">
                    </div>

                    <!-- Image Preview Area -->
                    <div id="image-preview" class="mt-6 grid grid-cols-2 md:grid-cols-3 gap-4 hidden">
                        <!-- Previews will be inserted here by JavaScript -->
                    </div>

                    @error('images')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    @error('images.*')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Submit Button -->
            <div class="bg-white rounded-2xl shadow-xl p-6">
                <div class="flex items-center justify-between">
                    <div class="text-sm text-gray-600">
                        * Υποχρεωτικά πεδία
                    </div>
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('profile.edit') }}"
                           class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg transition-colors duration-200 font-medium">
                            Ακύρωση
                        </a>
                        <button type="submit"
                                class="px-8 py-3 bg-gradient-to-r from-green-600 to-teal-600 hover:from-green-700 hover:to-teal-700 text-white rounded-lg transition-all duration-200 font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                            <span class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                Προσθήκη Έργου
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
function previewImages(event) {
    const preview = document.getElementById('image-preview');
    preview.innerHTML = '';
    preview.classList.remove('hidden');

    const files = event.target.files;

    for (let i = 0; i < files.length; i++) {
        const file = files[i];
        const reader = new FileReader();

        reader.onload = function(e) {
            const div = document.createElement('div');
            div.className = 'relative group';
            div.innerHTML = `
                <img src="${e.target.result}"
                     alt="Preview ${i + 1}"
                     class="w-full h-32 object-cover rounded-lg border-2 border-gray-200">
                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-all duration-200 rounded-lg flex items-center justify-center">
                    <svg class="w-8 h-8 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                </div>
            `;
            preview.appendChild(div);
        };

        reader.readAsDataURL(file);
    }
}
</script>

<style>
/* Focus animations */
input:focus, select:focus, textarea:focus {
    transform: scale(1.01);
    box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
}
</style>
@endsection
