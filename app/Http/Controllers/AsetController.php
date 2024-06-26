<?php

namespace App\Http\Controllers;

use App\Models\RtModel;
use App\Models\SpModel;
use App\Models\AsetModel;
use App\Models\PeminjamanModel;
use App\Models\SktmModel;
use Illuminate\Http\Request;
use App\Models\PengaduanModel;
use App\Models\PengumumanModel;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;

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

        $rts = RtModel::all();

        if (Gate::allows('is-warga')) {
            $notifPengumuman = PengumumanModel::orderBy('created_at', 'desc')->take(3)->get();
            $data = AsetModel::where('rt', auth()->user()->getkeluarga->getrt->rt_id)
                ->orWhereNull('rt')
                ->orderBy('aset_id', 'desc')
                ->get();

            $cek = PeminjamanModel::where('tanggal_pinjam', now()->format('Y-m-d'))
                ->where('status', 'disetujui')
                ->orWhere('status','proses')
                ->pluck('aset');
            // dd($cek);
            foreach ($data as $key => $d) {
                if($cek->contains($d->aset_id)){
                    $d->update([
                        'status' => 'tidak tersedia'
                    ]);
                }else{
                    $d->update([
                        'status' => 'tersedia'
                    ]);
                }
            }
            $peminjaman = PeminjamanModel::where('peminjam',auth()->user()->user_id);
            return view('aset.warga.index', [
                'breadcrumb' => $breadcrumb,
                'title' => $title,
                'data' => $data,
                'peminjaman' => $peminjaman,
                'notifPengumuman' => (Gate::allows('is-warga')) ? $notifPengumuman : null,
            ]);
        } elseif (Gate::allows('is-rt')) {
            $notifPengaduan = PengaduanModel::orderBy('created_at', 'desc')->take(3)->get();
            $notifSktm = SktmModel::orderBy('created_at', 'desc')->take(3)->get();
            $notifSp = SpModel::orderBy('created_at', 'desc')->take(3)->get();
            $data = AsetModel::where('rt', auth()->user()->getkeluarga->getrt->rt_id)
                ->orWhereNull('rt')
                ->orderBy('aset_id', 'desc')
                ->get();

            $cek = PeminjamanModel::where('tanggal_pinjam', now()->format('Y-m-d'))
                ->where('status', 'disetujui')
                ->orWhere('status','proses')
                ->pluck('aset');
            // dd($cek);
            foreach ($data as $key => $d) {
                if($cek->contains($d->aset_id)){
                    $d->update([
                        'status' => 'tidak tersedia'
                    ]);
                }else{
                    $d->update([
                        'status' => 'tersedia'
                    ]);
                }
            }
            return view('aset.index', [
                'breadcrumb' => $breadcrumb,
                'asets' => $data,
                'title' => $title,
                'data' => $data,
                'rts' => $rts,
                'notifPengaduan' => (Gate::allows('is-rt')) ? $notifPengaduan : null,
                'notifSktm' => (Gate::allows('is-rt')) ? $notifSktm : null,
                'notifSp' => (Gate::allows('is-rt')) ? $notifSp : null,
            ]);
        } elseif (Gate::allows('is-rw')) {
            $notifPengaduan = PengaduanModel::orderBy('created_at', 'desc')->take(3)->get();
            $notifSktm = SktmModel::orderBy('created_at', 'desc')->take(3)->get();
            $notifSp = SpModel::orderBy('created_at', 'desc')->take(3)->get();
            $data = AsetModel::orderBy('aset_id', 'desc')->get();
            $cek = PeminjamanModel::where('tanggal_pinjam', now()->format('Y-m-d'))
                ->where('status', 'disetujui')
                ->orWhere('status','proses')
                ->pluck('aset');
            // dd($cek);
            foreach ($data as $key => $d) {
                if($cek->contains($d->aset_id)){
                    $d->update([
                        'status' => 'tidak tersedia'
                    ]);
                }else{
                    $d->update([
                        'status' => 'tersedia'
                    ]);
                }
            }
            return view('aset.index', [
                'breadcrumb' => $breadcrumb,
                'asets' => $data,
                'title' => $title,
                'data' => $data,
                'rts' => $rts,
                'notifPengaduan' => (Gate::allows('is-rt')) ? $notifPengaduan : null,
                'notifSktm' => (Gate::allows('is-rt')) ? $notifSktm : null,
                'notifSp' => (Gate::allows('is-rt')) ? $notifSp : null,
            ]);
        }
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

        if (Gate::allows('is-warga')) {
            $notifPengumuman = PengumumanModel::orderBy('created_at', 'desc')->take(3)->get();
        } elseif (Gate::allows('is-rt')) {
            $notifPengaduan = PengaduanModel::orderBy('created_at', 'desc')->take(3)->get();
            $notifSktm = SktmModel::orderBy('created_at', 'desc')->take(3)->get();
            $notifSp = SpModel::orderBy('created_at', 'desc')->take(3)->get();
        }


        return view('aset.create', [
            'breadcrumb' => $breadcrumb,
            'notifPengumuman' => (Gate::allows('is-warga')) ? $notifPengumuman : null,
            'notifPengaduan' => (Gate::allows('is-rt')) ? $notifPengaduan : null,
            'notifSktm' => (Gate::allows('is-rt')) ? $notifSktm : null,
            'notifSp' => (Gate::allows('is-rt')) ? $notifSp : null,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'deskripsi' => 'required',
            'status' => 'required',
        ];

        if (Gate::allows('is-rt')) {
            $rules['rt'] = 'required';
        } elseif (Gate::allows('is-rw')) {
            $rules['rw'] = 'required';
        }

        $validatedData = $request->validate($rules);

        if ($request->hasFile('gambar')) {
            $extfile = $request->file('gambar')->getClientOriginalExtension();

            $judulFormatted = strtolower(str_replace(' ', '', $request->nama));
            $namaFile = $judulFormatted . '.' . $extfile;

            $request->file('gambar')->move(public_path('gambar/aset'), $namaFile);
            $validatedData['gambar'] = $namaFile;
        }

        AsetModel::create($validatedData);

        return redirect('/aset')->with('success', 'Data aset berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(AsetModel $asetModel)
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
            'list' => ['Pages', 'Aset', 'Edit']
        ];

        $aset = AsetModel::find($id);

        $notifPengaduan = PengaduanModel::orderBy('created_at', 'desc')->take(3)->get();
        $notifSktm = SktmModel::orderBy('created_at', 'desc')->take(3)->get();
        $notifSp = SpModel::orderBy('created_at', 'desc')->take(3)->get();

        return view('aset.edit', [
            'breadcrumb' => $breadcrumb,
            'aset' => $aset,
            'notifPengaduan' => $notifPengaduan,
            'notifSktm' => $notifSktm,
            'notifSp' => $notifSp,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'jenis' => 'required',
        ]);

        $aset = AsetModel::findOrFail($id);

        $namaFile = $aset->gambar;

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($namaFile && File::exists(public_path('gambar/aset/' . $namaFile))) {
                File::delete(public_path('gambar/aset/' . $namaFile));
            }

            $extfile = $request->file('gambar')->getClientOriginalExtension();
            $judulFormatted = strtolower(str_replace(' ', '', $request->nama));
            $namaFile = $judulFormatted . '.' . $extfile;
            $request->file('gambar')->move(public_path('gambar/aset/'), $namaFile);
        }

        $aset->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'jenis' => $request->jenis,
            'gambar' => $namaFile,
        ]);

        return redirect('/aset')->with('success', 'Data Aset Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $check = AsetModel::find($id);
        if (!$check) {
            return redirect('/aset')->with('error', 'Data aset tidak ditemukan');
        }

        try {
            if ($check->gambar && File::exists(public_path('gambar/aset/' . $check->gambar))) {
                File::delete(public_path('gambar/aset/' . $check->gambar));
            }

            $check->delete();

            return redirect('/aset')->with('success', 'Data aset berhasil dihapus');
        } catch (\illuminate\Database\QueryException $e) {
            return redirect('/aset')->with('error' . 'Data aset gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }

    public function pinjam(Request $request, $aset_id){
        // dd($request);
        $request->validate([
            'keterangan' => 'required|max:255',
            'tanggal_pinjam' => 'required'
        ]);
        
        $peminjam = PeminjamanModel::create([
            'peminjam' => auth()->user()->user_id,
            'aset' => $aset_id,
            'rt' => auth()->user()->getkeluarga->getrt->rt_id,
            'keterangan' => $request->keterangan,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'status' => 'proses' 
        ]);

        if ($peminjam) {
            AsetModel::where('aset_id',$aset_id)->update(['status'=>'tidak tersedia']);
            return redirect('/aset')->with('success', 'Peminjaman sedang diproses');
        }else{
            return redirect('/aset')->with('error' . 'Terjadi kesalahan');
        }
    }

    public function riwayat(){
        $breadcrumb = (object) [
            'title' => 'Riwayat Peminjaman Aset',
            'list' => ['Pages', 'Aset','riwayatPeminjaman']
        ];

        // if (Gate::allows('is-warga')) {
            $notifPengumuman = PengumumanModel::orderBy('created_at', 'desc')->take(3)->get();
            $peminjaman = PeminjamanModel::with(['getAset'])->where('peminjam',auth()->user()->user_id)->get();
            return view('aset.warga.daftarPeminjaman', [
                'breadcrumb' => $breadcrumb,
                'peminjaman' => $peminjaman,
                'notifPengumuman' => (Gate::allows('is-warga')) ? $notifPengumuman : null,
            ]);
        // }else{
            // echo 'salah';
        // }
    }

    //acc peminjaman di rw dan rt
    public function peminjaman(){
        $breadcrumb = (object) [
            'title' => 'Aset',
            'list' => ['Pages', 'Peminjaman']
        ];


        if (Gate::allows('is-rw')) {
            $notifPengaduan = PengaduanModel::orderBy('created_at', 'desc')->take(3)->get();
            $notifSktm = SktmModel::orderBy('created_at', 'desc')->take(3)->get();
            $notifSp = SpModel::orderBy('created_at', 'desc')->take(3)->get();

            $aset = AsetModel::where('rt', NULL)->pluck('aset_id');
            $peminjaman = PeminjamanModel::with(['getAset','getPeminjam','getRT'])->whereIN('aset',$aset)->get();
            return view('aset.peminjaman', [
                'breadcrumb' => $breadcrumb,
                'notifPengaduan' => (Gate::allows('is-rt')) ? $notifPengaduan : null,
                'notifSktm' => (Gate::allows('is-rt')) ? $notifSktm : null,
                'notifSp' => (Gate::allows('is-rt')) ? $notifSp : null,
                'peminjaman' => $peminjaman
            ]);
        } elseif (Gate::allows('is-rt')) {
            $notifPengaduan = PengaduanModel::orderBy('created_at', 'desc')->take(3)->get();
            $notifSktm = SktmModel::orderBy('created_at', 'desc')->take(3)->get();
            $notifSp = SpModel::orderBy('created_at', 'desc')->take(3)->get();

            $aset = AsetModel::where('rt', auth()->user()->getkeluarga->getrt->rt_id)->pluck('aset_id');
            $peminjaman = PeminjamanModel::with(['getAset','getPeminjam'])->whereIN('aset', $aset)->get();
            return view('aset.peminjaman', [
                'breadcrumb' => $breadcrumb,
                'notifPengaduan' => (Gate::allows('is-rt')) ? $notifPengaduan : null,
                'notifSktm' => (Gate::allows('is-rt')) ? $notifSktm : null,
                'notifSp' => (Gate::allows('is-rt')) ? $notifSp : null,
                'peminjaman' => $peminjaman
            ]);
        }
    }

    public function setujui($peminjaman_id, $status){
        // dd($status);
        PeminjamanModel::where('peminjaman_id',$peminjaman_id)->update([
            'status' => $status
        ]);
        return redirect('/peminjaman')->with('success',"Permintaan $status");
    }
}
