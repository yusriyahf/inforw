<?php

namespace App\Http\Controllers;

use App\Models\SpModel;
use App\Models\SktmModel;
use Illuminate\Http\Request;
use App\Models\PengaduanModel;
use App\Models\PengumumanModel;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::allows('is-rt')) {

            $data = PengumumanModel::where('rt', auth()->user()->getkeluarga->getrt->rt_id)
                ->orWhereNull('rt')
                ->orderBy('pengumuman_id', 'desc')
                ->get();

            $notifPengaduan = PengaduanModel::orderBy('created_at', 'desc')->take(3)->get();
            $notifSktm = SktmModel::orderBy('created_at', 'desc')->take(3)->get();
            $notifSp = SpModel::orderBy('created_at', 'desc')->take(3)->get();


            $breadcrumb = (object) [
                'title' => 'Pengumuman',
                'list' => ['Pages', 'Pengumuman']
            ];

            return view('pengumuman.admin.index', [
                'breadcrumb' => $breadcrumb,
                'data' => $data,
                'notifPengaduan' => (Gate::allows('is-rt')) ? $notifPengaduan : null,
                'notifSktm' => (Gate::allows('is-rt')) ? $notifSktm : null,
                'notifSp' => (Gate::allows('is-rt')) ? $notifSp : null,
            ]);
        } elseif (Gate::allows('is-rw')) {
            $data = PengumumanModel::orderBy('pengumuman_id', 'desc')->get();

            $breadcrumb = (object) [
                'title' => 'Pengumuman',
                'list' => ['Pages', 'Pengumuman']
            ];

            return view('pengumuman.admin.index', [
                'breadcrumb' => $breadcrumb,
                'data' => $data,
            ]);
        } elseif (Gate::allows('is-warga')) {
            $notifPengumuman = PengumumanModel::orderBy('created_at', 'desc')->take(3)->get();
            $data = PengumumanModel::where('rt', auth()->user()->getkeluarga->getrt->rt_id)
                ->orWhereNull('rt')
                ->orderBy('pengumuman_id', 'desc')
                ->get();

            $breadcrumb = (object) [
                'title' => 'Pengumuman',
                'list' => ['Pages', 'Pengumuman']
            ];
            $notifPengumuman = PengumumanModel::orderBy('created_at', 'desc')->take(3)->get();



            return view('pengumuman.warga.index', [
                'breadcrumb' => $breadcrumb,
                'data' => $data,
                'notifPengumuman' => (Gate::allows('is-warga')) ? $notifPengumuman : null,
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

        if (Gate::allows('is-warga')) {
            $notifPengumuman = PengumumanModel::orderBy('created_at', 'desc')->take(3)->get();
        } elseif (Gate::allows('is-rt')) {
            $notifPengaduan = PengaduanModel::orderBy('created_at', 'desc')->take(3)->get();
            $notifSktm = SktmModel::orderBy('created_at', 'desc')->take(3)->get();
            $notifSp = SpModel::orderBy('created_at', 'desc')->take(3)->get();
        }elseif (Gate::allows('is-rw')) {
            $notifPengaduan = PengaduanModel::orderBy('created_at', 'desc')->take(3)->get();
            $notifSktm = SktmModel::orderBy('created_at', 'desc')->take(3)->get();
            $notifSp = SpModel::orderBy('created_at', 'desc')->take(3)->get();
        }

        return view('pengumuman.admin.create', [
            'breadcrumb' => $breadcrumb,
            'notifPengumuman' => (Gate::allows('is-warga')) ? $notifPengumuman : null,
            'notifPengaduan' => (Gate::allows('is-rt')) ? $notifPengaduan : null,
            'notifSktm' => (Gate::allows('is-rt')) ? $notifSktm : null,
            'notifSp' => (Gate::allows('is-rt')) ? $notifSp : null,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $baseRules = [
            'judul' => 'required|max:50',
            'deskripsi' => ['required', function ($attribute, $value, $fail) {
                if (str_word_count($value) > 225) {
                    $fail('The ' . $attribute . ' must not exceed 225 words.');
                }
            }],
            'user' => 'required',
        ];

        // Menambahkan aturan validasi dinamis
        if (Gate::allows('is-rt')) {
            $baseRules['rt'] = 'required';
        } elseif (Gate::allows('is-rw')) {
            $baseRules['rw'] = 'required';
        }

        $rules = array_merge($baseRules, [
            'gambar' => 'sometimes|file|mimes:jpg,png,jpeg,gif|max:2048', // Validasi file gambar
        ]);

        $validatedData = $request->validate($rules);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $extfile = $file->getClientOriginalExtension();

            // Menangani nama file yang lebih aman
            $judulFormatted = strtolower(str_replace(' ', '', $request->judul));
            $namaFile = $judulFormatted . $extfile;

            $file->move(public_path('gambar/pengumuman'), $namaFile);
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
        $notifPengumuman = PengumumanModel::orderBy('created_at', 'desc')->take(3)->get();

        $breadcrumb = (object) [
            'title' => 'Detail',
            'list' => ['Pages', 'Pengumuman', 'Detail']
        ];

        if (Gate::allows('is-warga')) {
            $notifPengumuman = PengumumanModel::orderBy('created_at', 'desc')->take(3)->get();
        } elseif (Gate::allows('is-rt')) {
            $notifPengaduan = PengaduanModel::orderBy('created_at', 'desc')->take(3)->get();
            $notifSktm = SktmModel::orderBy('created_at', 'desc')->take(3)->get();
            $notifSp = SpModel::orderBy('created_at', 'desc')->take(3)->get();
        }

        return view('pengumuman.warga.show', [
            'breadcrumb' => $breadcrumb,
            'data' => $data,
            'notifPengumuman' => $notifPengumuman,
            'notifPengumuman' => (Gate::allows('is-warga')) ? $notifPengumuman : null,
            'notifPengaduan' => (Gate::allows('is-rt')) ? $notifPengaduan : null,
            'notifSktm' => (Gate::allows('is-rt')) ? $notifSktm : null,
            'notifSp' => (Gate::allows('is-rt')) ? $notifSp : null,
        ]);
    }

    public function showrt(String $id) {
        $data = PengumumanModel::where('pengumuman_id', $id)->first();
        $breadcrumb = (object) [
            'title' => 'Detail',
            'list' => ['Pages', 'Pengumuman', 'Detail']
        ];
        return view('pengumuman.admin.show', [
            'breadcrumb' => $breadcrumb,
            'data' => $data,
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

        if (Gate::allows('is-warga')) {
            $notifPengumuman = PengumumanModel::orderBy('created_at', 'desc')->take(3)->get();
        } elseif (Gate::allows('is-rt')) {
            $notifPengaduan = PengaduanModel::orderBy('created_at', 'desc')->take(3)->get();
            $notifSktm = SktmModel::orderBy('created_at', 'desc')->take(3)->get();
            $notifSp = SpModel::orderBy('created_at', 'desc')->take(3)->get();
        }

        return view('pengumuman.admin.edit', [
            'breadcrumb' => $breadcrumb,
            'data' => $data,
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
            'deskripsi' => ['required', function ($attribute, $value, $fail) {
                if (str_word_count($value) > 225) {
                    $fail('The ' . $attribute . ' must not exceed 225 words.');
                }
            }],
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
