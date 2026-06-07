<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tagihan;
use App\Models\Pelanggan;

class TagihanController extends Controller
{
    //
    public function index(Request $request)
    {
        $query = Tagihan::query();

        if ($request->sort && $request->direction) {
            $query->orderBy($request->sort, $request->direction);
        } else {
            $query->latest();
        }
        $pelanggans = Pelanggan::all();
        $tagihans = Tagihan::with('pelanggan')->paginate(10);
        return view('tagihan.index', compact('tagihans', 'pelanggans'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'periode_tagihan' => 'required|string|max:255',
            'nominal_tagihan' => 'required|numeric',
            'status_pembayaran' => 'required|string|in:lunas,belum lunas',
            'tanggal_pembayaran' => 'required|date'
        ]);

        Tagihan::create($request->all());

        return redirect()->route('tagihan.index')->with('success', 'Tagihan berhasil ditambahkan.');
    }
    public function update(Request $request, $id)
    {
        $tagihan = Tagihan::findOrFail($id);
        $tagihan->update([
            'status_pembayaran' => 'lunas',
            'tanggal_pembayaran' => now(),
        ]);
        return redirect()->route('tagihan.index')->with('success', 'Tagihan berhasil diperbarui.');
    }
    public function destroy($id)
    {
        $tagihan = Tagihan::findOrFail($id);
        $tagihan->delete();

        return redirect()->route('tagihan.index')->with('success', 'Tagihan berhasil dihapus.');
    }
}
