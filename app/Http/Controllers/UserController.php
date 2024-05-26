<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Warga',
            'list' => ['Pages', 'Warga']
        ];
        if (Gate::allows('is-admin')) {

            $data = User::with('getkeluarga')
                ->where('role', '!=', 1)
                ->get();
        } else {
            $data = User::with('getkeluarga')
                ->where('role', '!=', 1)
                ->whereHas('getkeluarga.getrt', function ($query) {
                    $query->where('rt_id', auth()->user()->getkeluarga->getrt->rt_id);
                })
                ->get();
        }
        return view('warga.index', [
            'breadcrumb' => $breadcrumb,
            'warga' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Create',
            'list' => ['Pages', 'Warga', 'Create']
        ];

        return view('warga.create', ['breadcrumb' => $breadcrumb]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'kk' => 'required',
            'alamat' => 'required',
            'rt' => 'required',
            'status_pernikahan' => 'required',
            'status_keluarga' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'password' => 'required',
        ]);

        User::create($validatedData);

        return redirect('/warga')->with('success', 'Data Warga Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $breadcrumb = (object) [
            'title' => 'Edit',
            'list' => ['Pages', 'Warga', 'Edit']
        ];

        $warga = User::find($id);

        return view('warga.edit', [
            'warga' => $warga,
            'breadcrumb' => $breadcrumb
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'kk' => 'required',
            'alamat' => 'required',
            'rt' => 'required',
            'status_pernikahan' => 'required',
            'status_keluarga' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'password' => 'nullable',
        ]);

        User::find($id)->update([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'kk' => $request->kk,
            'alamat' => $request->alamat,
            'rt' => $request->rt,
            'status_pernikahan' => $request->status_pernikahan,
            'status_keluarga' => $request->status_keluarga,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'password' => $request->password ? bcrypt($request->password) : User::find($id)->password
        ]);

        return redirect('/warga')->with('success', 'Data Warga berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $check = User::find($id);
        if (!$check) {
            return redirect('/warga')->with('error', 'Data stok tidak ditemukan');
        }

        try {
            User::destroy($id);

            return redirect('/warga')->with('success', 'Data warga berhasil dihapus');
        } catch (\illuminate\Database\QueryException $e) {
            return redirect('/warga')->with('error' . 'Data warga gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
