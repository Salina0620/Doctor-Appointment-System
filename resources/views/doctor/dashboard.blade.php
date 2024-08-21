<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Doctor Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div x-data="{ showMessage: true }" x-show="showMessage" class="relative bg-gradient-to-r from-blue-100 via-purple-100 to-pink-100 overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex items-center justify-between">
                    <p class="text-lg font-semibold">{{ __('Doctor Login Successfully') }}</p>
                    <button @click="showMessage = false" class="text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-gray-100">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="py-8 text-center">
        @if(Auth::check() && Auth::user()->name)
            <h1 class="text-4xl font-bold text-gray-900 dark:text-gray-100">
                Welcome, Dr. {{ Auth::user()->name }}
            </h1>
        @else
            <h1 class="text-4xl font-bold text-gray-900 dark:text-gray-100">
                Welcome, Doctor
            </h1>
        @endif

        <div class="mt-6">
            <a href="{{ route('doctor.schedule') }}"
               class="inline-block px-8 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold text-lg rounded-full shadow-md hover:bg-blue-700 transition duration-300">
                Schedule Your Shift
            </a>
        </div>
    </div>

    <!-- Display doctor appointments -->
    <div class="py-8 flex justify-center">
        <div class="w-full max-w-4xl">
            @if (isset($appointments) && $appointments->isNotEmpty())
                <div class="space-y-6">
                    <h2 class="text-3xl font-bold text-purple-700 dark:text-purple-400 mb-6 text-center">Your Appointments</h2>
                    <ul class="space-y-6">
                        @foreach ($appointments as $appointment)
                            {{-- @if($appointment->patient && $appointment->patient->user) --}}

                          
                                <li class="p-6 bg-gradient-to-r from-blue-50 via-purple-50 to-pink-50 dark:bg-gray-700 rounded-lg shadow-md border border-gray-200 dark:border-gray-600">
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Patient: {{ $appointment->patient->user->name}}</h3>
                                            {{-- <p class="text-sm text-gray-600 dark:text-gray-300">Phone: {{ $appointment->patient->user->phone }}</p> --}}
                                            <p class="text-sm text-gray-600 dark:text-gray-300">Date: {{ $appointment->date }}</p>
                                            <p class="text-sm text-gray-600 dark:text-gray-300">Start Time: {{ $appointment->start_time }}</p>
                                            <p class="text-sm text-gray-600 dark:text-gray-300">End Time: {{ $appointment->end_time }}</p>
                                        </div>
                                        <div>
                                            <a href="#" class="text-sm font-semibold text-blue-600 dark:text-blue-400 hover:underline">View Details</a>
                                        </div>
                                    </div>
                                </li>
                            {{-- @else --}}
                           
                                {{-- <li class="p-6 bg-gradient-to-r from-blue-50 via-purple-50 to-pink-50 dark:bg-gray-700 rounded-lg shadow-md border border-gray-200 dark:border-gray-600">
                                    <span class="text-lg font-semibold text-gray-900 dark:text-gray-200">Patient information not available</span>
                                </li>
                            @endif --}}
                        @endforeach
                    </ul>
                </div>
            @else
                <div class="mt-10 text-center">
                    <p class="text-xl text-gray-700 dark:text-gray-400">No upcoming appointments.</p>
                </div>
            @endif
        </div>
    </div>

   
</x-app-layout>
