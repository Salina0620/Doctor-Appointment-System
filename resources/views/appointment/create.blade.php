<x-guest-layout>
    <div class="max-w-3xl mx-auto p-6 bg-gradient-to-r from-blue-100 via-purple-100 to-pink-100 shadow-lg rounded-lg">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-6">Patient Information</h1>

        <form method="POST" action="{{ route('patient.store') }}" class="space-y-6">
            @csrf

            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

            <!-- Age -->
            <div class="form-group">
                <x-input-label for="age" :value="__('Age')" />
                <x-text-input id="age" class="block mt-1 w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" type="text" name="age" :value="old('age')" autofocus autocomplete="age" />
                <x-input-error :messages="$errors->get('age')" class="text-red-500 text-sm mt-1" />
            </div>

            <!-- Gender -->
            <div class="form-group">
                <x-input-label for="gender" :value="__('Gender')" />
                <select id="gender" name="gender" class="block mt-1 w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                </select>
                <x-input-error :messages="$errors->get('gender')" class="text-red-500 text-sm mt-1" />
            </div>

            <!-- Address -->
            <div class="form-group">
                <x-input-label for="address" :value="__('Address')" />
                <x-text-input id="address" class="block mt-1 w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" type="text" name="address" :value="old('address')" autofocus autocomplete="address" />
                <x-input-error :messages="$errors->get('address')" class="text-red-500 text-sm mt-1" />
            </div>

            <!-- Phone Number -->
            <div class="form-group">
                <x-input-label for="phone_no" :value="__('Phone number')" />
                <x-text-input id="phone_no" class="block mt-1 w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" type="text" name="phone_no" :value="old('phone_no')" autofocus autocomplete="phone_no" />
                <x-input-error :messages="$errors->get('phone_no')" class="text-red-500 text-sm mt-1" />
            </div>

            <!-- Submit Button -->
            <div class="form-group">
                <x-primary-button class="w-full bg-gradient-to-r from-teal-400 to-teal-600 text-white rounded-md shadow-md hover:from-teal-500 hover:to-teal-700 transition duration-300">
                    {{ __('Submit') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
