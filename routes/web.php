<?php

use App\Models\User;


use App\Models\Asrama;

/* Admin */
use App\Models\Dokter;
use App\Models\Mahasiswa;
use App\Models\Notifikasi;
use App\Models\PetugasAsrama;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;

/* Dokter */
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AsramaController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\HubungkanAkunController;
use App\Http\Controllers\PetugasAsramaController;
use App\Http\Controllers\RiwayatPenyakitController;
use App\Http\Controllers\DokterKonsultasiController;
use App\Http\Controllers\DokterRekamMedisController;
use App\Http\Controllers\MahasiswaKonsultasiController;
use App\Http\Controllers\DokterriwayatpenyakitController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/about', function () {
//   return view('about',[
//       "title" => "About",
//       "active" => "about",
//       "name" => "Loise Michael Lumban Raja",
//       "email" => "mickhaelloise1406@gmail.com",
//       "image" => "GYC_2.png"
//   ]);
//   // return  'Hello Loise';
// });

Route::get('/', function () {
  if(auth()->user()){
    return view('home',[
      'notifikasis' => Notifikasi::where('penerima_id',auth()->user()->id)->orderBy('status','asc')->orderBy('id','desc')->get() 
    ]);
  }
  return view('home');
});

Route::get('/login', [LoginController::class,'index'])->middleware('guest');
Route::post('/login', [LoginController::class,'authenticate']);
Route::post('/logout', [LoginController::class,'logout']);

// Route::get('/dashboard', [AdminDashboardController::class,'dashboard'])->middleware('auth');

Route::get('/dashboard', function(){
  return view('Admin.dashboard',[
    "users" => User::all(),
    "asramas" => Asrama::all(),
    "mahasiswas" => Mahasiswa::all(),
    "dokters" => Dokter::all(),
    "petugas_asramas" => PetugasAsrama::all()
  ]);
})->middleware('admin');


/* Admin */
Route::resource('/admin/asramas', AsramaController::class)->middleware('admin');
Route::resource('/admin/mahasiswas', MahasiswaController::class)->middleware('admin');
Route::resource('/admin/dokters', DokterController::class)->middleware('admin');
Route::resource('/admin/petugas_asramas', PetugasAsramaController::class)->middleware('admin');
Route::resource('/admin/users', AkunController::class)->middleware('admin');
Route::get('admin/users/{user}/hubungkan',[AkunController::class,'hubungkan'])->middleware('admin');


/* Dokter - Riwayat Penyakit*/
Route::resource('/dokter/riwayatpenyakits', DokterriwayatpenyakitController::class)->except('show','destroy','edit')->middleware('dokter');
Route::get('/dokter/riwayatpenyakits/{riwayatPenyakit}',[DokterriwayatpenyakitController::class,'show'])->middleware('dokter');
Route::delete('/dokter/riwayatpenyakits/{riwayatPenyakit}',[DokterriwayatpenyakitController::class,'destroy'])->middleware('dokter');
Route::get('/dokter/riwayatpenyakits/{riwayatPenyakit}/edit',[DokterriwayatpenyakitController::class,'edit'])->middleware('dokter');

/* Dokter - Rekam Medis*/
Route::resource('dokter/rekammedis', DokterRekamMedisController::class)->except('show','destroy','edit')->middleware('dokter');
Route::get('dokter/rekammedis/{rekamMedis}',[DokterRekamMedisController::class,'show'])->middleware('dokter');
Route::delete('dokter/rekammedis/{rekamMedis}',[DokterRekamMedisController::class,'destroy'])->middleware('dokter');
Route::get('dokter/rekammedis/{rekamMedis}/edit',[DokterRekamMedisController::class,'edit'])->middleware('dokter');

/* Dokter - Request Konsultasi*/
Route::resource('dokter/konsultasi', DokterKonsultasiController::class)->except('show','destroy','edit')->middleware('dokter');
Route::get('dokter/konsultasi/{reqKonsul}',[DokterKonsultasiController::class,'show'])->middleware('dokter');
// Route::get('dokter/konsultasi/{reqKonsul}/terima',[DokterKonsultasiController::class,'terima'])->middleware('dokter');
Route::put('dokter/konsultasi/{reqKonsul}/terima',[DokterKonsultasiController::class,'terima'])->middleware('dokter');
Route::put('dokter/konsultasi/{reqKonsul}/tolak',[DokterKonsultasiController::class,'tolak'])->middleware('dokter');

