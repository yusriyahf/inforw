<?php

use App\Models\User;
use App\Models\RtModel;
use App\Models\AsetModel;
use App\Models\KeluargaModel;
use Database\Seeders\RtSeeder;
use App\Models\PengumumanModel;
use App\Models\KartuKeluargaModel;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rules\Can;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RtController;
use App\Http\Controllers\RwController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\OrganisasiController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\AnggotaOrganisasiController;
use App\Http\Controllers\PengeluaranController;

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

Route::get('/', function () {

    $data = KeluargaModel::with(['getrw', 'getrt'])->first();

    $breadcrumb = (object) [
        'title' => 'Dashboard',
        'list' => ['Pages', 'Dashboard']
    ];

    return view('welcome', [
        'breadcrumb' => $breadcrumb,
        'data' => $data
    ]);
})->middleware('auth');



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

Route::get('/rt', [RtController::class, 'index']);
Route::get('/rw', [RwController::class, 'index']);


Route::get('/surat', [SuratController::class, 'index']);
Route::get('/sp', [SuratController::class, 'sp']);
Route::post('/sp/create', [SuratController::class, 'storesp']);
Route::get('/sp/{id}', [SuratController::class, 'showsp']);
Route::get('/sktm', [SuratController::class, 'sktm']);
Route::post('/sktm/create', [SuratController::class, 'storesktm']);
Route::get('/sktm/{id}', [SuratController::class, 'showsktm']);


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

