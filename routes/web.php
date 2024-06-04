<?php

use Carbon\Carbon;
use App\Models\User;
use App\Models\RtModel;
use App\Models\SpModel;
use App\Models\AsetModel;
use App\Models\SktmModel;
use App\Models\KeluargaModel;
use App\Models\PemasukanModel;
use App\Models\PengaduanModel;
use App\Models\PeminjamanModel;
use App\Models\PengeluaranModel;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RtController;
use App\Http\Controllers\RwController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SuratController;

use App\Http\Controllers\BansosController;

use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\OrganisasiController;
// use Illuminate\Auth\Access\Gate;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\AnggotaOrganisasiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {

//     $data = KeluargaModel::with(['getrw', 'getrt'])->first();
//     $breadcrumb = (object) [
//         'title' => 'Dashboard',
//         'list' => ['Pages', 'Dashboard']
//     ];

//     return view('welcome', [
//         'breadcrumb' => $breadcrumb,
//         'data' => $data
//     ]);
// })->middleware('auth');
Route::get('/', function () {
    $data = KeluargaModel::with(['getrw', 'getrt'])->first();

    // Mengambil data pemasukan
    $pemasukan = PemasukanModel::where('rt', auth()->user()->getkeluarga->getrt->rt_id)->get();
    $pemasukanGroupedByMonth = $pemasukan->groupBy(function ($item) {
        // Mengonversi string tanggal menjadi objek DateTime
        $tanggal = new DateTime($item->tanggal);
        // Mengembalikan bulan dalam format 'm'
        return $tanggal->format('m');
    });

    $totalPemasukan = PemasukanModel::where('rt', auth()->user()->getkeluarga->getrt->rt_id)
        ->sum('jumlah');
    $totalPengeluaran = PengeluaranModel::where('rt', auth()->user()->getkeluarga->getrt->rt_id)
        ->sum('jumlah');
    $totalSaldo = $totalPemasukan - $totalPengeluaran;

    $pemasukanTotal = [];
    // Menambahkan data untuk setiap bulan
    for ($i = 1; $i <= 12; $i++) {
        $bulan = str_pad($i, 2, '0', STR_PAD_LEFT); // Formatkan bulan menjadi dua digit (01, 02, dst)
        $total = $pemasukanGroupedByMonth->has($bulan) ? $pemasukanGroupedByMonth[$bulan]->sum('jumlah') : 0;
        $pemasukanTotal[] = $total;
    }

    // Mengambil data pengeluaran
    $pengeluaran = PengeluaranModel::where('rt', auth()->user()->getkeluarga->getrt->rt_id)->get();
    $pengeluaranGroupedByMonth = $pengeluaran->groupBy(function ($item) {
        // Mengonversi string tanggal menjadi objek DateTime
        $tanggal = new DateTime($item->tanggal);
        // Mengembalikan bulan dalam format 'm'
        return $tanggal->format('m');
    });
    $pengeluaranTotal = [];
    // Menambahkan data untuk setiap bulan
    for ($i = 1; $i <= 12; $i++) {
        $bulan = str_pad($i, 2, '0', STR_PAD_LEFT); // Formatkan bulan menjadi dua digit (01, 02, dst)
        $total = $pengeluaranGroupedByMonth->has($bulan) ? $pengeluaranGroupedByMonth[$bulan]->sum('jumlah') : 0;
        $pengeluaranTotal[] = $total;
    }

    $breadcrumb = (object) [
        'title' => 'Dashboard',
        'list' => ['Pages', 'Dashboard']
    ];

    // Total Warga
    if (Gate::allows('is-rt')) {
        $totalWarga = User::whereHas('getkeluarga.getrt', function ($query) {
            $query->where('rt_id', auth()->user()->getkeluarga->getrt->rt_id);
        })->count();
    } elseif (Gate::allows('is-rw')) {
        $totalWarga = User::count() - 1;
    }

    // Total Pengaduan
    if (Gate::allows('is-rt')) {
        $totalPengaduan = PengaduanModel::where('rt', auth()->user()->getkeluarga->getrt->rt_id)->count();
    } elseif (Gate::allows('is-rw')) {
        $totalPengaduan = PengaduanModel::count();
    }

    // Total Surat
    if (Gate::allows('is-rt')) {
        $totalSktm = SktmModel::where('rt', auth()->user()->getkeluarga->getrt->rt_id)->count();
        $totalSp = SpModel::where('rt', auth()->user()->getkeluarga->getrt->rt_id)->count();
        $totalSurat = $totalSktm + $totalSp;
    } elseif (Gate::allows('is-rw')) {
        $totalSktm = SktmModel::count();
        $totalSp = SpModel::count();
        $totalSurat = $totalSktm + $totalSp;
    }
    // Total Peminjaman
    if (Gate::allows('is-rt')) {
        $totalPeminjaman = PeminjamanModel::where('rt', auth()->user()->getkeluarga->getrt->rt_id)->count();
    } elseif (Gate::allows('is-rw')) {
        $totalPeminjaman = PeminjamanModel::count();
    }

    // umur chart
    if (Gate::allows('is-rt')) {
        $users = User::whereHas('getkeluarga.getrt', function ($query) {
            $query->where('rt_id', auth()->user()->getkeluarga->getrt->rt_id);
        })->get();
    } elseif (Gate::allows('is-rw')) {
        $users = User::whereNotIn('user_id', [1])->get();
    }

    // Inisialisasi variabel untuk menyimpan jumlah pengguna dalam setiap kelompok umur
    if (Gate::allows('is-rt') || Gate::allows('is-rw')) {
        $anakAnakCount = 0;
        $remajaCount = 0;
        $dewasaCount = 0;
        $lansiaCount = 0;

        // Kelompokkan usia pengguna dan hitung jumlahnya
        foreach ($users as $user) {
            $tanggalLahir = Carbon::parse($user->tanggal_lahir);
            $usia = $tanggalLahir->diffInYears(Carbon::now());

            if ($usia >= 5 && $usia <= 11) {
                $anakAnakCount++;
            } elseif ($usia >= 12 && $usia <= 25) {
                $remajaCount++;
            } elseif ($usia >= 26 && $usia <= 45) {
                $dewasaCount++;
            } elseif ($usia >= 46 && $usia <= 100) {
                $lansiaCount++;
            }
        }

        // Buat data untuk pie chart
        $umurChartData = [
            'Anak-anak (5-11 tahun)' => $anakAnakCount,
            'Remaja (12-25 tahun)' => $remajaCount,
            'Dewasa (26-45 tahun)' => $dewasaCount,
            'Lansia (46-100 tahun)' => $lansiaCount,
        ];

        $maleCount = 0;
        $femaleCount = 0;

        // Kelompokkan pengguna berdasarkan jenis kelamin dan hitung jumlahnya
        foreach ($users as $user) {
            if ($user->jenis_kelamin === 'laki-laki') {
                $maleCount++;
            } elseif ($user->jenis_kelamin === 'perempuan') {
                $femaleCount++;
            }
        }

        // Buat data untuk bar chart
        $jenisKelaminChartData = [
            'Laki-laki' => $maleCount,
            'Perempuan' => $femaleCount,
        ];
    }

    return view('welcome', [
        'breadcrumb' => $breadcrumb,
        'data' => $data,
        'pemasukanChartData' => $pemasukanTotal,
        'pengeluaranChartData' => $pengeluaranTotal,
        'totalPemasukan' => $totalPemasukan,
        'totalPengeluaran' => $totalPengeluaran,
        'totalSaldo' => $totalSaldo,
        'totalWarga' => (Gate::allows('is-rt') || Gate::allows('is-rw')) ? $totalWarga : null,
        'totalPengaduan' => (Gate::allows('is-rt') || Gate::allows('is-rw')) ? $totalPengaduan : null,
        'totalSurat' => (Gate::allows('is-rt') || Gate::allows('is-rw')) ? $totalSurat : null,
        'totalPeminjaman' => (Gate::allows('is-rt') || Gate::allows('is-rw')) ? $totalPeminjaman : null,
        'umurChartData' => (Gate::allows('is-rt') || Gate::allows('is-rw')) ? $umurChartData : null,
        'jenisKelaminChartData' => (Gate::allows('is-rt') || Gate::allows('is-rw')) ? $jenisKelaminChartData : null,
    ]);
})->middleware('auth');

