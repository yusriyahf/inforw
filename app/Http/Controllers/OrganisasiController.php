<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Organisasi;
use Illuminate\Http\Request;
use App\Models\AnggotaOrganisasi;

class OrganisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Organisasi';
        return view('organisasi.index', [
            'title' => $title,
            'organisasi' => Organisasi::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $organisasi = AnggotaOrganisasi::with(['user', 'organisasi'])->where('organisasi_id', $id)->get();

        $title = 'Anggota Organisasi';
        $nama_organisasi = Organisasi::find($id);
        return view('organisasi.show', [
            'title' => $title,
            'organisasi' => $organisasi,
            'nama_organisasi' => $nama_organisasi->nama_organisasi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $organisasi = AnggotaOrganisasi::with(['user', 'organisasi'])->where('organisasi_id', $id)->get();

        $title = 'Anggota Organisasi';
        $nama_organisasi = Organisasi::find($id);
        $user = User::all();
        return view('organisasi.edit', [
            'title' => $title,
            'organisasi' => $organisasi,
            'nama_organisasi' => $nama_organisasi->nama_organisasi,
            'users' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Organisasi $organisasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organisasi $organisasi)
    {
        //
    }
}
