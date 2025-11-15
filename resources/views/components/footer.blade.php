<footer class="bg-gradient-to-br from-gray-900 to-gray-800 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Main Footer Content -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12">
            <!-- Company Info -->
            <div class="lg:col-span-1">
                <div class="flex items-center mb-6">
                    <img
                        src="{{ asset('images/logo_white.svg') }}"
                        alt="Vres Mastora Logo"
                        class="h-20 w-auto mr-3"
                    />
                </div>
                <p class="text-gray-300 text-sm leading-relaxed mb-6">
                    Η μεγαλύτερη πλατφόρμα εύρεσης επαγγελματιών στην Ελλάδα.
                    Συνδέουμε πελάτες με αξιόπιστους επαγγελματίες για όλες τις οικιακές εργασίες.
                </p>
                {{-- <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.749.097.118.112.221.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.747-1.378 0 0-.599 2.282-.744 2.84-.282 1.084-1.064 2.456-1.549 3.235C9.584 23.815 10.77 24.001 12.017 24.001c6.624 0 11.99-5.367 11.99-11.987C24.007 5.367 18.641.001.012.017z"/>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 6.62 5.367 11.987 11.988 11.987s11.987-5.367 11.987-11.987C24.004 5.367 18.637.001 12.017.001zM8.449 16.988c-1.297 0-2.448-.49-3.323-1.297C4.253 14.894 3.762 13.743 3.762 12.446s.49-2.448 1.364-3.323c.875-.875 2.026-1.365 3.323-1.365s2.448.49 3.323 1.365c.875.875 1.365 2.026 1.365 3.323s-.49 2.448-1.365 3.323c-.875.807-2.026 1.297-3.323 1.297zm7.718 0c-.99 0-1.805-.49-2.432-1.297-.627-.807-.941-1.858-.941-3.155s.314-2.348.941-3.155c.627-.807 1.442-1.297 2.432-1.297s1.805.49 2.432 1.297c.627.807.941 1.858.941 3.155s-.314 2.348-.941 3.155c-.627.807-1.442 1.297-2.432 1.297z"/>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                        </svg>
                    </a>
                </div> --}}
            </div>

            <!-- Services -->
            <div>
                <h3 class="text-lg font-semibold mb-6 text-white">Υπηρεσίες</h3>
                <ul class="space-y-3">
                    <li><a href="{{ route('find') }}" class="text-gray-300 hover:text-white transition-colors duration-200 text-sm">Βρείτε Επαγγελματία</a></li>
                </ul>
            </div>

            <!-- Categories -->
            <div>
                <h3 class="text-lg font-semibold mb-6 text-white">Ειδικότητες</h3>
                <ul class="space-y-3">
                    <li><a href="{{ route('find', ['idikotita' => 'Ηλεκτρολόγος']) }}" class="text-gray-300 hover:text-white transition-colors duration-200 text-sm">Ηλεκτρολόγοι</a></li>
                    <li><a href="{{ route('find', ['idikotita' => 'Υδραυλικός']) }}" class="text-gray-300 hover:text-white transition-colors duration-200 text-sm">Υδραυλικοί</a></li>
                    <li><a href="{{ route('find', ['idikotita' => 'Μάστορας']) }}" class="text-gray-300 hover:text-white transition-colors duration-200 text-sm">Μάστορες</a></li>
                    <li><a href="{{ route('find', ['idikotita' => 'Ψυκτικός']) }}" class="text-gray-300 hover:text-white transition-colors duration-200 text-sm">Ψυκτικοί</a></li>
                    <li><a href="{{ route('find', ['idikotita' => 'Καθαριστής']) }}" class="text-gray-300 hover:text-white transition-colors duration-200 text-sm">Καθαριστές</a></li>
                </ul>
            </div>

            <!-- Support & Company -->
            <div>
                <h3 class="text-lg font-semibold mb-6 text-white">Εταιρεία</h3>
                <ul class="space-y-3">
                    <li><a href="{{ route('about') }}" class="text-gray-300 hover:text-white transition-colors duration-200 text-sm">Σχετικά με Εμάς</a></li>
                    <li><a href="{{ route('posts.index') }}" class="text-gray-300 hover:text-white transition-colors duration-200 text-sm">Blog</a></li>
                    <li><a href="{{ route('contact') }}" class="text-gray-300 hover:text-white transition-colors duration-200 text-sm">Επικοινωνία</a></li>
                    <li><a href="{{ route('faq') }}" class="text-gray-300 hover:text-white transition-colors duration-200 text-sm">Συχνές Ερωτήσεις</a></li>
                    <li><a href="{{ route('terms') }}" class="text-gray-300 hover:text-white transition-colors duration-200 text-sm">Όροι Χρήσης</a></li>
                </ul>
            </div>
        </div>

        <!-- Newsletter Signup -->
        <div class="border-t border-gray-700 mt-12 pt-8">
            <div class="max-w-md mx-auto text-center lg:mx-0 lg:text-left lg:max-w-none lg:flex lg:items-center lg:justify-between">
                <div class="lg:flex-1">
                    <h4 class="text-lg font-semibold text-white mb-2">Ενημερωθείτε για νέες υπηρεσίες</h4>
                    <p class="text-gray-300 text-sm">Λάβετε ειδοποιήσεις για νέους επαγγελματίες στην περιοχή σας</p>
                </div>
                <div class="mt-4 lg:mt-0 lg:ml-8 lg:flex-shrink-0">
                    <form class="flex flex-col sm:flex-row gap-3 max-w-md">
                        <input type="email" placeholder="Το email σας"
                               class="flex-1 px-4 py-2 bg-gray-800 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <button type="submit"
                                class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors duration-200 whitespace-nowrap">
                            Εγγραφή
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Bottom Footer -->
        <div class="border-t border-gray-700 mt-8 pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="text-gray-400 text-sm mb-4 md:mb-0">
                    © {{ date('Y') }} Fixado. Με επιφύλαξη παντός δικαιώματος.
                </div>
                <div class="flex space-x-6 text-sm">
                    <a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">Πολιτική Απορρήτου</a>
                    <a href="{{ route('terms') }}" class="text-gray-400 hover:text-white transition-colors duration-200">Όροι Χρήσης</a>
                    <a href="{{ route('contact') }}" class="text-gray-400 hover:text-white transition-colors duration-200">Επικοινωνία</a>
                </div>
            </div>
        </div>
    </div>
</footer>
