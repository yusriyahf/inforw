<?php

namespace App\Http\Controllers;


use App\Models\PengaduanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\File;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::allows('is-rt') || Gate::allows('is-warga')) {

            $pengaduan = PengaduanModel::where('rt',  auth()->user()->getkeluarga->getrt->rt_id)->orderBy('pengaduan_id', 'desc')->get();
        } elseif (Gate::allows('is-rw')) {
            $pengaduan = PengaduanModel::all();
        }
        $breadcrumb = (object) [
            'title' => 'Pengaduan',
            'list' => ['Pages', 'Pengaduan']
        ];

        return view('pengaduan.index', [
            'breadcrumb' => $breadcrumb,
            'pengaduan' => $pengaduan,
        ]);
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Pengaduan',
            'list' => ['Pages', 'Pengaduan']
        ];
        $title = 'Create';
        $pengaduan = new PengaduanModel();
        return view('pengaduan.create', ['breadcrumb' => $breadcrumb], compact('pengaduan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:50',
            'jenis' => 'required',
            'deskripsi' => ['required', function ($attribute, $value, $fail) {
                if (str_word_count($value) > 225) {
                    $fail('The ' . $attribute . ' must not exceed 225 words.');
                }
            }],
            'user' => 'required',
            'rw' => 'required',
            'rt' => 'required',
            'tanggal_pengaduan' => 'required',
        ]);

        if ($request->hasFile('gambar')) {
            $extfile = $request->file('gambar')->getClientOriginalExtension();

            $judulFormatted = strtolower(str_replace(' ', '', $request->judul));
            $namaFile = $judulFormatted . '.' . $extfile;

            $request->file('gambar')->move(public_path('gambar/'), $namaFile);
            $validatedData['gambar'] = $namaFile;
        }

        PengaduanModel::create($validatedData);

        return redirect('/pengaduan')->with('success', 'Data pengaduan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $pengaduan = PengaduanModel::where('pengaduan_id', $id)->first();

        $breadcrumb = (object) [
            'title' => 'Detail',
            'list' => ['Pages', 'Pengaduan', 'Detail']
        ];

        return view('pengaduan.warga.show', [
            'breadcrumb' => $breadcrumb,
            'pengaduan' => $pengaduan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $breadcrumb = (object) [
            'title' => 'Edit',
            'list' => ['Pages', 'Pengaduan', 'Edit']
        ];

        $pengaduan = PengaduanModel::find($id);
        return view('pengaduan.edit', [
            'pengaduan' => $pengaduan,
            'breadcrumb' => $breadcrumb,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required|max:50',
            'jenis' => 'required',
            'deskripsi' => ['required', function ($attribute, $value, $fail) {
                if (str_word_count($value) > 225) {
                    $fail('The ' . $attribute . ' must not exceed 225 words.');
                }
            }],
            'user' => 'required',
            'rw' => 'required',
            'rt' => 'required',
            'tanggal_pengaduan' => 'required',
        ]);

        $pengaduan = PengaduanModel::find($id);
        $namaFile = $pengaduan->gambar;

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($namaFile && File::exists(public_path('gambar/' . $namaFile))) {
                File::delete(public_path('gambar/' . $namaFile));
            }

            $extfile = $request->file('gambar')->getClientOriginalExtension();
            $judulFormatted = strtolower(str_replace(' ', '', $request->judul));
            $namaFile = $judulFormatted . '.' . $extfile;
            $request->file('gambar')->move(public_path('gambar/'), $namaFile);
        }

        $pengaduan->update([
            'judul' => $request->judul,
            'jenis' => $request->jenis,
            'deskripsi' => $request->deskripsi,
            'user' => $request->user,
            'rw' => $request->rw,
            'rt' => $request->rt,
            'gambar' => $namaFile,
            'tanggal_pengaduan' => $request->tanggal_pengaduan,
        ]);

        return redirect('/pengaduan')->with('success', 'Data pengaduan berhasil diubah');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pengaduan = PengaduanModel::find($id);
        if (!$pengaduan) {
            return redirect('/pengaduan')->with('error', 'Data stok tidak ditemukan');
        }

        try {
            // Hapus gambar terkait jika ada
            if ($pengaduan->gambar && File::exists(public_path('gambar/' . $pengaduan->gambar))) {
                File::delete(public_path('gambar/' . $pengaduan->gambar));
            }

            $pengaduan->delete();

            return redirect('/pengaduan')->with('success', 'Data pengaduan berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            Log::error('Failed to delete pengaduan: ' . $e->getMessage());
            return redirect('/pengaduan')->with('error', 'Data pengaduan gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
