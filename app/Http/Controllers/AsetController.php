<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\RtModel;
use App\Models\SpModel;
use App\Models\AsetModel;
use App\Models\SktmModel;
use App\Models\PengaduanModel;
use App\Models\PengumumanModel;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreAsetRequest;
use App\Http\Requests\UpdateAsetRequest;

class AsetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Aset';
        $breadcrumb = (object) [
            'title' => 'Aset',
            'list' => ['Pages', 'Aset']
        ];
        $data = AsetModel::all();
        $rts = RtModel::all();

        if (Gate::allows('is-warga')) {
            $notifPengumuman = PengumumanModel::orderBy('created_at', 'desc')->take(3)->get();
            return view('aset.warga.index', [
                'breadcrumb' => $breadcrumb,
                'asets' => $data,
                'title' => $title,
                'data' => $data,
                'rts' => $rts,
                'notifPengumuman' => (Gate::allows('is-warga')) ? $notifPengumuman : null,
            ]);
        } elseif (Gate::allows('is-rt')) {
            $notifPengaduan = PengaduanModel::orderBy('created_at', 'desc')->take(3)->get();
            $notifSktm = SktmModel::orderBy('created_at', 'desc')->take(3)->get();
            $notifSp = SpModel::orderBy('created_at', 'desc')->take(3)->get();
            return view('aset.index', [
                'breadcrumb' => $breadcrumb,
                'asets' => $data,
                'title' => $title,
                'data' => $data,
                'rts' => $rts,
                'notifPengaduan' => (Gate::allows('is-rt')) ? $notifPengaduan : null,
                'notifSktm' => (Gate::allows('is-rt')) ? $notifSktm : null,
                'notifSp' => (Gate::allows('is-rt')) ? $notifSp : null,
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Create Aset',
            'list' => ['Pages', 'Aset', 'Create']
        ];

        if (Gate::allows('is-warga')) {
            $notifPengumuman = PengumumanModel::orderBy('created_at', 'desc')->take(3)->get();
        } elseif (Gate::allows('is-rt')) {
            $notifPengaduan = PengaduanModel::orderBy('created_at', 'desc')->take(3)->get();
            $notifSktm = SktmModel::orderBy('created_at', 'desc')->take(3)->get();
            $notifSp = SpModel::orderBy('created_at', 'desc')->take(3)->get();
        }


        return view('aset.create', [
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
    public function store(StoreAsetRequest $request)
    {
        $validatedData = $request->validated([


            'nama' => 'required',
            'rt' => 'required',
            'status' => 'required',
        ]);

        AsetModel::create($validatedData);

        return redirect()->route('aset.index')->with('success', 'Data Aset Berhasil Ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    // public function show(Aset $aset)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function update(UpdateAsetRequest $request, string $id)
    {
        $request->validate([
            // 'aset_id' => 'required',
            'nama' => 'required',
            // 'deskripsi' => 'required',
            'status' => 'required',
            'kepemilikan' => 'required',
            // 'jenis' => 'required',
        ]);

        $aset = AsetModel::findOrFail($id);
        $aset->update([
            'nama' => $request->nama_aset,
            'status' => $request->status,
            'rt' => $request->kepemilikan,
        ]);

        return redirect('/aset')->with('success', 'Data Aset Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $aset = AsetModel::findOrFail($id);

        try {
            $aset->delete();

            return redirect('/aset')->with('success', 'Data Aset Berhasil Dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/aset')->with('error', 'Data Aset Gagal Dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