Route::get('generate-pdf', [App\Http\Controllers\PdfController::class, 'index']);







Route::get('/warga', [UserController::class, 'index'])->middleware('auth');;
Route::delete('/warga/{id}', [UserController::class, 'destroy']);
Route::get('/warga/create', [UserController::class, 'create']);
Route::post('/warga/create', [UserController::class, 'store']);
Route::get('/warga/{id}/edit', [UserController::class, 'edit']);
Route::put('/warga/{id}', [UserController::class, 'update']);

Route::post('/daftarorganisasi/create', [AnggotaOrganisasiController::class, 'store']);

Route::group(['prefix' => 'organisasi'], function () {
    Route::get('/', [OrganisasiController::class, 'index'])->middleware('auth');
    Route::get('/{id}', [OrganisasiController::class, 'show']);
    Route::delete('/{id}', [OrganisasiController::class, 'destroy']);
    Route::get('/create', [OrganisasiController::class, 'create']);
    Route::post('/create', [OrganisasiController::class, 'store']);
    Route::get('/{id}/edit', [OrganisasiController::class, 'edit']);
    Route::put('/{id}', [OrganisasiController::class, 'update']);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/profile', [ProfileController::class, 'index']);
Route::post('/profile', [ProfileController::class, 'update']);
Route::get('/profile/edit', [ProfileController::class, 'edit']);


Route::get('/peminjaman', function () {

    return view('peminjaman.index', [
        'title' => 'peminjaman'
    ]);
});

Route::get('/aset', function () {

    $data = AsetModel::where('rt', auth()->user()->getkeluarga->rt)->get();

    $breadcrumb = (object) [
        'title' => 'Aset',
        'list' => ['Pages', 'Aset']
    ];

    return view('aset.warga.index', [
        'breadcrumb' => $breadcrumb,
        'data' => $data
    ]);
});


Route::get('/pengumuman', [PengumumanController::class, 'index']);
Route::get('/pengumuman/create', [PengumumanController::class, 'create']);
Route::post('/pengumuman/create', [PengumumanController::class, 'store']);
Route::get('/pengumuman/{id}', [PengumumanController::class, 'show']);
Route::get('/pengumuman/{id}/edit', [PengumumanController::class, 'edit']);
Route::put('/pengumuman/{id}', [PengumumanController::class, 'update']);
Route::delete('/pengumuman/{id}', [PengumumanController::class, 'destroy']);

Route::get('/pemasukan', [PemasukanController::class, 'index']);
Route::get('/pemasukan/create', [PemasukanController::class, 'create']);
Route::post('/pemasukan/create', [PemasukanController::class, 'store']);
Route::get('/pemasukan/{id}', [PemasukanController::class, 'show']);
Route::get('/pemasukan/{id}/edit', [PemasukanController::class, 'edit']);
Route::put('/pemasukan/{id}', [PemasukanController::class, 'update']);
Route::delete('/pemasukan/{id}', [PemasukanController::class, 'destroy']);

Route::get('/laporan', [LaporanController::class, 'index']);
Route::get('/laporan/create', [LaporanController::class, 'create']);
Route::post('/laporan/create', [LaporanController::class, 'store']);
Route::get('/laporan/{id}', [LaporanController::class, 'show']);
Route::get('/laporan/{id}/edit', [LaporanController::class, 'edit']);
Route::put('/laporan/{id}', [LaporanController::class, 'update']);
Route::delete('/laporan/{id}', [LaporanController::class, 'destroy']);



Route::get('/rt', [RtController::class, 'index']);
Route::get('/rw', [RwController::class, 'index']);


Route::get('/surat', [SuratController::class, 'index']);
Route::get('/sp', [SuratController::class, 'sp']);
Route::post('/sp/create', [SuratController::class, 'storesp']);
Route::get('/sp/{id}', [SuratController::class, 'showsp']);
Route::get('/sktm', [SuratController::class, 'sktm']);
Route::post('/sktm/create', [SuratController::class, 'storesktm']);
Route::get('/sktm/{id}', [SuratController::class, 'showsktm']);


Route::delete('/warga/{id}', [UserController::class, 'destroy']);

Route::get('/pengaduan', [PengaduanController::class, 'index']);
Route::delete('/pengaduan/{id}', [PengaduanController::class, 'destroy']);
Route::get('/pengaduan/create', [PengaduanController::class, 'create']);
Route::post('/pengaduan/create', [PengaduanController::class, 'store']);
Route::get('/pengaduan/{id}/edit', [PengaduanController::class, 'edit']);
Route::put('/pengaduan/{id}', [PengaduanController::class, 'update']);


Route::get('/keluarga', function () {
    $data = KeluargaModel::where('keluarga_id', auth()->user()->keluarga)->first();

    $anggota = User::where('keluarga', auth()->user()->keluarga)->get();

    $breadcrumb = (object) [
        'title' => 'Kartu Keluarga',
        'list' => ['Pages', 'Kartu Keluarga']
    ];

    return view('keluarga.index', [
        'breadcrumb' => $breadcrumb,
        'data' => $data,
        'anggota' => $anggota
    ]);
});
Route::group(['prefix' => 'pengeluaran'], function () {
    Route::get('/', [PengeluaranController::class, 'index'])->middleware('auth');
    Route::delete('/{id}', [PengeluaranController::class, 'destroy']);
    Route::get('/create', [PengeluaranController::class, 'create']);
    Route::post('/create', [PengeluaranController::class, 'store']);
    Route::get('/{id}/edit', [PengeluaranController::class, 'edit']);
    Route::put('/{id}', [PengeluaranController::class, 'update']);
});
Route::group(['prefix' => 'kegiatan'], function () {
    Route::get('/', [KegiatanController::class, 'index'])->middleware('auth');
    Route::delete('/{id}', [KegiatanController::class, 'destroy']);
    Route::get('/create', [KegiatanController::class, 'create']);
    Route::post('/create', [KegiatanController::class, 'store']);
    Route::get('/{id}/edit', [KegiatanController::class, 'edit']);
    Route::put('/{id}', [KegiatanController::class, 'update']);
});


//BANSOS di RW
Route::group(['prefix' => 'bansos'], function () {
    Route::get('/', [BansosController::class, 'index'])->middleware('auth');
    Route::get('/create', [BansosController::class, 'create'])->name('tambahBansos'); //buat data bansos
    Route::delete('/{id}', [BansosController::class, 'destroy']);
    Route::get('/{bansos_id}', [BansosController::class, 'detailBansos']); //lihat detail bansos
    Route::get('/{bansos_id}/kriteria/{kriteria_id}', [BansosController::class, 'detailKriteria'])->name('showSubKriteria'); //lihat detail kriteria yang berisi sub kriteria
    Route::post('/create', [BansosController::class, 'store']); //simpan data baru bansos
    Route::get('/create/{bansos_id}/kriteria', [BansosController::class, 'addKriteria'])->name('addKriteria'); //buat kriteria bansos
    Route::post('/create/{bansos_id}/kriteria', [BansosController::class, 'storeKriteria'])->name('saveKriteria'); //simpan
    Route::get('/create/{bansos_id}/kriteria/addSubKriteria', [BansosController::class, 'addSubKriteria'])->name('addSubKriteria'); //buat sub kriteria
    Route::post('/create/{bansos_id}/kriteria/addSubKriteria', [BansosController::class, 'storeSubKriteria'])->name('saveSubKriteria'); //simpan
    Route::get('/create/{bansos_id}/bobot', [BansosController::class, 'addBobot'])->name('addBobot'); //buat bobot
    Route::post('/create/{bansos_id}/bobot', [BansosController::class, 'storeBobot'])->name('saveBobot'); //simpan
});
