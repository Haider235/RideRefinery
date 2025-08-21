@extends('layouts.customer')

@section('title', 'Edit Profile')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-6 text-red-600">Edit Profile</h2>

    {{-- ✅ Show success message --}}
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{-- ✅ Show validation errors --}}
    @if($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-800 rounded">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('customer.profile.update') }}" class="space-y-4">
        @csrf

        <input type="text" name="first_name" 
            value="{{ old('first_name', $customer->first_name) }}"
            placeholder="First Name"
            class="w-full px-4 py-2 border rounded @error('first_name') border-red-500 @enderror">

        <input type="text" name="last_name" 
            value="{{ old('last_name', $customer->last_name) }}"
            placeholder="Last Name"
            class="w-full px-4 py-2 border rounded @error('last_name') border-red-500 @enderror">

        <input type="email" name="email" 
            value="{{ old('email', $customer->email) }}"
            placeholder="Email"
            class="w-full px-4 py-2 border rounded @error('email') border-red-500 @enderror">

        <input type="text" name="phone" 
            value="{{ old('phone', $customer->phone) }}"
            placeholder="Phone"
            class="w-full px-4 py-2 border rounded @error('phone') border-red-500 @enderror">

        <button type="submit"
            class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700 transition">
            Save Changes
        </button>
    </form>
</div>
@endsection
