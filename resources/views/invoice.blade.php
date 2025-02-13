@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen">
    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow">

        <!-- Invoice Header -->
        <div class="mb-4">
            <p><strong>No Invoice : #{{ rand(100000, 999999) }}</strong></p>
            <h2 class="text-right text-2xl font-bold text-red-500">UNPAID</h2>
        </div>

        <!-- Customer Information -->
        <div class="mb-4">
            <p><strong>{{ $invoice->name }}</strong></p>
            <p>{{ $invoice->email }}</p>
        </div>

        <!-- Invoice Table -->
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 p-2">No</th>
                    <th class="border border-gray-300 p-2">Deskripsi</th>
                    <th class="border border-gray-300 p-2">Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border border-gray-300 p-2 text-center">1</td>
                    <td class="border border-gray-300 p-2">Pembelian domain {{ $invoice->domain }}</td>
                    <td class="border border-gray-300 p-2 text-right">{{ $invoice->totalPrice }}</td>
                </tr>
            </tbody>
        </table>

        <!-- Total Amount -->
        <div class="mt-4 text-right text-lg font-bold">
            Total : {{ $invoice->totalPrice }}
        </div>

        <!-- Payment Instructions -->
        <div class="mt-4 text-center">
            <p>Silahkan bayar di no rekening berikut ini :</p>
            <p class="font-bold text-lg">27890945765</p>
        </div>

    </div>
</div>
@endsection
