<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function index(Request $request)
    {
        $query = Barang::query();

        // Logika sorting
        if ($request->sort == 'jumlah_terjual') {
            $query->orderBy('jumlah_terjual', 'desc');
        } elseif ($request->sort == 'stok') {
            $query->orderBy('stok', 'desc');
        } elseif ($request->sort == 'nama_barang') {
            $query->orderBy('nama_barang', 'asc');
        }

        // Logika filtering
        if ($request->dari && $request->sampai) {
            $query->whereBetween('tanggal_transaksi', [
                $request->dari, $request->sampai
            ]);
        }

        // Logika pencarian
        if ($request->has('search')) {
            $query->where('nama_barang', 'like', '%' . $request->search . '%');
        }

        $barang = $query->paginate(10);

        return view('barang.index', compact('barang'));
    }

    public function create()
    {
        return view('barang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'stok' => 'required|numeric',
            'jumlah_terjual' => 'required|numeric',
            'tanggal_transaksi' => 'required|date',
            'jenis_barang' => 'required',
            // Tambahkan validasi lain jika diperlukan
        ]);

        Barang::create($request->all());
        return redirect()->route('barang.index');
    }

    public function show($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.show', compact('barang'));
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required',
            'stok' => 'required|numeric',
            'jumlah_terjual' => 'required|numeric',
            'tanggal_transaksi' => 'required|date',
            'jenis_barang' => 'required',
            // Tambahkan validasi lain jika diperlukan
        ]);

        $barang = Barang::findOrFail($id);
        $barang->update($request->all());
        return redirect()->route('barang.index');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return redirect()->route('barang.index');
    }
}
