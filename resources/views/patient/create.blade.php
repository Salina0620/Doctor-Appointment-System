<x-guest-layout>
    <h1 style="font-weight:bold">Patient Information</h1> <br>
<div>

    Name: {{ Auth::user()->name }} <br>
    Email: {{ Auth::user()->email }} <br>
    Role: {{ Auth::user()->role }} <br>
</div>
<br>
    <form method="POST" action="{{ route('patient.store') }}">
        @csrf

        <div>
    
          <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" >
        </div>


<!---Age--->

<div>

    <x-input-label for="age" :value="__('Age')" />
    <x-text-input id="age" class="block mt-1 w-full" type="text" name="age" :value="old('age')"  autofocus autocomplete="age" />
    <x-input-error :messages="$errors->get('age')" class="mt-2" />
</div>
<br>


<!---gender-->

<div>
    <x-input-label for="gender"  :value="__('Gender')" />

    <select id="gender" name="gender" >
        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
        <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
    </select>
    <br>


<!---address-->
<br> 
<div>
    <x-input-label for="address" :value="__('Address')" />
    <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')"  autofocus autocomplete="address" />
    <x-input-error :messages="$errors->get('address')" class="mt-2" />
</div>
<br>

<!--phone number-->

<div>
    <x-input-label for="phone_no" :value="__('Phone number')" />
    <x-text-input id="phone_no" class="block mt-1 w-full" type="text" name="phone_no" :value="old('phone_no')"  autofocus autocomplete="phone_no" />
    <x-input-error :messages="$errors->get('phone_no')" class="mt-2" />
</div>
<br>





<br>

 

<div class="flex items-center justify-end mt-4">
   

<a href="patient.dashboard">

    <x-primary-button class="ms-3">
       {{ __('Submit') }}
   </x-primary-button>
</a>
</div>
</form>

       


</x-guest-layout>
