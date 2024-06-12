<?php

namespace App\Http\Controllers;

use App\Models\RtModel;
use App\Models\User;
use Illuminate\Http\Request;

class RtController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Rt',
            'list' => ['Pages', 'Rt']
        ];

        $data = RtModel::with(['getketuart','getsekretarisrt','getbendaharart'])->get();
        return view('pengurus.rt.index', [
            'breadcrumb' => $breadcrumb,
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Rt',
            'list' => ['Pages', 'Rt','Create']
        ];

        return view('pengurus.rt.create', [
            'breadcrumb' => $breadcrumb
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rt' => 'required|min:1',
            'ketua' => 'required|exists:users,nama',
            'sekretaris' => 'required|exists:users,nama',
            'bendahara' => 'required|exists:users,nama'
        ]);

        $ketua = User::where('nama',$request->ketua)->pluck('user_id')->first();
        $sekretaris = User::where('nama',$request->sekretaris)->pluck('user_id')->first();
        $bendahara = User::where('nama',$request->bendahara)->pluck('user_id')->first();

        RtModel::create([
            'nama' => $request->rt,
            'ketua' => $ketua,
            'sekretaris' => $sekretaris,
            'bendahara' => $bendahara
        ]);

        User::find($ketua)->update(['role' => 3]);
        User::find($sekretaris)->update(['role' => 5]);
        User::find($bendahara)->update(['role' => 6]);        

        return redirect('/rt')->with('success', 'Data Rukun Tetangga Berhasil Ditambahkan');;
    }

    /**
     * Display the specified resource.
     */
    public function show(RtModel $rtModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $breadcrumb = (object) [
            'title' => 'Rt',
            'list' => ['Pages', 'Rt','Edit']
        ];

        $rt = RtModel::with(['getketuart','getsekretarisrt','getbendaharart'])->find($id);

        $warga = User::whereHas('getkeluarga', function ($query) use ($id) {
            $query->where('rt', $id);
        })->get();
        
        return view('pengurus.rt.edit', [
            'breadcrumb' => $breadcrumb,
            'rt' => $rt,
            'warga' => $warga,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rt = RtModel::with(['getketuart','getsekretarisrt','getbendaharart'])->find($id);
        // dd($rt);
        User::find($rt->ketua)->update(['role' => 4]);  
        User::find($rt->sekretaris)->update(['role' => 4]);
        User::find($rt->bendahara)->update(['role' => 4]);
        
        $request->validate([
            'rt' => 'required',
            'ketua' => 'required',
            'sekretaris' => 'required',
            'bendahara' => 'required'
        ]);

        // $ketua = User::where('nama',$request->ketua)->pluck('user_id')->first();
        // $sekretaris = User::where('nama',$request->sekretaris)->pluck('user_id')->first();
        // $bendahara = User::where('nama',$request->bendahara)->pluck('user_id')->first();

        RtModel::where('rt_id',$id)->update([
            'nama' => $request->rt,
            'ketua' => $request->ketua,
            'sekretaris' => $request->sekretaris,
            'bendahara' => $request->bendahara
        ]);

        User::find($request->ketua)->update(['role' => 3]);
        User::find($request->sekretaris)->update(['role' => 5]);
        User::find($request->bendahara)->update(['role' => 6]);

        return redirect('/rt')->with('success', 'Data berhasil diubah');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $check = RtModel::find($id);
        if (!$check) {
            return redirect('/rt')->with('error', 'Data rt tidak ditemukan');
        }

        try {
            RtModel::destroy($id);

            return redirect('/rt')->with('success', 'Data rt berhasil dihapus');
        } catch (\illuminate\Database\QueryException $e) {
            return redirect('/rt')->with('error' . 'Data rt gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
