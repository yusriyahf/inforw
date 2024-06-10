<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RtModel;
use Illuminate\Http\Request;
use App\Models\KeluargaModel;
use Illuminate\Support\Facades\Gate;

class KkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $daftarRT = RtModel::all();

        $breadcrumb = (object) [
            'title' => 'Kartu Keluarga',
            'list' => ['Pages', 'Kartu Keluarga']
        ];

        if (Gate::allows('is-admin') || Gate::allows('is-rw')) {
            $data = KeluargaModel::all();
            $rt = $request->input('rt');

            // Check if 'rt' is set and not empty, if so, filter the data
            if ($rt) {
                $data = KeluargaModel::where('rt', $rt)->get();
            } else {
                // Otherwise, get all data
                $data = KeluargaModel::all();
            }
        } elseif (Gate::allows('is-rt')) {
            $data = KeluargaModel::where('rt', auth()->user()->getkeluarga->getrt->rt_id)->get();
        }

        return view('keluarga.pengurus.index', [
            'breadcrumb' => $breadcrumb,
            'data' => $data,
            'daftarRT' => $daftarRT,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Create',
            'list' => ['Pages', 'KK', 'Create']
        ];

        $rt = RtModel::all();
        $users = User::all();

        return view('keluarga.pengurus.create', [
            'breadcrumb' => $breadcrumb,
            'users' => $users,
            'rt' => $rt,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'no_kk' => 'required',
            'kepala_keluarga' => 'required',
            'rw' => 'required',
            'rt' => 'required',
        ]);

        KeluargaModel::create($validatedData);

        return redirect('/kk')->with('success', 'KK berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = KeluargaModel::where('keluarga_id', $id)->first();
        $anggota = User::where('keluarga', $id)->get();

        $breadcrumb = (object) [
            'title' => 'Detail',
            'list' => ['Pages', 'keluarga', 'Detail']
        ];

        return view('keluarga.pengurus.show', [
            'breadcrumb' => $breadcrumb,
            'data' => $data,
            'anggota' => $anggota,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $breadcrumb = (object) [
            'title' => 'Edit',
            'list' => ['Pages', 'Pengumuman', 'Edit']
        ];

        $users = User::all();

        $data = KeluargaModel::find($id);
        $rt = RtModel::all();

        return view('keluarga.pengurus.edit', [
            'data' => $data,
            'breadcrumb' => $breadcrumb,
            'users' => $users,
            'rt' => $rt,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'no_kk' => 'required',
            'kepala_keluarga' => 'required',
            'rt' => 'required',
        ]);

        KeluargaModel::find($id)->update([
            'no_kk' => $request->no_kk,
            'kepala_keluarga' => $request->kepala_keluarga,
            'rt' => $request->rt,
        ]);

        return redirect('/kk')->with('success', 'Data KK berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $check = KeluargaModel::find($id);
        if (!$check) {
            return redirect('/kk')->with('error', 'Data kk tidak ditemukan');
        }

        try {
            KeluargaModel::destroy($id);

            return redirect('/kk')->with('success', 'Data kk berhasil dihapus');
        } catch (\illuminate\Database\QueryException $e) {
            return redirect('/kk')->with('error' . 'Data kk gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
