<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tagihan;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $data = Tagihan::select(
            DB::raw("DATE_FORMAT(periode_tagihan, '%Y-%m') as periode"),
            DB::raw('COUNT(*) as total_tagihan'),
            DB::raw('SUM(nominal_tagihan) as total_nominal')
        )
        ->groupBy(DB::raw("DATE_FORMAT(periode_tagihan, '%Y-%m')"))
        ->orderBy('periode', 'asc')
        ->get();

        $totalPelanggan = Pelanggan::count();
        $pelangganAktif = Pelanggan::where('status_pelanggan', 'aktif')->count();
        $pelangganSuspend = Pelanggan::where('status_pelanggan', 'suspend')->count();
        $pelangganPutus = Pelanggan::where('status_pelanggan', 'putus')->count();
        $totalTagihanSudahBayar = Tagihan::where('status_pembayaran', 'lunas')->sum('nominal_tagihan');
        $totalTagihanBelumBayar = Tagihan::where('status_pembayaran', 'belum lunas')->sum('nominal_tagihan');
        $total = $pelangganAktif + $pelangganSuspend + $pelangganPutus;
        $aktifPercent = $total ? ($pelangganAktif / $total) * 100 : 0;
        $suspendPercent = $total ? ($pelangganSuspend / $total) * 100 : 0;
        $putusPercent = $total ? ($pelangganPutus / $total) * 100 : 0;

        return view('dashboard', compact('data', 'totalPelanggan', 'pelangganAktif', 'pelangganSuspend', 'pelangganPutus', 'totalTagihanSudahBayar', 'totalTagihanBelumBayar', 'aktifPercent', 'suspendPercent', 'putusPercent'));
    }
}
