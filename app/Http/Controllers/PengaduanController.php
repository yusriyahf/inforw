<?php

namespace App\Http\Controllers;


use App\Models\PengaduanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Gate;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::allows('is-rt')) {

            $pengaduan = PengaduanModel::where('rt',  auth()->user()->getkeluarga->getrt->rt_id)->orderBy('pengaduan_id', 'desc')->get();

            $breadcrumb = (object) [
                'title' => 'Pengaduan',
                'list' => ['Pages', 'Pengaduan']
            ];

            return view('pengaduan.admin.index', [
                'breadcrumb' => $breadcrumb,
                'pengaduan' => $pengaduan,
            ]);
        } else {

            $pengaduan = PengaduanModel::where('rt',  auth()->user()->getkeluarga->getrt->rt_id)->orderBy('pengaduan_id', 'desc')->get();
            $breadcrumb = (object) [
                'title' => 'Pengaduan',
                'list' => ['Pages', 'Pengaduan']
            ];
            return view('pengaduan.warga.index', [
                'breadcrumb' => $breadcrumb,
                'pengaduan' => $pengaduan,
            ]);
        }
        // $breadcrumb = (object) [
        //     'title' => 'Pengaduan',
        //     'list' => ['Pages', 'Pengaduan']
        // ];
        // $title = 'Pengaduan';
        // return view('pengaduan.index', [
        //     'breadcrumb' => $breadcrumb,
        //     'title'=> $title,
        //     'pengaduan' => PengaduanModel::all()
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Gate::allows('is-warga')){
        $breadcrumb = (object) [
            'title' => 'Pengaduan',
            'list' => ['Pages', 'Pengaduan']
        ];
        $title = 'Create';
        $pengaduan = new PengaduanModel();
        return view('pengaduan.warga.create', ['breadcrumb' => $breadcrumb], compact('pengaduan'));
    } else {
        $breadcrumb = (object) [
            'title' => 'Pengaduan',
            'list' => ['Pages', 'Pengaduan']
        ];
        $title = 'Create';
        $pengaduan = new PengaduanModel();
        return view('pengaduan.admin.create', ['breadcrumb' => $breadcrumb], compact('pengaduan'));
    }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'jenis' => 'required',
            'deskripsi' => 'required',
            'user' => 'required',
            'rw' => 'required',
            'rt' => 'required',
            'tanggal_pengaduan' => 'required',
            // 'tempat_lahir' => 'required',
            // 'tanggal_lahir' => 'required',
            // 'password' => 'required',
        ]);

        PengaduanModel::create($validatedData);

        return redirect('/pengaduan')->with('success', 'Data pengaduan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $pengaduan = PengaduanModel::where('pengaduan_id', $id)->first();

        $breadcrumb = (object) [
            'title' => 'Detail',
            'list' => ['Pages', 'Pengaduan', 'Detail']
        ];

        return view('pengaduan.warga.show', [
            'breadcrumb' => $breadcrumb,
            'pengaduan' => $pengaduan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if(Gate::allows('is-warga')){
        $breadcrumb = (object) [
            'title' => 'Edit',
            'list' => ['Pages', 'Pengaduan', 'Edit']
        ];

        $pengaduan = PengaduanModel::find($id);
        return view('pengaduan.warga.edit', [
            'pengaduan' => $pengaduan,
            'breadcrumb' => $breadcrumb,
        ]);
    }else{
        $breadcrumb = (object) [
            'title' => 'Edit',
            'list' => ['Pages', 'Pengaduan', 'Edit']
        ];

        $pengaduan = PengaduanModel::find($id);
        return view('pengaduan.admin.edit', [
            'pengaduan' => $pengaduan,
            'breadcrumb' => $breadcrumb,
        ]);
    } 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(Gate::allows('is-warga')){
        $request->validate([
            'judul' => 'required',
            'jenis' => 'required',
            'deskripsi' => 'required',
            'user' => 'required',
            'rw' => 'required',
            'rt' => 'required',
            'tanggal_pengaduan' => 'required',
            // 'tempat_lahir' => 'required',
            // 'tanggal_lahir' => 'required',
            // 'password' => 'nullable',
        ]);

        PengaduanModel::find($id)->update([
            'judul' => $request->judul,
            'jenis' => $request->jenis,
            'deskripsi' => $request->deskripsi,
            'user' => $request->user,
            'rw' => $request->rw,
            'rt' => $request->rt,
            'tanggal_pengaduan' => $request->tanggal_pengaduan,
            // 'tempat_lahir' => $request->tempat_lahir,
            // 'tanggal_lahir' => $request->tanggal_lahir,
            // 'password' => $request->password ? bcrypt($request->password) : User::find($id)->password
        ]);
        return redirect('/pengaduan')->with('success', 'Data pengaduan berhasil diubah');
    }else{
        $request->validate([
            'judul' => 'required',
            'jenis' => 'required',
            'deskripsi' => 'required',
            'user' => 'required',
            'rw' => 'required',
            'rt' => 'required',
            'tanggal_pengaduan' => 'required',
            // 'tempat_lahir' => 'required',
            // 'tanggal_lahir' => 'required',
            // 'password' => 'nullable',
        ]);

        PengaduanModel::find($id)->update([
            'judul' => $request->judul,
            'jenis' => $request->jenis,
            'deskripsi' => $request->deskripsi,
            'user' => $request->user,
            'rw' => $request->rw,
            'rt' => $request->rt,
            'tanggal_pengaduan' => $request->tanggal_pengaduan,
            // 'tempat_lahir' => $request->tempat_lahir,
            // 'tanggal_lahir' => $request->tanggal_lahir,
            // 'password' => $request->password ? bcrypt($request->password) : User::find($id)->password
        ]);
        return redirect('/pengaduan')->with('success', 'Data pengaduan berhasil diubah');  
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
{
    $check = PengaduanModel::find($id);
    if (!$check) {
        return redirect('/pengaduan')->with('error', 'Data stok tidak ditemukan');
    }

    try {
        PengaduanModel::destroy($id);

        return redirect('/pengaduan')->with('success', 'Data pengaduan berhasil dihapus');
    } catch (\Illuminate\Database\QueryException $e) {
        Log::error('Failed to delete pengaduan: ' . $e->getMessage());
        return redirect('/pengaduan')->with('error', 'Data pengaduan gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
    }
}
}
