<?php

namespace App\Http\Controllers;

use App\Models\SktmModel;
use Illuminate\Http\Request;

class SuratController extends Controller
{

    public function index()
    {
        $data = SktmModel::where('user', auth()->user()->user_id)->get();

        return view('surat.index', [
            'title' => 'surat',
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

        return redirect('/surat')->with('success', 'SKTM Berhasil Diajukan');
    }
}
