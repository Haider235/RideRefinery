@extends('layouts.frontend')

@section('title', 'Checkout')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 font-sans">

    <h1 class="text-3xl font-bold text-gray-900 mb-6">Checkout</h1>

    {{-- Success & Error Messages --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            Please fix the errors below and try again.
        </div>
    @endif

    <div class="grid md:grid-cols-3 gap-6 align-items-start">
        {{-- Checkout Form --}}
        <div class="md:col-span-2 bg-white p-8 rounded-xl shadow-md border border-gray-100">

            <form action="{{ route('checkout.placeOrder') }}" method="POST" enctype="multipart/form-data" class="grid gap-4">
                @csrf

                {{-- Billing Details --}}
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Billing Details</h2>

                <input type="text" name="firstName" placeholder="First Name" 
                       class="input-box mb-4" value="{{ old('firstName') }}">
                @error('firstName') <p class="text-red-600 text-sm mb-2">{{ $message }}</p> @enderror

                <input type="text" name="lastName" placeholder="Last Name" 
                       class="input-box mb-4" value="{{ old('lastName') }}">
                @error('lastName') <p class="text-red-600 text-sm mb-2">{{ $message }}</p> @enderror

                <input type="email" name="email" placeholder="Email" 
                       class="input-box mb-4" value="{{ old('email') }}">
                @error('email') <p class="text-red-600 text-sm mb-2">{{ $message }}</p> @enderror

                <input type="tel" name="phone" placeholder="Phone" 
                       class="input-box mb-4" value="{{ old('phone') }}">
                @error('phone') <p class="text-red-600 text-sm mb-2">{{ $message }}</p> @enderror

                <input type="text" name="address" placeholder="Address" 
                       class="input-box mb-4" value="{{ old('address') }}">
                @error('address') <p class="text-red-600 text-sm mb-2">{{ $message }}</p> @enderror

                <input type="text" name="city" placeholder="City" 
                       class="input-box mb-4" value="{{ old('city') }}">
                @error('city') <p class="text-red-600 text-sm mb-2">{{ $message }}</p> @enderror

                <input type="text" name="zip" placeholder="ZIP" 
                       class="input-box mb-4" value="{{ old('zip') }}">
                @error('zip') <p class="text-red-600 text-sm mb-2">{{ $message }}</p> @enderror

                {{-- Payment --}}
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Payment</h2>

                <select name="paymentMethod" id="paymentMethod" class="input-box mb-4">
                    <option value="">Select Payment Method</option>
                    <option value="easypaisa" {{ old('paymentMethod') == 'easypaisa' ? 'selected' : '' }}>Easypaisa</option>
                    <option value="jazzcash" {{ old('paymentMethod') == 'jazzcash' ? 'selected' : '' }}>JazzCash</option>
                    <option value="bank" {{ old('paymentMethod') == 'bank' ? 'selected' : '' }}>Bank Transfer</option>
                </select>
                @error('paymentMethod') <p class="text-red-600 text-sm mb-2">{{ $message }}</p> @enderror

                {{-- Easypaisa / JazzCash --}}
                <div id="mobilePaymentFields" class="hidden">
                    <input type="text" name="accountNumber" placeholder="Account Number" 
                           class="input-box mb-4" value="{{ old('accountNumber') }}">
                    @error('accountNumber') <p class="text-red-600 text-sm mb-2">{{ $message }}</p> @enderror

                    <input type="text" name="accountName" placeholder="Account Name" 
                           class="input-box mb-4" value="{{ old('accountName') }}">
                    @error('accountName') <p class="text-red-600 text-sm mb-2">{{ $message }}</p> @enderror
                </div>

                {{-- Bank Transfer --}}
                <div id="bankFields" class="hidden">
                    <input type="text" name="cardNumber" placeholder="Card Number" 
                           class="input-box mb-4" value="{{ old('cardNumber') }}">
                    @error('cardNumber') <p class="text-red-600 text-sm mb-2">{{ $message }}</p> @enderror

                    <input type="text" name="cvv" placeholder="CVV" 
                           class="input-box mb-4" value="{{ old('cvv') }}">
                    @error('cvv') <p class="text-red-600 text-sm mb-2">{{ $message }}</p> @enderror

                    <input type="text" name="expiry" placeholder="Expiry Date (MM/YY)" 
                           class="input-box mb-4" value="{{ old('expiry') }}">
                    @error('expiry') <p class="text-red-600 text-sm mb-2">{{ $message }}</p> @enderror
                </div>

                {{-- Amount (always auto-filled from cart total) --}}
                <input type="number" name="amount" placeholder="Amount" id="amountField"
                       class="input-box mb-4 bg-gray-100 cursor-not-allowed" 
                       value="{{ session('cart') ? collect(session('cart'))->sum(fn($i) => $i['price'] * $i['quantity']) : 0 }}" readonly>
                @error('amount') <p class="text-red-600 text-sm mb-2">{{ $message }}</p> @enderror

                {{-- Upload Screenshot --}}
                <label class="block text-gray-700 font-medium">Upload Payment Screenshot</label>
                <input type="file" name="screenshot" accept="image/*" class="mb-4">
                @error('screenshot') <p class="text-red-600 text-sm mb-2">{{ $message }}</p> @enderror

                <button type="submit" class="btn-red mt-4">Confirm Order</button>
            </form>
        </div>

        {{-- Cart Summary --}}
        <div class="bg-gray-50 p-6 rounded-xl shadow-md border border-gray-200">
            <h3 class="font-bold text-lg mb-3">Your Cart</h3>

            @if(session('cart') && count(session('cart')) > 0)
                <ul class="divide-y divide-gray-200">
                    @php $total = 0; @endphp
                    @foreach(session('cart') as $id => $item)
                        @php $total += $item['price'] * $item['quantity']; @endphp
                        <li class="py-2 flex justify-between">
                            <span>{{ $item['name'] }} x {{ $item['quantity'] }}</span>
                            <span>Rs {{ $item['price'] * $item['quantity'] }}</span>
                        </li>
                    @endforeach
                </ul>
                <div class="mt-3 font-bold text-right">Total: Rs {{ $total }}</div>
            @else
                <p class="text-gray-500">No products selected</p>
            @endif
        </div>
    </div>
</div>

{{-- JS to toggle payment fields --}}
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const paymentMethod = document.getElementById("paymentMethod");
        const mobilePaymentFields = document.getElementById("mobilePaymentFields");
        const bankFields = document.getElementById("bankFields");

        function toggleFields() {
            mobilePaymentFields.classList.add("hidden");
            bankFields.classList.add("hidden");

            if (paymentMethod.value === "easypaisa" || paymentMethod.value === "jazzcash") {
                mobilePaymentFields.classList.remove("hidden");
            } else if (paymentMethod.value === "bank") {
                bankFields.classList.remove("hidden");
            }
        }

        paymentMethod.addEventListener("change", toggleFields);
        toggleFields(); // run on page load
    });
</script>
@endsection
