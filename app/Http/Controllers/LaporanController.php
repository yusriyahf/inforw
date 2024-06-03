<?php

namespace App\Http\Controllers;

use App\Models\LaporanModel;
use App\Models\PemasukanModel;
use App\Models\PengeluaranModel;
use Illuminate\Http\Request;

class LaporanController extends Controller
{

    public function index(Request $request)
    {
        $tanggal = $request->input('tanggal', now()->format('Y-m')); // Ambil tanggal dari form 
        $pemasukan = PemasukanModel::where('rt', auth()->user()->getkeluarga->getrt->rt_id)
            ->whereYear('tanggal', '=', date('Y', strtotime($tanggal)))
            ->whereMonth('tanggal', '=', date('m', strtotime($tanggal)))
            ->get();

        $totalPemasukan = PemasukanModel::where('rt', auth()->user()->getkeluarga->getrt->rt_id)
            ->whereYear('tanggal', '=', date('Y', strtotime($tanggal)))
            ->whereMonth('tanggal', '=', date('m', strtotime($tanggal)))
            ->sum('jumlah');

        $pengeluaran = PengeluaranModel::where('rt',  auth()->user()->getkeluarga->getrt->rt_id)
            ->whereYear('tanggal', '=', date('Y', strtotime($tanggal)))
            ->whereMonth('tanggal', '=', date('m', strtotime($tanggal)))
            ->get();

        $totalPengeluaran = PengeluaranModel::where('rt', auth()->user()->getkeluarga->getrt->rt_id)
            ->whereYear('tanggal', '=', date('Y', strtotime($tanggal)))
            ->whereMonth('tanggal', '=', date('m', strtotime($tanggal)))
            ->sum('jumlah');

        $total = $totalPemasukan - $totalPengeluaran;
        $breadcrumb = (object) [
            'title' => 'Laporan',
            'list' => ['Pages', 'Laporan']
        ];

        return view('laporan.index', [
            'breadcrumb' => $breadcrumb,
            'pengeluaran' => $pengeluaran,
            'pemasukan' => $pemasukan,
            'totalPemasukan' => $totalPemasukan,
            'totalPengeluaran' => $totalPengeluaran,
            'total' => $total,
            'tanggal' => $tanggal,
        ]);
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(LaporanModel $laporanModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LaporanModel $laporanModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LaporanModel $laporanModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LaporanModel $laporanModel)
    {
        //
    }
}
