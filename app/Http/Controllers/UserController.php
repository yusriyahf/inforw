<?php

namespace App\Http\Controllers;

use App\Models\RtModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $breadcrumb = (object) [
            'title' => 'Warga',
            'list' => ['Pages', 'Warga']
        ];

        $rt = $request->input('rt');
        $daftarRT = RtModel::all();

        if (Gate::allows('is-admin') || Gate::allows('is-rw')) {
            $query = User::with(['getkeluarga.getrt'])->where('role', '!=', 1);

            if (!empty($rt)) {
                $query->whereHas('getkeluarga.getrt', function ($query) use ($rt) {
                    $query->where('rt_id', $rt);
                });
            }

            $data = $query->get();
        } elseif (Gate::allows('is-warga') || Gate::allows('is-rt')) {
            $data = User::with('getkeluarga')
                ->where('role', '!=', 1)
                ->whereHas('getkeluarga.getrt', function ($query) {
                    $query->where('rt_id', auth()->user()->getkeluarga->getrt->rt_id);
                })
                ->get();
        } else {
            // Handle the case where the user does not have any of the specified roles
            $data = collect(); // Return an empty collection
        }

        return view('warga.index', [
            'breadcrumb' => $breadcrumb,
            'warga' => $data,
            'daftarRT' => $daftarRT
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
            'nik' => 'required',
            'nama' => 'required',
            'pekerjaan' => 'required',
            'notelp' => 'required',
            'status_perkawinan' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
        ]);


        $validatedData['keluarga'] = 1;
        $validatedData['role'] = 4;
        $validatedData['password'] = Hash::make('12345');

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
            'nik' => 'required',
            'nama' => 'required',
            'pekerjaan' => 'required',
            'notelp' => 'required',
            'status_perkawinan' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
        ]);

        User::find($id)->update([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'pekerjaan' => $request->pekerjaan,
            'notelp' => $request->notelp,
            'status_perkawinan' => $request->status_perkawinan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
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
