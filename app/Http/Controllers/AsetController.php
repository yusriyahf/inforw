<?php

namespace App\Http\Controllers;

use App\Models\AsetModel;
use App\Models\RtModel;
use App\Http\Requests;
use App\Http\Requests\UpdateAsetRequest;
use App\Http\Requests\StoreAsetRequest;

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
        return view('aset.index', [
            'breadcrumb' => $breadcrumb,
            'asets' => $data,
            'title' => $title,
            'rts' => $rts
        ]);
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


        return view('aset.create', ['breadcrumb' => $breadcrumb]);
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
