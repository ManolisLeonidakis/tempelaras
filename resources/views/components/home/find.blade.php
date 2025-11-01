<form method="get" action="{{ route('find') }}" class="max-w-4xl mx-auto my-4">
    <div class="grid sm:grid-cols-3 gap-6">
        <div>
            <div for="idikotita" class="relative flex items-center">
                <select name="idikotita" id="idikotita"
                    class="px-4 py-3 pr-8 bg-[#f0f1f2] focus:bg-transparent text-black w-full text-sm border
                    border-gray-200 outline-[#007bff] rounded-md transition-all"
                >
                    <option value="" checked>Επιλέξτε ιδικότητα</option>
                    @foreach (config('services.idikothtes') as $idikotita)
                        <option value="{{ $idikotita }}">{{ $idikotita }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div>
            <div for="city" class="relative flex items-center">
                <select name="city" id="city"
                    class="px-4 py-3 pr-8 bg-[#f0f1f2] focus:bg-transparent text-black w-full text-sm border
                    border-gray-200 outline-[#007bff] rounded-md transition-all"
                >
                    <option value="" checked>Επιλέξτε Πόλη</option>
                    @foreach (config('services.cities') as $city)
                        <option value="{{ $city }}">{{ $city }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <button type="submit"
            class="text-[15px] font-medium w-full mx-auto
            block bg-[#007bff] hover:bg-[#006bff] text-white rounded-md transition-all
            cursor-pointer"
        >
            Αναζήτηση
        </button>
    </div>
</form>
