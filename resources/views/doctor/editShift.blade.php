<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Shift') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-6">Edit Shift</h2>
                <form method="POST" action="{{ route('doctor.shifts.update', $shift->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="space-y-4">
                        <div>
                            <label for="shift_type" class="block text-gray-700 dark:text-gray-400 font-medium">Shift Type</label>
                            <select id="shift_type" name="shift_type" class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-800 dark:text-gray-200" required>
                                <option value="Morning" {{ $shift->shift_type === 'Morning' ? 'selected' : '' }}>Morning</option>
                                <option value="Afternoon" {{ $shift->shift_type === 'Afternoon' ? 'selected' : '' }}>Afternoon</option>
                                <option value="Evening" {{ $shift->shift_type === 'Evening' ? 'selected' : '' }}>Evening</option>
                            </select>
                        </div>
                        <div>
                            <label for="date" class="block text-gray-700 dark:text-gray-400 font-medium">Date</label>
                            <input type="date" id="date" name="date" value="{{ $shift->date }}" class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-800 dark:text-gray-200" required>
                        </div>
                        <div>
                            <label for="start_time" class="block text-gray-700 dark:text-gray-400 font-medium">Start Time</label>
                            <input type="time" id="start_time" name="start_time" value="{{ $shift->start_time }}" class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-800 dark:text-gray-200" required>
                        </div>
                        <div>
                            <label for="end_time" class="block text-gray-700 dark:text-gray-400 font-medium">End Time</label>
                            <input type="time" id="end_time" name="end_time" value="{{ $shift->end_time }}" class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-800 dark:text-gray-200" required>
                        </div>
                        <div class="mt-6">
                            <button type="submit" class="px-4 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold rounded-md shadow-md hover:bg-blue-700 transition duration-300">
                                Update Shift
                            </button>
                            <a href="{{ route('doctor.shifts.index') }}" class="ml-4 px-4 py-2 bg-gradient-to-r from-gray-600 to-gray-700 text-white font-semibold rounded-md shadow-md hover:bg-gray-800 transition duration-300">
                                Cancel
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
