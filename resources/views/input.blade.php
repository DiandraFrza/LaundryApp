@extends('layouts.sidebar')

@section('content')

<div class="p-8">
    <h1 class="text-2xl font-bold text-blue-600 mb-4">Order Input</h1>
    <hr class="border-gray-300 mb-6">

    <div class="bg-white shadow-md rounded-lg p-6 w-full max-w-3xl mx-auto">
        <form action="{{ route('store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="nama" class="block font-medium text-gray-700">Nama</label>
                <input type="text" id="nama" name="nama" required 
                    class="w-full p-2 border rounded focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan Nama">
            </div>

            <div class="mb-4">
                <label for="noHp" class="block font-medium text-gray-700">Nomor HP</label>
                <input type="number" id="noHp" name="noHp" required 
                    class="w-full p-2 border rounded focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan Nomor HP">
            </div>

            <div class="mb-6">
                <label for="totalBerat" class="block font-medium text-gray-700">Total Berat (KG)</label>
                <input type="number" id="totalBerat" name="totalBerat" required 
                    class="w-full p-2 border rounded focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan Total Berat">
            </div>

            <div class="flex justify-end">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
