@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen">
    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow">

        <h2 class="text-xl font-semibold text-center mb-4">Login</h2>

        @if (session('error'))
            <div class="p-2 mb-3 text-red-600 bg-red-100 rounded">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <label class="block">Email :</label>
            <input type="email" name="email" class="w-full p-2 border border-gray-300 rounded" placeholder="Masukkan email" required>

            <label class="block mt-2">Password :</label>
            <input type="password" name="password" class="w-full p-2 border border-gray-300 rounded" placeholder="Masukkan password" required>

            <button type="submit" class="mt-4 w-full p-2 bg-black text-white rounded">LOGIN</button>
        </form>
    </div>
</div>
@endsection
