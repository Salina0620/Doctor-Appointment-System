<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Shift Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-6">Shift Details</h2>
                <div class="space-y-4">
                    <p class="text-lg font-semibold text-gray-800 dark:text-gray-200">Shift Type: {{ $shift->shift_type }}</p>
                    <p class="text-sm text-gray-600 dark:text-gray-300">Date: {{ $shift->date }}</p>
                    <p class="text-sm text-gray-600 dark:text-gray-300">Start Time: {{ $shift->start_time }}</p>
                    <p class="text-sm text-gray-600 dark:text-gray-300">End Time: {{ $shift->end_time }}</p>
                </div>
                <div class="mt-6">
                    <a href="{{ route('doctor.shifts.edit', $shift->id) }}" class="px-4 py-2 bg-gradient-to-r from-green-600 to-teal-600 text-white font-semibold rounded-md shadow-md hover:bg-green-700 transition duration-300">
                        Edit Shift
                    </a>
                    <a href="{{ route('doctor.shifts.index') }}" class="ml-4 px-4 py-2 bg-gradient-to-r from-gray-600 to-gray-700 text-white font-semibold rounded-md shadow-md hover:bg-gray-800 transition duration-300">
                        Back to Shifts
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
