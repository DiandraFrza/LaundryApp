@extends('layouts.sidebar')

@section('content')

<div class="flex-1 p-10 bg-white shadow-md rounded-lg"> 
    <div class="max-w-6xl mx-auto">
        <h1 class="text-2xl font-bold text-blue-600 mb-4">Order Input</h1>
        <hr class="border-gray-300 mb-6">

        <!-- Table -->
        <div class="overflow-x-auto bg-gray-50 p-4 rounded-md">
            <table class="w-full border-collapse border border-gray-200">
                <thead class="bg-blue-500 text-white">
                    <tr>
                        <th class="p-3 border text-left">Nama Pemesan</th>
                        <th class="p-3 border text-left">Nomor Telepon</th>
                        <th class="p-3 border text-center">Total Berat (KG)</th>
                        <th class="p-3 border text-center">Total Harga</th>
                        <th class="p-3 border text-center">Tanggal</th>
                        <th class="p-3 border text-center">Status</th>
                        <th class="p-3 border text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($datas as $data)
                    <tr class="hover:bg-gray-100">
                        <td class="p-3 border text-left whitespace-nowrap">{{ $data->nama }}</td>
                        <td class="p-3 border text-center whitespace-nowrap">+62 {{ $data->noHp }}</td>
                        <td class="p-3 border text-center whitespace-nowrap">{{ $data->total_berat }} KG</td>
                        <td class="p-3 border text-center whitespace-nowrap">Rp {{ number_format($data->total_harga, 0, ',' , '.') }}</td>
                        <td class="p-3 border text-center whitespace-nowrap">{{ $data->created_at->format('d-m-y') }}</td>
                        <td class="p-3 border text-center whitespace-nowrap">
                            <span class="px-2 py-1 text-sm font-semibold rounded 
                                {{ $data->status == 'Selesai' ? 'bg-green-200 text-green-800' : 'bg-yellow-200 text-yellow-800' }}">
                                {{ $data->status }}
                            </span>
                        </td>
                        <td class="p-3 border flex justify-center space-x-2">
                            <a href="{{ route('edit', $data->id) }}" class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">
                                Edit
                            </a>
                            <form action="{{ route('delete', $data->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> 

@endsection
