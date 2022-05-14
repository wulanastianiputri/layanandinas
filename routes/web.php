<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


//Auth::routes();
//halaman utama
Route::get('/', function () {
    return view('/index');
});
Route::get('/login', function () {
    return view('/home');
});


Route::get('/register', function () {
    return view('/register');
});

Route::resource('home', 'layanansController');
//CRUD
Route::group(['middleware'=>'CekLoginMiddleware'], function(){
    Route::resource('layanans', 'homesController');
    Route::resource('layanans', 'layanansController');
    // Route::put('/layanans/{layanan}', 'layanansController@update');
  
    Route::resource('layananbelumdiverifikasi', 'layanansbelumdiverifikasiController');
    Route::resource('layananbelumditindaklanjuti','layanansbelumditindaklanjutiController');
    Route::resource('jawabans', 'jawabansController');
    Route::resource('users', 'UsersController');

    //status
    Route::post('layanans/status_bidang/{slug}','layanansController@status_bidang');
    Route::post('layanans/status_peninjauan/{slug}','layanansController@status_peninjauan');
    Route::post('layanans/jawab/{slug}','layanansController@jawab');
    Route::post('layanans/status_jawab/{slug}','layanansController@status_jawab');
    Route::post('layanans/selesai/{slug}','layanansController@selesai');
    Route::post('layanans/status_selesai/{slug}','layanansController@status_selesai');
    Route::post('layanans/status_tolak/{slug}','layanansController@status_tolak');


    //Tambah Komentar
    Route::get('layanans', 'layanansController@show')->name('layanans.show');
    Route::post('layanans/{layanans}/jawaban', 'jawabansController@store')->name('jawabans.store');
    
    //Dashboard PD
    Route::resource('layananbelumselesai', 'layananbelumselesaiController');
    Route::resource('layananselesai','layananselesaiController');
    //Dashboard Verifikator
    Route::resource('gabunganverifikator','gabunganverifikatorController');
    Route::resource('belumdiverifikasi','belumdiverifikasiController');
    Route::resource('sudahverifikasi','sudahverifikasiController');
    //Dashboard Egov
    Route::resource('gabunganegov','gabunganegovController');
    Route::resource('belumselesaiegov','belumselesaiegovController');
    Route::resource('sudahselesaiegov','sudahselesaiegovController');
    //Dashboard TI
    Route::resource('gabunganti','gabungantiController');
    Route::resource('belumselesaiti','belumselesaitiController');
    Route::resource('sudahselesaiti','sudahselesaitiController');
    //Dashboard Statistik
    Route::resource('gabunganstatistik','gabunganstatistikController');
    Route::resource('belumselesaistatistik','belumselesaistatistikController');
    Route::resource('sudahselesaistatistik','sudahselesaistatistikController');
    //Dashboard KIP
    Route::resource('gabungankip','gabungankipController');
    Route::resource('belumselesaikip','belumselesaikipController');
    Route::resource('sudahselesaikip','sudahselesaikipController');
});
//profil
Route::group(['middleware' => 'auth'], function () {
// Route::resource('profil', 'profilController'); 

// Route::get('/profile', 'ProfilController@edit')->name('profiles.edit');
// Route::patch('/profile', 'ProfilController@update')->name('profiles.update');
Route::resource('profil', 'profilController'); 
Route::get('/profile', 'ProfilesController@edit')->name('profiles.edit');
Route::patch('profile', 'ProfilesController@update')->name('profiles.update');
});

Route::group(['middleware'=>['auth','CekAksesMiddleware:1,2,4,5,6,0,7']], function(){
   
    //faq dan manual book
    Route::resource('faq', 'faqController');
    Route::resource('manualbook', 'manualbooksController');
});

Route::group(['middleware'=>['auth','CekAksesMiddleware:0']], function(){
   
    //Data master
    Route::resource('faqs', 'faqsController');
    
    Route::resource('pds', 'perangkatdaerahsController');

    Route::resource('bidangs', 'bidangsController');

    Route::resource('kategories', 'kategoriesController');

    Route::resource('statuss', 'statussController');

    Route::resource('levels', 'levelsController');

    Route::resource('users', 'usersController');

});

Route::group(['middleware' => 'auth'], function () {
   
   
//filter status
Route::get('filterstatus', 'laporanberdasarkanstatussController@filterstatus')->name('laporanberdasarkanstatuss.filterstatus');

//filter kategori
Route::get('filterkategori', 'laporanberdasarkankategorisController@filterkategori')->name('laporanberdasarkankategoris.filterkategori');

//search
Route::get('/search', 'layanansController@search');

    

    //Tambah Jawaban + Tampil Jawaban di Detail Layanan
    Route::get('layanans', 'layanansController@show')->name('layanans.show');
    Route::post('layanans/{layanans}/jawaban', 'jawabansController@store')->name('jawabans.store');
    // Route::get('jawaban/destroy/{id}', 'jawabansController@destroy')->name('jawabans.destroy');

    //Laporan index
    Route::resource('laporanbelumditindaklanjutis', 'laporanbelumditindaklanjutisController');
    Route::resource('laporanbelumselesais', 'laporanbelumselesaisController');
    Route::resource('laporanberdasarkanstatuss', 'laporanberdasarkanstatussController');
    Route::resource('laporanberdasarkankategoris', 'laporanberdasarkankategorisController');

    // Laporan Export Excel 
    Route::get('laporanbelumditindaklanjutis.exportexcel', 'laporanbelumditindaklanjutisController@exportexcel')->name('laporanbelumditindaklanjutis.exportexcel');
    Route::get('laporanbelumselesais.exportexcel', 'laporanbelumselesaisController@exportexcel')->name('laporanbelumselesais.exportexcel');
    Route::get('laporanberdasarkanstatuss.exportexcel', 'laporanberdasarkanstatussController@exportexcel')->name('laporanberdasarkanstatuss.exportexcel');
    Route::get('laporanberdasarkankategoris.exportexcel', 'laporanberdasarkankategorisController@exportexcel')->name('laporanberdasarkankategoris.exportexcel');

    Route::get('layanans', 'layanansController@index')->name('layanans.index');

    // Laporan Export PDF 
    // Route::get('laporanbelumditindaklanjutis.exportpdf', 'laporanbelumditindaklanjutisController@exportpdf')->name('laporanbelumselesais.exportpdf');
    Route::get('/cetakpertanggal/{tglawal}/{tglakhir}', 'laporanbelumditindaklanjutisController@CetakbelumditindaklanjutiPertanggal')->name('cetakpertanggal');
    Route::get('laporanbelumselesais.exportpdf', 'laporanbelumselesaisController@exportpdf')->name('laporanbelumselesais.exportpdf');
    Route::get('laporanberdasarkanstatuss.exportpdf', 'laporanberdasarkanstatussController@exportpdf')->name('laporanberdasarkanstatuss.exportpdf');
    Route::get('laporanberdasarkankategoris.exportpdf', 'laporanberdasarkankategorisController@exportpdf')->name('laporanberdasarkankategoris.exportpdf');
    
    Route::post('jawabans', 'jawabansController@store')->name('jawabans.store');
    Route::get('layanans/create', 'layanansController@create')->name('layanans.create');
   
});  

Auth::routes();
Route::get('/home','HomeController@index')->name('home');

Auth::routes();
Route::get('/home','HomeController@index')->name('home');


Auth::routes();
Route::get('/home','HomeController@index')->name('home');
