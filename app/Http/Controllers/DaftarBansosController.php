<?php

namespace App\Http\Controllers;

use App\Models\BansosModel;
use App\Models\KeluargaModel;
use App\Models\KriteriaModel;
use App\Models\PendaftarBansosModel;
use App\Models\PendaftarKriteria;
use App\Models\SubKriteriaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DaftarBansosController extends Controller
{
    public function index(){
        $breadcrumb = (object) [
            'title' => 'Bansos',
            'list' => ['Pages', 'Bansos']
        ];
        $tglSaatIni = now();
        $data = BansosModel::where('tgl_akhir_daftar', '>=', $tglSaatIni)->get();
        $pendaftar = PendaftarBansosModel::where('user_id', Auth::id())->get();
        if (KeluargaModel::where('kepala_keluarga', Auth::id())->exists()) {
            $isKepala = true;
        }else{
            $isKepala = false;
        }
        // dd($isKepala);
        return view('daftarBansos.index', [
            'breadcrumb' => $breadcrumb,
            'data' => $data,
            'pendaftar' => $pendaftar,
            'kepala' => $isKepala
        ]);
    }

    public function daftar($bansos_id){
        // dd($bansos_id);
        $breadcrumb = (object) [
            'title' => 'Daftar Bansos',
            'list' => ['Pages', 'Bansos','Daftar']
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
        $request->validate([
            
        ]);

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
