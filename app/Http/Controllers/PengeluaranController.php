<?php

namespace App\Http\Controllers;

use App\Models\RtModel;
use App\Models\SpModel;
use App\Models\SktmModel;
use Illuminate\Http\Request;
use App\Models\PengaduanModel;
use App\Models\PengumumanModel;
use App\Models\PengeluaranModel;
use Illuminate\Support\Facades\Gate;

class PengeluaranController extends Controller
{
    public function index(Request $request)
    {
        $daftarRT = RtModel::all();

        $tanggal = $request->input('tanggal', now()->format('Y-m'));

        if (Gate::allows('is-rw')) {
            $daftarRT = RtModel::all();
            $rt = $request->input('rt');
            if ($rt) {
                $data = PengeluaranModel::where('rt', $rt)
                    ->whereYear('tanggal', '=', date('Y', strtotime($tanggal)))
                    ->whereMonth('tanggal', '=', date('m', strtotime($tanggal)))
                    ->get();
            } else {
                $data = PengeluaranModel::whereYear('tanggal', '=', date('Y', strtotime($tanggal)))
                    ->whereMonth('tanggal', '=', date('m', strtotime($tanggal)))
                    ->get();
            }
        } else {
            $data = PengeluaranModel::where('rt', auth()->user()->getkeluarga->getrt->rt_id)
                ->whereYear('tanggal', '=', date('Y', strtotime($tanggal)))
                ->whereMonth('tanggal', '=', date('m', strtotime($tanggal)))
                ->get();
        }


        $jumlahPengeluaran = $data->count();
        $totalPengeluaran = $data->sum('jumlah');

        $breadcrumb = (object) [
            'title' => 'Pengeluaran',
            'list' => ['Pages', 'Pengeluaran']
        ];

        if (Gate::allows('is-warga')) {
            $notifPengumuman = PengumumanModel::orderBy('created_at', 'desc')->take(3)->get();
        } elseif (Gate::allows('is-rt')) {
            $notifPengaduan = PengaduanModel::orderBy('created_at', 'desc')->take(3)->get();
            $notifSktm = SktmModel::orderBy('created_at', 'desc')->take(3)->get();
            $notifSp = SpModel::orderBy('created_at', 'desc')->take(3)->get();
        }

        return view('pengeluaran.index', [
            'breadcrumb' => $breadcrumb,
            'pengeluaran' => $data,
            'tanggal' => $tanggal,
            'daftarRT' => $daftarRT,
            'jumlahPengeluaran' => $jumlahPengeluaran,
            'totalPengeluaran' => $totalPengeluaran,
            'notifPengumuman' => (Gate::allows('is-warga')) ? $notifPengumuman : null,
            'notifPengaduan' => (Gate::allows('is-rt')) ? $notifPengaduan : null,
            'notifSktm' => (Gate::allows('is-rt')) ? $notifSktm : null,
            'notifSp' => (Gate::allows('is-rt')) ? $notifSp : null,
        ]);
    }
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Create',
            'list' => ['Pages', 'Pengeluaran', 'Create']
        ];

        if (Gate::allows('is-warga')) {
            $notifPengumuman = PengumumanModel::orderBy('created_at', 'desc')->take(3)->get();
        } elseif (Gate::allows('is-rt')) {
            $notifPengaduan = PengaduanModel::orderBy('created_at', 'desc')->take(3)->get();
            $notifSktm = SktmModel::orderBy('created_at', 'desc')->take(3)->get();
            $notifSp = SpModel::orderBy('created_at', 'desc')->take(3)->get();
        }


        return view('pengeluaran.create', [
            'breadcrumb' => $breadcrumb,
            'notifPengumuman' => (Gate::allows('is-warga')) ? $notifPengumuman : null,
            'notifPengaduan' => (Gate::allows('is-rt')) ? $notifPengaduan : null,
            'notifSktm' => (Gate::allows('is-rt')) ? $notifSktm : null,
            'notifSp' => (Gate::allows('is-rt')) ? $notifSp : null,
        ]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'rt' => 'required',
            'deskripsi' => ['required', function ($attribute, $value, $fail) {
                if (str_word_count($value) > 225) {
                    $fail('The ' . $attribute . ' must not exceed 225 words.');
                }
            }],
            'jumlah' => 'required|numeric',
            'tanggal' => 'required',
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
        if (Gate::allows('is-warga')) {
            $notifPengumuman = PengumumanModel::orderBy('created_at', 'desc')->take(3)->get();
        } elseif (Gate::allows('is-rt')) {
            $notifPengaduan = PengaduanModel::orderBy('created_at', 'desc')->take(3)->get();
            $notifSktm = SktmModel::orderBy('created_at', 'desc')->take(3)->get();
            $notifSp = SpModel::orderBy('created_at', 'desc')->take(3)->get();
        }
        $data = PengeluaranModel::find($id);

        return view('pengeluaran.edit', [
            'breadcrumb' => $breadcrumb,
            'data' => $data,
            'notifPengumuman' => (Gate::allows('is-warga')) ? $notifPengumuman : null,
            'notifPengaduan' => (Gate::allows('is-rt')) ? $notifPengaduan : null,
            'notifSktm' => (Gate::allows('is-rt')) ? $notifSktm : null,
            'notifSp' => (Gate::allows('is-rt')) ? $notifSp : null,
        ]);
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'deskripsi' => ['required', function ($attribute, $value, $fail) {
                if (str_word_count($value) > 225) {
                    $fail('The ' . $attribute . ' must not exceed 225 words.');
                }
            }],
            'jumlah' => 'required|numeric',
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
