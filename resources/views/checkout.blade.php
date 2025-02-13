@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen">
    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow">

        <!-- Domain & Duration Selection -->
        <h2 class="text-xl font-semibold">{{ $domain ?? '-' }}</h2>
        <select id="durationSelect" class="w-full mt-2 p-2 border border-gray-300 rounded">
            <option value="1">1 Tahun</option>
            <option value="2">2 Tahun</option>
            <option value="3">3 Tahun</option>
        </select>

        <!-- Total Price -->
        <div class="flex items-center justify-between mt-3 p-2 border border-gray-300 rounded">
            <span>📦 Total</span>
            <span id="totalPrice" class="font-semibold">Rp 100.000</span>
        </div>

        <div class="mt-4">
            @auth
                <!-- Authenticated User View -->
                <p><strong>Nama:</strong> {{ Auth::user()->name }}</p>
                <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
            @else
                <!-- Guest User View (Login/Signup Form) -->
                <div class="mt-3">
                    <label class="block">Nama:</label>
                    <input id="name" type="text" class="w-full p-2 border border-gray-300 rounded" placeholder="Masukkan nama">

                    <label class="block mt-2">Email:</label>
                    <input id="email" type="email" class="w-full p-2 border border-gray-300 rounded" placeholder="Masukkan email">

                    <label class="block mt-2">Password:</label>
                    <input id="password" type="password" class="w-full p-2 border border-gray-300 rounded" placeholder="Buat password">

                    <p class="mt-2 text-sm">atau login <a href="{{ route('view.login') }}" class="text-blue-500">disini</a></p>
                </div>
            @endauth
        </div>

        <!-- Checkout Form -->
        <form id="checkoutForm" method="POST" action="/purchase">
            @csrf
            <input type="hidden" name="name" id="formName">
            <input type="hidden" name="email" id="formEmail">
            <input type="hidden" name="password" id="formPassword">
            <input type="hidden" name="domain" value="{{ $domain }}">
            <input type="hidden" name="duration" id="formDuration">
            <input type="hidden" name="totalPrice" id="formTotalPrice">
            <button type="submit" id="checkOutBtn" class="mt-4 w-full p-2 bg-black text-white rounded">CHECKOUT</button>
        </form>

    </div>
</div>

<script>
document.getElementById('durationSelect').addEventListener('change', function () {
    let duration = parseInt(this.value);
    let pricePerYear = 100000;
    let totalPrice = duration * pricePerYear;
    document.getElementById('totalPrice').textContent = `Rp ${totalPrice.toLocaleString('id-ID')}`;
});

document.getElementById('checkOutBtn').addEventListener('click', function (event) {
    event.preventDefault(); // Prevent the default form submission

    let name = document.getElementById('name') ? document.getElementById('name').value : '{{ Auth::user()?->name }}';
    let email = document.getElementById('email') ? document.getElementById('email').value : '{{ Auth::user()?->email }}';
    let password = document.getElementById('password') ? document.getElementById('password').value : '';
    let duration = document.getElementById('durationSelect').value;
    let totalPrice = document.getElementById('totalPrice').textContent;

    document.getElementById('formName').value = name;
    document.getElementById('formEmail').value = email;
    document.getElementById('formPassword').value = password;
    document.getElementById('formDuration').value = duration;
    document.getElementById('formTotalPrice').value = totalPrice;

    document.getElementById('checkoutForm').submit(); // Submit the form
});
</script>
@endsection
