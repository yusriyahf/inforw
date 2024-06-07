<?php

namespace App\Http\Controllers;

use App\Models\SpModel;
use App\Models\SktmModel;
use App\Models\BansosModel;
use Illuminate\Http\Request;
use App\Models\KeluargaModel;
use App\Models\KriteriaModel;
use App\Models\PengaduanModel;
use App\Models\PengumumanModel;
use App\Models\SubKriteriaModel;
use App\Models\PendaftarKriteria;
use App\Models\PendaftarBansosModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class DaftarBansosController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Bansos',
            'list' => ['Pages', 'Bansos']
        ];

        if (Gate::allows('is-warga')) {
            $notifPengumuman = PengumumanModel::orderBy('created_at', 'desc')->take(3)->get();
        } elseif (Gate::allows('is-rt')) {
            $notifPengaduan = PengaduanModel::orderBy('created_at', 'desc')->take(3)->get();
            $notifSktm = SktmModel::orderBy('created_at', 'desc')->take(3)->get();
            $notifSp = SpModel::orderBy('created_at', 'desc')->take(3)->get();
        }

        $tglSaatIni = now();
        $data = BansosModel::where('tgl_akhir_daftar', '>=', $tglSaatIni)->get();
        $pendaftar = PendaftarBansosModel::where('user_id', Auth::id())->get();
        if (KeluargaModel::where('kepala_keluarga', Auth::id())->exists()) {
            $isKepala = true;
        } else {
            $isKepala = false;
        }
        // dd($isKepala);
        return view('daftarBansos.index', [
            'breadcrumb' => $breadcrumb,
            'data' => $data,
            'pendaftar' => $pendaftar,
            'kepala' => $isKepala,
            'notifPengumuman' => (Gate::allows('is-warga')) ? $notifPengumuman : null,
            'notifPengaduan' => (Gate::allows('is-rt')) ? $notifPengaduan : null,
            'notifSktm' => (Gate::allows('is-rt')) ? $notifSktm : null,
            'notifSp' => (Gate::allows('is-rt')) ? $notifSp : null,
        ]);
    }

    public function daftar($bansos_id)
    {
        // dd($bansos_id);
        $breadcrumb = (object) [
            'title' => 'Daftar Bansos',
            'list' => ['Pages', 'Bansos', 'Daftar']
        ];

        // dd($pendaftar);

        $kriterias = BansosModel::with('kriteria.sub_kriteria')->find($bansos_id);
        // dd($bansos->kriteria);

        return view('daftarBansos.daftarBansos', [
            'breadcrumb' => $breadcrumb,
            'kriterias' => $kriterias,
            'bansos_id' => $bansos_id
        ]);
    }

    public function store($bansos_id, Request $request)
    {
        $request->validate([]);

        $pendaftar = PendaftarBansosModel::create([
            'user_id' => Auth::id(),
            'bansos_id' => $bansos_id,
            'status' => 'diproses'
        ]);
        // dd($pendaftar->pendaftar_id);
        $input = $request->all();
        // dd($input);

        foreach ($input as $key => $value) {
            if ($key != '_token') {
                $subKriteria = SubKriteriaModel::find($value);

                if ($subKriteria) {
                    PendaftarKriteria::create([
                        'pendaftar_id' => $pendaftar->pendaftar_id,
                        'sub_kriteria_id' => $value
                    ]);
                }
            }
        }

        return redirect('/daftarBansos')->with('success', 'Pendaftaran Berhasil, Mohon Tunggu Informasi Selanjutnya');
    }
}
