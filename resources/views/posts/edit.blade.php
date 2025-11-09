@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Επεξεργασία Άρθρου</h1>
            <p class="text-gray-600">Ενημερώστε το περιεχόμενο του άρθρου σας</p>
        </div>

        <!-- Form -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data" class="p-8">
                @csrf
                @method('PATCH')

                <!-- Title -->
                <div class="mb-6">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                        Τίτλος Άρθρου <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="text"
                        id="title"
                        name="title"
                        value="{{ old('title', $post->title) }}"
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
                    >{{ old('description', $post->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Current Image -->
                @if($post->image)
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Τρέχουσα Εικόνα
                    </label>
                    <div class="relative inline-block">
                        <img
                            src="{{ asset($post->image) }}"
                            alt="Current post image"
                            class="w-32 h-32 object-cover rounded-lg border border-gray-300"
                        >
                        <button
                            type="button"
                            onclick="removeCurrentImage()"
                            class="absolute -top-2 -right-2 w-6 h-6 bg-red-500 text-white rounded-full flex items-center justify-center text-xs hover:bg-red-600 transition-colors"
                            title="Αφαίρεση εικόνας"
                        >
                            ×
                        </button>
                    </div>
                    <input type="hidden" name="remove_image" id="remove_image" value="0">
                </div>
                @endif

                <!-- Image Upload -->
                <div class="mb-6">
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                        Νέα Εικόνα Άρθρου
                        <span class="text-gray-500 text-xs">(προαιρετική - JPEG, PNG, JPG, GIF, SVG - μέγιστο 2MB)</span>
                    </label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-gray-400 transition-colors">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                    <span>Ανεβάστε νέα εικόνα</span>
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
                    >{{ old('body', $post->body) }}</textarea>
                    @error('body')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                    <div class="flex space-x-3">
                        <a
                            href="{{ route('posts.show', $post) }}"
                            class="inline-flex items-center px-6 py-3 border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors"
                        >
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            Προβολή Άρθρου
                        </a>

                        <a
                            href="{{ route('posts.index') }}"
                            class="inline-flex items-center px-6 py-3 border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors"
                        >
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Όλα τα Άρθρα
                        </a>
                    </div>

                    <div class="flex space-x-3">
                        <button
                            type="submit"
                            class="inline-flex items-center px-8 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors"
                        >
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                            Ενημέρωση Άρθρου
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Delete Section -->
        <div class="mt-8 bg-red-50 border border-red-200 rounded-lg p-6">
            <h3 class="text-lg font-semibold text-red-900 mb-3">🗑️ Διαγραφή Άρθρου</h3>
            <p class="text-red-800 mb-4">
                Η διαγραφή του άρθρου είναι μόνιμη και δεν μπορεί να αναιρεθεί. Θα διαγραφούν όλα τα δεδομένα του άρθρου.
            </p>
            <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Είστε σίγουροι ότι θέλετε να διαγράψετε αυτό το άρθρο;')">
                @csrf
                @method('DELETE')
                <button
                    type="submit"
                    class="inline-flex items-center px-4 py-2 bg-red-600 text-white font-medium rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors"
                >
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                    Διαγραφή Άρθρου
                </button>
            </form>
        </div>
    </div>
</div>

<script>
function removeCurrentImage() {
    document.getElementById('remove_image').value = '1';
    event.target.closest('.relative').style.display = 'none';
    showNotification('Η εικόνα θα αφαιρεθεί κατά την αποθήκευση', 'success');
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
</script>
@endsection
