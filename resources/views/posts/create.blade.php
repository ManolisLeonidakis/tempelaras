@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Δημιουργία Νέου Άρθρου</h1>
            <p class="text-gray-600">Μοιραστείτε τις γνώσεις και τις εμπειρίες σας με την κοινότητα</p>
        </div>

        <!-- Form -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="p-8">
                @csrf

                <!-- Title -->
                <div class="mb-6">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                        Τίτλος Άρθρου <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="text"
                        id="title"
                        name="title"
                        value="{{ old('title') }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors @error('title') border-red-500 @enderror"
                        placeholder="Γράψτε έναν ελκυστικό τίτλο..."
                        required
                    >
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div class="mb-6">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                        Περιγραφή <span class="text-red-500">*</span>
                        <span class="text-gray-500 text-xs">(μέγιστο 500 χαρακτήρες)</span>
                    </label>
                    <textarea
                        id="description"
                        name="description"
                        rows="3"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors @error('description') border-red-500 @enderror"
                        placeholder="Σύντομη περιγραφή του άρθρου σας..."
                        required
                    >{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Image Upload -->
                <div class="mb-6">
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                        Εικόνα Άρθρου
                        <span class="text-gray-500 text-xs">(προαιρετική - JPEG, PNG, JPG, GIF, SVG - μέγιστο 2MB)</span>
                    </label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-gray-400 transition-colors">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                    <span>Ανεβάστε εικόνα</span>
                                    <input id="image" name="image" type="file" accept="image/*" class="sr-only">
                                </label>
                                <p class="pl-1">ή σύρετε και αφήστε εδώ</p>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, GIF μέχρι 2MB</p>
                        </div>
                    </div>
                    @error('image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Body/Content -->
                <div class="mb-8">
                    <label for="body" class="block text-sm font-medium text-gray-700 mb-2">
                        Περιεχόμενο Άρθρου <span class="text-red-500">*</span>
                    </label>
                    <textarea
                        id="body"
                        name="body"
                        rows="15"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors @error('body') border-red-500 @enderror"
                        placeholder="Γράψτε το άρθρο σας εδώ... Μπορείτε να χρησιμοποιήσετε Markdown ή απλό κείμενο."
                        required
                    >{{ old('body') }}</textarea>
                    @error('body')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                    <a
                        href="{{ route('posts.index') }}"
                        class="inline-flex items-center px-6 py-3 border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors"
                    >
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Ακύρωση
                    </a>

                    <div class="flex space-x-3">
                        <button
                            type="button"
                            onclick="saveDraft()"
                            class="inline-flex items-center px-6 py-3 border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors"
                        >
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                            Αποθήκευση ως Πρόχειρο
                        </button>

                        <button
                            type="submit"
                            class="inline-flex items-center px-8 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors"
                        >
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                            Δημοσίευση Άρθρου
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Tips -->
        <div class="mt-8 bg-blue-50 border border-blue-200 rounded-lg p-6">
            <h3 class="text-lg font-semibold text-blue-900 mb-3">💡 Συμβουλές για Επιτυχημένα Άρθρα</h3>
            <ul class="text-blue-800 space-y-2 text-sm">
                <li>• Χρησιμοποιήστε έναν ελκυστικό τίτλο που περιγράφει το περιεχόμενο</li>
                <li>• Γράψτε μια σύντομη αλλά περιεκτική περιγραφή</li>
                <li>• Προσθέστε μια εικόνα για να κάνετε το άρθρο πιο ελκυστικό</li>
                <li>• Χρησιμοποιήστε επικεφαλίδες και παραγράφους για καλύτερη ανάγνωση</li>
                <li>• Μοιραστείτε τις προσωπικές σας εμπειρίες και γνώσεις</li>
            </ul>
        </div>
    </div>
</div>

<script>
function saveDraft() {
    // Save current content as draft in localStorage
    const formData = new FormData(document.querySelector('form'));
    const draft = {
        title: formData.get('title'),
        description: formData.get('description'),
        body: formData.get('body'),
        savedAt: new Date().toISOString()
    };

    localStorage.setItem('post_draft', JSON.stringify(draft));

    // Show success message
    showNotification('Το πρόχειρο αποθηκεύτηκε!', 'success');
}

function showNotification(message, type = 'success') {
    const notification = document.createElement('div');
    notification.className = `fixed top-4 right-4 z-50 px-6 py-3 rounded-lg font-semibold shadow-lg transform transition-all duration-300 translate-x-full ${
        type === 'success' ? 'bg-green-500 text-white' : 'bg-red-500 text-white'
    }`;
    notification.textContent = message;

    document.body.appendChild(notification);

    setTimeout(() => {
        notification.classList.remove('translate-x-full');
    }, 100);

    setTimeout(() => {
        notification.classList.add('translate-x-full');
        setTimeout(() => {
            document.body.removeChild(notification);
        }, 300);
    }, 3000);
}

// Load draft on page load
document.addEventListener('DOMContentLoaded', function() {
    const draft = localStorage.getItem('post_draft');
    if (draft) {
        const data = JSON.parse(draft);
        document.getElementById('title').value = data.title || '';
        document.getElementById('description').value = data.description || '';
        document.getElementById('body').value = data.body || '';

        showNotification('Φορτώθηκε το αποθηκευμένο πρόχειρο', 'success');
    }
});
</script>
@endsection
