@extends('layouts.app')

@section('title', 'Επικοινωνία - Vres Mastora')
@section('description', 'Επικοινωνήστε μαζί μας για οποιαδήποτε ερώτηση ή υποστήριξη. Η ομάδα του Vres Mastora είναι εδώ για να σας βοηθήσει με την πλατφόρμα μας.')
@section('keywords', 'επικοινωνία, υποστήριξη, βοήθεια, ερωτήσεις, Vres Mastora, τεχνική υποστήριξη')
@section('robots', 'index, follow, max-snippet:-1, max-image-preview:large')
@section('og_type', 'contact')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50">
    <!-- Header -->
    <section class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900">Επικοινωνία</h1>
                    <p class="mt-2 text-gray-600">Στείλτε μας μήνυμα και θα απαντήσουμε το συντομότερο.</p>
                </div>
                <a href="{{ route('home') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg transition-colors">
                    Αρχική
                </a>
            </div>
        </div>
    </section>

    <!-- Form -->
    <section class="py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                <div class="p-8 md:p-12">
                    @if (session('status') === 'contact-sent')
                        <div class="mb-6 rounded-md bg-green-50 p-4 text-green-800 border border-green-200">
                            Το μήνυμά σας στάλθηκε με επιτυχία.
                        </div>
                    @endif

                    <form method="post" action="{{ route('contact.submit') }}" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Ονοματεπώνυμο</label>
                                <input id="name" name="name" type="text" value="{{ old('name', auth()->user()->name ?? '') }}" required
                                       class="mt-1 block w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500" />
                                @error('name')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input id="email" name="email" type="email" value="{{ old('email', auth()->user()->email ?? '') }}" required
                                       class="mt-1 block w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500" />
                                @error('email')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700">Τηλέφωνο (προαιρετικό)</label>
                                <input id="phone" name="phone" type="text" value="{{ old('phone') }}"
                                       class="mt-1 block w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500" />
                                @error('phone')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label for="subject" class="block text-sm font-medium text-gray-700">Θέμα (προαιρετικό)</label>
                                <input id="subject" name="subject" type="text" value="{{ old('subject') }}"
                                       class="mt-1 block w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500" />
                                @error('subject')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700">Μήνυμα</label>
                            <textarea id="message" name="message" rows="6" required
                                      class="mt-1 block w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">{{ old('message') }}</textarea>
                            @error('message')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div class="flex items-center justify-between">
                            <p class="text-sm text-gray-500">Με την αποστολή, αποδέχεστε τους <a href="{{ route('terms') }}" class="text-blue-600 hover:underline">Όρους Χρήσης</a>.</p>
                            <button type="submit" class="inline-flex items-center px-6 py-3 rounded-lg bg-blue-600 text-white font-semibold hover:bg-blue-700 transition-colors shadow">
                                Αποστολή μηνύματος
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Extra info -->
            <div class="mt-8 grid md:grid-cols-3 gap-6">
                <div class="p-6 bg-white rounded-xl shadow border border-gray-100">
                    <div class="text-gray-900 font-semibold">Email</div>
                    <div class="text-gray-600 mt-1">{{ config('mail.from.address') ?? 'contact@fixado.gr' }}</div>
                </div>
                <div class="p-6 bg-white rounded-xl shadow border border-gray-100">
                    <div class="text-gray-900 font-semibold">Ώρες</div>
                    <div class="text-gray-600 mt-1">Δευ–Παρ 09:00–17:00</div>
                </div>
                <div class="p-6 bg-white rounded-xl shadow border border-gray-100">
                    <div class="text-gray-900 font-semibold">Συχνές Ερωτήσεις</div>
                    <div class="mt-1"><a href="{{ route('faq') }}" class="text-blue-600 hover:underline">Δείτε τις απαντήσεις</a></div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

