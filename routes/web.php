<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrganisasiController;
use App\Http\Controllers\AnggotaOrganisasiController;
use App\Http\Controllers\SuratController;
use App\Models\AsetModel;
use App\Models\KartuKeluargaModel;
use App\Models\KeluargaModel;
use App\Models\PengumumanModel;
use Illuminate\Validation\Rules\Can;
use Illuminate\Support\Facades\Gate;
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

    return view('welcome', [
        'title' => 'Dahboard',
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

    return view('aset.warga.index', [
        'title' => 'peminjaman',
        'data' => $data
    ]);
});


Route::get('/pengumuman', function () {

    if (Gate::allows('is-rt')) {

        $data = PengumumanModel::where('rt',  auth()->user()->getkeluarga->getrt->rt_id)->orderBy('pengumuman_id', 'desc')->get();

        return view('pengumuman.admin.index', [
            'title' => 'pengumuman',
            'data' => $data
        ]);
    } else {

        $data = PengumumanModel::where('rt',  auth()->user()->getkeluarga->getrt->rt_id)->orderBy('pengumuman_id', 'desc')->get();

        return view('pengumuman.warga.index', [
            'title' => 'pengumuman',
            'data' => $data
        ]);
    }
});

Route::get('/pengumuman/{id}', function (String $id) {

    $data = PengumumanModel::where('pengumuman_id', $id)->first();

    return view('pengumuman.show', [
        'title' => 'Detail pengumuman',
        'data' => $data
    ]);
})->middleware('warga');





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

    return view('keluarga.index', [
        'title' => 'Kartu Keluarga',
        'data' => $data,
        'anggota' => $anggota
    ]);
});
