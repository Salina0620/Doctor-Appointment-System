<x-guest-layout>


    <div>

        Name: {{ Auth::user()->name }} <br>
        Email: {{ Auth::user()->email }} <br>
        Role: {{ Auth::user()->role }} <br>
    </div>
    <br>
    <h1 style="font-weight:bold">Doctor Information</h1> 



    {{-- <form  method="POST" action="{{ route('doctor.store') }}"> --}}
      <form method="POST" action="{{ route('doctor.store') }}" enctype="multipart/form-data">
        @csrf



{{-- 
        <x-input-label for="name" :value="__('Shift')" />

        <div class="inline-block relative w-64">
            <select
                class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                <option>Morning</option>
                <option>Day</option>
                <option>Evening</option>
            </select>

        </div> --}}

        <br>
        <x-input-label for="position" :value="__('Department')" />
        <div class="inline-block relative w-64">
            <select name="department_id"
                class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </select>

        </div> <br>

<!--phone number-->

<div>
  <x-input-label for="phone_no" :value="__('Phone number')" />
  <x-text-input id="phone_no" class="block mt-1 w-full" type="text" name="phone_no" :value="old('phone_no')"  autofocus autocomplete="phone_no" />
  <x-input-error :messages="$errors->get('phone_no')" class="mt-2" />
</div>
<br>
<div>
  <x-input-label for="bio" :value="__('Bio')" />
  <x-text-input id="bio" class="block mt-1 w-full" type="text" name="bio" :value="old('bio')"  autofocus autocomplete="bio" />
  <x-input-error :messages="$errors->get('bio')" class="mt-2" />
</div>
<br>
<div>
  <x-input-label for="image" :value="__('Image')" />
  <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')"  autofocus autocomplete="image" />
  <x-input-error :messages="$errors->get('image')" class="mt-2" />
</div>
<br>




<div class="flex items-center justify-end mt-4">
   

  
      <x-primary-button class="ms-3">
         {{ __('Submit') }}
     </x-primary-button>
  </div>
    </form>




</x-guest-layout>
