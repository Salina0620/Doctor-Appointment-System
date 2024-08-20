<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 dark:text-gray-100 leading-tight">
            {{ __('Patient Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Flash message with close button -->
            <div x-data="{ showMessage: true }" x-show="showMessage" class="relative bg-gradient-to-r from-blue-100 via-purple-100 to-pink-100 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-blue-700 dark:text-blue-400">
                        {{ __("Patient Login Successfully") }}
                    </h3>
                    <button @click="showMessage = false" class="text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-gray-100">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Move "Make Appointment" button to the top of the appointment list -->
    <div class="py-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex items-center justify-end gap-x-6 mb-4">
            <a href="{{ route('appointment.create') }}" class="rounded-md bg-gradient-to-r from-teal-400 to-teal-600 px-4 py-2 text-sm font-semibold text-white shadow-lg hover:from-teal-500 hover:to-teal-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-teal-600 transition-all duration-300">
                Make Appointment
            </a>
        </div>
    </div>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gradient-to-r from-blue-100 via-purple-100 to-pink-100 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <!-- Display patient appointments -->
                @if($appointments->isNotEmpty())
                    <h2 class="text-xl font-bold mb-4 text-purple-700 dark:text-purple-400">
                        Your Appointments
                    </h2>
                    <ul class="space-y-3">
                        @foreach($appointments as $appointment)
                            <li class="p-4 bg-white dark:bg-gray-700 rounded-lg shadow-md border border-gray-200 dark:border-gray-600">
                                <div class="text-gray-800 dark:text-gray-200">
                                    <span class="font-semibold text-indigo-600 dark:text-indigo-400">Doctor:</span> 
                                    {{ $appointment->doctor->user->name }}
                                </div>
                                <div class="text-gray-600 dark:text-gray-300">
                                    <span class="font-semibold text-indigo-600 dark:text-indigo-400">Date:</span> 
                                    {{ $appointment->date }}
                                </div>
                                <div class="text-gray-600 dark:text-gray-300">
                                    <span class="font-semibold text-indigo-600 dark:text-indigo-400">Start Time:</span> 
                                    {{ $appointment->start_time }}
                                </div>
                                <div class="text-gray-600 dark:text-gray-300">
                                    <span class="font-semibold text-indigo-600 dark:text-indigo-400">End Time:</span> 
                                    {{ $appointment->end_time }}
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-700 dark:text-gray-400 mt-4">You have no appointments scheduled.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
