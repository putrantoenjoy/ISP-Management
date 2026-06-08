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
        $query = Tagihan::with('pelanggan');

        if ($request->sort && $request->direction) {
            if ($request->sort == 'pelanggan.nama') {
                $query->join('pelanggans', 'tagihans.pelanggan_id', '=', 'pelanggans.id')
                    ->orderBy('pelanggans.nama_pelanggan', $request->direction)
                    ->select('tagihans.*');
            } else {
                $query->orderBy($request->sort, $request->direction);
            }
        } else {
            $query->latest();
        }
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->whereHas('pelanggan', function ($q2) use ($request) {
                    $q2->where('nama_pelanggan', 'like', '%' . $request->search . '%');
                });
            });
        }
        $tagihans = $query->paginate(10)->withQueryString();;

        return view('tagihan.index', compact('tagihans'));
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
        if(auth()->user()->role === 'admin') {
        $tagihan = Tagihan::findOrFail($id);
        $tagihan->update([
            'status_pembayaran' => 'lunas',
            'tanggal_pembayaran' => now(),
        ]);
            return redirect()->route('tagihan.index')->with('success', 'Tagihan berhasil diperbarui.');
        }else{
            return redirect()->route('tagihan.index')->with('error', 'Anda tidak memiliki izin untuk melakukan tindakan ini.');
        }
    }
    public function destroy($id)
    {
        $tagihan = Tagihan::findOrFail($id);
        $tagihan->delete();

        return redirect()->route('tagihan.index')->with('success', 'Tagihan berhasil dihapus.');
    }
}
