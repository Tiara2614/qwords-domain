@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen">
    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow">
        <label for="domain" class="block mb-2 text-gray-700">Cari domain contoh: example.com</label>
        <input type="text" id="domain" class="w-full p-2 border border-gray-300 rounded" placeholder="Cari domain contoh: example.com">
        <button id="searchBtn" class="mt-3 w-full p-2 bg-black text-white rounded">CARI</button>

        <div id="result" class="mt-4 text-center hidden">
            <p class="text-green-600 font-semibold">Selamat, domain anda tersedia</p>
            <button id="checkoutBtn" class="mt-2 p-2 bg-black text-white rounded">PESAN</button>
        </div>

        <div id="notAvailable" class="mt-4 text-center hidden text-red-600">
            <p>Maaf, domain sudah terdaftar.</p>
        </div>
    </div>
</div>

<script>
document.getElementById('searchBtn').addEventListener('click', function () {
    let domain = document.getElementById('domain').value;
    if (!domain) {
        alert('Masukkan nama domain terlebih dahulu.');
        return;
    }

    let apiUrl = `/api/check-domain?domain=${domain}`; // Use Laravel API

    fetch(apiUrl)
        .then(response => response.json())
        .then(data => {
            if (data.status === "available") {
                document.getElementById('result').classList.remove('hidden');
                document.getElementById('notAvailable').classList.add('hidden');
            } else {
                document.getElementById('notAvailable').classList.remove('hidden');
                document.getElementById('result').classList.add('hidden');
            }
        })
        .catch(error => {
            console.error("Error fetching domain data:", error);
            alert("Terjadi kesalahan saat memeriksa domain.");
        });
});

document.getElementById('checkoutBtn').addEventListener('click', function () {
    let domain = document.getElementById('domain').value;
    window.location.href = `/checkout?domain=${domain}`;
});
</script>
@endsection
