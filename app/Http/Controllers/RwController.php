<?php

namespace App\Http\Controllers;

use App\Models\RwModel;
use App\Models\User;
use Illuminate\Http\Request;

class RwController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Rw',
            'list' => ['Pages', 'Rw']
        ];

        $data = RwModel::all();

        return view('pengurus.rw.index', [
            'breadcrumb' => $breadcrumb,
            'data' => $data
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
    public function show(RwModel $rwModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $breadcrumb = (object) [
            'title' => 'Rw',
            'list' => ['Pages', 'Rw','Edit']
        ];

        $rw = RwModel::with(['getketuarw','getsekretarisrw','getbendahararw'])->find($id);

        return view('pengurus.rw.edit', [
            'breadcrumb' => $breadcrumb,
            'rw' => $rw
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rw = RwModel::with(['getketuarw','getsekretarisrw','getbendahararw'])->find($id);
        User::find($rw->ketua)->update(['role' => 4]);
        User::find($rw->sekretaris)->update(['role' => 4]);
        User::find($rw->bendahara)->update(['role' => 4]);

        $request->validate([
            'rw' => 'required|min:1',
            'ketua' => 'required|exists:users,nama',
            'sekretaris' => 'required|exists:users,nama',
            'bendahara' => 'required|exists:users,nama'
        ]);

        $ketua = User::where('nama',$request->ketua)->pluck('user_id')->first();
        $sekretaris = User::where('nama',$request->sekretaris)->pluck('user_id')->first();
        $bendahara = User::where('nama',$request->bendahara)->pluck('user_id')->first();

        RwModel::where('rw_id',$id)->update([
            'nama' => $request->rw,
            'ketua' => $ketua,
            'sekretaris' => $sekretaris,
            'bendahara' => $bendahara
        ]);

        User::find($ketua)->update(['role' => 2]);
        User::find($sekretaris)->update(['role' => 5]);
        User::find($bendahara)->update(['role' => 6]);

        return redirect('/rw')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RwModel $rwModel)
    {
        //
    }
}
