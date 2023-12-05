<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800"> 
            {{ __('Data Barang') }}  
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">

            <div class="flex justify-between items-center mb-4">
                
                <form action="{{ route('barang.index') }}" method="GET">                   
                    <div class="flex gap-2">
                        <input type="text" name="search" placeholder="Cari..."  
                        class="input input-bordered flex-1 bg-slate-300" 
                        value="{{ request('search') }}">
                        
                        <button class="btn bg-blend-darken text-white">Search</button>  
                    </div>
                </form> 
                
                <div class="flex gap-2">

   <a href="{{ request()->fullUrlWithQuery(['sort' => 'stok']) }}"
      class="btn btn-warning">
    Stok Terbanyak
   </a>

   <a href="{{ request()->fullUrlWithQuery(['sort' => 'jumlah_terjual']) }}"
      class="btn btn-warning">
       Terjual Terbanyak
   </a>

</div>

        <div>
        <!-- filter tanggal -->
        <form action="{{ route('barang.index') }}" method="GET">
            <label class="text-black">Dari</label>
            <input type="date" name="dari" value="{{ request('dari') }}" class="input input-m w-36">

            <label class="text-black">Sampai</label>
            <input type="date" name="sampai" value="{{ request('sampai') }}" class="input input-m w-36">

            <button type="submit" class="btn btn-info">Filter</button>
        </form>
        </div>
                <!-- filter -->
                <div class="flex gap-2">                  
                    @include('barang.filter')                

                    <a class="btn btn-error" href="{{ route('barang.index') }}">
                        Reset
                    </a>
                </div>

            </div>

            <div class="flex gap-2 m-3">                                 
                    <a class="btn btn-success text-white" href="{{ route('barang.create') }}">
                        Tambah Barang
                    </a>
                </div>

         <div class="overflow-x-auto w-full shadow-lg p-5 rounded-box" style="font-family: Inter">
    <table class="table table-pin-rows w-full align-middle">
        <thead>
            <tr>
                <th class="border px-6 py-4 text-purple-50">Nama Barang</th>
                <th class="border px-6 py-4 text-purple-50">Stok</th>
                <th class="border px-6 py-4 text-purple-50">Terjual</th>
                <th class="border px-6 py-4 text-purple-50">Tanggal Transaksi</th>
                <th class="border px-6 py-4 text-purple-50">Jenis</th>
                <th class="border px-6 py-4 text-purple-50">Aksi</th> <!-- Kolom untuk tombol edit dan hapus -->
            </tr>
        </thead>
   
        <tbody>
           @forelse($barang as $item) 
            <tr>
                <td class="border px-6 py-4 text-black">{{ $item->nama_barang }}</td>
                <td class="border px-6 py-4 text-black">{{ $item->stok }}</td>
                <td class="border px-6 py-4 text-black">{{ $item->jumlah_terjual }}</td>
                <td class="border px-6 py-4 text-black">{{ $item->tanggal_transaksi }}</td>
                <td class="border px-6 py-4 text-black">{{ $item->jenis_barang }}</td>
                <td class="border px-6 py-4 text-black">
                    <a href="{{ route('barang.edit', $item->id) }}" class="text-blue-500 hover:underline">Edit</a>
                    <!-- Ganti route dan warna sesuai kebutuhan Anda -->

                    <!-- Tombol untuk hapus dengan konfirmasi -->
                    <form action="{{ route('barang.destroy', $item->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6">
                    Data tidak ditemukan
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

            
            {{ $barang->links() }}

        </div>
    </div>

</x-app-layout>