<?php

//Admin Namespace
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EbookController;
// use App\Http\Controllers\LoginController;
use App\Http\Controllers\AgendaController;

//Controllers Namespace
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\TanyaJawabController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\DonasiController;
use App\Http\Controllers\Admin\HubKamiController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\EbookUlamaController;
use App\Http\Controllers\Admin\ChangePasswordController;

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

//Home
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/Ebook', [HomeController::class, 'about'])->name('about');
Route::get('/donasi', [HomeController::class, 'donasi'])->name('donasi');
Route::get('/donasi/pemasukan/{id}', [HomeController::class, 'pemasukan'])->name('pemasukan');
// Route::get('/login', [\App\Http\Controllers\LoginController::class, 'index'])->name('login');

//contact
Route::group(['prefix' => 'contact'], function () {
	Route::get('/create', [ContactController::class, 'create'])->name('contact.create');
	Route::post('/stored', [ContactController::class, 'store'])->name('contact.store');
	Route::get('/indexd', [ContactController::class, 'index'])->name('contact.index');
	Route::delete('delete-contact/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');
});

//kelola E-Book Kitab Ulama
Route::get('/admin/kelola-ebook-kitab-ulama', [EbookController::class, 'index'])->name('kelola-ebook');
Route::get('/tambahdata', [EbookController::class, 'tambahdata'])->name('ebook.create');
Route::post('/tambahdata', [EbookController::class, 'prosesdata'])->name('ebook.store');
Route::delete('delete-ebook/{id}', [EbookController::class, 'destroy'])->name('ebook.destroy');
Route::post('/update-ebook/{id}', [EbookController::class, 'update'])->name('ebook.update');
Route::get('/edit-ebook/{id}', [EbookController::class, 'edit'])->name('ebook.edit');

// ebook download
Route::get('/ebook.download/{attachment}', function ($attachment) {
	$name = $attachment;
	$file = public_path('storage/ebook/') . $name;
	return response()->download($file, $name);
});
//Kelola Donasi 
Route::get('/admin/kelola-donasi', [DonasiController::class, 'index'])->name('Kelola-Donasi');
Route::get('/created', [DonasiController::class, 'create'])->name('donasi.create');
Route::get('/admin/kelola-donasi/pengeluaran/create/{id}', [DonasiController::class, 'created'])->name('donasi.pengeluaran.create');
// Route::get('/admin/kelola-donasi/pengeluaran/{id}', [DonasiController::class, 'pengeluaran']);
Route::post('/admin/kelola-donasi/pengeluaran/create', [DonasiController::class, 'created'])->name('donasi.pengeluaran.create');
Route::post('/admin/kelola-donasi/pengeluaran', [DonasiController::class, 'storePengeluaran'])->name('donasi.pengeluaran.store');
Route::get('/admin/kelola-donasi/pengeluaran', [DonasiController::class, 'storePengeluaran'])->name('donasi.pengeluaran.store');
// Route::get('/open-donasi/store/pemasukan/{id}', [DonasiController::class, 'pemasukan']);
Route::get('/donasi/pemasukan/{id}', [DonasiController::class, 'pemasukan']);
Route::get('/admin/kelola-donasi/pengeluaran/create/{id}', [DonasiController::class, 'pengeluaran']);
Route::post('/stored', [DonasiController::class, 'store'])->name('donasi.store');
Route::get('/admin/kelola-donasi/kategori', [DonasiController::class, 'kategoriDonasi'])->name('donasi.kategori');
Route::delete('delete-donasi/{id}', [DonasiController::class, 'destroy'])->name('donasi.destroy');
Route::get('/edit-donasi{id}', [DonasiController::class, 'edit'])->name('donasi.edit');
Route::post('/update-donasi/{id}', [DonasiController::class, 'update'])->name('donasi.update');
// Route::post('/open-donasi/store', [DonasiController::class, 'creates'])->name('donasi.index');
Route::post('/open-donasi/store', [DonasiController::class, 'storeDonasi'])->name('open-donasi.store');
Route::post('/open-donasi/store', [DonasiController::class, 'storeDonasi'])->name('open-donasi.store');
Route::delete('delete-hasil-donasi/{id}', [DonasiController::class, 'destroy_hasdonasi'])->name('has-donasi.destroy');

//Artikel
Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel');
Route::get('/artikel/search', [ArtikelController::class, 'search'])->name('artikel.search');
Route::get('/artikel/{artikel:slug}', [ArtikelController::class, 'show'])->name('artikel.show');

//Download Artikel
Route::get('/kajian.download/{attachment}', function ($attachment) {
	$name = $attachment;
	$file = public_path('uploads/img/artikel/') . $name;
	return response()->download($file, $name);
});

//Pengumuman
Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman');
Route::get('/pengumuman/{pengumuman:slug}', [PengumumanController::class, 'show'])->name('pengumuman.show');

//Download Poster
Route::get('poster.download/{attachment}', function ($attachment) {
	$name = $attachment;
	$file = public_path('storage/') . $name;
	return response()->download($file, $name);
});

//Admin
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth']], function () {
	Route::name('admin.')->group(function () {

		Route::get('/', [AdminController::class, 'index'])->name('index');
		Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
		Route::get('/change-password', [ChangePasswordController::class, 'index'])->name('change-password.index');

		//Resource Controller
		Route::resource('users', 'UsersController');
		Route::resource('pengumuman', 'PengumumanController');
		Route::resource('agenda', 'AgendaController');
		Route::resource('artikel', 'ArtikelController');
		Route::resource('kategori-artikel', 'KategoriArtikelController');
	});
});
