<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Data Barang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">

            <div class="mt-5 md:mt-0 md:col-span-2">
                <form action="{{ route('barang.store') }}" method="POST">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="nama_barang" class="block font-medium text-sm text-gray-700">Nama Barang</label>
                            <input type="text" name="nama_barang" id="nama_barang" class="form-input rounded-md shadow-sm mt-1 block w-full" required />
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="stok" class="block font-medium text-sm text-gray-700">Stok</label>
                            <input type="number" name="stok" id="stok" class="form-input rounded-md shadow-sm mt-1 block w-full" required />
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="jumlah_terjual" class="block font-medium text-sm text-gray-700">Jumlah Terjual</label>
                            <input type="number" name="jumlah_terjual" id="jumlah_terjual" class="form-input rounded-md shadow-sm mt-1 block w-full" required />
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="tanggal_transaksi" class="block font-medium text-sm text-gray-700">Tanggal Transaksi</label>
                            <input type="date" name="tanggal_transaksi" id="tanggal_transaksi" class="form-input rounded-md shadow-sm mt-1 block w-full" required />
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="jenis_barang" class="block font-medium text-sm text-gray-700">Jenis Barang</label>
                            <input type="text" name="jenis_barang" id="jenis_barang" class="form-input rounded-md shadow-sm mt-1 block w-full" required />
                        </div>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-sm text-white hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-200 active:bg-blue-800">
                                Simpan
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

</x-app-layout>
