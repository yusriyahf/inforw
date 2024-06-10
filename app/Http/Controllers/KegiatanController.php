<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KegiatanModel;
use App\Models\RolesModel;
use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Auth;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    if (auth()->user()->roles->nama === 'warga') {
        $data = KegiatanModel::where('user', auth()->user()->user_id)->get();
    }elseif(auth()->user()->roles->nama === 'rt'){
        $data = KegiatanModel::where('rt',  auth()->user()->getkeluarga->getrt->rt_id)->get();
    }
    else{
        $data = KegiatanModel::all();
    }
    
    $breadcrumb = (object) [
        'title' => 'Kegiatan',
        'list' => ['Pages', 'Kegiatan']
    ];

    return view('kegiatan.index', [`
        'breadcrumb' => $breadcrumb,
        'data' => $data
    ]);
    }

    public function approve($id)
    {
        if ('is-rw') {
            $kegiatan = KegiatanModel::find($id);
            if ($kegiatan) {
                $kegiatan->update(['status' => 'disetujui']);
                return redirect('/kegiatan')->with('success', 'Kegiatan berhasil disetujui');
            }
        }
        return redirect('/kegiatan')->with('error', 'Aksi tidak diizinkan');
    }

    public function reject($id)
    {
        if ('is-rw') {
            $kegiatan = KegiatanModel::find($id);
            if ($kegiatan) {
                $kegiatan->update(['status' => 'ditolak']);
                return redirect('/kegiatan')->with('success', 'Kegiatan berhasil ditolak');
            }
        }
        return redirect('/kegiatan')->with('error', 'Aksi tidak diizinkan');
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
            'alamat'=>'required',
        ]);
        $validatedData['rt'] = auth()->user()->getkeluarga->rt;
        $validatedData['user'] = auth()->user()->user_id;
        $validatedData['status'] = 'proses';


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
            'nama_kegiatan' => 'required|max:50',
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
