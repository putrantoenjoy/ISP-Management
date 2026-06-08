<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    //
    public function index(Request $request)
    {
        $query = Pelanggan::query();

        if ($request->sort && $request->direction) {
            $query->orderBy($request->sort, $request->direction);
        } else {
            $query->latest();
        }
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('nama_pelanggan', 'like', '%' . $request->search . '%');
            });
        }
        $pelanggans = $query->paginate(10)->withQueryString();
        return view('pelanggan.index', compact('pelanggans'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
            'paket_internet' => 'required|string|max:255',
            'harga_paket' => 'required|numeric',
            'status_pelanggan' => 'required|string|in:aktif,suspend,putus'
        ]);

        Pelanggan::create($request->all());

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil ditambahkan.');
    }
    public function update(Request $request, $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
            'paket_internet' => 'required|string|max:255',
            'harga_paket' => 'required|numeric',
            'status_pelanggan' => 'required|string|in:aktif,suspend,putus'
        ]);

        $pelanggan->update($request->all());

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil diperbarui.');
    }
    public function destroy($id)
    {
        if(auth()->user()->role === 'admin') {
            $pelanggan = Pelanggan::findOrFail($id);
            $pelanggan->delete();
            return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil dihapus.');
        } else {
            return redirect()->route('pelanggan.index')->with('error', 'Anda tidak memiliki izin untuk melakukan tindakan ini.');
        }
    }
}
