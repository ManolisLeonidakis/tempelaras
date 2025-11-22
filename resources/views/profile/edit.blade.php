@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50">
    <!-- Header -->
    <div class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Επεξεργασία Προφίλ</h1>
                    <p class="text-gray-600 mt-1">Ενημερώστε τα στοιχεία σας και τις υπηρεσίες που προσφέρετε</p>
                </div>
                <a href="{{ route('home') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg transition-colors duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Επιστροφή στην Αρχική
                </a>
            </div>
        </div>
    </div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-8">
            @csrf
            @method('patch')

            <!-- Profile Picture Section -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden transform hover:shadow-2xl transition-shadow duration-300">
                <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-4">
                    <h2 class="text-xl font-semibold text-white flex items-center">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Φωτογραφία Προφίλ
                    </h2>
                </div>
                <div class="p-6">
                    <div class="flex items-center space-x-6">
                        <div class="relative">
                            @if($user->image)
                                <img src="{{ asset('storage/app/public/' . $user->image->url) }}"
                                     alt="Profile Picture"
                                     class="w-24 h-24 rounded-full object-cover border-4 border-gray-200">
                            @else
                                <div class="w-24 h-24 rounded-full bg-gradient-to-br from-gray-300 to-gray-400 flex items-center justify-center border-4 border-gray-200">
                                    <svg class="w-12 h-12 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                            @endif
                        </div>
                        <div class="flex-1">
                            <label for="profile_image" class="block">
                                <span class="sr-only">Επιλέξτε νέα φωτογραφία</span>
                                <input type="file" id="profile_image" name="profile_image" accept="image/*"
                                       class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition-colors duration-200">
                            </label>
                            <p class="mt-2 text-sm text-gray-500">PNG, JPG έως 5MB</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Basic Information -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden transform hover:shadow-2xl transition-shadow duration-300">
                <div class="bg-gradient-to-r from-green-600 to-teal-600 px-6 py-4">
                    <h2 class="text-xl font-semibold text-white flex items-center">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Βασικές Πληροφορίες
                    </h2>
                </div>
                <div class="p-6 space-y-6">
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Όνομα *</label>
                            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('name') border-red-500 @enderror"
                                   required>
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('email') border-red-500 @enderror"
                                   required>
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="idikotita" class="block text-sm font-medium text-gray-700 mb-2">Ειδικότητα *</label>
                        <select id="idikotita" name="idikotita"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('idikotita') border-red-500 @enderror">
                            <option value="">Επιλέξτε ειδικότητα</option>
                            @foreach (config('services.idikothtes') as $idikotita)
                                <option value="{{ $idikotita }}" {{ old('idikotita', $user->idikotita) == $idikotita ? 'selected' : '' }}>{{ $idikotita }}</option>
                            @endforeach
                        </select>
                        @error('idikotita')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Περιγραφή Υπηρεσιών</label>
                        <textarea id="description" name="description" rows="4"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 resize-none @error('description') border-red-500 @enderror"
                                  placeholder="Περιγράψτε τις υπηρεσίες που προσφέρετε, την εμπειρία σας και τυχόν ειδικές δεξιότητες...">{{ old('description', $user->description) }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden transform hover:shadow-2xl transition-shadow duration-300">
                <div class="bg-gradient-to-r from-purple-600 to-pink-600 px-6 py-4">
                    <h2 class="text-xl font-semibold text-white flex items-center">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        Στοιχεία Επικοινωνίας
                    </h2>
                </div>
                <div class="p-6 space-y-6">
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Τηλέφωνο</label>
                            <input type="tel" id="phone" name="phone" value="{{ old('phone', $user->phone) }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('phone') border-red-500 @enderror"
                                   placeholder="2101234567">
                            @error('phone')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="mobile" class="block text-sm font-medium text-gray-700 mb-2">Κινητό</label>
                            <input type="tel" id="mobile" name="mobile" value="{{ old('mobile', $user->mobile) }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('mobile') border-red-500 @enderror"
                                   placeholder="6912345678">
                            @error('mobile')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Address Information -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden transform hover:shadow-2xl transition-shadow duration-300">
                <div class="bg-gradient-to-r from-orange-600 to-red-600 px-6 py-4">
                    <h2 class="text-xl font-semibold text-white flex items-center">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        Διεύθυνση
                    </h2>
                </div>
                <div class="p-6 space-y-6">
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-700 mb-2">Πόλη</label>
                            <select id="city" name="city"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('user_address.city') border-red-500 @enderror">
                                <option value="">Επιλέξτε πόλη</option>
                                @foreach (config('services.cities') as $city)
                                    <option value="{{ $city }}" {{ old('city', $user->city ?? '') == $city ? 'selected' : '' }}>{{ $city }}</option>
                                @endforeach
                            </select>
                            @error('city')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="area" class="block text-sm font-medium text-gray-700 mb-2">Περιοχή</label>
                            <input type="text" id="area" name="user_address[area]" value="{{ old('user_address.area', $user->user_address['area'] ?? '') }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('user_address.area') border-red-500 @enderror"
                                   placeholder="π.χ. Κέντρο, Παγκράτι">
                            @error('user_address.area')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label for="street" class="block text-sm font-medium text-gray-700 mb-2">Οδός & Αριθμός</label>
                            <input type="text" id="street" name="user_address[street]" value="{{ old('user_address.street', $user->user_address['street'] ?? '') }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('user_address.street') border-red-500 @enderror"
                                   placeholder="π.χ. Σταδίου 10">
                            @error('user_address.street')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="postal_code" class="block text-sm font-medium text-gray-700 mb-2">Ταχυδρομικός Κώδικας</label>
                            <input type="text" id="postal_code" name="user_address[postal_code]" value="{{ old('user_address.postal_code', $user->user_address['postal_code'] ?? '') }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 @error('user_address.postal_code') border-red-500 @enderror"
                                   placeholder="π.χ. 12345">
                            @error('user_address.postal_code')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

                                    <!-- Submit Button -->
            <div class="bg-white rounded-2xl shadow-xl p-6 mt-10">
                <div class="flex items-center justify-between">
                    <div class="text-sm text-gray-600">
                        * Υποχρεωτικά πεδία
                    </div>
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('home') }}"
                           class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg transition-colors duration-200 font-medium">
                            Ακύρωση
                        </a>
                        <button type="submit"
                                class="px-8 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white rounded-lg transition-all duration-200 font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                            <span class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Αποθήκευση Αλλαγών
                            </span>
                        </button>
                    </div>
                </div>

                @if (session('status') === 'profile-updated')
                    <div class="mt-4 p-4 bg-green-50 border border-green-200 rounded-lg">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <p class="text-green-800 font-medium">Το προφίλ σας ενημερώθηκε επιτυχώς!</p>
                        </div>
                    </div>
                @endif

                @if (session('status') === 'project-created')
                    <div class="mt-4 p-4 bg-green-50 border border-green-200 rounded-lg">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <p class="text-green-800 font-medium">Το έργο προστέθηκε επιτυχώς!</p>
                        </div>
                    </div>
                @endif

                @if (session('status') === 'project-deleted')
                    <div class="mt-4 p-4 bg-green-50 border border-green-200 rounded-lg">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <p class="text-green-800 font-medium">Το έργο διαγράφηκε επιτυχώς!</p>
                        </div>
                    </div>
                @endif
            </div>
        </form>
        <!-- Projects Section -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden transform hover:shadow-2xl transition-shadow duration-300 mt-8">
            <div class="bg-gradient-to-r from-yellow-600 to-orange-600 px-6 py-4">
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-semibold text-white flex items-center">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                        Τα Έργα Μου
                    </h2>
                    <a href="{{ route('projects.create') }}"
                       class="inline-flex items-center px-4 py-2 bg-white text-yellow-600 rounded-lg hover:bg-yellow-50 transition-colors duration-200 font-medium">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Προσθήκη Έργου
                    </a>
                </div>
            </div>
            <div class="p-6">
                @if($user->projects && $user->projects->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach($user->projects as $project)
                            <div class="bg-gray-50 rounded-xl p-6 border border-gray-200 hover:shadow-md transition-shadow duration-200">
                                <div class="flex items-start justify-between mb-4">
                                    <div class="flex-1">
                                        <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $project->title }}</h3>
                                        <p class="text-gray-600 text-sm line-clamp-3">{{ Str::limit($project->description, 120) }}</p>
                                    </div>
                                </div>

                                @if($project->images && $project->images->count() > 0)
                                    <div class="grid grid-cols-3 gap-2 mb-4">
                                        @foreach($project->images->take(3) as $image)
                                            <div class="relative aspect-square rounded-lg overflow-hidden">
                                                <img src="{{ Storage::url($image->url) }}"
                                                     alt="{{ $project->title }}"
                                                     class="w-full h-full object-cover">
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                                <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                                    <span class="text-sm text-gray-500">
                                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        {{ $project->created_at->format('d/m/Y') }}
                                    </span>
                                    <form method="POST" action="{{ route('projects.destroy', $project) }}"
                                          onsubmit="return confirm('Είστε σίγουροι ότι θέλετε να διαγράψετε αυτό το έργο;');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="inline-flex items-center px-3 py-2 bg-red-100 hover:bg-red-200 text-red-700 rounded-lg transition-colors duration-200 text-sm font-medium">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                            Διαγραφή
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-12">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">Δεν υπάρχουν έργα</h3>
                        <p class="mt-1 text-sm text-gray-500">Προσθέστε το πρώτο σας έργο για να δείξετε τη δουλειά σας!</p>
                        <div class="mt-6">
                            <a href="{{ route('projects.create') }}"
                               class="inline-flex items-center px-4 py-2 bg-yellow-600 hover:bg-yellow-700 text-white rounded-lg transition-colors duration-200 font-medium">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                Προσθήκη Έργου
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Services Section -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden transform hover:shadow-2xl transition-shadow duration-300 mt-8">
            <div class="bg-gradient-to-r from-green-600 to-emerald-600 px-6 py-4">
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-semibold text-white flex items-center">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                        Οι Υπηρεσίες Μου
                    </h2>
                    <a href="{{ route('services.index') }}"
                       class="inline-flex items-center px-4 py-2 bg-white text-green-600 rounded-lg hover:bg-green-50 transition-colors duration-200 font-medium">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        Διαχείριση Υπηρεσιών
                    </a>
                </div>
            </div>

            <div class="p-6">
                <div class="text-center py-8">
                    <svg class="mx-auto h-16 w-16 text-green-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Διαχειριστείτε τις Υπηρεσίες σας</h3>
                    <p class="text-gray-500 mb-6 max-w-md mx-auto">
                        Προσθέστε τις υπηρεσίες που προσφέρετε με τις αντίστοιχες τιμές σας.
                        Οι πελάτες θα μπορούν να δουν τις υπηρεσίες σας στο προφίλ σας.
                    </p>
                    <a href="{{ route('services.create') }}"
                       class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg transition-colors duration-200 transform hover:scale-105 shadow-lg">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Προσθήκη Υπηρεσίας
                    </a>
                </div>

                @if($user->services && $user->services->count() > 0)
                    <div class="mt-6">
                        <h4 class="text-lg font-semibold text-gray-900 mb-4">Οι Υπηρεσίες σας ({{ $user->services->count() }})</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach($user->services as $service)
                                <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                                    <div class="flex items-start justify-between">
                                        <div class="flex-1">
                                            <h5 class="font-semibold text-gray-900">{{ $service->name }}</h5>
                                            @if($service->description)
                                                <p class="text-sm text-gray-600 mt-1">{{ Str::limit($service->description, 80) }}</p>
                                            @endif
                                            <div class="mt-2">
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                    {{ $service->formatted_rate }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex space-x-2 ml-4">
                                            <a href="{{ route('services.edit', $service) }}"
                                               class="text-blue-600 hover:text-blue-800 p-1">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<style>
.hero-content {
    animation: fadeInUp 1s ease-out;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Custom scrollbar */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: #f1f5f9;
}

::-webkit-scrollbar-thumb {
    background: #cbd5e1;
    border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
    background: #94a3b8;
}

/* Focus animations */
input:focus, select:focus, textarea:focus {
    transform: scale(1.01);
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}
</style>
@endsection
