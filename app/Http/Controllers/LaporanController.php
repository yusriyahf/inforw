<?php

namespace App\Http\Controllers;

use App\Models\SpModel;
use App\Models\SktmModel;
use App\Models\LaporanModel;
use Illuminate\Http\Request;
use App\Models\PemasukanModel;
use App\Models\PengaduanModel;
use App\Models\PengumumanModel;
use App\Models\PengeluaranModel;
use Illuminate\Support\Facades\Gate;

class LaporanController extends Controller
{

    public function index(Request $request)
    {
        if (Gate::allows('is-rw')) {
            $tanggal = $request->input('tanggal', now()->format('Y-m')); // Ambil tanggal dari form 
            $pemasukan = PemasukanModel::whereYear('tanggal', '=', date('Y', strtotime($tanggal)))
                           ->whereMonth('tanggal', '=', date('m', strtotime($tanggal)))
                           ->get();

    
            $totalPemasukan = PemasukanModel::whereYear('tanggal', '=', date('Y', strtotime($tanggal)))
                ->whereMonth('tanggal', '=', date('m', strtotime($tanggal)))
                ->sum('jumlah');
    
            $pengeluaran = PengeluaranModel::whereYear('tanggal', '=', date('Y', strtotime($tanggal)))
                ->whereMonth('tanggal', '=', date('m', strtotime($tanggal)))
                ->get();
    
            $totalPengeluaran = PengeluaranModel::whereYear('tanggal', '=', date('Y', strtotime($tanggal)))
                ->whereMonth('tanggal', '=', date('m', strtotime($tanggal)))
                ->sum('jumlah');
    
            $total = $totalPemasukan - $totalPengeluaran;

        } else {
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
        }
        $breadcrumb = (object) [
            'title' => 'Laporan',
            'list' => ['Pages', 'Laporan']
        ];

        if (Gate::allows('is-warga')) {
            $notifPengumuman = PengumumanModel::orderBy('created_at', 'desc')->take(3)->get();
        } elseif (Gate::allows('is-rt')) {
            $notifPengaduan = PengaduanModel::orderBy('created_at', 'desc')->take(3)->get();
            $notifSktm = SktmModel::orderBy('created_at', 'desc')->take(3)->get();
            $notifSp = SpModel::orderBy('created_at', 'desc')->take(3)->get();
        }

        return view('laporan.index', [
            'breadcrumb' => $breadcrumb,
            'pengeluaran' => $pengeluaran,
            'pemasukan' => $pemasukan,
            'totalPemasukan' => $totalPemasukan,
            'totalPengeluaran' => $totalPengeluaran,
            'total' => $total,
            'tanggal' => $tanggal,
            'notifPengumuman' => (Gate::allows('is-warga')) ? $notifPengumuman : null,
            'notifPengaduan' => (Gate::allows('is-rt')) ? $notifPengaduan : null,
            'notifSktm' => (Gate::allows('is-rt')) ? $notifSktm : null,
            'notifSp' => (Gate::allows('is-rt')) ? $notifSp : null,
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
