<?php

namespace App\Http\Controllers;


use App\Models\SpModel;
use App\Models\SktmModel;
use Illuminate\Http\Request;
use App\Models\PengaduanModel;
use App\Models\PengumumanModel;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

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

        if (Gate::allows('is-warga')) {
            $notifPengumuman = PengumumanModel::orderBy('created_at', 'desc')->take(3)->get();
        } elseif (Gate::allows('is-rt')) {
            $notifPengaduan = PengaduanModel::orderBy('created_at', 'desc')->take(3)->get();
            $notifSktm = SktmModel::orderBy('created_at', 'desc')->take(3)->get();
            $notifSp = SpModel::orderBy('created_at', 'desc')->take(3)->get();
        }


        return view('pengaduan.index', [
            'breadcrumb' => $breadcrumb,
            'pengaduan' => $pengaduan,
            'notifPengumuman' => (Gate::allows('is-warga')) ? $notifPengumuman : null,
            'notifPengaduan' => (Gate::allows('is-rt')) ? $notifPengaduan : null,
            'notifSktm' => (Gate::allows('is-rt')) ? $notifSktm : null,
            'notifSp' => (Gate::allows('is-rt')) ? $notifSp : null,
        ]);
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Pengaduan',
            'list' => ['Pages', 'Pengaduan']
        ];

        if (Gate::allows('is-warga')) {
            $notifPengumuman = PengumumanModel::orderBy('created_at', 'desc')->take(3)->get();
        } elseif (Gate::allows('is-rt')) {
            $notifPengaduan = PengaduanModel::orderBy('created_at', 'desc')->take(3)->get();
            $notifSktm = SktmModel::orderBy('created_at', 'desc')->take(3)->get();
            $notifSp = SpModel::orderBy('created_at', 'desc')->take(3)->get();
        }

        $title = 'Create';
        $pengaduan = new PengaduanModel();
        return view('pengaduan.create', [
            'breadcrumb' => $breadcrumb,
            'notifPengumuman' => (Gate::allows('is-warga')) ? $notifPengumuman : null,
            'notifPengaduan' => (Gate::allows('is-rt')) ? $notifPengaduan : null,
            'notifSktm' => (Gate::allows('is-rt')) ? $notifSktm : null,
            'notifSp' => (Gate::allows('is-rt')) ? $notifSp : null,
        ], compact('pengaduan'));
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

        if (Gate::allows('is-warga')) {
            $notifPengumuman = PengumumanModel::orderBy('created_at', 'desc')->take(3)->get();
        } elseif (Gate::allows('is-rt')) {
            $notifPengaduan = PengaduanModel::orderBy('created_at', 'desc')->take(3)->get();
            $notifSktm = SktmModel::orderBy('created_at', 'desc')->take(3)->get();
            $notifSp = SpModel::orderBy('created_at', 'desc')->take(3)->get();
        }


        return view('pengaduan.warga.show', [
            'breadcrumb' => $breadcrumb,
            'pengaduan' => $pengaduan,
            'notifPengumuman' => (Gate::allows('is-warga')) ? $notifPengumuman : null,
            'notifPengaduan' => (Gate::allows('is-rt')) ? $notifPengaduan : null,
            'notifSktm' => (Gate::allows('is-rt')) ? $notifSktm : null,
            'notifSp' => (Gate::allows('is-rt')) ? $notifSp : null,
        ], compact('pengaduan'));
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

        if (Gate::allows('is-warga')) {
            $notifPengumuman = PengumumanModel::orderBy('created_at', 'desc')->take(3)->get();
        } elseif (Gate::allows('is-rt')) {
            $notifPengaduan = PengaduanModel::orderBy('created_at', 'desc')->take(3)->get();
            $notifSktm = SktmModel::orderBy('created_at', 'desc')->take(3)->get();
            $notifSp = SpModel::orderBy('created_at', 'desc')->take(3)->get();
        }

        return view('pengaduan.edit', [
            'pengaduan' => $pengaduan,
            'breadcrumb' => $breadcrumb,
            'notifPengumuman' => (Gate::allows('is-warga')) ? $notifPengumuman : null,
            'notifPengaduan' => (Gate::allows('is-rt')) ? $notifPengaduan : null,
            'notifSktm' => (Gate::allows('is-rt')) ? $notifSktm : null,
            'notifSp' => (Gate::allows('is-rt')) ? $notifSp : null,
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
