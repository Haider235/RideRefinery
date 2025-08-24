@extends('layouts.frontend')

@section('title', 'Customer Support')

@section('content')
<!-- Hero -->
<section class="relative bg-gray-900 text-white">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1512496015851-a90fb38ba796?auto=format&fit=crop&w=1500&q=80" 
             alt="Support Banner" class="w-full h-full object-cover opacity-60">
    </div>
    <div class="relative container mx-auto py-20 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Customer Support</h1>
        <p class="text-lg max-w-2xl mx-auto">Facing an issue? Submit your query and our team will assist you shortly.</p>
    </div>
</section>

<!-- Form Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto max-w-2xl">
        <div class="bg-white shadow-lg rounded-lg p-8">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Submit a Support Request</h2>

            <!-- Success Message -->
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Validation Errors -->
            @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('support.store') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" 
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" 
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm">
                </div>
                <div>
                    <label for="issue" class="block text-sm font-medium text-gray-700">Your Issue</label>
                    <textarea id="issue" name="issue" rows="5" 
                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm">{{ old('issue') }}</textarea>
                </div>
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-medium px-6 py-3 rounded-md shadow-md">
                    Submit Request
                </button>
            </form>
        </div>
    </div>
</section>
@endsection