/* Mahasiswa - Request Konsultasi*/
Route::resource('mahasiswa/konsultasi', MahasiswaKonsultasiController::class)->except('show','destroy','edit')->middleware('mahasiswa');
Route::get('mahasiswa/konsultasi/{reqKonsul}',[MahasiswaKonsultasiController::class,'show'])->middleware('mahasiswa');
Route::get('mahasiswa/konsultasi/{reqKonsul}/edit',[MahasiswaKonsultasiController::class,'edit'])->middleware('mahasiswa');
Route::delete('mahasiswa/konsultasi/{reqKonsul}',[MahasiswaKonsultasiController::class,'destroy'])->middleware('mahasiswa');


/* Mahasiswa - Rekam Medis*/
Route::resource('mahasiswa/rekmeds', RekamMedisController::class)->middleware('mahasiswa');
Route::resource('mahasiswa/riwayatpenyakits', RiwayatPenyakitController::class)->middleware('mahasiswa');

Route::resource('pengurus/rekmeds', RekamMedisController::class)->middleware('pengurus');
// Route::resource('pengurus/rekmeds', RekamMedisController::class)->middleware('auth');

// Pengurus - Riwayat Penyakit
Route::resource('/pengurus/riwayatpenyakits', DokterriwayatpenyakitController::class)->except('show','destroy','edit')->middleware('pengurus');
Route::get('/pengurus/riwayatpenyakits/{riwayatPenyakit}',[DokterriwayatpenyakitController::class,'show'])->middleware('pengurus');
Route::delete('/pengurus/riwayatpenyakits/{riwayatPenyakit}',[DokterriwayatpenyakitController::class,'destroy'])->middleware('pengurus');
Route::get('/pengurus/riwayatpenyakits/{riwayatPenyakit}/edit',[DokterriwayatpenyakitController::class,'edit'])->middleware('pengurus');

// Mahasiswa - Profile
Route::get('/mahasiswa/profile', [ProfileController::class,'indexMahasiswa'])->middleware('mahasiswa');
Route::get('/mahasiswa/profile/{mahasiswa}', [ProfileController::class,'editMahasiswa'])->middleware('mahasiswa');
Route::put('/mahasiswa/profile/{mahasiswa}', [ProfileController::class,'updateMahasiswa'])->middleware('mahasiswa');

// Dokter - Profile
Route::get('/dokter/profile', [ProfileController::class,'indexDokter'])->middleware('dokter');
Route::get('/dokter/profile/{dokter}', [ProfileController::class,'editDokter'])->middleware('dokter');
Route::put('/dokter/profile/{dokter}', [ProfileController::class,'updateDokter'])->middleware('dokter');

// Pengurus - Profile
Route::get('/petugas/profile', [ProfileController::class,'indexPengurus'])->middleware('pengurus');
Route::get('/petugas/profile/{petugas}', [ProfileController::class,'editPengurus'])->middleware('pengurus');
Route::put('/petugas/profile/{petugas}', [ProfileController::class,'updatePengurus'])->middleware('pengurus');


Route::get('/mahasiswa/password', [ProfileController::class,'indexPassword'])->middleware('mahasiswa');
Route::put('/mahasiswa/password/{user}', [ProfileController::class,'updatePassword'])->middleware('mahasiswa');

Route::get('/dokter/password', [ProfileController::class,'indexPassword'])->middleware('dokter');
Route::put('/dokter/password/{user}', [ProfileController::class,'updatePassword'])->middleware('dokter');

Route::get('/petugas/password', [ProfileController::class,'indexPassword'])->middleware('pengurus');
Route::put('/petugas/password/{user}', [ProfileController::class,'updatePassword'])->middleware('pengurus');

Route::resource('/notifikasi',NotifikasiController::class)->middleware('auth');
Route::put('notifikasi/{notifikasi}/belum_dibaca',[NotifikasiController::class,'belum_dibaca'])->middleware('auth');
Route::put('notifikasi/{notifikasi}/telah_dibaca',[NotifikasiController::class,'telah_dibaca'])->middleware('auth');
Route::put('notifikasi/{notifikasi}/hapus_semua',[NotifikasiController::class,'hapus'])->middleware('auth');
// Route::get('/notifikasi/{notifikasi}/delete',[NotifikasiController::class,'delete'])->middleware('auth');