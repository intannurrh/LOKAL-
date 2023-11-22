<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/hello',function(){
    return 'Hello World';
});

Route::get('/belajar', function() {
    echo '<h1>Hello World</h1>';
    echo '<p>Sedang belajar Laravel</p>';
});

Route::get('/mahasiswa/fakulteknik/intan', function() {
    echo '<h2 style="text-align: center"><u>Welcome Intan</u></h2>';
});

// route parameter
Route::get('/mahasiswa/{nama}', function ($nama) {
    return "Tampilkan data mahasiswa bernama $nama";
});

Route::get('/stok_barang/{jenis}/{merek}', function ($a,$b) {
    return "Cek sisa stok untuk $a $b";
});

//route dengan optional parameter
Route::get('/stok_barang/{jenis?}/{merek?}',
    function ($a= 'smartphone',$b = 'samsung') {
    return "Cek sisa stok untuk $a $b";
});

//Route Parameter dengan Regular Expression
Route::get('/user/{id}', function ($id) {
    return "Tampilkan user dengan id = $id";
})->where('id','[0-9]+'); //pembatasan

//Route Redirect
Route::get('/hubungi-kami', function () {
    return '<h1>Hubungi Kami</h1>';
});

Route::redirect('/contact-us', '/hubungi-kami');

//Route Group
Route::prefix('/admin')->group(function(){

    Route::get('/mahasiswa', function(){
        echo "<h1>Daftar Mahasiswa</h1>";
    });

    Route::get('/dosen', function(){
        echo "<h1>Daftar Dosen</h1>";
    });

    Route::get('/karyawan', function(){
        echo "<h1>Daftar Karyawan</h1>";
    });

    });

//Route Fallback
Route::fallback (function(){
    return "Maaf, alamat yang tuju ditemukan";
});

//Route Priority
Route::get('/buku/{a}', function ($a) {
    return "Buku ke-$a";
});
Route::get('/buku/{b}', function ($b) {
    return "Buku saya ke-$b";
});
Route::get('/buku/{c}', function ($c) {
    return "Buku kita ke-$c";
});

//Membuat View
Route::get('/mahasiswa', function(){
    return view('universitas.mahasiswa');
});

//contoh mengirim data agar bisa di loop menggunakan for each (tinggal mengirim data dalam bentuk array)
Route::get('/mahasiswa', function () {
    $arrMahasiswa = ["Intan Nur","Jelita Nazwa","Afifah Zahirah","Marcha Dwi"];

return view('universitas.mahasiswa')->with('mahasiswa', $arrMahasiswa);
});
