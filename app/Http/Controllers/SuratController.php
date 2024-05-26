<?php

namespace App\Http\Controllers;

use App\Models\SktmModel;
use App\Models\SpModel;
use Illuminate\Http\Request;

class SuratController extends Controller
{

    public function index()
    {
        $datasktm = SktmModel::where('user', auth()->user()->user_id)->get();
        $datasp = SpModel::where('user', auth()->user()->user_id)->get();

        $breadcrumb = (object) [
            'title' => 'Surat',
            'list' => ['Pages', 'Surat']
        ];

        return view('surat.index', [
            'breadcrumb' => $breadcrumb,
            'datasktm' => $datasktm,
            'datasp' => $datasp
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
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'pekerjaan' => 'required',
            'nik' => 'required',
            'status_perkawinan' => 'required',
            'keperluan' => 'required',
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
            'nama' => 'required',
            'user' => 'required',
            'nik' => 'required',
            'rt' => 'required',
            'no_kk' => 'required',
            'jenis_kelamin' => 'required',
            'status_perkawinan' => 'required',
            'pekerjaan' => 'required',
            'keperluan' => 'required',
        ]);

        SktmModel::create($validatedData);

        return redirect('/surat')->with('successsktm', 'SKTM Berhasil Diajukan');
    }
}
