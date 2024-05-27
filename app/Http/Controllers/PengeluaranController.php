<?php

namespace App\Http\Controllers;

use App\Models\PengeluaranModel;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    public function index()
    {
        $data = PengeluaranModel::where('rt',  auth()->user()->getkeluarga->getrt->rt_id)->get();
            $breadcrumb = (object) [
                'title' => 'Pengeluaran',
                'list' => ['Pages', 'Pengeluaran']
            ];
            return view('pengeluaran.index', [
                'breadcrumb' => $breadcrumb,
                'pengeluaran' => $data
            ]);
    }
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Create',
            'list' => ['Pages', 'Pengeluaran', 'Create']
        ];
        return view('pengeluaran.create', [
            'breadcrumb' => $breadcrumb,
        ]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'rt' => 'required',
            'user' => 'required',
            'deskripsi' => 'required',
            'jumlah' => 'required',
        ]);

        PengeluaranModel::create($validatedData);

        return redirect('/pengeluaran')->with('success', 'Pengeluaran berhasil dibuat');
    }
    public function edit(String $id)
    {
        $breadcrumb = (object) [
            'title' => 'Edit',
            'list' => ['Pages', 'Pengeluaran', 'Edit']
        ];

        $data = PengeluaranModel::find($id);

        return view('pengeluaran.edit', [
            'breadcrumb' => $breadcrumb,
            'data' => $data
        ]);
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'deskripsi' => 'required',
            'jumlah' => 'required',
        ]);

        PengeluaranModel::find($id)->update([
            'deskripsi' => $request->deskripsi,
            'jumlah' => $request->jumlah,
        ]);

        return redirect('/pengeluaran')->with('success', 'Data Pengeluaran berhasil diubah');
    }
    public function destroy(String $id)
    {
        $check = PengeluaranModel::find($id);
        if (!$check) {
            return redirect('/pengeluaran')->with('error', 'Data Pengeluaran tidak ditemukan');
        }

        try {
            PengeluaranModel::destroy($id);

            return redirect('/pengeluaran')->with('success', 'Data Pengeluaran berhasil dihapus');
        } catch (\illuminate\Database\QueryException $e) {
            return redirect('/pengeluaran')->with('error' . 'Data Pengeluaran gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }

}