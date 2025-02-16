@extends('layouts.sidebar')

@section('content')

<div class="flex-1 p-10 bg-white shadow-md rounded-lg"> 
    <div class="max-w-6xl mx-auto">
        <h1 class="text-2xl font-bold mb-4">All Order Laundry</h1>
        <hr class="mb-4">

        <!-- Search & Total -->
        <div class="flex justify-between items-center mb-4">
            <span class="text-lg font-semibold">
                TOTAL: {{ isset($resultDate) ? count($resultDate) : count($datas) }}
            </span>
            <form action="{{ route('search.date') }}" method="GET" class="flex items-center space-x-2">
                <input type="date" name="date" id="date" class="px-3 py-2 border rounded-md">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md flex items-center gap-2">
                    <span class="material-symbols-outlined">Search</span>
                </button>
            </form>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto bg-gray-50 p-4 rounded-md">
            <table class="w-full border-collapse border border-gray-200">
                <thead class="bg-blue-500 text-white">
                    <tr>
                        <th class="p-3 border">Nama Pemesan</th>
                        <th class="p-3 border">Nomor Telepon</th>
                        <th class="p-3 border">Total Berat (KG)</th>
                        <th class="p-3 border">Total Harga</th>
                        <th class="p-3 border">Tanggal</th>
                        <th class="p-3 border">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($resultDate) && count($resultDate) == 0)
                        <tr>
                            <td colspan="6" class="text-center p-4 text-gray-500">Data Tidak Ditemukan</td>
                        </tr>
                    @else
                        @foreach ($resultDate ?? $datas as $data)
                        <tr class="hover:bg-gray-100">
                            <td class="p-3 border">{{ $data->nama }}</td>
                            <td class="p-3 border">+62 {{ $data->noHp }}</td>
                            <td class="p-3 border">{{ $data->total_berat }} KG</td>
                            <td class="p-3 border">Rp {{ number_format($data->total_harga, 0, ',' , '.') }}</td>
                            <td class="p-3 border">{{ $data->created_at->format('d-m-y') }}</td>
                            <td class="p-3 border">{{ $data->status }}</td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div> 
@endsection
