<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Your Scheduled Shifts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($shifts->isNotEmpty())
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-6">Your Shifts</h2>
                    <ul class="space-y-6">
                        @foreach ($shifts as $shift)
                            <li class="p-6 bg-gradient-to-r from-blue-50 via-purple-50 to-pink-50 dark:bg-gray-700 rounded-lg shadow-md border border-gray-200 dark:border-gray-600">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Shift Type: {{ $shift->shift_type }}</h3>
                                        <p class="text-sm text-gray-600 dark:text-gray-300">Date: {{ $shift->date }}</p>
                                        <p class="text-sm text-gray-600 dark:text-gray-300">Start Time: {{ $shift->start_time }}</p>
                                        <p class="text-sm text-gray-600 dark:text-gray-300">End Time: {{ $shift->end_time }}</p>
                                    </div>
                                    <div>
                                        <a href="{{ route('doctor.shifts.show', $shift->id) }}" class="text-sm font-semibold text-blue-600 dark:text-blue-400 hover:underline">View Details</a>
                                        <a href="{{ route('doctor.shifts.edit', $shift->id) }}" class="ml-4 text-sm font-semibold text-green-600 dark:text-green-400 hover:underline">Edit</a>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @else
                <div class="mt-10 text-center">
                    <p class="text-xl text-gray-700 dark:text-gray-400">No scheduled shifts.</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
