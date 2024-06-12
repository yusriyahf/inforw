<?php

namespace App\Http\Controllers;

use App\Models\KeluargaModel;
use App\Models\User;
use App\Models\RtModel;
use App\Models\SpModel;
use App\Models\SktmModel;
use Illuminate\Http\Request;
use App\Models\PengaduanModel;
use App\Models\PengumumanModel;
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

        if (Gate::allows('is-warga')) {
            $notifPengumuman = PengumumanModel::orderBy('created_at', 'desc')->take(3)->get();
        } elseif (Gate::allows('is-rt')) {
            $notifPengaduan = PengaduanModel::orderBy('created_at', 'desc')->take(3)->get();
            $notifSktm = SktmModel::orderBy('created_at', 'desc')->take(3)->get();
            $notifSp = SpModel::orderBy('created_at', 'desc')->take(3)->get();
        }

        return view('warga.index', [
            'breadcrumb' => $breadcrumb,
            'warga' => $data,
            'daftarRT' => $daftarRT,
            'notifPengumuman' => (Gate::allows('is-warga')) ? $notifPengumuman : null,
            'notifPengaduan' => (Gate::allows('is-rt')) ? $notifPengaduan : null,
            'notifSktm' => (Gate::allows('is-rt')) ? $notifSktm : null,
            'notifSp' => (Gate::allows('is-rt')) ? $notifSp : null,
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
        $keluarga = KeluargaModel::where('rt', auth()->user()->getkeluarga->rt)->get();



        if (Gate::allows('is-warga')) {
            $notifPengumuman = PengumumanModel::orderBy('created_at', 'desc')->take(3)->get();
        } elseif (Gate::allows('is-rt')) {
            $notifPengaduan = PengaduanModel::orderBy('created_at', 'desc')->take(3)->get();
            $notifSktm = SktmModel::orderBy('created_at', 'desc')->take(3)->get();
            $notifSp = SpModel::orderBy('created_at', 'desc')->take(3)->get();
        }

        return view('warga.create', [
            'breadcrumb' => $breadcrumb,
            'notifPengumuman' => (Gate::allows('is-warga')) ? $notifPengumuman : null,
            'notifPengaduan' => (Gate::allows('is-rt')) ? $notifPengaduan : null,
            'notifSktm' => (Gate::allows('is-rt')) ? $notifSktm : null,
            'notifSp' => (Gate::allows('is-rt')) ? $notifSp : null,
            'keluarga' => $keluarga
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nik' => 'required|numeric|digits:16',
            'nama' => 'required|max:30',
            'pekerjaan' => 'required|max:30',
            'status_perkawinan' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required|max:30',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'notelp' => 'required|numeric',
            'keluarga' => 'required'
        ]);

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

        $keluarga = KeluargaModel::where('rt', auth()->user()->getkeluarga->rt)->get();

        if (Gate::allows('is-warga')) {
            $notifPengumuman = PengumumanModel::orderBy('created_at', 'desc')->take(3)->get();
        } elseif (Gate::allows('is-rt')) {
            $notifPengaduan = PengaduanModel::orderBy('created_at', 'desc')->take(3)->get();
            $notifSktm = SktmModel::orderBy('created_at', 'desc')->take(3)->get();
            $notifSp = SpModel::orderBy('created_at', 'desc')->take(3)->get();
        }

        $warga = User::find($id);

        return view('warga.edit', [
            'warga' => $warga,
            'breadcrumb' => $breadcrumb,
            'keluarga' => $keluarga,
            'notifPengumuman' => (Gate::allows('is-warga')) ? $notifPengumuman : null,
            'notifPengaduan' => (Gate::allows('is-rt')) ? $notifPengaduan : null,
            'notifSktm' => (Gate::allows('is-rt')) ? $notifSktm : null,
            'notifSp' => (Gate::allows('is-rt')) ? $notifSp : null,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        $request->validate([
            'nik' => 'required|numeric|digits:16',
            'nama' => 'required|max:30',
            'pekerjaan' => 'required|max:30',
            'status_perkawinan' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required|max:50',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'notelp' => 'required|numeric',
            'keluarga' => 'required',
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
            'keluarga' => $request->keluarga,
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
