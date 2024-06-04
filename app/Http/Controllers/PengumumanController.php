<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengumumanModel;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\File;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::allows('is-rt')) {

            $data = PengumumanModel::where('rt',  auth()->user()->getkeluarga->getrt->rt_id)->orderBy('pengumuman_id', 'desc')->get();

            $breadcrumb = (object) [
                'title' => 'Pengumuman',
                'list' => ['Pages', 'Pengumuman']
            ];

            return view('pengumuman.admin.index', [
                'breadcrumb' => $breadcrumb,
                'data' => $data
            ]);
        } else {

            $data = PengumumanModel::where('rt',  auth()->user()->getkeluarga->getrt->rt_id)->orderBy('pengumuman_id', 'desc')->get();
            $breadcrumb = (object) [
                'title' => 'Pengumuman',
                'list' => ['Pages', 'Pengumuman']
            ];
            return view('pengumuman.warga.index', [
                'breadcrumb' => $breadcrumb,
                'data' => $data
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Create',
            'list' => ['Pages', 'Pengumuman', 'Create']
        ];
        return view('pengumuman.admin.create', [
            'breadcrumb' => $breadcrumb,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'rt' => 'required',
            'user' => 'required',
        ]);

        if ($request->hasFile('gambar')) {
            $extfile = $request->file('gambar')->getClientOriginalExtension();

            $judulFormatted = strtolower(str_replace(' ', '', $request->judul));
            $namaFile = $judulFormatted . '.' . $extfile;

            $request->file('gambar')->move(public_path('gambar/pengumuman'), $namaFile);
            $validatedData['gambar'] = $namaFile;
        }

        PengumumanModel::create($validatedData);

        return redirect('/pengumuman')->with('success', 'Pengumuman berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $data = PengumumanModel::where('pengumuman_id', $id)->first();

        $breadcrumb = (object) [
            'title' => 'Detail',
            'list' => ['Pages', 'Pengumuman', 'Detail']
        ];

        return view('pengumuman.warga.show', [
            'breadcrumb' => $breadcrumb,
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $breadcrumb = (object) [
            'title' => 'Edit',
            'list' => ['Pages', 'Pengumuman', 'Edit']
        ];

        $data = PengumumanModel::find($id);

        return view('pengumuman.admin.edit', [
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
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        $pengumuman = PengumumanModel::find($id);
        $namaFile = $pengumuman->gambar;

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($namaFile && File::exists(public_path('gambar/pengumuman/' . $namaFile))) {
                File::delete(public_path('gambar/pengumuman/' . $namaFile));
            }

            $extfile = $request->file('gambar')->getClientOriginalExtension();
            $judulFormatted = strtolower(str_replace(' ', '', $request->judul));
            $namaFile = $judulFormatted . '.' . $extfile;
            $request->file('gambar')->move(public_path('gambar/pengumuman/'), $namaFile);
        }

        $pengumuman->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $namaFile
        ]);

        return redirect('/pengumuman')->with('success', 'Data Pengumuman berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $check = PengumumanModel::find($id);
        if (!$check) {
            return redirect('/pengumuman')->with('error', 'Data Pengumuman tidak ditemukan');
        }

        try {
            if ($check->gambar && File::exists(public_path('gambar/pengumuman/' . $check->gambar))) {
                File::delete(public_path('gambar/pengumuman/' . $check->gambar));
            }

            $check->delete();

            return redirect('/pengumuman')->with('success', 'Data pengumuman berhasil dihapus');
        } catch (\illuminate\Database\QueryException $e) {
            return redirect('/pengumuman')->with('error' . 'Data pengumuman gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
