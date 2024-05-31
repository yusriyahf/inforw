<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KegiatanModel;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = KegiatanModel::where('rt',  auth()->user()->getkeluarga->getrt->rt_id)->get();

        $breadcrumb = (object) [
            'title' => 'Kegiatan',
            'list' => ['Pages', 'Kegiatan']
        ];

        return view('kegiatan.index', [
            'breadcrumb' => $breadcrumb,
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Create',
            'list' => ['Pages', 'kegiatan', 'Create']
        ];
        return view('kegiatan.create', [
            'breadcrumb' => $breadcrumb,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tanggal' => 'required',
            'nama_kegiatan' => 'required',
        ]);
        $validatedData['rt'] = auth()->user()->getkeluarga->rt;
        $validatedData['user'] = auth()->user()->user_id;
        $validatedData['status'] = 'proses pengajuan';


        KegiatanModel::create($validatedData);

        return redirect('/kegiatan')->with('success', 'kegiatan berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(KegiatanModel $kegiatanModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $breadcrumb = (object) [
            'title' => 'Edit',
            'list' => ['Pages', 'Kegiatan', 'Edit']
        ];

        $data = KegiatanModel::find($id);

        return view('kegiatan.edit', [
            'breadcrumb' => $breadcrumb,
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tanggal' => 'required',
            'nama_kegiatan' => 'required',
        ]);

        KegiatanModel::find($id)->update([
            'tanggal' => $request->tanggal,
            'nama_kegiatan' => $request->nama_kegiatan,
        ]);

        return redirect('/kegiatan')->with('success', 'Data kegiatan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $check = KegiatanModel::find($id);
        if (!$check) {
            return redirect('/kegiatan')->with('error', 'Data kegiatan tidak ditemukan');
        }

        try {
            KegiatanModel::destroy($id);

            return redirect('/kegiatan')->with('success', 'Data kegiatan berhasil dihapus');
        } catch (\illuminate\Database\QueryException $e) {
            return redirect('/kegiatan')->with('error' . 'Data kegiatan gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}