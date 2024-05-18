<?php

namespace App\Http\Controllers;

use App\Models\AnggotaOrganisasi;
use Illuminate\Http\Request;

class AnggotaOrganisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
        $validatedData = $request->validate([
            'user_id' => 'required',
            'organisasi_id' => 'required'
        ]);


        AnggotaOrganisasi::create($validatedData);

        return redirect('/organisasi/1/edit')->with('success', 'Data Warga Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(AnggotaOrganisasi $anggotaOrganisasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AnggotaOrganisasi $anggotaOrganisasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AnggotaOrganisasi $anggotaOrganisasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AnggotaOrganisasi $anggotaOrganisasi)
    {
        //
    }
}
