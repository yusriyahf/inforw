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
            'list' => ['Beranda', 'Surat']
        ];
        return view('surat.index', [
            'title' => 'surat',
            'datasktm' => $datasktm,
            'datasp' => $datasp,
            'breadcrumb' => $breadcrumb
        ]);
    }

    public function sp()
    {
        return view('surat.create_sp', [
            'title' => 'Surat Pengantar'
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

        return view('surat.show_sp', [
            'title' => 'SP Detail',
            'data' => $data
        ]);
    }

    public function sktm()
    {
        return view('surat.create_sktm', [
            'title' => 'SKTM'
        ]);
    }

    public function showsktm(string $id)
    {
        $data = SktmModel::where('sktm_id', $id)->first();

        return view('surat.show_sktm', [
            'title' => 'SKTM Detail',
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
