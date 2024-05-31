<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PemasukanModel;

class PemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tanggal = $request->input('tanggal', now()->format('Y-m'));
        $data = PemasukanModel::where('rt', auth()->user()->getkeluarga->getrt->rt_id)
            ->whereYear('created_at', '=', date('Y', strtotime($tanggal)))
            ->whereMonth('created_at', '=', date('m', strtotime($tanggal)))
            ->get();

        $breadcrumb = (object) [
            'title' => 'Pemasukan',
            'list' => ['Pages', 'Pemasukan']
        ];

        return view('pemasukan.index', [
            'breadcrumb' => $breadcrumb,
            'data' => $data,
            'tanggal' => $tanggal,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Create',
            'list' => ['Pages', 'pemasukan', 'Create']
        ];
        return view('pemasukan.create', [
            'breadcrumb' => $breadcrumb,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'jumlah' => 'required',
            'deskripsi' => 'required',
            'rt' => 'required',
            'user' => 'required',
            'tanggal' => 'required',
        ]);

        PemasukanModel::create($validatedData);

        return redirect('/pemasukan')->with('success', 'pemasukan berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(PemasukanModel $pemasukanModel)
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
            'list' => ['Pages', 'Pemasukan', 'Edit']
        ];

        $data = PemasukanModel::find($id);

        return view('pemasukan.edit', [
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
            'jumlah' => 'required',
            'deskripsi' => 'required',
        ]);

        PemasukanModel::find($id)->update([
            'jumlah' => $request->jumlah,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('/pemasukan')->with('success', 'Data Pemasukan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $check = PemasukanModel::find($id);
        if (!$check) {
            return redirect('/pemasukan')->with('error', 'Data pemasukan tidak ditemukan');
        }

        try {
            PemasukanModel::destroy($id);

            return redirect('/pemasukan')->with('success', 'Data pemasukan berhasil dihapus');
        } catch (\illuminate\Database\QueryException $e) {
            return redirect('/pemasukan')->with('error' . 'Data pemasukan gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
