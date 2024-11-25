<?php

namespace App\Http\Controllers;

use App\Models\SpModel;
use App\Models\SktmModel;
use Illuminate\Http\Request;
use App\Models\PengaduanModel;
use App\Models\PengumumanModel;
use Illuminate\Support\Facades\Gate;

class SuratController extends Controller
{

    public function index()
    {
        // $datasktm = SktmModel::where('user', auth()->user()->user_id)->get();
        // $datasp = SpModel::where('user', auth()->user()->user_id)->get();

        $breadcrumb = (object) [
            'title' => 'Surat',
            'list' => ['Pages', 'Surat']
        ];

        if (Gate::allows('is-warga')) {
            $notifPengumuman = PengumumanModel::orderBy('created_at', 'desc')->take(3)->get();
        } elseif (Gate::allows('is-rt')) {
            $notifPengaduan = PengaduanModel::orderBy('created_at', 'desc')->take(3)->get();
            $notifSktm = SktmModel::orderBy('created_at', 'desc')->take(3)->get();
            $notifSp = SpModel::orderBy('created_at', 'desc')->take(3)->get();
        } elseif (Gate::allows('is-sekretaris')){
            $datasktm = SktmModel::with(['users'])->get();
            $datasp = SpModel::with('users')->get();
        }

        return view('surat.index', [
            'breadcrumb' => $breadcrumb,
            'datasktm' => $datasktm,
            'datasp' => $datasp,
            'breadcrumb' => $breadcrumb,
            'notifPengumuman' => (Gate::allows('is-warga')) ? $notifPengumuman : null,
            'notifPengaduan' => (Gate::allows('is-rt')) ? $notifPengaduan : null,
            'notifSktm' => (Gate::allows('is-rt')) ? $notifSktm : null,
            'notifSp' => (Gate::allows('is-rt')) ? $notifSp : null,
        ]);
    }

    public function sp()
    {
        $breadcrumb = (object) [
            'title' => 'Pengajuan',
            'list' => ['Pages', 'Surat', 'Pengajuan']
        ];

        return view('surat.sp.create', [
            'breadcrumb' => $breadcrumb
        ]);
    }

    public function storesp(Request $request)
    {
        $validatedData = $request->validate([
            'user' => 'required',
            'nama' => 'required|max:30',
            'jenis_kelamin' => 'required',
            'pekerjaan' => 'required|max:30',
            'nik' => 'required|numeric|digits:12',
            'status_perkawinan' => 'required',
            'keperluan' => ['required', function ($attribute, $value, $fail) {
                if (str_word_count($value) > 225) {
                    $fail('The ' . $attribute . ' must not exceed 225 words.');
                }
            }],
            'rt' => 'required',
        ]);

        SpModel::create($validatedData);

        return redirect('/surat')->with('successsp', 'Surat Pengantar Berhasil Diajukan');
    }

    public function showsp(string $id)
    {
        $data = SpModel::where('sp_id', $id)->first();

        $breadcrumb = (object) [
            'title' => 'Detail',
            'list' => ['Pages', 'Surat', 'Detail']
        ];

        return view('surat.sp.show', [
            'breadcrumb' => $breadcrumb,
            'data' => $data
        ]);
    }

    public function sktm()
    {
        $breadcrumb = (object) [
            'title' => 'Pengajuan',
            'list' => ['Pages', 'Surat', 'Pengajuan']
        ];

        return view('surat.sktm.create', [
            'breadcrumb' => $breadcrumb
        ]);
    }

    public function showsktm(string $id)
    {
        $data = SktmModel::where('sktm_id', $id)->first();

        $breadcrumb = (object) [
            'title' => 'Detail',
            'list' => ['Pages', 'Surat', 'Detail']
        ];
        return view('surat.sktm.show', [
            'breadcrumb' => $breadcrumb,
            'data' => $data
        ]);
    }

    public function storesktm(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:30',
            'user' => 'required',
            'nik' => 'required|numeric|digits:12',
            'rt' => 'required',
            'no_kk' => 'required|numeric|digits:12',
            'jenis_kelamin' => 'required',
            'status_perkawinan' => 'required',
            'pekerjaan' => 'required|max:30',
            'keperluan' => ['required', function ($attribute, $value, $fail) {
                if (str_word_count($value) > 225) {
                    $fail('The ' . $attribute . ' must not exceed 225 words.');
                }
            }],
        ]);

        SktmModel::create($validatedData);

        return redirect('/surat')->with('successsktm', 'SKTM Berhasil Diajukan');
    }
}
